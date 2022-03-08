
<?php 
 
 if(!isset($_POST['buscar'])){
    $_POST['buscar'] = "";

    $buscar = $_POST['buscar'];
}

$buscar = $_POST['buscar'];

$connect = mysqli_connect("localhost",
     "root", "", "ofideusa"); 
  
 // Display data from facturas table
  $query ="SELECT numero,nombre,fecha,monto,nombre_archivo FROM facturas WHERE numero LIKE '%{$buscar}%' 
  OR nombre LIKE '%{$buscar}%' OR fecha LIKE '%{$buscar}%' OR monto LIKE '%{$buscar}%' 
  OR nombre_archivo LIKE '%{$buscar}%'   "; 

  $result = mysqli_query($connect, $query); 
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Facturas</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Menu -->
    <a href="inicio.php">Inicio</a><br>
    <a href="ingresar-facturas.php">Subir facturas</a><br>
    <a href="ver-facturas.php">Ver facturas</a><br>
    <a href="logout.php">Cerrar sesión</a>

    <h1>Ver Facturas</h1>

    <form action="ver-facturas.php" method="post">
        <input type="text" name="buscar">
        <input type="submit" value="Buscar">
        <a href="ver-facturas.php"><button type="submit">Limpiar</button></a>
    </form>
        
    <br>
    <!-- Table "responsive" -->
    <div class="table-responsive">
             <table class="table table-bordered">
                 <tr>
                     <th width="5%">Número</th>
                     <th width="10%">Nombre</th>
                     <th width="5%">Fecha</th>
                     <th width="5%">Monto</th>
                     <th width="5%">Nombre del archivo</th>
                     <th width="5%">Ver factura</th>
                 </tr>
                                <!-- Insert data from the database -->
                                <?php while($value = mysqli_fetch_array($result)) {  ?>
                                    <tr>
                     <td><?php echo $value['numero']; ?></td>
                     <td><?php echo $value['nombre']; ?></td>
                     <td><?php echo $value['fecha']; ?></td>
                     <td><?php echo $value['monto']; ?></td>
                     <td><?php echo $value['nombre_archivo']; ?></td>
                     <td><center><a href="../../ofideusa/facturas/img/<?php echo $value['nombre_archivo'];?>">Ver</a></center></td>
                 </tr> 
                                <?php  } ?>
                                </table>
                                </div>
</body>
</html>
