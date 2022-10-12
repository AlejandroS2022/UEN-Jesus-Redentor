<div class="col s12 m3 l2 aside" id="contenedor4">
 <div class="collection cyan darken-1">
 	<?php if($_SESSION['session_nivel'] != 3) { ?>
        <a href="secciones.php" class="collection-item "><span style="color:#50c0dc;"><i class="material-icons left">book</i>Ver Secciones</span></a>
        <a href="materias.php" class="collection-item "><span style="color:#50c0dc;"><i class="material-icons left">task</i>Ver Materias</span></a>
        <a href="estudiantes.php" class="collection-item "><span style="color:#50c0dc;"><i class="material-icons left">groups</i>Ver Estudiantes</span></a>
        <a href="profesores.php" class="collection-item "><span style="color:#50c0dc;"><i class="material-icons left">school</i>Ver Profesores</span></a>
    <?php } ?>
    <?php if($_SESSION['session_nivel'] == 1) { ?>
        <a href="administradores.php" class="collection-item "><span style="color:#50c0dc;"><i class="material-icons left">vpn_key</i>Ver Usuarios</span></a>
    <?php } ?>
    <?php if($_SESSION['session_nivel'] != 3) { ?>
        <a href="reporte.php" target="_blank" class="collection-item "><span style="color:#50c0dc;"><i class="material-icons left">assignment</i>Reporte de estudiantes</span></a>
    <?php } ?>
    <?php if($_SESSION['session_nivel'] == 3) { ?>
        <a href="materias_est.php" class="collection-item "><span style="color:#50c0dc;"><i class="material-icons left">task</i>Materias del estudiante</span></a>
    <?php } ?>
 </div>
</div>