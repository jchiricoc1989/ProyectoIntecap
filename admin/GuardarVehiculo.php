<?php
include 'php/Conexion.php';
session_start();

if (!isset($_SESSION['usuarioValido'])) {
  header("Location: index.php");
  die();
} else {
}

// variables del formulario
$marca= $_POST['marca'];
$linea= $_POST['linea'];		
$tipo= $_POST['tipo'];	
$transmision= $_POST['transmision'];	
$modelo	= $_POST['modelo'];
$km	= $_POST['km'];
$traccion= $_POST['traccion'];	
$combustible= $_POST['combustible'];	
$color	= $_POST['color'];
$precio	= $_POST['precio'];
$aniosMinimoCredito	= $_POST['aniosMinimoCredito'];
$mensualidadAprox= $_POST['mensualidadAprox'];	
$cantidad_puertas= $_POST['cantidad_puertas'];	

echo $marca."<br>";
echo $linea."<br>";
echo $tipo."<br>";
echo $transmision."<br>";
echo $traccion."<br>";
echo $modelo."<br>";
echo $km."<br>";
echo $traccion."<br>";
echo $combustible."<br>";
echo $color."<br>";
echo $precio."<br>";
echo $aniosMinimoCredito."<br>";
echo $mensualidadAprox."<br>";
echo $cantidad_puertas."<br>";

?>