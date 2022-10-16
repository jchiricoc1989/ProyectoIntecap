<?php
include 'admin/php/Conexion.php';

?>
<!DOCTYPE html>
<html>

<head>
  <title>Galería vehiculos</title>
  <link rel="stylesheet" type="text/css" href="css/vehiculo.css">
  <link rel="stylesheet" type="text/css" href="admin/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="admin/css/all.min.css">
</head>

<body>
  <div class="encabezado">
    <img class="icoPrincipal centerI" src="img/logo-intecap.png">
    <h2 class="textoPrincipal">Predio Chapín</h2>
    <a href="admin/index.php" title="Configuraciones"><img src="admin/img/config.png" alt=""></a>
  </div>

  <main>
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php
          $sql = "SELECT MIN(fa.id_vehiculo) as id_vehiculo, fa.correlativo,fa.ubicacion,v.linea,v.modelo, v.marca,m.marca,m.id_marcar FROM fotos_autos as fa, vehiculos AS v, marcas AS m 
  WHERE fa.id_vehiculo = v.correlativo and v.marca = m.id_marcar
  GROUP BY id_vehiculo";
          $respuesta = mysqli_query($conexion, $sql);
          while ($res = mysqli_fetch_assoc($respuesta)) {
            $correlativo = $res['correlativo'];
            $id_vehiculo = $res['id_vehiculo'];
            $ubicacion = $res['ubicacion'];
            $linea = $res['linea'];
            $modelo = $res['modelo'];
            $marca = $res['marca'];
          ?>
            &nbsp;<div class="card" style="width: 18rem;">
              <img src="admin/<?php echo $ubicacion ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $marca ?></h5>
                <h5 class="card-title"><?php echo $linea ?></h5>
                <h5 class="card-title"><?php echo $modelo ?></h5>
                <a href="visualizaVehiculo.php?correlativo=<?php echo $id_vehiculo ?>" title="Información" >
                  <img src="admin/img/info1.png" alt="">
                </a>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </main>

  <?php 
    require "footer.php";
    ?>

  <script src="admin/js/bootstrap.bundle.min.js"></script>
  <script src="admin/jS/all.min.js"></script>
</body>

</html>