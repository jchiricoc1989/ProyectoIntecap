<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Vehiculos</title>
    <link rel="stylesheet" type="text/css" href="css/vehiculo.css">
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/css/carousel.css" rel="stylesheet">


</head>
<body>
    <div class="row">
        <div class="encabezado">
            <img class="icoPrincipal centerI" src="img/logo-intecap.png">
            <h1 class="textoPrincipal">Información del vehiculo</h1>
            <a href="index.php"><img src="admin/img/atras.png" alt=""></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div id="carouselExampleIndicators" style="width:800px; height: 500px;" class="carousel slide" data-bs-ride="true">

                <div class="carousel-inner" style="width:800px; height:500px;">

                    <?php
                    require 'admin/php/Conexion.php';

                    $id_vehiculo = $_GET['correlativo'];

                    $sql2 = "SELECT * FROM fotos_autos WHERE id_vehiculo = $id_vehiculo";
                    $repuesta2 = mysqli_query($conexion, $sql2);

                    while ($res2 = mysqli_fetch_assoc($repuesta2)) {
                        $ubicacion = $res2['ubicacion'];
                    ?>
                        <div class="carousel-item active">
                            <img src="admin/<?php echo $ubicacion ?>" class="d-block w-100" alt="" width="800" height="500">
                        </div>

                    <?php
                    }
                    ?>

                </div>
                <button class="carousel-control-prev" style="background:#ECF0F1;" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" style="background:#ECF0F1 ;" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="col-md-4">
            <?php
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

            while ($res = mysqli_fetch_assoc($respuesta)) {
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
                <h1>Datos del Vehiculo</h1>
                <strong class="badge bg-success text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;">Marca: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong class="badge bg-primary text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;"><?php echo $marca ?></strong><br><br>
                <strong class="badge bg-success text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;">Linea: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong class="badge bg-primary text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;"><?php echo $linea ?></strong><br><br>
                <strong class="badge bg-success text-wrap" style="width: 8rem; height: 3rem; font-size: 17px;">Tipo Vehiculo: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong class="badge bg-primary text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;"><?php echo $tipoVehiculo ?></strong><br><br>
                <strong class="badge bg-success text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;">Transmisión: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong class="badge bg-primary text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;"><?php echo $transmicion ?></strong><br><br>
                <strong class="badge bg-success text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;">Modelo: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong class="badge bg-primary text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;"><?php echo $modelo ?></strong><br><br>
                <strong class="badge bg-success text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;">KM: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong class="badge bg-primary text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;"><?php echo $km ?></strong><br><br>
                <strong class="badge bg-success text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;">Tracción: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong class="badge bg-primary text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;"><?php echo $traccion ?></strong><br><br>
                <strong class="badge bg-success text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;">Combustible: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong class="badge bg-primary text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;"><?php echo $transmicion ?></strong><br><br>
                <strong class="badge bg-success text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;">Precio: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong class="badge bg-primary text-wrap" style="width: 8rem; height: 2rem; font-size: 17px;"><?php echo $precio ?></strong>

            <?php
            }
            ?>
        </div>
    </div>
    </div>

    <script src="admin/js/bootstrap.bundle.min.js"></script>
</body>

</html>
