<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
?>


<?php $Titulo="Materias del Profesor";
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
	<h1>Materias del Profesor</h1>
        </center>
         <br/>
         <div id="planilla">
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
            </div>

            <table> <tr> <th>Materia</th> <th>Grado / Año</th> <th>Sección</th> <th> </th></tr>
             
             <?php 
    function mostrarDatos ($resultados) {
    if ($resultados !=NULL) {
    echo"<tr>";
    echo "<td>&nbsp;&nbsp;".$resultados['m_nombre']."&nbsp;&nbsp;</td>";
    echo "<td>&nbsp;&nbsp;".$resultados['g_nombre']."º ".$resultados['g_descripcion']."&nbsp;&nbsp;</td>";
    echo "<td>&nbsp;&nbsp;".$resultados['s_nombre']."&nbsp;&nbsp;</td>";
    echo "<td>

    <form method='post' id='".$resultados['id_mp']."' action='eliminarmateriaprofesor.php?id=".$resultados['id_mp']."'><button class='boton-accion' type='button' onclick=enviarForm('d',".$resultados['id_mp'].")>Eliminar</button></form>
    </td>";
    echo "</tr>";}
    else {echo "<br/>No hay más datos!!! <br/>";}
}


$result2 = mysqli_query($con, "SELECT mp.id as id_mp, m.nombre as m_nombre, g.nombre as g_nombre, g.descripcion as g_descripcion, s.nombre as s_nombre FROM materia_profesor mp, materia m, grados g, secciones s WHERE mp.id_profesor='$id' AND mp.id_materia=m.id AND mp.id_seccion=s.id AND g.id=m.id_grado ORDER BY g.id, s.nombre, m.nombre ASC");
while ($filas2 = mysqli_fetch_array($result2)){ mostrarDatos($filas2); }
mysqli_free_result($result2); mysqli_close($con);
?> </table>
<br>
             <center>
                 <form method='post' action='nuevamateriaprofesor.php'>
                 <input id="id" type="hidden" name="id" value="<?php echo $filas['id'] ?>" required>
                   <button class="btn waves-effect waves-light orange darken-3" type="submit" name="Editar" value="Editar" style="color:white" >Agregar materia</button>

            </center>
                 </form>
         </div>
	<br/>
        
        
   
</div>

<?php include("incluye/footer.php"); ?>
	

<?php
}
?>
