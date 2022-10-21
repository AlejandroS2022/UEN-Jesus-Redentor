<?php
    session_start();
    require('fpdf/fpdf.php');
    require_once("incluye/conexion.php");
    $cedula= $_GET['cedula'];
    $result = mysqli_query($con, "SELECT e.id as id, e.nombre as nombre, e.apellido as apellido, e.cedula as cedula, e.fecha_nacimiento as fecha_nacimiento, s.nombre as s_nombre, g.nombre as g_nombre, g.descripcion as g_descripcion FROM estudiantes e, usuario_estudiante ue, usuarios u, secciones s, grados g WHERE u.usuario='".$cedula."' AND u.id=ue.id_usuario AND ue.id_estudiante=e.id AND s.id=e.id_seccion AND g.id=s.id_grado AND s.eliminado=0");
    $filas=mysqli_fetch_assoc($result);
    $fecha_nacimiento=strftime("%d/%m/%Y",strtotime($filas['fecha_nacimiento']));

    $pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFillColor(232,232,232);
/*
	$pdf->SetFont('Arial','B',22);
	$pdf->SetY(20);
	$pdf->SetX(65);
	$pdf->Cell(45,10,'U.E.N Jesus Redentor');
*/
	$pdf->SetFont('Arial','B',12);
	$pdf->SetY(22);
	$pdf->SetX(20);
	$pdf->Cell(165,100,"",1,0,'L',0);
    $pdf->SetY(24);
	$pdf->SetX(22);
	$pdf->Cell(161,96,"",1,0,'L',0);
    $pdf->SetY(30);
	$pdf->SetX(70);
    $pdf->SetFont('Arial','',9);
	$pdf->Cell(40,6,utf8_decode("REPÚBLICA BOLIVARIANA DE VENEZUELA"),0,0,'L',0);
    $pdf->SetY(34);
	$pdf->SetX(60);
    $pdf->SetFont('Arial','',9);
	$pdf->Cell(40,6,utf8_decode("MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN"),0,0,'L',0);
    $pdf->SetY(38);
	$pdf->SetX(64);
    $pdf->SetFont('Arial','',9);
	$pdf->Cell(40,6,utf8_decode("UNIDAD EDUCATIVA NACIONAL JESÚS REDENTOR"),0,0,'L',0);
    $pdf->SetY(42);
	$pdf->SetX(50);
    $pdf->SetFont('Arial','',9);
	$pdf->Cell(40,6,utf8_decode("EL TABACAL - PARROQUIA BRAMÓN - MUNICIPIO JUNÍN - EDO TÁCHIRA"),0,0,'L',0);
    $pdf->SetY(46);
	$pdf->SetX(85);
    $pdf->SetFont('Arial','',9);
	$pdf->Cell(40,6,utf8_decode("NIVEL MEDIA GENERAL"),0,0,'L',0);

    $pdf->SetY(57);
	$pdf->SetX(80);
    $pdf->SetFont('Arial','B',12);
	$pdf->Cell(40,6,utf8_decode("CARNET ESTUDIANTIL"),0,0,'L',0);

    $pdf->SetY(68);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','',12);
	$pdf->Cell(40,6,utf8_decode("Apellidos y Nombres:"),0,0,'L',0);
    $pdf->SetY(73);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',12);
	$pdf->Cell(40,6,utf8_decode($filas['apellido']." ".$filas['nombre']),0,0,'L',0);
    $pdf->SetY(80);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','',12);
	$pdf->Cell(40,6,utf8_decode("Cédula Identidad o Escolar:"),0,0,'L',0);
    $pdf->SetY(85);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',12);
	$pdf->Cell(40,6,utf8_decode("V- ".$filas['cedula']),0,0,'L',0);
    $pdf->SetY(92);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','',12);
	$pdf->Cell(40,6,utf8_decode("Fecha de Nacimiento:"),0,0,'L',0);
    $pdf->SetY(97);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','B',12);
	$pdf->Cell(40,6,utf8_decode($fecha_nacimiento),0,0,'L',0);
    $pdf->SetY(104);
	$pdf->SetX(25);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(109,6,utf8_decode($filas['g_nombre']."° ".$filas['g_descripcion'].' Sección "'.$filas["s_nombre"].'"'),0,0,'L',0);

	$pdf->Ln();
/*
	$result = mysqli_query($con, "SELECT s.id as id, s.nombre as s_nombre, g.nombre as g_nombre, g.descripcion FROM secciones s, grados g WHERE g.id=s.id_grado AND s.eliminado=0 ORDER BY g.id, s.nombre ASC");
	$i=0;
	while ($filas = mysqli_fetch_array($result)){
		$varones=0;
		$hembras=0;
		$result2 = mysqli_query($con, "SELECT * FROM estudiantes e WHERE e.id_seccion='".$filas['id']."'");
		while ($filas2 = mysqli_fetch_array($result2)){
			if($filas2['sexo']=="Masculino") {
				$varones=$varones+1;
			}else{
				$hembras=$hembras+1;
			}
		}
		$i=$i+6;
		$pdf->SetFont('Arial','',10);
		$pdf->SetY(40+$i);
		$pdf->SetX(20);
	    $pdf->Cell(40,6,utf8_decode($filas['g_nombre'].'º '.$filas['descripcion']),1,0,'L',0);
	    $pdf->SetX(60);
	    $pdf->Cell(50,6,utf8_decode($filas['s_nombre']),1,0,'L',0);
	    $pdf->SetX(110);
	    $pdf->Cell(40,6,$varones,1,0,'L',0);
	    $pdf->SetX(150);
	    $pdf->Cell(40,6,$hembras,1,0,'L',0);
	    $pdf->Ln();
	}
*/
    $pdf->Output();
?>