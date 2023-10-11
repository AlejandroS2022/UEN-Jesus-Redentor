<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
?>


<?php $Titulo="Agregar materia al profesor";
      include("incluye/header.php");
      include("incluye/navegacion.php"); 
      $id= $_POST['id'];
      $result = mysqli_query($con, "SELECT * FROM profesores WHERE id = '$id'");
      $filas=mysqli_fetch_assoc($result);?>
<script>
  $(document).ready(function(){
    $('select').formSelect();
  });
</script>

<div id="contenedor2">	


        
	<center>
	<h1>Agregar materia al profesor</h1>
        </center>
         <br/>
         <div id="planilla">
            <form method="POST" action="agregarmateriaprofesor.php" id="formulario">

            <input id="id_profesor" type="hidden" name="id_profesor"  value="<?php echo $filas['id'] ?>" required>

            <div class="row">
                <div class="input-field col s12">
                <input type="text" class="validate" disabled value="<?php echo $filas['cedula'] ?>">
                <label for="cedula">Cédula</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input type="text" class="validate" disabled value="<?php echo $filas['apellido'] ?>">
                <label for="apellido">Apellidos</label>
               </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input type="text" class="validate" disabled value="<?php echo $filas['nombre'] ?>">
                <label for="nombre">Nombres</label>
               </div>
            </div>

            <div class="row">
                <div class="input-field col s6">  
                <select name="id_materia" required="required" class="required">
                <?php   
                  $result2 = mysqli_query($con, "SELECT m.id as id, m.nombre as m_nombre, g.nombre as g_nombre, g.descripcion as g_descripcion FROM materia m, grados g WHERE g.id=m.id_grado AND m.eliminado=0 ORDER BY g.id, m.nombre ASC");
                  while ($filas2 = mysqli_fetch_array($result2)){
                ?>
                    <option <?php echo'value="'.$filas2['id'].'"'; ?> ><?php echo $filas2['m_nombre']; ?></option>
                <?php } ?>
                </select>
                <label for="id_materia">Materia</label>
                </div>
                <div class="input-field col s6">  
                <select name="id_seccion" required="required" class="required">
                <?php   
                  $result2 = mysqli_query($con, "SELECT s.id as id, s.nombre as s_nombre, g.nombre as g_nombre, g.descripcion as g_descripcion FROM secciones s, grados g WHERE g.id=s.id_grado AND s.eliminado=0 ORDER BY g.id, s.nombre ASC");
                  while ($filas2 = mysqli_fetch_array($result2)){
                ?>
                    <option <?php echo'value="'.$filas2['id'].'"'; ?> ><?php echo $filas2['g_nombre']."º ".$filas2['g_descripcion']." ".$filas2['s_nombre']; ?></option>
                <?php } ?>
                </select>
                <label for="id_seccion">Grado - Sección</label>
                </div>
            </div>
             <center>
                 
                   <button class="btn waves-effect waves-light orange darken-3" type="button" id="boton-form-i" name="Crear" value="Crear" style="color:white" >Agregar Materia</button>

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
