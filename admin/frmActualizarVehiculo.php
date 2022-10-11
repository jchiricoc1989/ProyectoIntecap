<?php
include 'php/Conexion.php';
session_start();

if (!isset($_SESSION['usuarioValido'])) {
  header("Location: index.php");
  die();
} else {
}

?>


<!DOCTYPE html>
<html>

<head>
  <title>Actualizacion de Vehiculos</title>
  <link rel="stylesheet" type="text/css" href="css/vehiculo.css">
  <link rel="stylesheet" type="text/css" href="css/modal.css">
  <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrapa.min.css">

  <!--
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
-->


  


</head>

<body>
<div class="encabezado">
    <img class="icoPrincipal" src="img/logo-intecap.png">

    <h2 class="textoPrincipal">Actualización de vehiculo</h2>
    <a href="CerrarSesion.php">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 btnMenu">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
      </svg>
    </a>

  </div>
  <h4>Bienvenido:
    <?php echo $_SESSION['nombreCompleto']; ?>
  </h4>
<hr>
  
<div class="container">

<?php
$correlativo = $_GET['correlativo'];
//ENTONCES ACA DEBE RECUPERAR EL AUTO TAL CUAL ES
$sql= "SELECT * FROM `vehiculos` WHERE correlativo = $correlativo";//aqui recupera el auto..
$resultado = mysqli_query($conexion, $sql);

// variables para comparar en los selected
$codigoMarca=0;
$codigoTipo = 0;
$codigoTrans = 0;
$codigoTrac = 0;
$codigoComb = 0;
$codigoColor = 0;
while($res = mysqli_fetch_assoc($resultado)){
  //estas sus variables si deben ir fuera, igual me voy a enfcoar en el primero y luego hace usted el resto...
  $correlativo = $res['correlativo'];
  $codigoMarca=  $res['marca'];
  $linea = $res['linea'];
  $codigoTipo = $res['tipo'];
  $codigoTrans = $res['transmision'];
  $modelo = $res['modelo'];
  $km = $res['km'];
  $codigoTrac = $res['traccion'];
  $codigoComb = $res['combustible'];
  $codigoColor = $res['color'];
  $precio = $res['precio'];
  $meses = $res['aniosMinimoCredito'];
  $mensualidad = $res['mensualidadAprox'];
  $puertas = $res['cantidad_puertas'];

}

