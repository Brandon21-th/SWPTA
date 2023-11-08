<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:index.php");
}else{
  if($_SESSION['usuario']=="ok"){
    $nombreUsuario=$_SESSION['nombreUsuario'];

  }

}



?>

<!doctype html>
<html lang="en">
  <head>
    <title>Tiendas ITSCO!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
   
  <?php     $url="http://".$_SERVER['HTTP_HOST']."/SWPTA2.0"?>


  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Administrador del sitio web<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/inicio.php">Inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/productos.php">Productos</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/usuarios.php">Usuarios</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/reportes.php">Reportes</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>">Ver sitio</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php">Cerrar Sesión</a>
        </div>
    </nav>


     <div class="container">
         <br/>
        <div class="row">