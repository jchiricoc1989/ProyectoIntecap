<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Carousel Template Â· Bootstrap v5.2</title>

<link href="admin/css/bootstrap.min.css" rel="stylesheet">
<link href="admin/css/carousel.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-md {
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
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    
  </head>
  <body>
    
<main>
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
   
    <div class="carousel-inner">

    <?php
    require 'admin/php/Conexion.php';

    $id_vehiculo = $_GET['correlativo'];
    $sql2 = "SELECT * FROM fotos_autos WHERE id_vehiculo = $id_vehiculo";
    $repuesta2 = mysqli_query($conexion,$sql2);

    while($res2 = mysqli_fetch_assoc($repuesta2))
    {
    $ubicacion = $res2['ubicacion'];

    ?>
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption text-start">
          <img src="admin/<?php echo $ubicacion ?>" alt="">
          </div>
        </div>
      </div>
    <?php  
    }
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
    }
    ?>

      
      
    </div>


    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

</div>
</main>


    <script src="admin/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
