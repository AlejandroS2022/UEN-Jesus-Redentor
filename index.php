<!DOCTYPE html>

<?php
session_start();
?>

<?php require_once("incluye/conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">
  <head>
	   <meta charset="utf-8">
        <title>Administración</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link type="text/css" rel="stylesheet" href="css/materialize/css/materialize.min.css"  media="screen,projection"/>

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/css?family=Parisienne" rel="stylesheet"> 
                <link href="css/login.css" media="screen" rel="stylesheet">
</head> 

	<body style="height: 100%; background-image: url('incluye/fondo.jpg'); background-size: cover;">
      <script type="text/javascript" src="incluye/jquery/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="css/materialize/js/materialize.min.js"></script>
<?php


if(isset($_SESSION["session_username"])){

    
header("Location: inicio.php");
}

if(isset($_POST["login"])){

if(!empty($_POST['usuario']) && !empty($_POST['clave'])) {
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];

    $query =mysqli_query($con,"SELECT * FROM usuarios WHERE usuario='".$usuario."' AND clave='".$clave."'");

    $numrows=mysqli_num_rows($query);
    if($numrows!=0)

    {
    while($row=mysqli_fetch_assoc($query))
    {
    $dbusername=$row['usuario'];
    $dbclave=$row['clave'];
    $dbnivel=$row['nivel'];
    }

    if($usuario == $dbusername && $clave == $dbclave)

    {


    $_SESSION['session_username']=$usuario;
    $_SESSION['session_nivel']=$dbnivel;

    header("Location: inicio.php");
    }
    } else {

 $message =  "Nombre de usuario ó contraseña invalida!";
    }

} else {
    $message = "Todos los campos son requeridos!";
}
}
?>




    <div class="container mlogin">
            <div id="banner">
                <br>
                <center>
    <img height="275px" width="275px" src="incluye/logo.jpg"/>
                </center>
            </div>
            <div id="login">
<form name="loginform"  action="" method="POST">
    <p>
     <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="usuario" type="text" name="usuario" class="validate" autofocus>
            <label for="usuario" >Usuario</label>
        </div>
              <div class="row">

        <div class="input-field col s12">
            <i class="material-icons prefix">vpn_key</i>
            <input id="clave" type="password" name="clave" >
            <label for="clave" >Contraseña</label><br>    
        </div>
              </div>


    <center>    
        <button class="btn waves-effect waves-light orange darken-3" type="submit" name="login" value="Entrar" style="color:white" >Iniciar Sesión

  </button>
    </center>
</form>

    </div>

            </div></div>

    <div style="height: 100%; background: white; margin-top: 5em;">
        <center>
            <br>
            <h2>Reseña Histórica</h2>
            <br>
            <p style="padding: 2em;">
            Unidad Educativa Nacional “Jesús Redentor”, A continuación se relatara de forma detallada por años la reseña histórica de la Unidad Educativa Nacional Jesús Redentor la cual anteriormente se llamó “El Tabacal”, se encuentra ubicada el sector el Tabacal, al frente de la calle Canaima del sector Alberto Grimaldo, Parroquia Bramón Municipio Junín, es una institución rural y pública, dependiente del Ministerio del Poder Popular para la Educación.
