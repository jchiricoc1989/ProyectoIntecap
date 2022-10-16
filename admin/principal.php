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
  <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrapa.min.css">

</head>

<body>
  <div class="encabezado">
    <img class="icoPrincipal" src="img/logo-intecap.png">
    <h2 class="textoPrincipal">Galería de vehiculos</h2>
    <a href="#" onclick="mostrarModal()" title="Agregar Vehiculo">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 btnMenu">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </a>

    <div class="fondoModal" id="modal1">
      <!-- class="fondo" esta relacionado al css, id="modal1" esta relacionado a javascript  -->
      <div class="modalMensajes">
        <div class="modalTitulo">
          <h3>Registro de vehiculos</h3>
          <label for="" onclick="CerrarModal()">&times;</label>
        </div>

        <form action="GuardarVehiculo.php" enctype="multipart/form-data" name="enviar" method="POST">
          <div class="row g-3">
            <div class="col-md-4">
              <label for="state" class="form-label">Marca</label>
              <select class="form-select" name="marca" id="marca" required>
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
              <input type="text" name="linea" class="form-control" id="linea" placeholder="Linea" required>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Tipo</label>
              <select class="form-select" name="tipo" id="tipo" required>
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
              <label for="state" class="form-label">Transmisión</label>
              <select class="form-select" name="transmision" id="transmision" required>
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
              <input type="text" name="modelo" class="form-control" id="modelo" placeholder="Modelo" required>
            </div>

            <div class="col-md-4">
              <label for="firstName" class="form-label">KM</label>
              <input type="text" name="km" class="form-control" id="km" placeholder="KM..." required>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Tracción</label>
              <select class="form-select" name="traccion" id="traccion" required>
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
              <select class="form-select" name="combustible" id="combustible" required>
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
              <select class="form-select" name="color" id="color" required>
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

            <div class="col-md-2">
              <label for="firstName" class="form-label">Precio</label>
              <input type="text" name="precio" class="form-control" id="precio" placeholder="Precio" required>
            </div>

            <div class="col-md-2">
              <label for="state" class="form-label">Años</label>
              <select class="form-select" name="anios" onchange="CalcularMeses()" id="anios">
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
              <input type="text" name="aniosMinimoCredito" class="form-control" id="aniosMinimoCredito" readonly placeholder="Meses" required>
            </div>

            <div class="col-md-3">
              <label for="firstName" class="form-label">Mensualidad</label>
              <input type="text" name="mensualidadAprox" class="form-control" id="mensualidadAprox" readonly placeholder="Mensualidad" required>
            </div>
            <div class="col-md-2">
              <label for="firstName" class="form-label">Calcular</label>
              <img onclick="Calcular()" src="img/calculadora.png" alt="" title="Calcular">
            </div>

            <div class="col-md-2">
              <label for="firstName" class="form-label">Cant. Puertas</label>
              <input type="number" name="cantidad_puertas" class="form-control" id="cantidad_puertas" placeholder="Cantidad Puertas" required>
            </div>

            <div class="col-md-10">
              <strong><em id="interes"></em></strong>
              <strong><em id="interesVehiculo"></em></strong>
              <strong><em id="sumaTotal"></em></strong>
            </div>

            <div class="col-md-8">
              <label for="firstName" class="form-label">Imagen</label>
              <input class="form-control" type="file" name="img[]" multiple="" id="formFile" required>
            </div>
            <div class="col-md-6">
              <input type="submit" class="btn btn-primary" name="Guardar" title="Insertar Vehiculo" value="Guardar">
              <button class="btn btn-success" type="button" onclick="CerrarModal()" title="Cerrar Ventana">Salir</button>
            </div>
          </div>
        </form>
      </div>
    </div>


    <a href="CerrarSesion.php" title="Cerrar Sesión">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 btnMenu">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
      </svg>
    </a>

  </div>
  <h2>Bienvenido:
    <?php echo $_SESSION['nombreCompleto']; ?>
  </h2>
  <hr>
  <!------ datos de la tabla --------------->



  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Marca</th>
        <th>Linea</th>
        <th>tipo_vehiculo</th>
        <th>Modelo</th>
        <th>Transmisión</th>
        <th>Combustible</th>
        <th>Color</th>
        <th>Cant. Puertas</th>
        <th>Opciones</th>
      </tr>

    </thead>
    <tbody>
      <?php
      $sql = "SELECT v.correlativo as correlativo, m.marca as marca, v.linea as linea, tp.tipo as tipo, v.modelo as modelo, t.transmision as transmision, com.combustible as combustible, c.color as color, v.cantidad_puertas as  	cantidad_puertas
          FROM vehiculos AS v, marcas AS m, tipo_vehiculo AS tp, transmision AS t, combustible AS com, colores AS c
          WHERE
          v.marca = m.id_marcar AND
          v.tipo = tp.id_tipo AND
          v.transmision = t.id_transmicion AND
          v.combustible = com.id_combustible AND
          v.color = c.id_color";
      $resultado = mysqli_query($conexion, $sql);
      while ($res = mysqli_fetch_array($resultado)) {
      ?>
        <tr>
          <td><?php echo $res['marca']; ?></td>
          <td><?php echo $res['linea']; ?></td>
          <td><?php echo $res['tipo']; ?></td>
          <td><?php echo $res['modelo']; ?></td>
          <td><?php echo $res['transmision']; ?></td>
          <td><?php echo $res['combustible']; ?></td>
          <td><?php echo $res['color']; ?></td>
          <td><?php echo $res['cantidad_puertas']; ?></td>
          <th>&nbsp;&nbsp;<a title="Eliminar Vehiculo" href='eliminarVehiculo.php?correlativo=<?php echo $res['correlativo']; ?>'><img src="img/eliminar.png" onclick="return elminarVehiculo()"></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a title="Actualizar Vehiculo" href='frmActualizarVehiculo.php?correlativo=<?php echo $res['correlativo']; ?>'><img src="img/actualizar.png"></a>
        </tr>
      <?php
      }
      ?>
      </tfoot>
  </table>
  <hr>
  <?php
  require "../footer.php";
  ?>



  <script type="text/javascript" src="js/ventanaModal.js"></script>
  <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/dataTables.bootstrap5.min.js"></script>

  <!--
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  -->
  <script type="text/javascript">
    function elminarVehiculo() {
      var respuesta = confirm("Estas seguro que deseas eliminar el vehiculo");
      if (respuesta == true) {
        return true;
      } else {
        return false;
      }
    }

    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>

</html>