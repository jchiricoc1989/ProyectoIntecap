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

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">

    

    

<link href="admin/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: none;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
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
        <div class="col">
          <div class="card shadow-sm">
          <img src="admin/<?php echo $ubicacion ?>" >

            <div class="card-body">
              <p class="card-text"><?php echo $marca ?></p>
              <p class="card-text"><?php echo $linea?></p>
              <p class="card-text"><?php echo $modelo?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="ver.php?correlativo=<?php echo $id_vehiculo ?>">ir</a>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
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

      
  </body>
</html>
