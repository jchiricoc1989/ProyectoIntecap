<?php
include 'php/Conexion.php';
session_start();

if(!isset($_SESSION['usuarioValido'])){
  header("Location: index.php");
  die();

}else{
 
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Galería vehiculos</title>
	<link rel="stylesheet" type="text/css" href="css/vehiculo.css">
  <link rel="stylesheet" type="text/css" href="css/modal.css">
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

<div class="fondoModal" id="modal1"> <!-- class="fondo" esta relacionado al css, id="modal1" esta relacionado a javascript  -->

<div class="modalMensajes">
<h3 class="modalTitulo">Registro de vehiculos</h3>	
<a href="#" class="modalSalir" onclick="CerrarModal()">Cerrar</a>

     <form action="GuardarVehiculo.php" method="POST" class="">
      <select name="marca" class="campos">
        <option value="">Toyota</option>
        <option value="">Mazda</option>
      </select>

    <input type="text" name="linea" placeholder="Linea" class="campos">

      <select name="tipo" class="campos">
        <option value="">Sedan</option>
        <option value="">Corola</option>
      </select>

      <select name="color" class="campos">
        <option value="">Mecanica</option>
        <option value="">Automatica</option>
      </select>

      <input type="text" name="modelo" placeholder="Modelo" class="campos">

      <input type="text" name="km" placeholder="KM..." class="campos">

      <select name="traccion" class="campos">
        <option value="">4X4</option>
        <option value="">4X2</option>
      </select>

      <select name="combustible" class="campos">
        <option value="">Gasolina</option>
        <option value="">Diese</option>
      </select>

      <select name="color" class="campos">
        <option value="">Azul</option>
        <option value="">rojo</option>
      </select>

      <input type="text" name="precio" placeholder="Precio.." class="campos">
      <input type="text" name="anio" placeholder="Años minimo Credito" class="campos">
      <img class="modalCalculadora" src="img/calculadora.png" alt="">
      <input type="text" name="mensualidad" placeholder="Mensualidad Recomendada" class="campos">
      <input type="text" name="CantidadPuertas" placeholder="Cantidad puertas" class="campos">
      <input type="file" name="img" id="" class="campos">
      <input type="submit" name="Guardar" value="Guardar" class="campos">
    
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