<?php
include '../conexion/conexion.php';
include '../extend/permiso.php';
$user = $_SESSION['nick'];

$up = $con->query("UPDATE usuario SET bloqueo=0 WHERE nick='$user' ");
if ($up) {
$_SESSION = array();
session_destroy();
header('location:../extend/alerta.php?msj=USO INDEVIDO DEL SISTEMA&c=salir&p=salir&t=error');
}
$con->close();
 ?>
