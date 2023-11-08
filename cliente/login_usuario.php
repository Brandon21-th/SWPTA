<?php

session_start();

include 'config/bd2.php';

$correo = $_POST['txtEmail'];
$contrasena = $_POST['txtPass'];
$contrasena = hash('sha512', $contrasena);

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios 
WHERE email='$correo' and pass='$contrasena'");

if(mysqli_num_rows($validar_login) > 0){
    
      $_SESSION['usuario'] = $correo;
      $_SESSION['CARRITO'];
    header("location:seccion/inicio.php");
    exit;
}else{
    echo '
    <script>
    alert("Usuario no existe, por favor verifique los datos");
    window.location = "index.php";
    </script>
    
    ';
    exit;
}




?>