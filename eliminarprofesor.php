<?php 
session_start(); 

if(!isset($_SESSION["session_username"])) {
  header("location:index.php");
} else {
    require_once("incluye/conexion.php"); 
        if(isset($_GET['id']))
            {$id= $_GET['id'];
    
             mysqli_query($con,"UPDATE profesores SET eliminado=1 WHERE id=".$id);
                        header("location:profesores.php?mensaje=Profesor Eliminado Con Exito");}
      else
                        header("location:profesores.php?mensaje=ERROR Al Eliminar el profesor");}
      ?>   