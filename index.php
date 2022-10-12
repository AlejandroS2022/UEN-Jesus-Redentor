<!DOCTYPE html>

<?php
session_start();
?>

<?php require_once("incluye/conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">
  <head>
	   <meta charset="utf-8">
        <title>Administración</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link type="text/css" rel="stylesheet" href="css/materialize/css/materialize.min.css"  media="screen,projection"/>

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/css?family=Parisienne" rel="stylesheet"> 
                <link href="css/login.css" media="screen" rel="stylesheet">
</head> 

	<body style="background-image: url('incluye/fondo.jpg')">
      <script type="text/javascript" src="incluye/jquery/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="css/materialize/js/materialize.min.js"></script>
	<body>
	
<?php


if(isset($_SESSION["session_username"])){

    
header("Location: inicio.php");
}

if(isset($_POST["login"])){

if(!empty($_POST['usuario']) && !empty($_POST['clave'])) {
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];

    $query =mysqli_query($con,"SELECT * FROM usuarios WHERE usuario='".$usuario."' AND clave='".$clave."'");

    $numrows=mysqli_num_rows($query);
    if($numrows!=0)

    {
    while($row=mysqli_fetch_assoc($query))
    {
    $dbusername=$row['usuario'];
    $dbclave=$row['clave'];
    $dbnivel=$row['nivel'];
    }

    if($usuario == $dbusername && $clave == $dbclave)

    {


    $_SESSION['session_username']=$usuario;
    $_SESSION['session_nivel']=$dbnivel;

    header("Location: inicio.php");
    }
    } else {

 $message =  "Nombre de usuario ó contraseña invalida!";
    }

} else {
    $message = "Todos los campos son requeridos!";
}
}
?>




    <div class="container mlogin">
            <div id="banner">
                <br>
                <center>
    <img height="275px" width="275px" src="incluye/logo.jpg"/>
                </center>
            </div>
            <div id="login">
<form name="loginform"  action="" method="POST">
    <p>
     <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="usuario" type="text" name="usuario" class="validate" autofocus>
            <label for="usuario" >Usuario</label>
        </div>
              <div class="row">

        <div class="input-field col s12">
            <i class="material-icons prefix">vpn_key</i>
            <input id="clave" type="password" name="clave" >
            <label for="clave" >Contraseña</label><br>    
        </div>
              </div>


    <center>    
                                   <button class="btn waves-effect waves-light orange darken-3" type="submit" name="login" value="Entrar" style="color:white" >Iniciar Sesión

  </button>
    </center>
</form>

    </div>

            </div></div>
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "AVISO: ". $message . "</p>";} ?>
            
	<?php include("incluye/footer.php"); ?>
	
	

