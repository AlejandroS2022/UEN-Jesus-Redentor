<?php 
session_start(); 

if(!isset($_SESSION["session_username"])) {
    header("location:index.php");
} else {
    require_once("incluye/conexion.php");

    $id= $_POST['id'];
    $nombre= $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $cedula= $_POST['cedula'];
    $fecha_nacimiento= $_POST['fecha_nacimiento'];
    $sexo= $_POST['sexo'];
    $telefono= $_POST['telefono'];
    $otro_telefono= $_POST['otro_telefono'];
    $direccion= $_POST['direccion'];

    mysqli_query($con, "UPDATE profesores SET nombre='$nombre', apellido='$apellido', cedula='$cedula', fecha_nacimiento='$fecha_nacimiento', sexo='$sexo', telefono='$telefono', otro_telefono='$otro_telefono', direccion='$direccion' WHERE id='$id'");
    header("location:profesores.php?mensaje=Profesor Modificado Con Exito");
}
?>