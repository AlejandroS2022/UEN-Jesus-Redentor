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

      </br>
         <table> <tr> <th>Materia</th> <th>Grado / Año</th></tr>

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
	echo "</tr>";}
	else {echo "<br/>No hay más datos!!! <br/>";}
}


$result2 = mysqli_query($con, "SELECT m.id as id, m.nombre as m_nombre, g.nombre as g_nombre, g.descripcion FROM materia m, grados g, secciones s, estudiantes e, usuario_estudiante ue, usuarios u WHERE u.usuario='".$_SESSION["session_username"]."' AND u.id=ue.id_usuario AND ue.id_estudiante=e.id AND e.id_seccion=s.id AND s.id_grado=g.id AND g.id=m.id_grado AND m.eliminado=0 ORDER BY g.id, m.nombre ASC");
while ($filas = mysqli_fetch_array($result2)){ mostrarDatos($filas); }
mysqli_free_result($result2); mysqli_close($con);
?> </table>
</div>
    </div>

<?php include("incluye/footer.php"); ?>
<?php
}
