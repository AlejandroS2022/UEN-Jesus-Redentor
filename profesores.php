<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
    header("location:index.php");
} else {
?>


<?php $Titulo="Profesores";
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
            <h1>Profesores</h1>
        </center>

        <button class="btn waves-effect waves-light white darken-3" style="float: left; color:black" type="button" id="boton-form" name="Volver" value="Volver"><a href="inicio.php">Volver</a></button>
      <form method='post' action='crearprofesor.php'><button class="btn waves-effect waves-light orange darken-3" style="float: right;" type='submit'>Agregar</button></form>
      </br>
         <table> <tr> <th>Cédula</th> <th>Apellido y Nombre</th> <th> Fecha de nacimiento</th> <th> Sexo</th> <th> </th></tr>

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
    setlocale (LC_TIME, "es_ES", "Spain", "Spanish");
    $resultados['fecha_nacimiento']=strftime("%d de %B de %Y",strtotime($resultados['fecha_nacimiento']));

    echo"<tr>";
    echo "<td>&nbsp;&nbsp;".$resultados['cedula']."&nbsp;&nbsp;</td>";
    echo "<td>&nbsp;&nbsp;".$resultados['apellido']." ".$resultados['nombre']."&nbsp;&nbsp;</td>";
    echo "<td>&nbsp;&nbsp;".$resultados['fecha_nacimiento']."&nbsp;&nbsp;</td>";
    echo "<td>&nbsp;&nbsp;".$resultados['sexo']."&nbsp;&nbsp;</td>";
    echo "<td>

    <form method='post' action='visualizarprofesor.php?id=".$resultados['id']."'><button class='boton-accion' type='submit'>Visualizar</button></form>
    <form method='post' action='materiasprofesor.php?id=".$resultados['id']."'><button class='boton-accion' type='submit'>Materias</button></form>
    <form method='post' action='editarprofesor.php?id=".$resultados['id']."'><button class='boton-accion' type='submit'>Editar</button></form>";
    if($_SESSION['session_nivel'] == 1) {
    echo "
    <form method='post' id='".$resultados['id']."' action='eliminarprofesor.php?id=".$resultados['id']."'><button class='boton-accion' type='button' onclick=enviarForm('d',".$resultados['id'].")>Eliminar</button></form>
    </td>";
    }
    echo "</tr>";}
    else {echo "<br/>No hay más datos!!! <br/>";}
}


$result2 = mysqli_query($con, "SELECT * FROM profesores WHERE eliminado=0 ORDER BY cedula, apellido ASC");
while ($filas = mysqli_fetch_array($result2)){ mostrarDatos($filas); }
mysqli_free_result($result2); mysqli_close($con);
?> </table>
</div>
    </div>

<?php include("incluye/footer.php"); ?>
<?php
}
