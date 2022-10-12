<?php 
session_start(); 

if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
    require_once("incluye/conexion.php");

	$nombre= $_POST['nombre'];
	$id_grado= $_POST['id_grado'];

	$query =mysqli_query($con,"SELECT * FROM materia WHERE nombre='".$nombre."' AND id_grado='".$id_grado."' AND eliminado=0");
    $query2 =mysqli_query($con,"SELECT * FROM materia WHERE nombre='".$nombre."' AND id_grado='".$id_grado."' AND eliminado=1");

    $numrows=mysqli_num_rows($query);
    $numrows2=mysqli_num_rows($query2);
    if($numrows!=0) {
    	header("location:materias.php?mensaje=ERROR: Esta materia ya existe");
    } else if($numrows2!=0) {
        $filas=mysqli_fetch_assoc($query2);
        mysqli_query($con, "UPDATE materia SET eliminado=0 WHERE id='".$filas['id']."'");  
        header("location:materias.php?mensaje=Materia Restaurada Con Exito");
    } else {
        mysqli_query($con, "INSERT INTO materia(nombre, id_grado, eliminado) VALUES ('".$nombre."', '".$id_grado."', 0)");  
        header("location:materias.php?mensaje=Materia Agregada Con Exito");
    }
}
?>