?>
        <form action="actualizarVehiculo.php" enctype="multipart/form-data" name="enviar" method="POST" >
          <div class="row g-3">
            <div class="col-md-4">
              <input type="hidden" name="correlativo" value="<?php echo $correlativo; ?>">
              <label for="state" class="form-label">Marca</label>
              <select class="form-select" name="marca" id="marca" required>
                <?php
                $sql = "SELECT * FROM marcas";
                $resultado = mysqli_query($conexion, $sql);
                while ($res = mysqli_fetch_assoc($resultado)) {
                  //para marcar el dato que viene de la base de datos
                  if($res['id_marcar']==$codigoMarca){
                    echo "<option value=".$res['id_marcar']." SELECTED>".$res['marca']."</option>";

                  }else{
                  echo "<option value=".$res['id_marcar'].">".$res['marca']."</option>";
                  }
                }
                ?>

              </select>
            </div>

            <div class="col-md-4">
              <label for="firstName" class="form-label">Linea</label>
              <input type="text" name="linea" class="form-control" id="linea" placeholder="Linea" value="<?php echo $linea; ?>" required>
            </div>
            <div class="col-md-4">
              <label for="state" class="form-label">Tipo</label>
              <select class="form-select" name="tipo" id="tipo" required>
              <?php
                $sql = "SELECT * FROM tipo_vehiculo";
                $resultado = mysqli_query($conexion, $sql);
                while ($res = mysqli_fetch_assoc($resultado)) {
                 if($res['id_tipo']==$codigoTipo){
                  echo "<option value=".$res['id_tipo']." SELECTED>".$res['tipo']."</option>";
                }else{
                echo "<option value=".$res['id_tipo'].">".$res['tipo']."</option>";
                }
                }
                ?>
              </select>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Transmisión</label>
              <select class="form-select" name="transmision" id="transmision" required>
              <?php
                $sql = "SELECT * FROM transmision";
                $resultado = mysqli_query($conexion, $sql);
                while ($res = mysqli_fetch_assoc($resultado)) {
                 if($res['id_transmicion']== $codigoTrans){
                  ?>
                   <option value="<?php echo $res['id_transmicion'] ?>" selected><?php echo $res['transmision'] ?></option>
                <?php
                 }else {
                 ?> 
                  <option value="<?php echo $res['id_transmicion'] ?>"><?php echo $res['transmision'] ?></option>
                <?php
                }
                }
                ?>
              </select>
            </div>

            <div class="col-md-4">
              <label for="firstName" class="form-label">Modelo</label>
              <input type="text" name="modelo" class="form-control" id="modelo" placeholder="Modelo" value="<?php echo $modelo; ?>" required>
            </div>

            <div class="col-md-4">
              <label for="firstName" class="form-label">KM</label>
              <input type="text" name="km" class="form-control" id="km" placeholder="KM..." value="<?php echo $km; ?>" required>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Tracción</label>
              <select class="form-select" name="traccion" id="traccion" required>
              <?php
                $sql = "SELECT * FROM traccion";
                $resultado = mysqli_query($conexion, $sql);
                while ($res = mysqli_fetch_assoc($resultado)) {
                  if($res['id_traccion']==$codigoTrac){
                    echo "<option value=".$res['id_traccion']." SELECTED >".$res['traccion']."</option>";
                  }else{
                  echo "<option value=".$res['id_traccion'].">".$res['traccion']."</option>";
                  }
                  }
                ?>
              </select>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Combustible</label>
              <select class="form-select" name="combustible" id="combustible" required>
              <?php
                $sql = "SELECT * FROM combustible";
                $resultado = mysqli_query($conexion, $sql);
                while ($res = mysqli_fetch_assoc($resultado)) {
                  if($res['id_combustible']==$codigoComb){
                    echo "<option value=".$res['id_combustible']." SELECTED >".$res['combustible']."</option>";
                  }else{
                  echo "<option value=".$res['id_combustible'].">".$res['combustible']."</option>";
                  }
                  }
                ?>
              </select>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Color</label>
              <select class="form-select" name="color" id="color" required>
              <?php
                $sql = "SELECT * FROM colores";
                $resultado = mysqli_query($conexion, $sql);
                while ($res = mysqli_fetch_assoc($resultado)) {
                  if($res['id_color']==$codigoColor){
                ?>
                 <option value="<?php echo $res['id_color'] ?>" selected><?php echo $res['color'] ?></option>
                <?php
                  }else{
                 ?>
                 <option value="<?php echo $res['id_color'] ?>"><?php echo $res['color'] ?></option>
                 <?php     
                  }
                }
                ?>
              </select>
            </div>

            <div class="col-md-2">
              <label for="firstName" class="form-label">Precio</label>
              <input type="text" name="precio" class="form-control" id="precio" placeholder="Precio" value="<?php echo $precio; ?>" required>
            </div>

            <div class="col-md-2">
              <label for="state" class="form-label">Años</label>
              <select class="form-select" name="anios" onchange="CalcularMeses()"  id="anios">
               <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>

              </select>
            </div>

            <div class="col-md-3">
              <label for="firstName" class="form-label">Meses Credito</label>
              <input type="text" name="aniosMinimoCredito" class="form-control" id="aniosMinimoCredito" readonly placeholder="Meses" value="<?php echo $meses; ?>" required>
            </div>

           

            <div class="col-md-3">
              <label for="firstName" class="form-label">Mensualidad</label>
              <input type="text" name="mensualidadAprox" class="form-control" id="mensualidadAprox" readonly placeholder="Mensualidad" value="<?php echo $mensualidad; ?>" required>
            </div>

            <div class="col-md-2">
              <label for="firstName" class="form-label">Calcular</label>
              <img onclick="Calcular()" src="img/calculadora.png" alt="">
            </div>

            <div class="col-md-2">
              <label for="firstName" class="form-label">Cant. Puertas</label>
              <input type="number" name="cantidad_puertas" class="form-control" id="cantidad_puertas" placeholder="Cantidad Puertas" value="<?php echo $puertas; ?>" required>
            </div>

            <div class="col-md-10">
              <strong><em id="interes"></em></strong>
              <strong><em id="interesVehiculo"></em></strong>
              <strong><em id="sumaTotal"></em></strong>
            </div>
            
            <?php
            //$correlativo = $_GET['correlativo'];
            $imagen = "SELECT * FROM fotos_autos WHERE id_vehiculo = $correlativo";
            $resultado = mysqli_query($conexion, $imagen);

            while($res = mysqli_fetch_assoc($resultado)){
                    $idImage = $res['correlativo'];
                    $idVehiculo = $res['id_vehiculo'];
                    $ubicacion = $res['ubicacion'];
            ?>
              <div class="col-md-2">
              <picture>
            <img class="img-thumbnail" alt="..." width="150" height="150" src="<?php echo $ubicacion ?>">           
            </picture>
              </div>
            <?php       
            }
            ?>
        <!--
            <div class="col-md-8">
              <label for="firstName" class="form-label">Imagen</label>
              <input class="form-control" type="file" name="img[]" multiple="" id="formFile" required>
            </div>
          --> 
            <div class="col-md-12">
            <input type="submit" class="btn btn-primary" name="Guardar" value="Actualizar Vehiculo">
            <button class="btn btn-success" type="button" onclick="Salir()">Cancelar</button>
            </div>
          </div>
        </form>
    
</div>
<br><br>
<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: #2980b9;">
    © 2020 Copyright:
    <a class="text-dark" href="#">Jeremías Iván Chiricoc Martínez</a>
  </div>
  <!-- Copyright -->
</footer>

<script type="text/javascript" src="js/ventanaModal.js"></script>
  <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/dataTables.bootstrap5.min.js"></script>
  <script>
    function Salir(){
    window.location = "principal.php";
}
  </script>
</body>

</html>