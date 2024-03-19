<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta Videojuegos</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- NAVEGADOR-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary navegador">
        <div class="container-fluid">
            <a class="navbar-brand modulos" href="#">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link  modulos" aria-current="page" href="#abs-center">VENTAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link modulos" href="consulta.php">CONSULTA VALOR DESCUENTOS</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <!-- FORMULARIO DE VENTAS  -->

    <div class="abs-center">
        <form id="mi-formulario" enctype="multipart/form-data" class="p-4 form">

            <h1 id="titulo">VENTA DE CONSOLAS - VIDEOJUEGOS </h1><br>

            <div class="mb-3">
                <label for="consola" class="form-label datos">Nombre Consola: </label>
                <input type="text" class="form-control " id="console" name="console">
                <div id="console" class="form-text">Nombre de la consola para la cual es el videojuego.</div>

            </div>
            <div class="mb-3">
                <label for="Valor" class="form-label datos">Valor: </label>
                <input type="number" class="form-control" id="valor" name="valor">
                <div id="valor" class="form-text">Valor del videojuego sin descuento.</div>

            </div>
            <button type="submit" class="btn btn-primary">Guardar Venta</button>
        </form>
    </div>

    <div>
        <div class="card" style="width: 25rem; margin:auto;margin-top: -15em;background: cadetblue;">
            <div class="card-body">
                <p style="font-weight:bold;text-align: center;">VALOR A PAGAR</p>
                <h5 class="card-title" style="font-weight:bold;text-align: center;"> </h5>
                <p class="card-text" style="font-weight:bold;text-align: center;"> </p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="datos.js"></script>
</body>

</html>