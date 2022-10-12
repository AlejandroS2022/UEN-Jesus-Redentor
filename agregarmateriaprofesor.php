<?php 
session_start(); 

if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
    require_once("incluye/conexion.php");

    $id_profesor= $_POST['id_profesor'];
	$id_materia= $_POST['id_materia'];
	$id_seccion= $_POST['id_seccion'];

	$query =mysqli_query($con,"SELECT * FROM materia_profesor WHERE id_profesor='".$id_profesor."' AND id_materia='".$id_materia."' AND id_seccion='".$id_seccion."'");

    $numrows=mysqli_num_rows($query);
    if($numrows!=0) {
    	header("location:materiasprofesor.php?id=".$id_profesor."&mensaje=ERROR: Este profesor ya está registrado en la materia para esta sección");
    } else {
        mysqli_query($con, "INSERT INTO materia_profesor(id_profesor, id_materia, id_seccion) VALUES ('".$id_profesor."', '".$id_materia."', '".$id_seccion."')");  
        header("location:materiasprofesor.php?id=".$id_profesor."&mensaje=Materia del profesor Agregada Con Exito");
    }
}
?>