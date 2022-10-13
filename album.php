<?php
include 'admin/php/Conexion.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Album example Â· Bootstrap v5.2</title>
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    
<main>
  <div class="album py-5 bg-light">
    <div class="container">

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
  <?php
	$sql = "SELECT MIN(fa.id_vehiculo) as id_vehiculo, fa.correlativo,fa.ubicacion,v.linea,v.modelo, v.marca,m.marca,m.id_marcar FROM fotos_autos as fa, vehiculos AS v, marcas AS m 
  WHERE fa.id_vehiculo = v.correlativo and v.marca = m.id_marcar
  GROUP BY id_vehiculo";
	$respuesta = mysqli_query($conexion, $sql);
	while ($res = mysqli_fetch_assoc($respuesta)){
		$correlativo = $res['correlativo'];
		$id_vehiculo = $res['id_vehiculo'];
		$ubicacion = $res['ubicacion'];
    $linea = $res['linea'];
    $modelo = $res['modelo'];
    $marca = $res['marca'];
	?>
  

  <div class="card" style="width: 18rem;">
  <img src="admin/<?php echo $ubicacion ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $marca ?></h5>
    <h5 class="card-title"><?php echo $linea ?></h5>
    <h5 class="card-title"><?php echo $modelo ?></h5>
    <a href="carrousel.php?correlativo=<?php echo $id_vehiculo ?>" class="btn btn-primary">Ver</a>
  </div>
</div>
<?php	
	}
	?>
  </div>
  </div>
  </div>
</main>



    <script src="admin/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>

<?php
	/*$sql = "SELECT fa.correlativo,fa.id_vehiculo,fa.ubicacion, v.correlativo, v.linea,v.modelo,m.id_marcar, m.marca, 
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
	}*/
	?>
