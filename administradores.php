<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
} else {
?>


<?php $Titulo="Usuarios del sistema";
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
            <h1>Usuarios del sistema</h1>
        </center>

      <button class="btn waves-effect waves-light white darken-3" style="float: left; color:black" type="button" id="boton-form" name="Volver" value="Volver"><a href="inicio.php">Volver</a></button>
      <form method='post' action='crearadministrador.php'><button class="btn waves-effect waves-light orange darken-3" style="float: right;" type='submit'>Agregar</button></form>
      </br>
         <table> <tr> <th>Nombre de usuario</th> <th>Nivel de usuario</th> <th> </th></tr>

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
    if ($resultados['nivel'] == 1) { 
      $nivel = 'Administrador'; 
    } elseif ($resultados['nivel'] == 2) {
      $nivel = 'Asistente'; 
    } elseif ($resultados['nivel'] == 3) {
      $nivel = 'Estudiante'; 
    }
        echo"<tr>";
	echo "<td>&nbsp;&nbsp;".$resultados['usuario']."&nbsp;&nbsp;</td>";
  echo "<td>&nbsp;&nbsp;".$nivel."&nbsp;&nbsp;</td>";
  echo "<td>";
  if ($resultados['usuario'] !== $_SESSION['session_username']) {
    echo "<form method='post' id='".$resultados['id']."' action='eliminaradministrador.php?id=".$resultados['id']."'><button class='boton-accion' type='button' onclick=enviarForm('d',".$resultados['id'].")>Eliminar</button></form>";
  }
  echo "</td>";
  echo "</tr>";
  } else {echo "<br/>No hay más datos!!! <br/>";}
}


$result2 = mysqli_query($con, "SELECT * FROM usuarios ORDER BY usuario ASC");
while ($filas = mysqli_fetch_array($result2)){ mostrarDatos($filas); }
mysqli_free_result($result2); mysqli_close($con);
?> </table>
</div>
    </div>

<?php include("incluye/footer.php"); ?>
<?php
}
