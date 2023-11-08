<?php
include 'config/bd2.php';

$txtNombre = $_POST['txtNombre'];
$txtApellidop = $_POST['txtApellidop'];
$txtApellidom = $_POST['txtApellidom'];
$txtCalle = $_POST['txtCalle'];
$txtNumero = $_POST['txtNumero'];
$txtColonia = $_POST['txtColonia'];
$txtCP = $_POST['txtCP'];
$txtMunicipio = $_POST['txtMunicipio'];
$txtEmail = $_POST['txtEmail'];
$txtRoles = $_POST['txtRoles'];
$txtPass = $_POST['txtPass'];
$txtPass = hash('sha512', $txtPass);
  
$query = "INSERT INTO `usuarios`( `nombre`, `apellidop`, `apellidom`, `calle`, `numero`, `colonia`, `cp`, `municipio`, `email`, `roles`, `pass`) 
VALUES ('$txtNombre','$txtApellidop','$txtApellidom','$txtCalle','$txtNumero','$txtColonia','$txtCP','$txtMunicipio','$txtEmail','$txtRoles','$txtPass')";

/* Verificar correo*/
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$txtEmail'");

if(mysqli_num_rows($verificar_correo) > 0){

      echo '
          <script>
                 alert("Este correo ya esta registrado, intenta con otro diferente");
                 window.location = "index.php";  
          </script>
      
      ';
      exit();

}






$ejecutar = mysqli_query($conexion, $query);
if($ejecutar){
    echo '
          <script>
                alert("Usted ha sido registrado exitosamente");
                window.location = "index.php";
          </script>
    ';
}else{
    echo '
          <script>
                alert("Hubo un error no se completo el registro,intentelo con otro correo");
                window.location = "index.php";
          </script>
    ';
}

mysqli_close($conexion);

?>