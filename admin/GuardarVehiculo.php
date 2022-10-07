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

$sql = "INSERT INTO vehiculos VALUE(null, '$marca','$linea','$tipo','$transmision','$modelo','$km','$traccion','$combustible','$color','$precio','$aniosMinimoCredito','$mensualidadAprox','$cantidad_puertas')";
//print_r($sql);

$respuesta = mysqli_query($conexion, $sql);

if($respuesta == 1){
 // -------------------------ingresando las imagenes ----------------------------
//verificando el indice o espacio FILES
//por medio de nuestro ciclo FOREACH.
foreach ($_FILES["img"]["tmp_name"] as $key => $tmp_name) {
	//RECOPILANDO NOMBRE ORIGINAL...
	$nombreImagen=$_FILES["img"]["name"][$key];
	//recopilando ubicacion actual(temporal) de la foto.....
	$ubicacion=$_FILES["img"]["tmp_name"][$key];

	//preparando ruta de salida....
	$directorio="img/imagenes/";
	//verificamos que exista el directorio...
	//negamos la expresiÃ³n FILEEXIST para evitar dejar en blanco la parte afirmativa del IF
	if (!file_exists($directorio)) {
		//cuando no exista, creamos la carpeta..
		mkdir($directorio,0777) or die("No logramos crear carpeta");
	}

	//luego de verificar, en este punto, debe de existir la carpeta.... procedemos a abrirla.

	$dir=opendir($directorio);

	//construyendo la ruta nueva (final) de imagen....
	$ubicacionFinal=$directorio.$nombreImagen;

    $sql = "INSERT INTO fotos_autos VALUES(null, '$ubicacionFinal')";
    mysqli_query($conexion, $sql);
    header("Location: index.php");


	//movemos la foto al servidor
	if (move_uploaded_file($ubicacion, $ubicacionFinal)) {
		echo "Se traslado con exito";
	}else{
		echo "ERROR, INTENTE DE NUEVO";
	}

	//cerrar carpeta...
	closedir($dir);
}

}



header("Location: principal.php");

?>