Fue fundada el primero de Octubre de 1990, en este momento como Jardín de Infancia contando con una matrícula censada de 28 niños y niñas a cargo de la Prof. Blanca Hernández quien permaneció en el cargo hasta el año 1992 cuando se incorpora la Prof. Deixy Cáceres a continuar con la sección de preescolar, en el periodo de 1996-1997, se da la creación del primer grado que en sus inicios lo asume el Prof. Danilo Ortiz , docente Estadal, continuándolo en el año 1997 desde el mes de febrero la Prof. Paula Rodríguez, luego para el año 1998-1999 se da la creación del segundo y tercer grado asumidos por los Profesores Diocelina Montañez y Eliseo Rodríguez; y para ese mismo año la Profesora Deixy Cáceres asume el cargo de Coordinadora, incorporándose la Prof. Cristian Fuenmayor como docente de Preescolar funcionando en una estructura de tipo R2 y los demás grados en la casa comunal el Tabacal, en común acuerdo con la asociación civil y Juntas de vecinos (persona colaboradora Margarita Sierra Durán).
El 16 de Septiembre de 1999, se logra la consolidación de la II Etapa y a su vez por decreto se da inició como Escuelas Bolivariana, siendo la nuestra pionera en el Municipio, incorporando la jornada escolar completa de 8 horas en horario comprendido entre las 8:00 am y las 4:00 pm. Sin embargo se laboraba en espacios separados, educación preescolar y la I Etapa funcionaban en la casa comunal de la Comunidad en una vivienda rural y la II Etapa  en una casa alquilada por FEDE y el Ministerio de Educación Cultura  y Deporte ( Zona Educativa Táchira)  propiedad del señor Néstor Carrillo ubicada en la vereda 4 del barrio el Tabacal, quedando a cargo de los grados: 4to, 5to y 6to las profesoras María Teresa Mansilla, Mercedes Sánchez Y Leonor Rodríguez, incorporándose ese mismo año una docente especialista para el área de Educación física profesora Belsay Guerrero y con la renuncia de la Prof. Diocelina  Montañez se incorpora la Prof. Isabel Rosales para asumir el 1er Grado.
Desde el mes de Mayo del año escolar 2005 se empezó a gestionar la creación del séptimo Bolivariano en la institución, con la finalidad de fortalecer el crecimiento educativo de la comunidad, beneficiando el desarrollo local, garantizando el derecho a la educación a los niños, niñas y adolescentes con la prosecución, potencializando también los talentos deportivos, culturales y productivos de la institución.
Participando el personal directivo profesor Pablo Ortiz como Director del NER 033 y Profesora Paula Rodríguez como Coordinadora de la Institución, los docentes Oscar Riveros, Yaniska Valladares y Belsay Guerrero, y todo el personal docente, asociación civil (Carmen Alicia Santander), padres y representantes.
Logrando la prosecución en el mes de agosto del mismo año cuando fuimos llamados por la Zona Educativa Táchira por la coordinadora del Liceo Bolivariano Profesora Ismary Vivas. Dando inicio a realizar el censo en la comunidad el Tabacal, Alberto Grimaldo y la Colina, logrando incluir en el Sistema Educativo Bolivariano algunos jóvenes y adolescentes que no estaban estudiando en ninguna institución, alcanzando una matrícula inicial de 21 estudiantes, permitiendo a la coordinadora de la institución acompañada de la Docente Belsay Guerrero buscar un espacio alternativo; cedido por la directora del INIA, Ingeniero Maira Fuenmayor, siendo atendidos estos estudiantes por  la docente Nancy Lindarte que llega en el mes de Octubre del año 2005, y docente especialista en el área de educación física Profesor Guillermo García, Profesor William Barrera en el área de Educación para el trabajo, especialista en idiomas Licenciado Jonathan Pineda, actualmente perteneciente a la nómina de la Unidad Educativa Nacional Bolivariana “El Tabacal”.
Permitiendo durante el año escolar 2005-2006, fortalecer aún más la matrícula, llegando a un total de 34 estudiantes. Una vez que se trasladan a la nueva infraestructura de la institución,  ésta es nombrada como sede del NER 003 a cargo del nuevo Director Profesor Víctor Mora. Posteriormente en el año escolar 2006-2007 se realizan visitas a otras instituciones tales como la Colina y el Helechal, con la finalidad de proyectar nuestro Liceo Bolivariano, logrando incrementar una matrícula de 77 estudiantes inscritos, creando 2 secciones de segundo año y una de primer año. Debido a que el Liceo no tiene una sede propia, se construyen espacios alternativos en la finca de la escuela el Tabacal con la colaboración de los padres y representantes y consejos comunales, quienes donan materiales como láminas de zinc, arena, cemento y troncos de madera para realizar la armadura de los ambientes, en jornadas de trabajo durante dos fines de semana. Llegando a la institución dos docentes integradores: la profesora Tarín Duran y la profesora Daisy Vargas y una especialista en el área de idiomas Licenciada Yarmila Pedraza. Por otra parte se gestiona ante el Infocentro ubicado en el INIA, los horarios en los cuales les serán impartidos a todos los estudiantes las clases del área de Informática por parte del Profesor Martin García. 
También se incorporaron estudiantes de la Misión Sucre desde educación inicial hasta 5to grado con la finalidad de realizar su vinculación con los docentes tutores de cada grado.            
Para el inicio del año escolar 2007-2008 se logra una matrícula inicial de 105 estudiantes. Cabe señalar, que en mancomunado acuerdo con los consejos comunales comienza a funcionar el Liceo en la casa comunal del Tabacal integrándose las cuatro secciones (1er año, 2do año y 3er año) en horario bolivariano de 8:00 a.m hasta 4:45 p.m siendo atendida la población estudiantil por el Prof. José Guillermo García hasta el mes de Noviembre, después lo asumió la Prof. Daisy Vargas y se creó el cargo de Coordinador de Desarrollo Endógeno el cual ocupo la Prof. Tarín Durán, de igual manera se asignó al Prof. Custer Carrillo desde el mes de Noviembre como Coordinador del Departamento de Control de Estudio y Evaluación; como docente integradores estuvieron a cargo en 1er Año la Prof. Yenny Hernández, y más adelante esta es trasladada a la Escuela Bolivariana, luego este grado queda a cargo de la Prof. Milagros Castellanos, en 2do Año la docente integradora Eylen Silvana Villamizar, como docente especialista en el área de educación para el trabajo (EPT) la Prof. Indira Gutiérrez, docente especialista en el área de Biología y Química Licenciado Edwin Meneses, especialista en idiomas Lic. Yarmila Pedraza, especialista en el área de Matemática y Física Lcda. Lasbernis Vega, especialista en el área de Deporte y Recreación Prof. José García, especialista en el área de informática, TSU Mariela Villamizar; alcanzándose  de esta manera la organización del Liceo con Docentes Especialistas en todas las áreas académicas.
 	También se cuenta con personal administrativo: TSU Pedro Sandoval y personal de mantenimiento el Sr. Antonio Bautista para el Liceo, y  para la Escuela personal Administrativo Bárbara Rodríguez, Doris Medina y 6 auxiliares para Educación Inicial. Personal obrero de mantenimiento; Gladis Gutiérrez, Hilda Triana, Claudia Reyes, Edward Hidalgo, José Sánchez, Fernando López.      
