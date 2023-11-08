<?php

$host = "localhost";
$nombre = "tienda";
$usuario = "root";
$pass = "";


$fecha = date("Ymd_His");

$nombre_sql = $nombre .'_'.$fecha.'.sql';
 
$dump = "mysqldump -h$host -u$usuario -p$pass $nombre > $nombre_sql";

exec($dump);

?>