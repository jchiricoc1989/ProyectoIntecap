<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	include 'php/Conexion.php';

	$us_colaborador = $_POST['us_colaborador'];
	$us_contra = $_POST['us_contra'];

	$sql = "SELECT * FROM usuarios WHERE usuario = '$us_colaborador'";
	$resultado = mysqli_query($conexion, $sql);

	$contador = mysqli_num_rows($resultado);

	$res = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
	if($contador == 1){
		if(password_verify($us_contra,$res['pass'])){
			session_start();
			$_SESSION['usuarioValido'] = $us_colaborador;
			$_SESSION['nombreCompleto'] = $res['Nombre'];
			header("Location: principal.php");

		}

	}



}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Administración Vehiculos</title>
	<link rel="stylesheet" type="text/css" href="css/loginINTECAP.css">
</head>
<body>
<div class="auxLogin">
	<div class="lateralIzquierdo">
		<img src="img/logo-intecap.png">
	</div>
	<div class="lateralDerecho">
		
		
		<form style="width: 100%" action="" method="POST">
			<svg xmlns="http://www.w3.org/2000/svg" class="iconUser centrar h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
</svg>
				<h2 class="textoPrincipal">Credenciales</h2>
		
			<div class="auxCampos">
				
				<div class="auxDetampos"></div>
				<div class="auxDetampos">
					
			<input class="camposIngreso" type="text" name="us_colaborador" placeholder="Usuario...">

			<input class="camposIngreso" type="password" name="us_contra" placeholder="Contraseña...">
<a href="registrar.php">
			<svg style="width: 50px;" xmlns="http://www.w3.org/2000/svg" class="iconUser centrar h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
</svg>
			</a>

			</div>
			<div class="auxDetampos">
					<button class="camposIngreso btnIniciar"><svg style="width: 50px;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
</svg>
</button>
			</div>
			</div>
			
		
		</form>

	</div>

</div>



</body>
</html>

 

