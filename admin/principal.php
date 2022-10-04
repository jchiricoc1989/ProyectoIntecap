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

<h2 class="modalTitulo">Registro de vehiculos</h2>	

     <form action="GuardarVehiculo.php" class="">
      <select name="vehiculo" class="campos">
        <option value="">Toyota</option>
        <option value="">Mazda</option>
      </select>

    <input type="text" name="linea" placeholder="Linea" class="campos">

      <select name="tipo" class="campos">
        <option value="">Moto</option>
        <option value="">Camion</option>
      </select>

      <select name="color" class="campos">
        <option value="">Rojo</option>
        <option value="">Mazda</option>
      </select>
    
     </form>


     <a href="#" class="" onclick="CerrarModal()">X</a>
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