Para el inicio del año escolar 2005 al 2009 nuestra institución funcionó como sede del NER 033 estando primero a cargo el Director Prof. Víctor Mora y Eira Niño como personal Administrativo hasta Noviembre del año 2008, luego se incorpora el Profesor José Gregorio Uzcátegui, como director del NER 033 llegando a la escuela  dos Profesores de la UBV Jairo Páez y Jimmy Peña.
Para el año escolar 2010 – 2011 es designado como Director de la Unidad Educativa al Licenciado Antonio Ramón Lizarazo Rubio y como Subdirector el Profesor Martin García  al igual se incorporan en el subsistema secundaria la profesora Elizabeth López como especialista en el área de matemáticas y física, el profesor Joaquín Monsalve como especialista en educación física, el profesor José Gregorio Díaz como especialista de informática, el profesor Johan Lizcano como docente de sociales, la profesora Anacelys Guerrero como especialista de E.P.T, el profesor Nelson Yánez como especialista de educación musical, también se incorpora  la profesora María Guerra como coordinadora de P.Y.D.E y P.A.E para media general,  Balaguera Soilet; especialista de Sociales;  en este mismo año se ingresó el profesor Henrique Zambrano; docente aula por UBV;  la profesora Yeismar  Herrera de Barajas docente de aula. 
Para el año 2011 -2012  se incorporó a la escuela el profesor Francisco  Chacón García   para primaria por traslado;  la Profesora Sobeida Acero para aula;  y la profesora yelsy Sierra docente de aula.
para el año 2012- 2013  se incorporó la profesora Deysi del Carmen Hernández  para el área  de sociales,  la profesora Carmen Sofía Sepúlveda para Matemática;  la profesora Denis Cárdenas,  para trabajar con el plan de lectura y escritura;  también ingreso  Alejandra TSU  profesoras Evelyn Gil especialista de cultura.
2013- 2014  se incorporaron a trabajar en la escuela Profesora la profesora Balvie Alarcón; el Prof. Luis Villalobos;  la  Profesora Siulbhe Sánchez y la profesora sendy  Hernández. Cabe señalar que así como se han ido incorporando nuevos docentes también se han cambiado para otras  Instituciones algunos docentes antes mencionados por diferentes  razones,  con respecto a las tradiciones que han pasado a formar parte de la historia de la Unidad Educativa se puede mencionar, celebrar  la semana aniversaria,  en feria hacer la manzana acaramelada, realizar la paradura del niño en febrero, hacer la fiesta de carnaval, participar en caminatas ecológicas, participar en el  vía crucis en semana santa, celebrar el abrazo en familia y dar un regalo a los niños y niñas en navidad, estas actividades que se realizan en las Instituciones Educativas son las que fortalecen el desarrollo personal, emocional, cultural y social de la triada.
            </p>
        </center>
    </div>
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "AVISO: ". $message . "</p>";} ?>
            
	<?php include("incluye/footer.php"); ?>
	
	

