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
  <title>Galería vehiculos</title>
  <link rel="stylesheet" type="text/css" href="css/vehiculo.css">
  <link rel="stylesheet" type="text/css" href="css/modal.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <script type="text/javascript" src="js/ventanaModal.js"></script>


</head>

<body>


  <div class="encabezado">
    <img class="icoPrincipal" src="img/logo-intecap.png">

    <h2 class="textoPrincipal">Galería de vehiculos</h2>

    <a href="#" onclick="mostrarModal()">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 btnMenu">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </a>

    <div class="fondoModal" id="modal1">
      <!-- class="fondo" esta relacionado al css, id="modal1" esta relacionado a javascript  -->

      <div class="modalMensajes">
        <h3 class="modalTitulo">Registro de vehiculos</h3>
        <a href="#" class="modalSalir" onclick="CerrarModal()">Cerrar</a>

        <form action="GuardarVehiculo.php" method="POST" >
          <div class="row g-3">
            <div class="col-md-4">
              <label for="state" class="form-label">Marca</label>
              <select class="form-select" name="marca" id="state">
                <?php
                $sql = "SELECT * FROM marcas";
                $resultado = mysqli_query($conexion, $sql);
                while ($res = mysqli_fetch_assoc($resultado)) {
                ?>
                  <option value="<?php echo $res['id_marcar'] ?>"><?php echo $res['marca'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>

            <div class="col-md-4">
              <label for="firstName" class="form-label">Linea</label>
              <input type="text" name="linea" class="form-control" id="firstName" placeholder="Linea" required>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Tipo</label>
              <select class="form-select" name="tipo" id="state">
              <?php
                $sql = "SELECT * FROM tipo_vehiculo";
                $resultado = mysqli_query($conexion, $sql);
                while ($res = mysqli_fetch_assoc($resultado)) {
                ?>
                <option value="<?php echo $res['id_tipo'] ?>"><?php echo $res['tipo'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Transmisión</label>nsmisión
              <select class="form-select" name="transmision" id="state">
              <?php
                $sql = "SELECT * FROM transmision";
                $resultado = mysqli_query($conexion, $sql);
                while ($res = mysqli_fetch_assoc($resultado)) {
                ?>
                <option value="<?php echo $res['id_transmicion'] ?>"><?php echo $res['transmision'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>

            <div class="col-md-4">
              <label for="firstName" class="form-label">Modelo</label>
              <input type="text" name="modelo" class="form-control" id="firstName" placeholder="Modelo" required>
            </div>

            <div class="col-md-4">
              <label for="firstName" class="form-label">KM</label>
              <input type="text" name="km" class="form-control" id="firstName" placeholder="KM..." required>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Tracción</label>
              <select class="form-select" name="traccion" id="state">
              <?php
                $sql = "SELECT * FROM traccion";
                $resultado = mysqli_query($conexion, $sql);
                while ($res = mysqli_fetch_assoc($resultado)) {
                ?>
                <option value="<?php echo $res['id_traccion'] ?>"><?php echo $res['traccion'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Combustible</label>
              <select class="form-select" name="combustible" id="state">
              <?php
                $sql = "SELECT * FROM combustible";
                $resultado = mysqli_query($conexion, $sql);
                while ($res = mysqli_fetch_assoc($resultado)) {
                ?>
                <option value="<?php echo $res['id_combustible'] ?>"><?php echo $res['combustible'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Color</label>
              <select class="form-select" name="color" id="state">
              <?php
                $sql = "SELECT * FROM colores";
                $resultado = mysqli_query($conexion, $sql);
                while ($res = mysqli_fetch_assoc($resultado)) {
                ?>
                <option value="<?php echo $res['id_color'] ?>"><?php echo $res['color'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>

            <div class="col-md-3">
              <label for="firstName" class="form-label">Precio</label>
              <input type="text" name="precio" class="form-control" id="firstName" placeholder="Precio" required>
            </div>

            <div class="col-md-3">
              <label for="firstName" class="form-label">Años Credito</label>
              <input type="text" name="aniosMinimoCredito" class="form-control" id="firstName" placeholder="Años credito" required>
            </div>

            <div class="col-md-3">
              <label for="firstName" class="form-label">Mensualidad</label>
              <input type="text" name="mensualidadAprox" class="form-control" id="firstName" placeholder="Mensualidad" required>
            </div>

            <div class="col-md-3">
              <label for="firstName" class="form-label">Cantidad Puertas</label>
              <input type="text" name="cantidad_puertas" class="form-control" id="firstName" placeholder="Cantidad Puertas" required="">
            </div>

            <div class="col-md-8">
              <label for="firstName" class="form-label">Imagen</label>
              <input class="form-control" type="file" name="img" id="formFile">
            </div>

            <div class="col-md-2">
              <label for="firstName" class="form-label">Calcular</label>
              <button class="form-control" type="button"><img src="img/calculadora.png" alt=""></button>
            </div>
            <input type="submit" class="btn btn-primary campos" name="Guardar" value="Guardar">
          </div>
        </form>
      </div>





    </div>


    <a href="CerrarSesion.php">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 btnMenu">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
      </svg>
    </a>

  </div>
  <h2>Bienvenido:
    <?php echo $_SESSION['nombreCompleto']; ?>
  </h2>


</body>

</html>