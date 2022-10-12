<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
?>


<?php $Titulo="Inicio";
      include("incluye/header.php");
      include("incluye/navegacion.php"); ?>

  

    <div class="row">

<?php include("incluye/lateral.php"); ?>

      <div class="col s12 m9 l9" id="contenedor3">
        <h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>

    </div>
<?php include("incluye/footer.php"); ?>
	

<?php
}
?>
