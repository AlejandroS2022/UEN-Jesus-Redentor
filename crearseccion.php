<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
?>


<?php $Titulo="Crear Sección";
      include("incluye/header.php");
      include("incluye/navegacion.php"); ?>
<script>
  $(document).ready(function(){
    $('select').formSelect();
  });
</script>

<div id="contenedor2">	


        
	<center>
	<h1>Crear Sección</h1>
        </center>
         <br/>
         <div id="planilla">
            <form method="POST" action="agregarseccion.php" id="formulario">

            <div class="row">
                <div class="input-field col s6">  
                <select name="id_grado" required="required" class="required">
                <?php   
                  $result = mysqli_query($con, "SELECT * FROM grados");
                  while ($filas = mysqli_fetch_array($result)){
                ?>
                    <option <?php echo'value="'.$filas['id'].'"'; ?> ><?php echo $filas['nombre']."º ".$filas['descripcion']; ?></option>
                <?php } ?>
                </select>
                <label for="id_grado">Grado / Año</label>
                </div>
                <div class="input-field col s6 orange-text darken-1">
                  <input id="nombre" type="text" maxlength="1" class="validate required" name="nombre" required="required">
                  <label for="nombre">Sección</label>
                </div>
            </div>
             <center>
                 
                   <button class="btn waves-effect waves-light orange darken-3" type="button" id="boton-form-i" name="Crear" value="Crear" style="color:white" >Crear Sección

  </button>

            </center>
                 </form>
         </div>
	<br/>
        
        
   
</div>

<?php include("incluye/footer.php"); ?>
	

<?php
}
?>
