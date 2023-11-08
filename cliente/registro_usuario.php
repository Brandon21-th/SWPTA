<?php
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtApellidop=(isset($_POST['txtApellidop']))?$_POST['txtApellidop']:"";
$txtApellidom=(isset($_POST['txtApellidom']))?$_POST['txtApellidom']:"";
$txtCalle=(isset($_POST['txtCalle']))?$_POST['txtCalle']:"";
$txtNumero=(isset($_POST['txtNumero']))?$_POST['txtNumero']:"";
$txtColonia=(isset($_POST['txtColonia']))?$_POST['txtColonia']:"";
$txtCP=(isset($_POST['txtCP']))?$_POST['txtCP']:"";
$txtMunicipio=(isset($_POST['txtMunicipio']))?$_POST['txtMunicipio']:"";
$txtEmail=(isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
$txtRoles=(isset($_POST['txtRoles']))?$_POST['txtRoles']:"";
$txtPass=(isset($_POST['txtPass']))?$_POST['txtPass']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("config/bd.php");


switch($accion){
      
    case"Agregar":
       $senteciaSQL= $conexion->prepare("INSERT INTO usuarios (nombre,apellidop,apellidom,calle,numero,colonia,cp,municipio,email,roles,pass) VALUES (:nombre,:apellidop,:apellidom,:calle,:numero,:colonia,:cp,:municipio,:email,:roles,:pass);");
       
        $senteciaSQL->bindParam(':nombre',$txtNombre);
        $senteciaSQL->bindParam(':apellidop',$txtApellidop);
        $senteciaSQL->bindParam(':apellidom',$txtApellidom);
        $senteciaSQL->bindParam(':calle',$txtCalle);
        $senteciaSQL->bindParam(':numero',$txtNumero);
        $senteciaSQL->bindParam(':colonia',$txtColonia);
        $senteciaSQL->bindParam(':cp',$txtCP);
        $senteciaSQL->bindParam(':municipio',$txtMunicipio);
        $senteciaSQL->bindParam(':email',$txtEmail);
        $senteciaSQL->bindParam(':roles',$txtRoles);
        $senteciaSQL->bindParam(':pass',$txtPass);
        $senteciaSQL->execute();
        if($senteciaSQL){
            echo '
                  <script>
                        alert("Usted ha sido registrado exitosamente");
                        window.location = "index.php";
                  </script>
            ';
        }else{
            echo '
                  <script>
                        alert("Hubo un error no se completo el registro,intentelo de nuevo");
                        window.location = "index.php";
                  </script>
            ';
        }
    break;

    }

?>