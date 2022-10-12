<?php 
session_start(); 

if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
    require_once("incluye/conexion.php"); 
        if(isset($_GET['id']))
            {$id= $_GET['id'];
    
             mysqli_query($con,"UPDATE materia SET eliminado=1 WHERE id=".$id);
                        header("location:materias.php?mensaje=Materia Eliminada Con Exito");}
			else
                        header("location:materias.php?mensaje=ERROR Al Eliminar la materia");}
			?>   