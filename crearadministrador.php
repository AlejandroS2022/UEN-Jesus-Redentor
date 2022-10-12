<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
?>


<?php $Titulo="Crear Usuario";
      include("incluye/header.php");
      include("incluye/navegacion.php"); ?>
<script>
  $(document).ready(function(){
    $('select').formSelect();
  });
</script>

<div id="contenedor2">	


        
	<center>
	<h1>Crear Usuario</h1>
        </center>
         <br/>
         <div id="planilla">
            <form method="POST" action="agregaradministrador.php" id="formulario">

            <div class="row">
                <div class="input-field col s12">
                <input id="usuario" type="text" class="validate required" name="usuario" required>
                <label for="usuario">Nombre de usuario</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="clave" type="password" class="validate required" name="clave" required>
                <label for="clave">Clave</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <select name="nivel" required>
                    <option value="1" selected>Administrador</option>
                    <option value="2">Asistente</option>
                </select>
                <label for="nivel">Nivel de usuario</label>
               </div>
            </div>
             <center>
                <button class="btn waves-effect waves-light orange darken-3" type="button" id="boton-form-i" name="Crear" value="Crear" style="color:white" >Crear Usuario</button>

            </center>
                 </form>
         </div>
	<br/>
        
        
   
</div>

<?php include("incluye/footer.php"); ?>
	

<?php
}
?>
