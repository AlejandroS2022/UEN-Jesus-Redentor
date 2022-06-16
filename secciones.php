<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
?>


<?php $Titulo="Secciones";
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
            <h1>Secciones</h1>
        </center>

      <form method='post' action='crearseccion.php'><button class="btn waves-effect waves-light orange darken-3" style="float: right;" type='submit'>Agregar</button></form>
      </br>
         <table> <tr> <th>Grado / Año</th> <th>Sección</th> <th> </th></tr>

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
	echo "<td>&nbsp;&nbsp;".$resultados['g_nombre']."º ".$resultados['descripcion']."&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;".$resultados['s_nombre']."&nbsp;&nbsp;</td>";
  if($_SESSION['session_nivel'] == 1) {
    echo "<td><form method='post' id='".$resultados['id']."' action='eliminarseccion.php?id=".$resultados['id']."'><button class='boton-accion' type='button' onclick=enviarForm('d',".$resultados['id'].")>Eliminar</button></form></td>";
  } else {
    echo "<td></td>";
  }
	echo "</tr>";}
	else {echo "<br/>No hay más datos!!! <br/>";}
}


$result2 = mysqli_query($con, "SELECT s.id as id, s.nombre as s_nombre, g.nombre as g_nombre, g.descripcion FROM secciones s, grados g WHERE g.id=s.id_grado AND s.eliminado=0 ORDER BY g.id, s.nombre ASC");
while ($filas = mysqli_fetch_array($result2)){ mostrarDatos($filas); }
mysqli_free_result($result2); mysqli_close($con);
?> </table>
</div>
    </div>

<?php include("incluye/footer.php"); ?>
<?php
}
