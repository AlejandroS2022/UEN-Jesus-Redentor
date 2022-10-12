<?php 
session_start(); 

if(!isset($_SESSION["session_username"])) {
  header("location:index.php");
} else {
    require_once("incluye/conexion.php"); 
        if(isset($_GET['id']))
            {$id= $_GET['id'];
    
             mysqli_query($con,"UPDATE estudiantes SET eliminado=1 WHERE id=".$id);
                        header("location:estudiantes.php?mensaje=Estudiante Eliminado Con Exito");}
      else
                        header("location:estudiantes.php?mensaje=ERROR Al Eliminar el estudiante");}
      ?>   