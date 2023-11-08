<?php
include("../config/bd.php");
include 'carrito.php';

include("../templates/cabecera.php");

//ID del usuario
$txtCorreo=(isset($_POST['correo']))?$_POST['correo']:"";
$txtID=(isset($_POST['id']))?$_POST['id']:"";


$sentenciasSQL= $conexion->prepare("SELECT id FROM `usuarios` WHERE email=:email");
$sentenciasSQL->bindParam(':email',$txtCorreo);
$sentenciasSQL->execute();
$usuario=$sentenciasSQL->fetch(PDO::FETCH_LAZY);

$txtID=$usuario['id'];

// El nombre completo del usuario..
$sentenciasSQL= $conexion->prepare("SELECT nombre, apellidop, apellidom FROM `usuarios` WHERE id=:id");
$sentenciasSQL->bindParam(':id',$txtID);
$sentenciasSQL->execute();
$usuario=$sentenciasSQL->fetch(PDO::FETCH_LAZY);

$txtNombre=$usuario['nombre'];
$txtApelldop=$usuario['apellidop'];
$txtApelldom=$usuario['apellidom'];
//Dirección completa del usuario
$sentenciasSQL= $conexion->prepare("SELECT calle, numero, colonia, municipio FROM `usuarios` WHERE id=:id");
$sentenciasSQL->bindParam(':id',$txtID);
$sentenciasSQL->execute();
$usuario=$sentenciasSQL->fetch(PDO::FETCH_LAZY);

$txtCalle=$usuario['calle'];
$txtNumero=$usuario['numero'];
$txtColonia=$usuario['colonia'];
$txtMunicipio=$usuario['municpio'];


//Agregar a pedido_detalle
if($_POST){

    $total=0;
    $SID=session_id();
    $Cel=$_POST['celular'];
    foreach($_SESSION['CARRITO'] as $indice=>$producto){
        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
    }
    $sentenciasSQL=$conexion->prepare("INSERT INTO `pedidos` (`id`, `Fecha`, `Celular`, `Total`, `id_usuario`) VALUES (NULL, NOW(), :Celular,:Total, :id_usuario);");
    $sentenciasSQL->bindParam(":Celular",$Cel);
    $sentenciasSQL->bindParam(":Total",$total);
    $sentenciasSQL->bindParam(":id_usuario",$txtID);
     $sentenciasSQL->execute();
     $idPedido=$conexion->lastInsertId();


     foreach($_SESSION['CARRITO'] as $indice=>$producto){
         $sentenciasSQL=$conexion->prepare("INSERT INTO `pedidos_detalle` (`id`, `id_pedido`, `id_producto`, `precio`, `cantidad`) VALUES (NULL, :id_pedido, :id_producto, :precio, :cantidad);");
         $sentenciasSQL->bindParam(":id_pedido",$idPedido);
         $sentenciasSQL->bindParam(":id_producto",$producto['ID']);
         $sentenciasSQL->bindParam(":precio",$producto['PRECIO']);
         $sentenciasSQL->bindParam(":cantidad",$producto['CANTIDAD']);
          $sentenciasSQL->execute();
      
      
        }
   
   // echo "<h3>".$total."</h3>";
}

?>

<div>
    <form action="" method="post">
    <input type="hidden" name="correo" id="correo" class="form-control" value="<?php echo $_SESSION['usuario'] ?>">
    <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $txtID;?>">
    
    </form>
</div>
<?php
        
        $sentenciasSQL= $conexion->prepare("SELECT pedidos_detalle.id, productos.nombre, productos.precio_v, pedidos_detalle.cantidad FROM productos, pedidos_detalle WHERE pedidos_detalle.id_producto = productos.id AND pedidos_detalle.id_pedido = :id_pedido");
        $sentenciasSQL->bindParam(":id_pedido",$idPedido);
        $sentenciasSQL->execute();
        $listaproductos=$sentenciasSQL->fetchAll(PDO::FETCH_ASSOC)
        ?>


<div class="col-md-12">
<div class="jumbotron text-center">
    <h1 class="display-4">¡Paso Final!</h1>
    <hr class="my-4">
    <p class="lead">El monto total de su pedido es:<br/>
        <h4>$<?php echo number_format($total,2);?></h4>
    </p>
    <form action="" method="POST">
       
        <input id="inputname" class="inputwts" type="hidden" required="" placeholder="Nombre" autocomplete="off" value="<?php echo $txtNombre; ?> <?php echo $txtApelldop;?> <?php echo $txtApelldom;?>">
       
        <input id="inputdireccion" class="inputwts" type="hidden" required="" placeholder="Direccion" autocomplete="off" value="<?php echo $txtCalle; ?>, <?php echo $txtNumero;?>, <?php echo $txtColonia;?> en <?php echo $txtMunicipio;?>">
        
    
      
        <input id="inputmensaje" class="inputwts" type="hidden" required="" placeholder="Pedido" autocomplete="off" value="<?php foreach($listaproductos as $producto) { ?>
        Producto:<?php echo $producto['nombre'];?> Precio:<?php echo $producto['precio_v']; ?> Cantidad: <?php echo $producto['cantidad']; ?> 
        
        <?php } ?> ">
        <input id="inputotal" class="inputwts" type="hidden" required="" placeholder="Nombre" autocomplete="off" value="<?php echo number_format($total,2);?>">
        //
        <button type="submit" id="sendbttn" name="btnAccion" value="inicio" class="btn btn-success btn-lg btn-block">Enviar mi pedido</button>
    </form>
    <p>Los productos se enviaran despues de que usted envie su pedido por WhatsApp..</p>
    <strong>(Para aclaraciones :itsco@gmail.com o al numero +52 55-23-28-78-77)</strong>
</div>



</div>





<?php  include("../templates/pie.php");?> 
<script>

var sendbttn = document.querySelector('#sendbttn');

sendbttn.addEventListener('click' , EnviarMensaje)

		function EnviarMensaje(){


			let name = document.querySelector('#inputname').value;
			let mensaje = document.querySelector('#inputmensaje').value;
            let direccion = document.querySelector('#inputdireccion').value;
		    let total = document.querySelector('#inputotal').value;
			let url = "https://api.whatsapp.com/send?phone=525523287877&text=Cliente: %0A" + name + "%0A%0ADireccion: %0A" + direccion + "%0A%0APedido: %0A" + mensaje + "%0A%0ATotal: %0A" + total + "%0A";
			window.open(url);

		}
</script>