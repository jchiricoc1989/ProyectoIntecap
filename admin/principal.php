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

<div class="fondoModal" id="modal1"> <!-- class="fondo" esta relacionado al css, id="modal1" esta relacionado a javascript  -->

<div class="modalMensajes">
<h3 class="modalTitulo">Registro de vehiculos</h3>	
<a href="#" class="modalSalir" onclick="CerrarModal()">Cerrar</a>

     <form action="GuardarVehiculo.php" method="POST" class="needs-validation" novalidate>
<div class="row g-3">

     <div class="col-md-4">
      <label for="state" class="form-label">Marca</label>
      <select class="form-select" name="" id="state">
        <option value="">Toyota</option>
        <option value="">Mazda</option>
      </select>
     </div>

     <div class="col-md-4">
      <label for="firstName" class="form-label">Linea</label>
      <input type="text" class="form-control" id="firstName" placeholder="Linea"required> 
      <div class="invalid-feedback">
                Valid last name is required.
              </div>

     </div>

     


     <div class="col-md-4">
      <label for="state" class="form-label">Tipo</label>
      <select class="form-select" name="tipo" id="state">
      <option value="">Sedan</option>
        <option value="">Corola</option>
      </select>
     </div>

     <div class="col-md-4">
      <label for="state" class="form-label">Transmisión</label>nsmisión
      <select class="form-select" name="traccion" id="state">
      <option value="">automatica</option>
      <option value="">mecanica</option>
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
      <option value="">4X2</option>
      <option value="">4X4</option>
      </select>
     </div>

     <div class="col-md-4">
      <label for="state" class="form-label">Combustible</label>
      <select class="form-select" name="color" id="state">
      <option value="">Gasolina</option>
      <option value="">Diesel</option>
      </select>
     </div>

     <div class="col-md-4">
      <label for="state" class="form-label">Color</label>
      <select class="form-select" name="color" id="state">
      <option value="">Rojo</option>
      <option value="">Azul</option>
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
      <button class="form-control" type="button"><img  src="img/calculadora.png" alt=""></button>
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