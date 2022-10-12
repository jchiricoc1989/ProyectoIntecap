<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require 'admin/php/Conexion.php';

$id_vehiculo = $_GET['correlativo'];

//echo $id_vehiculo;

$sql = "SELECT v.*, m.*,tv.*,trans.*, t.*, comb.*,c.*
FROM vehiculos AS v, marcas as m, tipo_vehiculo AS tv, transmision AS trans, traccion AS t, combustible as comb, colores AS c
WHERE
v.marca = m.id_marcar AND
v.tipo = tv.id_tipo AND
v.transmision = trans.id_transmicion AND
v.traccion = t.id_traccion AND
v.combustible = comb.id_combustible AND
v.color = c.id_color AND
v.correlativo = $id_vehiculo";
$respuesta = mysqli_query($conexion, $sql);

while($res = mysqli_fetch_assoc($respuesta)){
    $correlativoVehiculo = $res['correlativo'];
    $marca = $res['marca'];
    $linea = $res['linea'];
    $tipoVehiculo = $res['tipo'];
    $transmicion = $res['transmision'];
    $modelo = $res['modelo'];
    $km = $res['km'];
    $traccion = $res['traccion'];
    $combustible = $res['combustible'];
    $precio = $res['precio'];
?>
<span>Marca: <?php echo $marca ?></span><br>
<span>linea: <?php echo $linea ?></span><br>
<span>Tipo: <?php echo $tipoVehiculo ?></span><br>
<span>Transmision: <?php echo $transmicion ?></span><br>
<span>modelo: <?php echo $modelo ?></span><br>
<span>km: <?php echo $km ?></span><br>
<span>traccion: <?php echo $traccion ?></span><br>
<span>combustible: <?php echo $combustible ?></span><br>
<span>precio: <?php echo $precio ?></span><br>

<?php   
}

$sql2 = "SELECT * FROM fotos_autos WHERE id_vehiculo = $id_vehiculo";
$repuesta2 = mysqli_query($conexion,$sql2);

while($res2 = mysqli_fetch_assoc($repuesta2))
{
    $ubicacion = $res2['ubicacion'];
?>
<img src="admin/<?php echo $ubicacion ?>" alt="" width="150" height="150">
<?php
}
?>

</body>
</html>