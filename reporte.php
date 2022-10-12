<?php
    session_start();
    require('fpdf/fpdf.php');
    require_once("incluye/conexion.php");
    $pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFillColor(232,232,232);

	$pdf->SetFont('Arial','B',22);
	$pdf->SetY(20);
	$pdf->SetX(65);
	$pdf->Cell(45,10,'U.E.N Jesus Redentor');

	$pdf->SetFont('Arial','B',12);
	$pdf->SetY(40);
	$pdf->SetX(20);
	$pdf->Cell(40,6,utf8_decode('Grado / Año'),1,0,'L',1);
	$pdf->SetX(60);
	$pdf->Cell(50,6,utf8_decode('Sección'),1,0,'L',1);
	$pdf->SetX(110);
	$pdf->Cell(40,6,'Alumnos varones',1,0,'L',1);
	$pdf->SetX(150);
	$pdf->Cell(40,6,'Alumnos hembras',1,0,'L',1);
	$pdf->Ln();

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

    $pdf->Output();
?>