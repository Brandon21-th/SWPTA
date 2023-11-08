<?php
include "config/bd2.php";


$email = $_POST['email'];
$p1= $_POST['p1'];
$p2= $_POST['p2'];
if($p1 == $p2){
    $p1 = hash('sha512', $p1);
    $conexion->query("update usuarios set pass='$p1' where email='$email'") or die($conexion->error);
    echo '
                  <script>
                        alert("Su cambio de contraseña fue exitoso exitosamente");
                        window.location = "index.php";
                  </script>
            ';

}else{
    echo "No coinciden las contraseñas";
}




?>