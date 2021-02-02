<?php
$server='localhost';
$user='root';
$pass='';
$bd='ticket';

$conex= mysqli_connect($server, $user, $pass, $bd);
if (!$conex) {
    die('<strong> No puede conectarse con la base de datos. </strong>'+ mysql_error());
}else{
    echo 'conectado';
}
?>

