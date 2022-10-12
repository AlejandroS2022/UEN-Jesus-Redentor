<?php 
session_start(); 

if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
    require_once("incluye/conexion.php"); 
        if(isset($_GET['id']))
            {$id= $_GET['id'];
    
             mysqli_query($con,"UPDATE secciones SET eliminado=1 WHERE id=".$id);
                        header("location:secciones.php?mensaje=Sección Eliminada Con Exito");}
			else
                        header("location:secciones.php?mensaje=ERROR Al Eliminar la sección");}
			?>   