<?php  include("../templates/cabecera.php");?>

<?php 
include("../config/bd.php");
include 'carrito.php';
?>

<br/>
<div class="container">
<br>
     <?php  if($mensaje!=""){?>
    <div class="alert alert-success" >
       <?php echo ($mensaje);?>
       <a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
     </div>
<?php }?>
     <div class="row">
         <?php
         
            $sentencia=$conexion->prepare("SELECT * FROM productos WHERE categoria= 'Purificadora'");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
           // print_r($listaProductos);
         ?>
         <?php foreach($listaProductos as $producto){?>
            <div class="col-md-3">
             <div class="card">
                 <img  title="<?php echo $producto['nombre'];?>" alt="<?php echo $producto['descripcion'];?>" class="card-img-top" src="../../img/<?php echo $producto['imagen'];?>" data-bs-toggle="popover" data-bs-trigger="hover" title="<?php echo $producto['nombre'];?>" data-bs-content="<?php echo $producto['descripcion'];?>"  height="280px">
                 <div class="card-body">
                     <span><?php echo $producto['nombre'];?></span>
                     <h5 class="card-title">$ <?php echo $producto['precio_v'];?> </h5>
              
                     <form action="" method="POST">

                     <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY) ;?>">
                     <input type="hidden" name="nombre" id="nombre" value=" <?php echo openssl_encrypt($producto['nombre'],COD,KEY) ;?>">
                     <input type="hidden" name="marca" id="marca" value=" <?php echo openssl_encrypt($producto['marca'],COD,KEY) ;?>">
                     <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio_v'],COD,KEY) ;?>">
                     <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY) ;?>">
                      
                     <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>

                     </form>
                     

                 </div>
             </div>
         </div>
          <!--D-->

        <?php }?>
         
     </div>
     <br><br><br>
</div>




<?php  include("../templates/pie.php");?> 
<script>

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})


</script>
