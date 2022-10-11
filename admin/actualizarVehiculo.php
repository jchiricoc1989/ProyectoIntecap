<?php
include 'php/Conexion.php';
session_start();

if (!isset($_SESSION['usuarioValido'])) {
  header("Location: index.php");
  die();
} else {
}

// variables del formulario
$correlativo = $_POST['correlativo'];
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

$ubicacion = $_POST['ubicacion'];
$idImagen =$_POST['correlativo'];

// actualizar el vehiculo
$sql = "UPDATE vehiculos SET marca = $marca,
                            linea = '$linea',
                            tipo = $tipo,
                            transmision = $transmision,
                            modelo = '$modelo',
                            km = '$km',
                            traccion = $traccion,
                            combustible = $combustible,
                            color = $color,
                            precio = '$precio',
                            aniosMinimoCredito = '$aniosMinimoCredito',
                            mensualidadAprox = '$mensualidadAprox',
                            cantidad_puertas = '$cantidad_puertas'
        WHERE
                            correlativo = $correlativo";
mysqli_query($conexion, $sql);

//$ultimoCodigoInsertado = mysqli_insert_id($conexion);

//actualizar las fotos del vehiculo
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

    
   // header("Location: index.php");


	//movemos la foto al servidor
	if (move_uploaded_file($ubicacion, $ubicacionFinal)) {
	//	$sql = "INSERT INTO fotos_autos VALUES(null,'$ultimoCodigoInsertado','$ubicacionFinal')";
  //mysqli_query($conexion, $sql);
       $sql2 = "UPDATE fotos_autos SET
	   					id_vehiculo = $correlativo,
	   					ubicacion = '$ubicacion'
	   			WHERE
	   					correlativo = $idImagen";
       mysqli_query($conexion, $sql2);
		
	}else{
		echo "ERROR, INTENTE DE NUEVO";
	}

	//cerrar carpeta...
	closedir($dir);
}
 


echo "Actualizacion correcta";



?>