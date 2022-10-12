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
	$sql = "SELECT fa.correlativo,fa.id_vehiculo,fa.ubicacion, v.correlativo, v.linea,v.modelo,m.id_marcar, m.marca, 
	COUNT(fa.id_vehiculo)
	FROM vehiculos AS v, fotos_autos AS fa, marcas AS m 
	WHERE fa.id_vehiculo = v.correlativo AND v.marca = m.id_marcar
	GROUP BY fa.id_vehiculo";
	$respuesta = mysqli_query($conexion, $sql);
	while ($res = mysqli_fetch_assoc($respuesta)){
		$correlativo = $res['correlativo'];
		$id_vehiculo = $res['id_vehiculo'];
		$ubicacion = $res['ubicacion'];
	?>

	<div class="col-md-8">
		
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