<?php

if (isset($_POST["submit"])){

    #Traer los datos
    $numFact = $_POST["numFact"];
    $nombre = $_POST["nombre"];
    $fecha = $_POST["fecha"];
    $monto = $_POST["monto"];

     $Get_image_name = $_FILES['file']['name'];
     $image_Path = "img/".basename($Get_image_name);
     #Specific directory
    // $uploads_dir = '/img';
    #TO move the uploaded file to specific location
    move_uploaded_file($_FILES['file']['tmp_name'], $image_Path);

    require_once("class/subir.php");

    $obj_subir = new subir();
    $subir_archivo = $obj_subir->subir_archivo($numFact, $nombre, $fecha, $monto, $Get_image_name);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Facturas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/subirfactura.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="#page-top">Ofideusa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="ingresar-facturas.php">Ingresar</a></li>
                        <li class="nav-item"><a class="nav-link" href="ver-facturas.php">Observar</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Ingresar factura</h1>
        <p class="col-md-8 fs-4">En esta sección deberás colocar todos los datos (número de factura, nombre, fecha, etc), y una vez ingresado todos los datos, darle clic al botón de Subir Factura.</p>
        <a href="ver-facturas.php"><button class="btn btn-primary btn-lg" type="button">Ver facturas</button></a>
      </div>
    </div>

    <form action="ingresar-facturas.php" method="post" enctype="multipart/form-data" class="">
    <center>
    <div class="mb-3 row">
        <label for="numFact" class="col-sm-3 col-form-label">Número: </label>
        <div class="col-sm-3">
            <input type="number" name="numFact" id="numFact" required  class="form-control">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nombre" class="col-sm-3 col-form-label">Nombre: </label>
        <div class="col-sm-3">
            <input type="text" name="nombre" id="nombre" required class="form-control">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="fecha" class="col-sm-3 col-form-label">Fecha: </label>
        <div class="col-sm-3">
        <input type="date" name="fecha" id="fecha" required class="form-control">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="monto" class="col-sm-3 col-form-label">Monto: </label>
        <div class="col-sm-3">
            <input type="number" name="monto" min="0" step=".01" required class="form-control">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="archivo" class="col-sm-3 col-form-label">Archivo: </label>
        <div class="col-sm-3">
            <input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
            <input type="file" name="file" required class="form-control">
        </div>
    </div></center>
   
        <input type="submit" value="Subir Factura" name="submit" class="btn btn-primary subirfact">
    
    </form>

</body>
</html>