<?php
    $conexion = new mysqli('localhost', 'root', '','tienda2');

    if($conexion-> connect_error){
        die('No se pudo conectar al servidor');
    }


?>