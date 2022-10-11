<?php
include 'php/Conexion.php';
session_start();

if (!isset($_SESSION['usuarioValido'])) {
  header("Location: index.php");
  die();
} else {

$correlativo = $_GET['correlativo'];
$sql2 = "DELETE FROM fotos_autos WHERE id_vehiculo = $correlativo";
mysqli_query($conexion, $sql2);   


$sql = "DELETE FROM	vehiculos WHERE correlativo = $correlativo";
mysqli_query($conexion, $sql);


header("Location: principal.php");


}

?>