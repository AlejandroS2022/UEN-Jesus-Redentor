<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
  header("location:index.php");
} else {
?>


<?php $Titulo="Visualizar Estudiante";
      include("incluye/header.php");
      include("incluye/navegacion.php");
      $id= $_GET['id'];
      $result = mysqli_query($con, "SELECT e.id as id, e.nombre as nombre, e.apellido as apellido, e.cedula as cedula, e.fecha_nacimiento as fecha_nacimiento, e.sexo as sexo, e.direccion as direccion, e.grupo_sanguineo as grupo_sanguineo, e.id_representante as id_representante, e.parentesco_representante as parentesco_representante, e.id_seccion as id_seccion, r.id as id_r, r.nombre as nombre_r, r.apellido as apellido_r, r.cedula as cedula_r, r.fecha_nacimiento as fecha_nacimiento_r, r.sexo as sexo_r, r.telefono as telefono, r.otro_telefono as otro_telefono, r.direccion as direccion_r FROM estudiantes e, representantes r WHERE e.id = '$id' AND r.id = e.id_representante");
      $filas=mysqli_fetch_assoc($result);?>
<script>
  $(document).ready(function(){
    $('select').formSelect();
  });
</script>

<div id="contenedor2">  


        
  <center>
  <h1>Visualizar Estudiante</h1>
        </center>
         <br/>
         <div id="planilla">
          <?php echo "<form method='post' action='editarestudiante.php?id=".$filas['id']."'>"; ?>
              <input id="id" type="hidden" name="id"  value="<?php echo $filas['id'] ?>" disabled>
              <input id="id_r" type="hidden" name="id_r"  value="<?php echo $filas['id_r'] ?>" disabled>
<center><label><p style="font-size: 22px;">- Datos del estudiante -</p></label></center>
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
                <div class="input-field col s4">
                <select name="sexo" disabled>
                    <option value="Masculino" <?php if($filas['sexo']=='Masculino'){echo "selected";} ?>>Masculino</option>
                    <option value="Femenino" <?php if($filas['sexo']=='Femenino'){echo "selected";} ?>>Femenino</option>
                </select>
                <label for="sexo">Sexo</label>
               </div>

                <div class="input-field col s4">
                <input id="fecha_nacimiento" type="date" class="validate" name="fecha_nacimiento" disabled value="<?php echo $filas['fecha_nacimiento'] ?>">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
               </div>

                <div class="input-field col s4">
                <select name="grupo_sanguineo" disabled>
                    <option value="O+" <?php if($filas['grupo_sanguineo']=='O+'){echo "selected";} ?>>O+</option>
                    <option value="O-" <?php if($filas['grupo_sanguineo']=='O-'){echo "selected";} ?>>O-</option>
                    <option value="A+" <?php if($filas['grupo_sanguineo']=='A+'){echo "selected";} ?>>A+</option>
                    <option value="A-" <?php if($filas['grupo_sanguineo']=='A-'){echo "selected";} ?>>A-</option>
                    <option value="B+" <?php if($filas['grupo_sanguineo']=='B+'){echo "selected";} ?>>B+</option>
                    <option value="B-" <?php if($filas['grupo_sanguineo']=='B-'){echo "selected";} ?>>B-</option>
                    <option value="AB+" <?php if($filas['grupo_sanguineo']=='AB+'){echo "selected";} ?>>AB+</option>
                    <option value="AB-" <?php if($filas['grupo_sanguineo']=='AB-'){echo "selected";} ?>>AB-</option>
                </select>
                <label for="grupo_sanguineo">Grupo sanguíneo</label>
               </div>
            </div>

            <div class="row">
                <div class="input-field col s4">  
                <select name="id_seccion" disabled>
                <?php   
                  $result = mysqli_query($con, "SELECT s.id as id, s.nombre as s_nombre, g.nombre as g_nombre, g.descripcion as g_descripcion FROM secciones s, grados g WHERE g.id=s.id_grado AND s.eliminado=0 ORDER BY g.id, s.nombre ASC");
                  while ($filas2 = mysqli_fetch_array($result)){
                ?>
                    <option <?php echo'value="'.$filas2['id'].'"'; ?> <?php if($filas['id_seccion']==$filas2['id']){echo "selected";} ?>><?php echo $filas2['g_nombre']."º ".$filas2['g_descripcion']." ".$filas2['s_nombre']; ?></option>
                <?php } ?>
                </select>
                <label for="id_seccion">Sección</label>
                </div>
            </div>

<center><label><p style="font-size: 22px;">- Datos del representante -</p></label></center>

            <div class="row">
                <div class="input-field col s12">
                <input id="cedula_r" type="number" minlength="7" maxlength="8" class="validate" name="cedula_r" disabled value="<?php echo $filas['cedula_r'] ?>">
                <label for="cedula_r">Cédula</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="apellido_r" type="text" class="validate" name="apellido_r" disabled value="<?php echo $filas['apellido_r'] ?>">
                <label for="apellido_r">Apellidos</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="nombre_r" type="text" class="validate" name="nombre_r" disabled value="<?php echo $filas['nombre_r'] ?>">
                <label for="nombre_r">Nombres</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="direccion_r" type="text" class="validate" name="direccion_r" disabled value="<?php echo $filas['direccion_r'] ?>">
                <label for="direccion_r">Dirección</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <input id="telefono" type="number" class="validate" name="telefono" disabled value="<?php echo $filas['telefono'] ?>">
                <label for="telefono">Número de Teléfono</label>
               </div>

                <div class="input-field col s6">
                <input id="otro_telefono" type="number" class="validate" name="otro_telefono" disabled value="<?php echo $filas['otro_telefono'] ?>">
                <label for="otro_telefono">Segundo Teléfono</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                <select name="sexo_r" disabled>
                    <option value="Masculino" <?php if($filas['sexo_r']=='Masculino'){echo "selected";} ?>>Masculino</option>
                    <option value="Femenino" <?php if($filas['sexo_r']=='Femenino'){echo "selected";} ?>>Femenino</option>
                </select>
                <label for="sexo_r">Sexo</label>
               </div>

                <div class="input-field col s4">
                <input id="fecha_nacimiento_r" type="date" class="validate" name="fecha_nacimiento_r" disabled value="<?php echo $filas['fecha_nacimiento_r'] ?>">
                <label for="fecha_nacimiento_r">Fecha de nacimiento</label>
               </div>

                <div class="input-field col s4">
                <input id="parentesco_representante" type="text" class="validate" name="parentesco_representante" disabled value="<?php echo $filas['parentesco_representante'] ?>">
                <label for="parentesco_representante">Parentesco con el estudiante</label>
               </div>
            </div>

             <center>
                   <button class="btn waves-effect waves-light orange darken-3" type="submit" name="Editar" value="Editar" style="color:white" >Editar datos</button>

            </center>
                 </form>
         </div>
  <br/>
        
        
   
</div>

<?php include("incluye/footer.php"); ?>
  

<?php
}
?>
