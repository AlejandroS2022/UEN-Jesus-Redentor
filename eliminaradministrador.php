<?php 
session_start(); 

if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
    require_once("incluye/conexion.php"); 
        if(isset($_GET['id']))
            {$id= $_GET['id'];
    
             mysqli_query($con,"DELETE FROM usuarios WHERE id=".$id);
                        header("location:administradores.php?mensaje=Usuario Eliminado Con Exito");}
			else
                        header("location:administradores.php?mensaje=ERROR Al Eliminar el usuario");}
			?>   