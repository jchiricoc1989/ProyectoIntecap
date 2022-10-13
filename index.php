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
    <a href="admin/index.php"><img src="admin/img/config.png"alt=""></a>
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
            <div class="col">
              <div class="card shadow-sm">
                <img src="admin/<?php echo $ubicacion ?>" width="300" height="300">
                <strong style="font-size:25px;"><?php echo $marca ?></strong>
                <strong style="font-size:25px;"><?php echo $linea ?></strong>
                <strong style="font-size:25px;"><?php echo $modelo ?></strong>

                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a class="btn btn-sm btn-outline-secondary" href="visualizaVehiculo.php?correlativo=<?php echo $id_vehiculo ?>"><i class="fa-solid fa-circle-info"></i></a>
                    </div>
                  </div>
                </div>
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
  <script src="admin/jS/all.min.js"></script>
</body>

</html>