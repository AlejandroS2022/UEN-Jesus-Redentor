<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
?>


<?php $Titulo="Agregar Estudiante";
      include("incluye/header.php");
      include("incluye/navegacion.php"); ?>
<script>
  $(document).ready(function(){
    $('select').formSelect();
  });
</script>

<div id="contenedor2">	


        
	<center>
	<h1>Agregar Estudiante</h1>
        </center>
         <br/>
         <div id="planilla">
            <form method="POST" action="agregarestudiante.php" id="formulario">
<center><label><p style="font-size: 22px;">- Datos del estudiante -</p></label></center>
            <div class="row">
                <div class="input-field col s12">
                <input id="cedula" type="number" minlength="7" maxlength="8" class="validate required" name="cedula" required>
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
                <div class="input-field col s4">
                <select name="sexo" required="required">
                    <option value="Masculino" selected>Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
                <label for="sexo">Sexo</label>
               </div>

                <div class="input-field col s4">
                <input id="fecha_nacimiento" type="date" class="validate required" name="fecha_nacimiento" required>
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
               </div>

                <div class="input-field col s4">
                <select name="grupo_sanguineo" required="required">
                    <option value="O+" selected>O+</option>
                    <option value="O-">O-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
                <label for="grupo_sanguineo">Grupo sanguíneo</label>
               </div>
            </div>

            <div class="row">
                <div class="input-field col s4">  
                <select name="id_seccion" required="required">
                <?php   
                  $result = mysqli_query($con, "SELECT s.id as id, s.nombre as s_nombre, g.nombre as g_nombre, g.descripcion as g_descripcion FROM secciones s, grados g WHERE g.id=s.id_grado AND s.eliminado=0 ORDER BY g.id, s.nombre ASC");
                  while ($filas = mysqli_fetch_array($result)){
                ?>
                    <option <?php echo'value="'.$filas['id'].'"'; ?> ><?php echo $filas['g_nombre']."º ".$filas['g_descripcion']." ".$filas['s_nombre']; ?></option>
                <?php } ?>
                </select>
                <label for="id_seccion">Sección</label>
                </div>
            </div>

<center><label><p style="font-size: 22px;">- Datos del representante -</p></label></center>

            <div class="row">
                <div class="input-field col s12">
                <input id="cedula_r" type="number" minlength="7" maxlength="8" class="validate required" name="cedula_r" required>
                <label for="cedula_r">Cédula</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="apellido_r" type="text" class="validate required" name="apellido_r" required>
                <label for="apellido_r">Apellidos</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="nombre_r" type="text" class="validate required" name="nombre_r" required>
                <label for="nombre_r">Nombres</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="direccion_r" type="text" class="validate required" name="direccion_r" required>
                <label for="direccion_r">Dirección</label>
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
                <div class="input-field col s4">
                <select name="sexo_r" required="required">
                    <option value="Masculino" selected>Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
                <label for="sexo_r">Sexo</label>
               </div>

                <div class="input-field col s4">
                <input id="fecha_nacimiento_r" type="date" class="validate required" name="fecha_nacimiento_r" required>
                <label for="fecha_nacimiento_r">Fecha de nacimiento</label>
               </div>

                <div class="input-field col s4">
                <input id="parentesco_representante" type="text" class="validate required" name="parentesco_representante" required>
                <label for="parentesco_representante">Parentesco con el estudiante</label>
               </div>
            </div>

             <center>
                   <button class="btn waves-effect waves-light orange darken-3" type="button" id="boton-form-i" name="Crear" value="Crear" style="color:white" >Agregar estudiante</button>

            </center>
                 </form>
         </div>
	<br/>
        
        
   
</div>

<?php include("incluye/footer.php"); ?>
	

<?php
}
?>
