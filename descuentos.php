<?php

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

// Buscar la suma total de los descuentos en la base de datos.
$sql = "SELECT SUM(valor_descontado) AS total_descuentos FROM ventas  ";
$result = $conn->query($sql);


if (!$result) {
    http_response_code(500);
    exit("Error al buscar la suma total de los descuentos en la base de datos: " . $conn->error);
}

// Si se encuentra la suma total de los descuentos, retornarla en formato JSON.
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_descuentos = $row["total_descuentos"];

    // Retornar la suma total de los descuentos en formato JSON.
    $response = array('total_descuentos' => $total_descuentos);

    //se utiliza para indicar al navegador que el contenido que se está enviando es de tipo JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Si no se encuentra la suma total de los descuentos, retornar un mensaje de error en formato JSON.
    http_response_code(404);
    $response = array('error' => "No se encontró la suma total de los descuentos.");
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Cerrar la conexión con la base de datos.
$conn->close();


?>