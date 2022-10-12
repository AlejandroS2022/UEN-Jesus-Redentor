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
    $direccion= $_POST['direccion'];
    $grupo_sanguineo= $_POST['grupo_sanguineo'];
    $parentesco_representante= $_POST['parentesco_representante'];
    $id_seccion= $_POST['id_seccion'];

    $id_r= $_POST['id_r'];
    $nombre_r= $_POST['nombre_r'];
    $apellido_r= $_POST['apellido_r'];
    $cedula_r= $_POST['cedula_r'];
    $fecha_nacimiento_r= $_POST['fecha_nacimiento_r'];
    $sexo_r= $_POST['sexo_r'];
    $telefono= $_POST['telefono'];
    $otro_telefono= $_POST['otro_telefono'];
    $direccion_r= $_POST['direccion_r'];

    mysqli_query($con, "UPDATE estudiantes SET nombre='$nombre', apellido='$apellido', cedula='$cedula', fecha_nacimiento='$fecha_nacimiento', sexo='$sexo', direccion='$direccion', grupo_sanguineo='$grupo_sanguineo', parentesco_representante='$parentesco_representante', id_seccion='$id_seccion' WHERE id='$id'");
    mysqli_query($con, "UPDATE representantes SET nombre='$nombre_r', apellido='$apellido_r', cedula='$cedula_r', fecha_nacimiento='$fecha_nacimiento_r', sexo='$sexo_r', telefono='$telefono', otro_telefono='$otro_telefono', direccion='$direccion_r' WHERE id='$id_r'");
    header("location:estudiantes.php?mensaje=Estudiante Modificado Con Exito");
}
?>