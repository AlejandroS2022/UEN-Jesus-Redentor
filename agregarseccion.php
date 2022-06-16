<?php 
session_start(); 

if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
    require_once("incluye/conexion.php");

	$nombre= $_POST['nombre'];
	$id_grado= $_POST['id_grado'];

	$query =mysqli_query($con,"SELECT * FROM secciones WHERE nombre='".$nombre."' AND id_grado='".$id_grado."' AND eliminado=0");
    $query2 =mysqli_query($con,"SELECT * FROM secciones WHERE nombre='".$nombre."' AND id_grado='".$id_grado."' AND eliminado=1");

    $numrows=mysqli_num_rows($query);
    $numrows2=mysqli_num_rows($query2);
    if($numrows!=0) {
    	header("location:secciones.php?mensaje=ERROR: Esta sección ya existe");
    } else if($numrows2!=0) {
        $filas=mysqli_fetch_assoc($query2);
        mysqli_query($con, "UPDATE secciones SET eliminado=0 WHERE id='".$filas['id']."'");  
        header("location:secciones.php?mensaje=Sección Restaurada Con Exito");
    } else {
        mysqli_query($con, "INSERT INTO secciones(nombre, id_grado, eliminado) VALUES ('".$nombre."', '".$id_grado."', 0)");  
        header("location:secciones.php?mensaje=Sección Agregada Con Exito");
    }
}
?>