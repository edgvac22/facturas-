<?php
session_start();

if(isset($_REQUEST['usuario']) && isset($_REQUEST['contra'])) {
    $usuario = $_REQUEST['usuario'];
    $contra = $_REQUEST['contra'];
    setcookie("usuario", $usuario, time() + 3600);
    $salt = substr($usuario, 0,2);
    $clave_crypt = crypt ($contra, $salt);

    require_once("class/usuarios.php");

    $obj_usuarios = new usuarios();
    $iniciar_sesion = $obj_usuarios->iniciar_sesion($usuario, $clave_crypt);

    foreach ($iniciar_sesion as $array_resp) {
        foreach ($array_resp as $value) {
            $nfilas = $value;
        }
    }

    if($nfilas > 0) {
        $iniciar_sesion = $usuario;
        $_SESSION["iniciar_sesion"] = $iniciar_sesion;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS Interno + icon + theme color -->
    <link href="css/inicio.css" rel="stylesheet">
    <link href="css/carusel.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <meta name="theme-color" content="#7952b3">
</head>
<body id="page-top">
<?php
if (isset($_SESSION["iniciar_sesion"])) {
    ?>

    <!-- Navigation-->
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
        <h1 class="display-5 fw-bold">Ingreso de facturas</h1>
        <p class="col-md-8 fs-4">En este sistema podrás ingresar, observar y filtrar cualquier factura, con el fin de automatizar el proceso de búsqueda de facturas que son al contado.</p>
        <a href="ingresar-facturas.php"><button class="btn btn-primary btn-lg" type="button">Agregar factura</button></a>
        <a href="ver-facturas.php"><button class="btn btn-primary btn-lg" type="button">Ver facturas</button></a>
      </div>
    </div>
<?php
}

else if (isset ($correo)) {
    print("<br><br>\n");
    print("<p align='center'>Acceso no autorizado</p>\n");
    print("<p align='center'>[ <a href='login.html'>Iniciar sesión</a> ]</p>\n");
} else {
    print("<br><br>\n");
    print("<p align='center'>Favor identificarse!</p>\n");
    print("<p align='center'>[ <a href='login.html'>Iniciar sesión</a> ]</p>\n");
}
?>
<!-- Boostrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>