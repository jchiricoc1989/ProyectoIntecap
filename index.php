<?php
include 'admin/php/Conexion.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Galería vehiculos</title>
	<link rel="stylesheet" type="text/css" href="css/vehiculo.css">
	<link rel="stylesheet" type="text/css" href="admin/css/bootstrap.min.css">
</head>
<body>
<div class="encabezado">
	
	<img class="icoPrincipal centerI" src="img/logo-intecap.png">

<h2 class="textoPrincipal">Predio Chapín</h2>

<div></div>

<div></div>

</div>

<div class="contenedorI">

	<?php
	$sql = "SELECT * FROM fotos_autos limit 2 ";
	$respuesta = mysqli_query($conexion, $sql);
	while ($res = mysqli_fetch_assoc($respuesta)){
		$correlativo = $res['correlativo'];
		$id_vehiculo = $res['id_vehiculo'];
		$ubicacion = $res['ubicacion'];
	?>

	<div class="col-md-8">
		<table id="example" class="table table-striped table-bordered" style="width:100%">

			
		</table>
		<img class="imgCarI" src="admin/<?php echo $ubicacion ?>">
		<h3>Mazda</h3>
		<h4>BT-50</h4>
		<h4>2014</h4>

	<?php	
	}
	?>
	</div>
</div> 
</body>
</html>