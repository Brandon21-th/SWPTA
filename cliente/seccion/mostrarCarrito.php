<?php  

include("../config/bd.php");
include 'carrito.php';
include("../templates/cabecera.php");



?>


<br>
<h3>Lista de carrito</h3>
<?php  if(!empty($_SESSION['CARRITO'])) {?>
    
<table class="table table-light">
   
    <tbody>
        <tr>
            <th width="25%">Nombre</th>
            <th width="15%" class="text-center">Marca</th>
            <th width="15%" class="text-center" >Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%">--</th>
        </tr>
        <?php $total=0;?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
        <tr>
            <td width="25%" ><?php echo $producto['NOMBRE']?></td>
            <td width="15%" class="text-center"><?php echo $producto['MARCA']?></td>
            <td width="15%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
            <td width="20%" class="text-center">$ <?php echo $producto['PRECIO']?></td>
            <td width="20%" class="text-center">$ <?php echo number_format ($producto['PRECIO']*$producto['CANTIDAD'],2);?></td>
            <td width="5%">
            <form action="" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY) ;?>">
            <button  class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
            </form>
                
            </td>
        </tr>
        <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);?>
        <?php } ?>
       <tr>
           <td colspan="3" align="right"><h3><b>TOTAL</b></h3></td>
           <td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
           <td></td>
       </tr>
       <tr>
           <td colspan="5">
           <form action="pagar.php" method="post">
               <div class="alert alert-success">
               <div class="form-group">
                 <input type="hidden" name="correo" id="correo" value="<?php echo $_SESSION['usuario'] ?>">
                 <label for="my-input">Número de WhatsApp de contacto:</label>
                 <input type="text" name="celular" id="celular" class="form-control" placeholder="Ingrese su número" required >
                 <small id="helpId" class="text-muted">Por favor de ingresar la lado del país de México (52)...</small>
               </div>
               <small id="emailHelp" class="form-text text-muted">Los productos se enviaran a su domicilio</small>
               </div>
               <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="procede">Realiza tu pedido >></button>
            </form>
               
           </td>
       </tr>
        
    </tbody>
</table>
<?php  }else{ ?>
<div class="alert alert-success">
    No hay productos en el carrito...
</div>
<?php } ?>







<?php  include("../templates/pie.php");?> 