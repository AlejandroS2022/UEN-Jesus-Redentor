<nav>
    <div class="nav-wrapper" style="background-color: #a1714f;">
      <a href="inicio.php" class="brand-logo">&nbsp;U.E.N. Jesus Redentor</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a class="dropdown-trigger" href="secciones.php" data-target="dropdown1"><i class="material-icons left">visibility</i>Visualizar<i class="material-icons right">arrow_drop_down</i></a></li>
    <?php if($_SESSION['session_nivel'] != 3) { ?>
        <li><a class="dropdown-trigger" href="estudiantes.php" data-target="dropdown2"><i class="material-icons left">add_circle_outline</i>Agregar<i class="material-icons right">arrow_drop_down</i></a></li>
    <?php } ?>

   <!--     <li><a class="dropdown-trigger" href="profesores.php" data-target="dropdown3"><i class="material-icons left">school</i>Constancias<i class="material-icons right">arrow_drop_down</i></a></li>-->

        <li><a href="logout.php"><i class="material-icons left">power_settings_new</i>Cerrar Sesión</a></li>
      </ul>
    </div>
          
  <ul class="sidenav" id="mobile-demo">
    <li><a class="dropdown-trigger" href="secciones.php" data-target="dropdown4"><i class="material-icons left">book</i>Visualizar<i class="material-icons right">arrow_drop_down</i></a></li>
  <?php if($_SESSION['session_nivel'] != 3) { ?>
    <li><a class="dropdown-trigger" href="estudiantes.php" data-target="dropdown5"><i class="material-icons left">groups</i>Agregar<i class="material-icons right">arrow_drop_down</i></a></li>
  <?php } ?>
  <!--    <li><a class="dropdown-trigger" href="profesores.php" data-target="dropdown6"><i class="material-icons left">school</i>Profesores<i class="material-icons right">arrow_drop_down</i></a></li>-->
    <li><a href="logout.php"><i class="material-icons left">power_settings_new</i>Cerrar Sesión</a></li>
  </ul>
          
          

  </nav>

  <ul id='dropdown1' class='dropdown-content'>
  <?php if($_SESSION['session_nivel'] != 3) { ?>
    <li class="divider" tabindex="-1"></li>
    <li><a href="secciones.php" style="color: #a1714f;"><i class="material-icons left">book</i>Secciones</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="materias.php" style="color: #a1714f;"><i class="material-icons left">task</i>Materias</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="estudiantes.php" style="color: #a1714f;"><i class="material-icons left">groups</i>Estudiantes</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="profesores.php" style="color: #a1714f;"><i class="material-icons left">school</i>Profesores</a></li>
  <?php } ?>
  <?php if($_SESSION['session_nivel'] == 3) { ?>
    <li class="divider" tabindex="-1"></li>
    <li><a href="materias_est.php" style="color: #a1714f;"><i class="material-icons left">task</i>Materias del estudiante</a></li>
    <li class="divider" tabindex="-1"></li>
    <?php echo '<li><a href="datos_alumno.php?cedula='.$_SESSION['session_username'].'" target="_blank" style="color: #a1714f;"><i class="material-icons left">co_present</i>Datos del estudiante</a></li>'; ?>
    <li class="divider" tabindex="-1"></li>
    <?php echo '<li><a href="carta_conducta.php?cedula='.$_SESSION['session_username'].'" target="_blank" style="color: #a1714f;"><i class="material-icons left">feed</i>Carta de buena conducta</a></li>'; ?>
    <li class="divider" tabindex="-1"></li>
    <?php echo '<li><a href="carnet.php?cedula='.$_SESSION['session_username'].'" target="_blank" style="color: #a1714f;"><i class="material-icons left">contact_emergency</i>Carnet estudiantil</a></li>'; ?>
  <?php } ?>
  </ul>

  <ul id='dropdown2' class='dropdown-content'>
    <li><a href="crearseccion.php" style="color: #a1714f;"><i class="material-icons left">add_circle_outline</i>Crear sección</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="crearmateria.php" style="color: #a1714f;"><i class="material-icons left">add_circle_outline</i>Crear materia</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="crearestudiante.php" style="color: #a1714f;"><i class="material-icons left">add_circle_outline</i>Agregar estudiante</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="crearprofesor.php" style="color: #a1714f;"><i class="material-icons left">add_circle_outline</i>Agregar profesor</a></li>
  </ul>
<!--
  <ul id='dropdown3' class='dropdown-content'>
    <li class="divider" tabindex="-1"></li>
    <li><a href="profesores.php" class="cyan-text darken-1"><i class="material-icons left">school</i>Profesores</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="crearprofesor.php" class="cyan-text darken-1"><i class="material-icons left">add_circle_outline</i>Agregar</a></li>
  </ul>
-->
  <ul id='dropdown4' class='dropdown-content'>
  <?php if($_SESSION['session_nivel'] != 3) { ?>
    <li><a href="secciones.php"><i class="material-icons left">book</i>Secciones</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="materias.php"><i class="material-icons left">task</i>Materias</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="estudiantes.php"><i class="material-icons left">groups</i>Estudiantes</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="profesores.php"><i class="material-icons left">school</i>Profesores</a></li>
  <?php } ?>
  <?php if($_SESSION['session_nivel'] == 3) { ?>
    <li class="divider" tabindex="-1"></li>
    <li><a href="materias_est.php"><i class="material-icons left">task</i>Materias del estudiante</a></li>
    <li class="divider" tabindex="-1"></li>
    <?php echo '<li><a href="datos_alumno.php?cedula='.$_SESSION['session_username'].'" target="_blank"><i class="material-icons left">co_present</i>Datos del estudiante</a></li>'; ?>
    <li class="divider" tabindex="-1"></li>
    <?php echo '<li><a href="carta_conducta.php?cedula='.$_SESSION['session_username'].'" target="_blank"><i class="material-icons left">feed</i>Carta de buena conducta</a></li>'; ?>
    <li class="divider" tabindex="-1"></li>
    <?php echo '<li><a href="carnet.php?cedula='.$_SESSION['session_username'].'" target="_blank"><i class="material-icons left">contact_emergency</i>Carnet estudiantil</a></li>'; ?>
  <?php } ?>
  </ul>

  <ul id='dropdown5' class='dropdown-content'>
    <li><a href="crearseccion.php"><i class="material-icons left">add_circle_outline</i>Crear sección</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="crearmateria.php"><i class="material-icons left">add_circle_outline</i>Crear materia</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="crearestudiante.php"><i class="material-icons left">add_circle_outline</i>Agregar estudiante</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="crearprofesor.php"><i class="material-icons left">add_circle_outline</i>Agregar profesor</a></li>
  </ul>
<!--
  <ul id='dropdown6' class='dropdown-content'>
    <li><a href="profesores.php"><i class="material-icons left">school</i>Profesores</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="crearprofesor.php"><i class="material-icons left">add_circle_outline</i>Agregar</a></li>
  </ul>
-->
<script>

 $(document).ready(function(){
    $('.sidenav').sidenav();

 $('.dropdown-trigger').dropdown({ hover: false });
  });
</script>

         <?php if (!empty($mensaje)) {echo "<p class=mensaje>". $mensaje . "</p>";} ?>
