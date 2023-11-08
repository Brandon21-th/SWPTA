<?php include("../templates/cabecera.php");?>
<?php
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtCategoria=(isset($_POST['txtCategoria']))?$_POST['txtCategoria']:"";
$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
$txtPC=(isset($_POST['txtPC']))?$_POST['txtPC']:"";
$txtPV=(isset($_POST['txtPV']))?$_POST['txtPV']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$txtMarca=(isset($_POST['txtMarca']))?$_POST['txtMarca']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";


include("../config/bd.php");

switch($accion){
    case"Agregar":

        $sentenciasSQL= $conexion->prepare("INSERT INTO productos (nombre,categoria,descripcion,precio_c,precio_v,imagen,marca)
        VALUE (:nombre,:categoria,:descripcion,:precio_c,:precio_v,:imagen, :marca);");
        $sentenciasSQL->bindParam(':nombre',$txtNombre);
        $sentenciasSQL->bindParam(':categoria',$txtCategoria);
        $sentenciasSQL->bindParam(':descripcion',$txtDescripcion);
        $sentenciasSQL->bindParam(':precio_c',$txtPC);
        $sentenciasSQL->bindParam(':precio_v',$txtPV);
        $sentenciasSQL->bindParam(':marca',$txtMarca);

        $fecha= new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
        if($tmpImagen!=""){
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
        }
        $sentenciasSQL->bindParam(':imagen',$nombreArchivo);
        $sentenciasSQL->execute();
        header("Location:productos.php");
        break;

    case"Modificar":
        $sentenciasSQL= $conexion->prepare("UPDATE productos SET nombre=:nombre, categoria=:categoria, descripcion=:descripcion,
        precio_c=:precio_c, precio_v=:precio_v, marca=:marca  WHERE id=:id");
         $sentenciasSQL->bindParam(':nombre',$txtNombre);
         $sentenciasSQL->bindParam(':categoria',$txtCategoria);
         $sentenciasSQL->bindParam(':descripcion',$txtDescripcion);
         $sentenciasSQL->bindParam(':precio_c',$txtPC);
         $sentenciasSQL->bindParam(':precio_v',$txtPV);
         $sentenciasSQL->bindParam(':marca',$txtMarca);
         $sentenciasSQL->bindParam(':id',$txtID);
         $sentenciasSQL->execute();


        if($txtImagen!=""){

            $fecha= new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

            $sentenciasSQL= $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
            $sentenciasSQL->bindParam(':id',$txtID);
            $sentenciasSQL->execute();
            $producto=$sentenciasSQL->fetch(PDO::FETCH_LAZY);
    
            if( isset($producto["imagen"]) && ($producto["imagen"]!="imagen.jpg")){
    
                if(file_exists("../../img/".$producto["imagen"])){
    
                    unlink("../../img/".$producto["imagen"]);
                }
    
            }


         $sentenciasSQL= $conexion->prepare("UPDATE productos SET imagen=:imagen WHERE id=:id");
         $sentenciasSQL->bindParam(':imagen',$nombreArchivo);
         $sentenciasSQL->bindParam(':id',$txtID);
         $sentenciasSQL->execute();
        }
        header("Location:productos.php");
        break;
       
    case"Cancelar":
        header("Location:productos.php");
        break;
    case"Seleccionar":

        $sentenciasSQL= $conexion->prepare("SELECT * FROM productos WHERE id=:id");
        $sentenciasSQL->bindParam(':id',$txtID);
        $sentenciasSQL->execute();
        $producto=$sentenciasSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre=$producto['nombre'];
        $txtCategoria=$producto['categoria'];
        $txtDescripcion=$producto['descripcion'];
        $txtPC=$producto['precio_c'];
        $txtPV=$producto['precio_v'];
        $txtImagen=$producto['imagen'];
        $txtMarca=$producto['marca'];
        // echo "Presionado boton de seleccionar";
        break;
        
    case"Borrar":

        $sentenciasSQL= $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
        $sentenciasSQL->bindParam(':id',$txtID);
        $sentenciasSQL->execute();
        $producto=$sentenciasSQL->fetch(PDO::FETCH_LAZY);

        if( isset($producto["imagen"]) && ($producto["imagen"]!="imagen.jpg")){

            if(file_exists("../../img/".$producto["imagen"])){

                unlink("../../img/".$producto["imagen"]);
            }

        }

        $sentenciasSQL= $conexion->prepare("DELETE FROM productos WHERE id=:id");
        $sentenciasSQL->bindParam(':id',$txtID);
        $sentenciasSQL->execute();
        header("Location:productos.php");
    break;
}

      $sentenciasSQL= $conexion->prepare("SELECT * FROM productos");
      $sentenciasSQL->execute();
      $listaproductos=$sentenciasSQL->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos del producto
        </div>
        <div class="card-body">
    <form method="POST" enctype="multipart/form-data">
    <!--Campo ID de producto-->
    <div class = "form-group">
    <label for="txtID">ID:</label>
    <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID"  placeholder="ID">
    </div>
    <!--Campo Nombre-->
    <div class = "form-group">
    <label for="txtNombre">Nombre:</label>
    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre"  placeholder="Ingresar el nombre del producto">
    </div>
    <!--Campo Categoria-->
     <div class = "form-group">
    <label for="txtCategoria">Categoria:</label>
    <input type="text" required class="form-control" value="<?php echo $txtCategoria; ?>" name="txtCategoria" id="txtCategoria"  placeholder="Abarrotes-Papeleria-Purificadora-Panaderia">
    </div>
    <!--Campo Descripcion-->
    <div class = "form-group">
    <label for="txtDescripcion">Descripción:</label>
    <input type="text" required class="form-control" value="<?php echo $txtDescripcion; ?>" name="txtDescripcion" id="txtDescripcion"  placeholder="Escriba una breve descripcion del producto">
    </div>
    <!--Campo Precio de compra-->
    <div class = "form-group">
    <label for="txtPC">Precio de compra:</label>
    <input type="number" required class="form-control" value="<?php echo $txtPC; ?>" name="txtPC" id="txtPC"  placeholder="Precio de compra del producto">
    </div>
    <!--Campo Precio de venta-->
     <div class = "form-group">
    <label for="txtPV">Precio de venta:</label>
    <input type="number" required class="form-control" value="<?php echo $txtPV; ?>" name="txtPV" id="txtPV"  placeholder="Precio de venta del producto">
    </div>
    <!--Campo Imagen-->
    <div class = "form-group">
    <label for="txtImagen">Imagen:</label>

    <?php echo $txtImagen; ?>
    <br/>
    <?php  
     if($txtImagen!=""){

    ?>
     <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen;?>" width="200" alt="" srcset="">
    <?php
        } 
    ?>

    <input type="file" class="form-control" name="txtImagen" id="txtImagen"  placeholder="Ingresar la imagen">
    </div>
    <!--Campo Marca-->
    <div class = "form-group">
    <label for="txtIDuser">Marca:</label>
    <input type="text" required class="form-control"  value="<?php echo $txtMarca; ?>" name="txtMarca" id="txtMarca"  placeholder="Ingresar la marca del producto">
    </div>
    <!--Botones-->
    <div class="btn-group" role="group" aria-label="">
        <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":"";?> value="Agregar" class="btn btn-info">Agregar</button>
        <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"";?>value="Modificar" class="btn btn-warning">Modificar</button>
        <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"";?>value="Cancelar" class="btn btn-success">Cancelar</button>
    </div>
    </form>
    
        </div> 
    </div> 

    
    
</div>
<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Descripción</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Imagen</th>
                <th>Marca</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaproductos as $productos) {?>
            <tr>
                <td><?php echo $productos['id'];?></td>
                <td><?php echo $productos['nombre'];?></td>
                <td><?php echo $productos['categoria'];?></td>
                <td><?php echo $productos['descripcion'];?></td>
                <td><?php echo $productos['precio_c'];?></td>
                <td><?php echo $productos['precio_v'];?></td>

                <td>

                <img class="img-thumbnail rounded" src="../../img/<?php echo $productos['imagen'];?>" width="50" alt="" srcset="">
                
                </td>

                <td><?php echo $productos['marca'];?></td>

                <td>
                   

                    <form  method="post">
                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $productos['id'];?>"/>
                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>    
                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                    </form>
                </td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include("../templates/pie.php");?>