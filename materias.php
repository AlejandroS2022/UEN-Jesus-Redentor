<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
?>


<?php $Titulo="Materias";
      include("incluye/header.php");
      include("incluye/navegacion.php"); 
      


        if(isset($_GET['mensaje']))
            {$mensaje= $_GET['mensaje'];
             }
       if (!empty($mensaje)) {echo "<p class=mensaje>". $mensaje . "</p>";} ?>
    
    <div class="row">

<?php include("incluye/lateral.php"); ?>

      <div class="col s12 m9 l9" id="contenedor3">
    	
         <br>
	<center>
            <h1>Materias</h1>
        </center>
      
      <button class="btn waves-effect waves-light white darken-3" style="float: left; color:black" type="button" id="boton-form" name="Volver" value="Volver"><a href="inicio.php">Volver</a></button>
      <form method='post' action='crearmateria.php'><button class="btn waves-effect waves-light orange darken-3" style="float: right;" type='submit'>Agregar</button></form>
      </br>
         <table> <tr> <th>Materia</th> <th>Grado / Año</th> <th> </th></tr>

             <script languaje="JavaScript">
                 function aviso(url,Accion,Nombre,Seccion){
                     if (!confirm("¿Esta Seguro que Desea "+Accion+" el curso de "+Nombre+" Sección: "+Seccion+"?"))
                     {return false;}
                     else{
                         document.location=url;
                         return true;
                     }
                 }
             </script>
             
             <?php 
	function mostrarDatos ($resultados) {
	if ($resultados !=NULL) {
        echo"<tr>";
  echo "<td>&nbsp;&nbsp;".$resultados['m_nombre']."&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;".$resultados['g_nombre']."º ".$resultados['descripcion']."&nbsp;&nbsp;</td>";
  if($_SESSION['session_nivel'] == 1) {
    echo "<td><form method='post' id='".$resultados['id']."' action='eliminarmateria.php?id=".$resultados['id']."'><button class='boton-accion' type='button' onclick=enviarForm('d',".$resultados['id'].")>Eliminar</button></form></td>";
  } else {
    echo "<td></td>";
  }
	echo "</tr>";}
	else {echo "<br/>No hay más datos!!! <br/>";}
}


$result2 = mysqli_query($con, "SELECT m.id as id, m.nombre as m_nombre, g.nombre as g_nombre, g.descripcion FROM materia m, grados g WHERE g.id=m.id_grado AND m.eliminado=0 ORDER BY g.id, m.nombre ASC");
while ($filas = mysqli_fetch_array($result2)){ mostrarDatos($filas); }
mysqli_free_result($result2); mysqli_close($con);
?> </table>
</div>
    </div>

<?php include("incluye/footer.php"); ?>
<?php
}
