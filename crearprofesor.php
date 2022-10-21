<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
?>


<?php $Titulo="Agregar Profesor";
      include("incluye/header.php");
      include("incluye/navegacion.php"); ?>
<script>
  $(document).ready(function(){
    $('select').formSelect();
  });
</script>

<div id="contenedor2">	


        
	<center>
	<h1>Agregar Profesor</h1>
        </center>
         <br/>
         <div id="planilla">
            <form method="POST" action="agregarprofesor.php" id="formulario">

            <div class="row">
                <div class="input-field col s12">
                <input id="cedula" type="number" minlength="7" maxlength="8" class="validate" name="cedula" required>
                <label for="cedula">Cédula</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="apellido" type="text" class="validate required" name="apellido" required>
                <label for="apellido">Apellidos</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="nombre" type="text" class="validate required" name="nombre" required>
                <label for="nombre">Nombres</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="direccion" type="text" class="validate required" name="direccion" required>
                <label for="direccion">Dirección</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <input id="telefono" type="number" class="validate required" name="telefono" required>
                <label for="telefono">Número de Teléfono</label>
               </div>

                <div class="input-field col s6">
                <input id="otro_telefono" type="number" class="validate" name="otro_telefono">
                <label for="otro_telefono">Segundo Teléfono (opcional)</label>
               </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                <select name="sexo" required="required">
                    <option value="Masculino" selected>Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
                <label for="sexo">Sexo</label>
               </div>

                <div class="input-field col s6">
                <input id="fecha_nacimiento" type="date" class="validate required" name="fecha_nacimiento" required>
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
               </div>
            </div>
             <center>
                 
                   <button class="btn waves-effect waves-light orange darken-3" type="button" id="boton-form-i" name="Crear" value="Crear" style="color:white" >Agregar profesor

  </button>

            </center>
                 </form>
            </br>

            <center>
              <button class="btn waves-effect waves-light white darken-3" type="button" id="boton-form" name="Volver" value="Volver" style="color:black">
                <a href="profesores.php">Volver</a>
              </button>
            </center>
         </div>
	<br/>
        
        
   
</div>

<?php include("incluye/footer.php"); ?>
	

<?php
}
?>
