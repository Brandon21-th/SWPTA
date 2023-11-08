<?php 
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:../index.php");
}else{
  if($_SESSION['usuario']=="ok"){
    $nombreUsuario=$_SESSION['nombreUsuario'];

  }

}
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Productos PDF</title>
</head>
<body>
<?php
include("../config/bd.php"); 

$sentenciasSQL= $conexion->prepare("SELECT * FROM productos");
$sentenciasSQL->execute();
$listaproductos=$sentenciasSQL->fetchAll(PDO::FETCH_ASSOC);



?>
<h1 style="text-align:center;"><b>Reporte de Productos</b></h1>
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

                <img class="" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/SWPTA2.0/img/<?php echo $productos['imagen'];?>" width="100" alt="" srcset="">
                
                </td>

                <td><?php echo $productos['marca'];?></td>


            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
<?php


$html=ob_get_clean();
//echo $html;

require_once '../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

//$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream("Reportes_de_productos.pdf", array("Attachment" => false));
?>

