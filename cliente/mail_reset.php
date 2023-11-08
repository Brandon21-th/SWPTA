<?php
// Varios destinatarios
$para  = $email . ', '; // atención a la coma
//$para .= 'wez@example.com';

// título
$título = 'Restablecer contraseña ITSCO!!';
$codigo = rand(1000,9999);

// mensaje
$mensaje = '
<html>
<head>
  <title>Restablecer contrasena</title>
</head>
<body>
  <h1><b>Tienda de abarrotes ITSCO!!!</b></h1>
  <div style="text-align:center; background-color:#ccc">
  <p><b>Restablecer contrasena </b></p>
  <h3>Use este codigo para poder restablecer su contrasena: '.$codigo.'</h3>
  <p><a href="http://localhost/SWPTA2.0/cliente/reset.php?email='.$email.'&token='.$token.'">  para restablecer haga click en el siguiente link</a>  </p>
  <p><small>Si usted no ha solicitado este codigo para restablecer su contrasena por favor de omitir</small></p>
  </div>
  
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Your name <info@address.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
/*
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
*/
/*
// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
*/
// Enviarlo
$enviado = false;
if(mail($para, $título, $mensaje, $headers)){
  $enviado=true;
}

?>