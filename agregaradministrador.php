<?php 
session_start(); 

if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
    require_once("incluye/conexion.php");

    $usuario= $_POST['usuario'];
	$clave= $_POST['clave'];
	$nivel= $_POST['nivel'];

	$query =mysqli_query($con,"SELECT * FROM usuarios WHERE usuario='".$usuario."' AND clave='".$clave."'");

    $numrows=mysqli_num_rows($query);
    if($numrows!=0) {
    	header("location:administradores.php?mensaje=ERROR: Este usuario ya existe");
    } else {
        mysqli_query($con, "INSERT INTO usuarios(usuario, clave, nivel) VALUES ('".$usuario."', '".$clave."', '".$nivel."')");  
        header("location:administradores.php?mensaje=Usuario Agregado Con Exito");
    }
}
?>