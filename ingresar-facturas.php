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
</head>
<body>
<a href="inicio.php">Inicio</a><br>
<a href="ingresar-facturas.php">Subir facturas</a><br>
<a href="ver-facturas.php">Ver facturas</a><br>
<a href="logout.php">Cerrar sesión</a>

<h1>Ingresar facturas.</h1>
    <form action="ingresar-facturas.php" method="post" enctype="multipart/form-data">
        <label for="numFact">Número: </label>
        <input type="number" name="numFact" id="numFact" required><br><br>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" required><br><br>
        <label for="fecha">Fecha: </label>
        <input type="date" name="fecha" id="fecha" required><br><br>
        <label for="monto">Monto: </label>
        <input type="number" name="monto" min="0" step=".01" required><br><br>
        <input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
        <label for="archivo">Archivo: </label>
        <input type="file" name="file" required><br><br>
        <input type="submit" value="Subir Factura" name="submit">
    </form>
</body>
</html>