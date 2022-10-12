<?php 
session_start(); 

if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
    require_once("incluye/conexion.php");

    $nombre= $_POST['nombre'];
	$apellido= $_POST['apellido'];
	$cedula= $_POST['cedula'];
	$fecha_nacimiento= $_POST['fecha_nacimiento'];
	$sexo= $_POST['sexo'];
	$telefono= $_POST['telefono'];
	$otro_telefono= $_POST['otro_telefono'];
	$direccion= $_POST['direccion'];

    mysqli_query($con, "INSERT INTO profesores(nombre, apellido, cedula, fecha_nacimiento, sexo, telefono, otro_telefono, direccion, eliminado) VALUES ('".$nombre."', '".$apellido."', '".$cedula."', '".$fecha_nacimiento."', '".$sexo."', '".$telefono."', '".$otro_telefono."', '".$direccion."', 0)");
    header("location:profesores.php?mensaje=Profesor Registrado Con Exito");
}
?>
