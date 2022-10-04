<?php
include 'php/Conexion.php';

$nombreColaborador = $_POST['nombreColaborador'];
$us_colaborador = $_POST['us_colaborador'];
$us_contra = password_hash($_POST['us_contra'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios VALUES(null,'$nombreColaborador','$us_colaborador','$us_contra')";


mysqli_query($conexion, $sql);

header("Location: index.php");



?>