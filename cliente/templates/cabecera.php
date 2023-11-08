<?php
 session_start();
 if(!isset($_SESSION['usuario'])){

     
  echo '
  <script>
  alert("Por favor debes iniciar sesión");
  window.location="../index.php";
  </script>
  ';
  

  session_destroy();
  die();
 }

?>





<!doctype html>
<html lang="en">
  <head>
    <title>Tiendas ITSCO!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/estilos.css"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
   
  <?php     $url="http://".$_SERVER['HTTP_HOST']."/SWPTA2.0"?>


  <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Bienvenidos a ITSCO!<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/cliente/seccion/inicio.php">Inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/cliente/seccion/productos.php">Todos los Productos</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/cliente/seccion/abarrotes.php">Abarrotes</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/cliente/seccion/panaderia.php">Panaderia</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/cliente/seccion/papeleria.php">Papeleria</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/cliente/seccion/purificadora.php">Purificadora</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/cliente/seccion/mostrarCarrito.php"><b>Carrito(<?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);?>)</b></a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/cliente/seccion/cerrar.php">Cerrar Sesión</a>
        </div>
    </nav>


     <div class="container">
         <br/>
        <div class="row">