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

$sentenciasSQL= $conexion->prepare("SELECT * FROM usuarios");
$sentenciasSQL->execute();
$listausuarios=$sentenciasSQL->fetchAll(PDO::FETCH_ASSOC);



?>
<h1 style="text-align:center;"><b>Reporte de Usuarios Registrados</b></h1>
<table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido materno</th>
                <th>Calle</th>
                <th>Numero</th>
                <th>Colonia</th>
                <th>Código postal</th>
                <th>Municipio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listausuarios as $usuario) {?>
            <tr>
                <td><?php echo $usuario['id']?></td>
                <td><?php echo $usuario['nombre']?></td>
                <td><?php echo $usuario['apellidop']?></td>
                <td><?php echo $usuario['apellidom']?></td>
                <td><?php echo $usuario['calle']?></td>
                <td><?php echo $usuario['numero']?></td>
                <td><?php echo $usuario['colonia']?></td>
                <td><?php echo $usuario['cp']?></td>
                <td><?php echo $usuario['municipio']?></td>
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
//$dompdf->setPaper('letter');

$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream("Reportes_de_usuarios.pdf", array("Attachment" => false));
?>

