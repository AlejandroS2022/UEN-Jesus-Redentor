<?php
    session_start();
    require('fpdf/fpdf.php');
    require_once("incluye/conexion.php");
    $cedula= $_GET['cedula'];
    $fecha= date('d/m/Y');
    
    $result = mysqli_query($con, "SELECT e.id as id, e.nombre as nombre, e.apellido as apellido, e.cedula as cedula, e.fecha_nacimiento as fecha_nacimiento, e.direccion as direccion, e.sexo as sexo, e.grupo_sanguineo as grupo_sanguineo, e.parentesco_representante as parentesco_representante, r.id as id_r, r.nombre as nombre_r, r.apellido as apellido_r, r.cedula as cedula_r, r.telefono as telefono, r.otro_telefono as otro_telefono, s.nombre as s_nombre, g.nombre as g_nombre, g.descripcion as g_descripcion FROM estudiantes e, representantes r, usuario_estudiante ue, usuarios u, secciones s, grados g WHERE u.usuario='".$cedula."' AND u.id=ue.id_usuario AND ue.id_estudiante=e.id AND r.id = e.id_representante AND s.id=e.id_seccion AND g.id=s.id_grado AND s.eliminado=0");
    $filas=mysqli_fetch_assoc($result);
    $fecha_nacimiento=strftime("%d/%m/%Y",strtotime($filas['fecha_nacimiento']));

    $pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFillColor(232,232,232);

    $pdf->SetY(25);
	$pdf->SetX(65);
    $pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,6,utf8_decode("CARTA DE BUENA CONDUCTA"),0,0,'L',0);

    $pdf->SetY(40);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',11);
	$pdf->MultiCell(170,8,utf8_decode('Quien suscribe, director (a) de la Unidad Educativa Nacional "Jesús Redentor" hace constar que el/la estudiante '.$filas['nombre']." ".$filas['apellido'].', titular de la cédula escolar o de identidad V-'.$filas['cedula'].', cursa en este plantel '.$filas['g_nombre'].'° '.$filas['g_descripcion'].', en el año escolar 2022-2023 y durante su permanencia en el mismo se ha observado BUENA CONDUCTA.
    
Constancia que se expide a petición del interesado en la fecha '.$fecha.'.'),0,'J',0);

    $pdf->SetY(170);
	$pdf->SetX(60);
    $pdf->SetFont('Arial','B',13);
	$pdf->Cell(40,6,utf8_decode("_____________________________________"),0,0,'L',0);
    $pdf->SetY(180);
	$pdf->SetX(86);
    $pdf->SetFont('Arial','B',13);
	$pdf->Cell(40,6,utf8_decode("Firma del director"),0,0,'L',0);

	$pdf->Ln();
    $pdf->Output();
?>