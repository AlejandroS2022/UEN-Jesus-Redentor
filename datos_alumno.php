<?php
    session_start();
    require('fpdf/fpdf.php');
    require_once("incluye/conexion.php");
    $cedula= $_GET['cedula'];
    
    $result = mysqli_query($con, "SELECT e.id as id, e.nombre as nombre, e.apellido as apellido, e.cedula as cedula, e.fecha_nacimiento as fecha_nacimiento, e.direccion as direccion, e.sexo as sexo, e.grupo_sanguineo as grupo_sanguineo, e.parentesco_representante as parentesco_representante, r.id as id_r, r.nombre as nombre_r, r.apellido as apellido_r, r.cedula as cedula_r, r.telefono as telefono, r.otro_telefono as otro_telefono, s.nombre as s_nombre, g.nombre as g_nombre, g.descripcion as g_descripcion FROM estudiantes e, representantes r, usuario_estudiante ue, usuarios u, secciones s, grados g WHERE u.usuario='".$cedula."' AND u.id=ue.id_usuario AND ue.id_estudiante=e.id AND r.id = e.id_representante AND s.id=e.id_seccion AND g.id=s.id_grado AND s.eliminado=0");
    $filas=mysqli_fetch_assoc($result);
    $fecha_nacimiento=strftime("%d/%m/%Y",strtotime($filas['fecha_nacimiento']));

    $pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFillColor(232,232,232);

    $pdf->Image('incluye/membrete.png',15,5,180,32);

    $pdf->SetY(40);
	$pdf->SetX(75);
    $pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,6,utf8_decode("DATOS DEL ALUMNO"),0,0,'L',0);

    $pdf->SetY(51);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,6,utf8_decode("Nombres y Apellidos:"),0,0,'L',0);
    $pdf->SetY(51);
	$pdf->SetX(66);
    $pdf->SetFont('Arial','U',11);
	$pdf->Cell(40,6,utf8_decode($filas['apellido']." ".$filas['nombre']),0,0,'L',0);

    $pdf->SetY(59);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,6,utf8_decode("Cédula de identidad:"),0,0,'L',0);
    $pdf->SetY(59);
	$pdf->SetX(65);
    $pdf->SetFont('Arial','U',11);
	$pdf->Cell(40,6,utf8_decode("V-".$filas['cedula']),0,0,'L',0);

    $pdf->SetY(67);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,6,utf8_decode("Fecha de nacimiento:"),0,0,'L',0);
    $pdf->SetY(67);
	$pdf->SetX(66);
    $pdf->SetFont('Arial','U',11);
	$pdf->Cell(40,6,utf8_decode($fecha_nacimiento),0,0,'L',0);

    $pdf->SetY(75);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,6,utf8_decode("Dirección:"),0,0,'L',0);
    $pdf->SetY(75);
	$pdf->SetX(46);
    $pdf->SetFont('Arial','U',11);
	$pdf->Cell(40,6,utf8_decode($filas['direccion']),0,0,'L',0);

    $pdf->SetY(83);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,6,utf8_decode("Sexo:"),0,0,'L',0);
    $pdf->SetY(83);
	$pdf->SetX(37);
    $pdf->SetFont('Arial','U',11);
	$pdf->Cell(40,6,utf8_decode($filas['sexo']),0,0,'L',0);

    $pdf->SetY(91);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,6,utf8_decode("Grupo Sanguíneo:"),0,0,'L',0);
    $pdf->SetY(91);
	$pdf->SetX(60);
    $pdf->SetFont('Arial','U',11);
	$pdf->Cell(40,6,utf8_decode($filas['grupo_sanguineo']),0,0,'L',0);

    $pdf->SetY(99);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,6,utf8_decode("Grado a cursar:"),0,0,'L',0);
    $pdf->SetY(99);
	$pdf->SetX(56);
    $pdf->SetFont('Arial','U',11);
	$pdf->Cell(40,6,utf8_decode($filas['g_nombre']."° ".$filas['g_descripcion'].' Sección "'.$filas["s_nombre"].'"'),0,0,'L',0);

    $pdf->SetY(117);
	$pdf->SetX(65);
    $pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,6,utf8_decode("DATOS DEL REPRESENTANTE"),0,0,'L',0);

    $pdf->SetY(128);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,6,utf8_decode("Nombres y Apellidos:"),0,0,'L',0);
    $pdf->SetY(128);
	$pdf->SetX(66);
    $pdf->SetFont('Arial','U',11);
	$pdf->Cell(40,6,utf8_decode($filas['apellido_r']." ".$filas['nombre_r']),0,0,'L',0);

    $pdf->SetY(136);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,6,utf8_decode("Cédula de identidad:"),0,0,'L',0);
    $pdf->SetY(136);
	$pdf->SetX(65);
    $pdf->SetFont('Arial','U',11);
	$pdf->Cell(40,6,utf8_decode("V-".$filas['cedula_r']),0,0,'L',0);

    $pdf->SetY(144);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,6,utf8_decode("Parentesco con el estudiante:"),0,0,'L',0);
    $pdf->SetY(144);
	$pdf->SetX(82);
    $pdf->SetFont('Arial','U',11);
	$pdf->Cell(40,6,utf8_decode($filas['parentesco_representante']),0,0,'L',0);

    $pdf->SetY(152);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,6,utf8_decode("Teléfono de contacto:"),0,0,'L',0);
    $pdf->SetY(152);
	$pdf->SetX(67);
    $pdf->SetFont('Arial','U',11);
	$pdf->Cell(40,6,utf8_decode($filas['telefono']),0,0,'L',0);

    $pdf->SetY(160);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(40,6,utf8_decode("Otro número telefónico:"),0,0,'L',0);
    $pdf->SetY(160);
	$pdf->SetX(71);
    $pdf->SetFont('Arial','U',11);
	$pdf->Cell(40,6,utf8_decode($filas['otro_telefono']),0,0,'L',0);

    $pdf->SetY(205);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',13);
	$pdf->Cell(40,6,utf8_decode("Firma: __________________________________________"),0,0,'L',0);

	$pdf->Ln();
    $pdf->Output();
?>