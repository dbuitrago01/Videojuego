<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

// Se Define la estructura del JSON de entrada en la petición.
$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);


// Validar los datos enviados por el cliente.
if (!isset($data['console']) || !isset($data['valor'])) {
    http_response_code(400);
    exit('Se deben enviar los parámetros "console" y "valor".');
}

// Acceder a los datos recibidos
$console = $data['console'];
$valor = $data['valor'];

// Conectar a la base de datos MySQL.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "videojuegos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión.
if ($conn->connect_error) {
    http_response_code(500);
    exit("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Buscar el descuento correspondiente.
$sql = "SELECT valor_descuento FROM descuentos WHERE consola = '$console' AND $valor BETWEEN precio_min AND precio_max";
$result = $conn->query($sql);


if (!$result) {
    http_response_code(500);
    exit("Error al buscar el descuento en la base de datos: " . $conn->error);
}

// Si se encuentra el descuento, calcular el valor a cobrar al cliente.
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $descuento = $row["valor_descuento"] / 100;
    $valor_cobrar = $valor - ($valor * $descuento);
    $valor_cobrar = round($valor_cobrar, 2);

    // valor descontado de la venta;
    $valordescontado = $valor - $valor_cobrar;

    //Se insertan los datos a la tabla VENTAS
    $sql = "INSERT INTO VENTAS (consola,valor_videojuego,valor_pagar_cliente,valor_descontado)  
                        VALUES ('$console','$valor','$valor_cobrar','$valordescontado')";

    $conn->query($sql);

    // Retornar el valor a cobrar al cliente en formato JSON.
    $response = array(
        'ValorCobrarCliente' => $valor_cobrar,
        'mensage' => "El Descuento Para la Consola $console Fue de  $valordescontado."
    );

    header('Content-Type: application/json');
     echo json_encode($response);
} else {

    //Se insertan los datos a la tabla VENTAS
    $sql = "INSERT INTO VENTAS (consola,valor_videojuego,valor_pagar_cliente,valor_descontado)  
                        VALUES ('$console','$valor','$valor','0')";

    $conn->query($sql);

    // Si no se encuentra el descuento, retornar un mensaje de error en formato JSON.
    http_response_code(200);
    $response = array(
        'mensage' => "No se encontro descuento para la consola $console con el valor de $valor. ",
        'console' => $console,
        'ValorCobrarCliente' => $valor
    );

    //se utiliza para indicar al navegador que el contenido que se está enviando es de tipo JSON
    header('Content-Type: application/json');
    echo json_encode($response);

}

// Cerrar la conexión con la base de datos.
$conn->close();
