<?php 
session_start(); 

if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
    require_once("incluye/conexion.php");

    $resultid= mysqli_query($con, "SELECT AUTO_INCREMENT as id FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'bd_escuela' AND TABLE_NAME = 'representantes'");
    $filas=mysqli_fetch_assoc($resultid);

    $resultid2= mysqli_query($con, "SELECT AUTO_INCREMENT as id FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'bd_escuela' AND TABLE_NAME = 'estudiantes'");
    $filas2=mysqli_fetch_assoc($resultid2);

    $resultid3= mysqli_query($con, "SELECT AUTO_INCREMENT as id FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'bd_escuela' AND TABLE_NAME = 'usuarios'");
    $filas3=mysqli_fetch_assoc($resultid3);

	$nombre= $_POST['nombre'];
	$apellido= $_POST['apellido'];
	$cedula= $_POST['cedula'];
	$fecha_nacimiento= $_POST['fecha_nacimiento'];
	$sexo= $_POST['sexo'];
	$direccion= $_POST['direccion'];
	$grupo_sanguineo= $_POST['grupo_sanguineo'];
	$id_representante= $filas['id'];
	$parentesco_representante= $_POST['parentesco_representante'];
	$id_seccion= $_POST['id_seccion'];

	$nombre_r= $_POST['nombre_r'];
	$apellido_r= $_POST['apellido_r'];
	$cedula_r= $_POST['cedula_r'];
	$fecha_nacimiento_r= $_POST['fecha_nacimiento_r'];
	$sexo_r= $_POST['sexo_r'];
	$telefono= $_POST['telefono'];
	$otro_telefono= $_POST['otro_telefono'];
	$direccion_r= $_POST['direccion_r'];

	$usuario= 'v'.$_POST['cedula'];
	$clave= 'v'.$_POST['cedula'];
	$nivel= 3;

	$id_usuario= $filas3['id'];
	$id_estudiante= $filas2['id'];

	$query =mysqli_query($con,"SELECT * FROM usuarios WHERE usuario='".$usuario."' AND clave='".$clave."'");

    $numrows=mysqli_num_rows($query);
    if($numrows!=0) {
    	header("location:estudiantes.php?mensaje=ERROR: El usuario para este estudiante ya existe");
    } else {
    	mysqli_query($con, "INSERT INTO representantes(nombre, apellido, cedula, fecha_nacimiento, sexo, telefono, otro_telefono, direccion) VALUES ('".$nombre_r."', '".$apellido_r."', '".$cedula_r."', '".$fecha_nacimiento_r."', '".$sexo_r."', '".$telefono."', '".$otro_telefono."', '".$direccion_r."')");
    	mysqli_query($con, "INSERT INTO estudiantes(nombre, apellido, cedula, fecha_nacimiento, sexo, direccion, grupo_sanguineo, id_representante, parentesco_representante, id_seccion, eliminado) VALUES ('".$nombre."', '".$apellido."', '".$cedula."', '".$fecha_nacimiento."', '".$sexo."', '".$direccion."', '".$grupo_sanguineo."', '".$id_representante."', '".$parentesco_representante."', '".$id_seccion."', 0)");
        mysqli_query($con, "INSERT INTO usuarios(usuario, clave, nivel) VALUES ('".$usuario."', '".$clave."', '".$nivel."')");
        mysqli_query($con, "INSERT INTO usuario_estudiante(id_usuario, id_estudiante) VALUES ('".$id_usuario."', '".$id_estudiante."')");
        header("location:estudiantes.php?mensaje=Estudiante Registrado Con Exito");
    }
}
?>