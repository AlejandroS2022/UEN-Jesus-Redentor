<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
?>


<?php $Titulo="Visualizar Profesor";
      include("incluye/header.php");
      include("incluye/navegacion.php");
      $id= $_GET['id'];
      $result = mysqli_query($con, "SELECT * FROM profesores WHERE id = '$id'");
      $filas=mysqli_fetch_assoc($result);?>
<script>
  $(document).ready(function(){
    $('select').formSelect();
  });
</script>

<div id="contenedor2">	


        
	<center>
	<h1>Visualizar Profesor</h1>
        </center>
         <br/>
         <div id="planilla">
          <?php echo "<form method='post' action='editarprofesor.php?id=".$filas['id']."'>"; ?>
              <input id="id" type="hidden" name="id"  value="<?php echo $filas['id'] ?>" required>

            <div class="row">
                <div class="input-field col s12">
                <input id="cedula" type="number" minlength="7" maxlength="8" class="validate" name="cedula" disabled value="<?php echo $filas['cedula'] ?>">
                <label for="cedula">Cédula</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="apellido" type="text" class="validate" name="apellido" disabled value="<?php echo $filas['apellido'] ?>">
                <label for="apellido">Apellidos</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="nombre" type="text" class="validate" name="nombre" disabled value="<?php echo $filas['nombre'] ?>">
                <label for="nombre">Nombres</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="direccion" type="text" class="validate" name="direccion" disabled value="<?php echo $filas['direccion'] ?>">
                <label for="direccion">Dirección</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <input id="telefono" type="number" class="validate" name="telefono" disabled value="<?php echo $filas['telefono'] ?>">
                <label for="telefono">Número de Teléfono</label>
               </div>

                <div class="input-field col s6">
                <input id="otro_telefono" type="number" class="validate" name="otro_telefono" disabled value="<?php echo $filas['otro_telefono'] ?>">
                <label for="otro_telefono">Segundo Teléfono (opcional)</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <select name="sexo" disabled>
                    <option value="Masculino" <?php if($filas['sexo']=='Masculino'){echo "selected";} ?>>Masculino</option>
                    <option value="Femenino" <?php if($filas['sexo']=='Femenino'){echo "selected";} ?>>Femenino</option>
                </select>
                <label for="sexo">Sexo</label>
               </div>

                <div class="input-field col s6">
                <input id="fecha_nacimiento" type="date" class="validate" name="fecha_nacimiento" disabled value="<?php echo $filas['fecha_nacimiento'] ?>">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
               </div>
            </div>

             <center>
                 
                   <button class="btn waves-effect waves-light orange darken-3" type="submit" name="Editar" value="Editar" style="color:white" >Editar datos</button>

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
