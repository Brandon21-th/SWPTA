<?php
define("KEY", "IMPALAS");
define("COD","AES-128-ECB");
$host="localhost";
$bd="tienda2";
$usuario="root";
$pass="";

try {
        $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$pass);
       
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>