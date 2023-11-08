<?php  include("templates/cabecera.php");?>
     <div class="jumbotron">
         <h1 class="display-3">Bienvenidos a ¡Tienda de Abarrotes ITSCO!</h1>
         <p class="lead">Compra en linea con nosotros y ¡Y te llevamos tu compra hasta tu domicilio!</p>
         <hr class="my-2">
         <p class="lead">
            
         </p>
     </div>
     <br/><br/>
     
     <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="5000">
      <img src="img/Abarrotes3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><B><FONT COLOR="White">Contamos con productos de Abarrotes</FONT></B></h5>
        <p><B><FONT COLOR="White">Surte tu despensa sin salir de casa y cuidate del COVID-19.</FONT></B></p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/papeleria.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><B><FONT COLOR="White">Servicios y productos de papeleria</FONT></B></h5>
        <p><B><FONT COLOR="White">Nuestros productos y servicios superarán las
            expectaticas de nuestros clientas.</FONT></B></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/panaderia.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><B><FONT COLOR="White">Delicioso Pan de primera calidad</FONT></B></h5>
        <p><B><FONT COLOR="White">La mejor colección de postres.</FONT></B></p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<br><br>
<div style="text-align:center;">
  <h1>Nuestros productos y servicios son de 100% calidad!!!!!!</h1><br>
  <h2>Contamos con productos de abarrotes...</h2>

</div>
<?php
include("administrador/config/bd.php");

      $sentenciasSQL= $conexion->prepare("SELECT * FROM productos WHERE categoria='Abarrotes'");
      $sentenciasSQL->execute();
      $listaproductos=$sentenciasSQL->fetchAll(PDO::FETCH_ASSOC);

?>
<?php foreach($listaproductos as $producto) { ?>
    
<div class="col-md-3" > 
 <div class="card" >

    <img class="card-img-top"  src="./img/<?php echo $producto['imagen'];?>" height="280px"  >
    <div class="card-body">
        <h4 class="card-title"><?php echo $producto['nombre']; ?></h4>
        <h4 class="card-title"><?php echo $producto['marca']; ?></h4>
        <h4 class="card-title">$ <?php echo $producto['precio_v']; ?></h4>
        
    </div>
    
   </div>
   <br/>
   </div>

   
<?php } ?>
<div style="text-align:center;">
  <h2>Contamos con productos de papeleria...</h2><br>

</div>
<?php
$sentenciasSQL= $conexion->prepare("SELECT * FROM productos WHERE categoria='Papeleria'");
$sentenciasSQL->execute();
$listaproductos=$sentenciasSQL->fetchAll(PDO::FETCH_ASSOC);


?>

<?php foreach($listaproductos as $producto) { ?>
    
    <div class="col-md-3" > 
     <div class="card" >
    
        <img class="card-img-top"  src="./img/<?php echo $producto['imagen'];?>" height="280px"  >
        <div class="card-body">
            <h4 class="card-title"><?php echo $producto['nombre']; ?></h4>
            <h4 class="card-title"><?php echo $producto['marca']; ?></h4>
            <h4 class="card-title">$ <?php echo $producto['precio_v']; ?></h4>
            
        </div>
        
       </div>
       <br/>
       </div>
    
       
    <?php } ?>

    <div style="text-align:center;">
  <h2>Rico y calientito pan 100% hecho en casa...</h2><br>

</div>
<?php
$sentenciasSQL= $conexion->prepare("SELECT * FROM productos WHERE categoria='Panaderia'");
$sentenciasSQL->execute();
$listaproductos=$sentenciasSQL->fetchAll(PDO::FETCH_ASSOC);


?>

<?php foreach($listaproductos as $producto) { ?>
    
    <div class="col-md-3" > 
     <div class="card" >
    
        <img class="card-img-top"  src="./img/<?php echo $producto['imagen'];?>" height="280px"  >
        <div class="card-body">
            <h4 class="card-title"><?php echo $producto['nombre']; ?></h4>
            <h4 class="card-title"><?php echo $producto['marca']; ?></h4>
            <h4 class="card-title">$ <?php echo $producto['precio_v']; ?></h4>
           
        </div>
        
       </div>
       <br/>
       </div>
    
       
    <?php } ?>
    <div style="text-align:center;">
  <h2>Y por supuesto contamos con habla potable de la mejor calidad...</h2><br>

</div>
<?php
$sentenciasSQL= $conexion->prepare("SELECT * FROM productos WHERE categoria='Purificadora'");
$sentenciasSQL->execute();
$listaproductos=$sentenciasSQL->fetchAll(PDO::FETCH_ASSOC);


?>

<?php foreach($listaproductos as $producto) { ?>
    
    <div class="col-md-3" > 
     <div class="card" >
    
        <img class="card-img-top"  src="./img/<?php echo $producto['imagen'];?>" height="280px"  >
        <div class="card-body">
            <h4 class="card-title"><?php echo $producto['nombre']; ?></h4>
            <h4 class="card-title"><?php echo $producto['marca']; ?></h4>
            <h4 class="card-title">$ <?php echo $producto['precio_v']; ?></h4>
          
        </div>
        
       </div>
       <br/>
       </div>
    
       
    <?php } ?>
<!--Pie de pagina-->

<?php  include("templates/pie.php");?> 
     