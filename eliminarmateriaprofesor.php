<?php 
session_start(); 

if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
    require_once("incluye/conexion.php"); 
        if(isset($_GET['id']))
            {$id= $_GET['id'];
    
             mysqli_query($con,"DELETE FROM materia_profesor WHERE id=".$id);
                        header("location:materiasprofesor.php?id=".$id."&mensaje=Materia del profesor Eliminada Con Exito");}
			else
                        header("location:materiasprofesor.php?id=".$id."&mensaje=ERROR Al Eliminar la materia del profesor");}
			?>   