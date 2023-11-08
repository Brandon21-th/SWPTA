<?php

include 'config/bd2.php';
$email = $_POST['email'];


$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios 
WHERE email='$email'");

if(mysqli_num_rows($validar_login) > 0){
    


  $bytes = random_bytes(5);
  $token = bin2hex($bytes);
  include "mail_reset.php";
if($enviado){
  $conexion->query("INSERT INTO passwords(email, token, codigo)
   VALUES('$email','$token','$codigo')") or die($conexion->error);
   echo '<p>Verifique su correo para restablecer su cuenta!!!!!</p>';
   exit;
}
    
}else{
    
  echo '
  <script>
  alert("Error: Correo electronico no encontrado en el sistema");
  window.location = "restablecer.php";
  </script>
  
  ';
  exit;
}



?>