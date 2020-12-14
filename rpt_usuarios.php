<?php


if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
	$desde = $_GET['desde'];
	$hasta = $_GET['hasta'];

	$verDesde = date('d/m/Y', strtotime($desde));
	$verHasta = date('d/m/Y', strtotime($hasta));
}else{
	$desde = '1111-01-01';
	$hasta = '9999-12-30';

	$verDesde = '';
	$verHasta = '';
}
require('fpdf.php');
require 'funcs/funcs.php';
$buscar = $_GET['buscar'];
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 15);
$pdf->Image('images/tecniwahs_logo.png' , 70 ,15, 90, 15,'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, ' ', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'hoy: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'Listado de Usuarios Creados', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
if ($verDesde != '') {
	$pdf->Cell(60, 8, 'Desde: '.$verDesde.' hasta: '.$verHasta, 8);
}
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(35, 8, 'Nombre', 0);
$pdf->Cell(35, 8, 'Usuario', 0);
$pdf->Cell(30, 8, 'Rol', 0);
$pdf->Cell(17, 8, 'Estado', 0);
$pdf->Cell(40, 8, 'Correo', 0);
$pdf->Cell(25, 8, 'Fecha Crecion', 0);

$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$sql = "SELECT * FROM bd_tw.tbl_usuario u inner join roles r on u.id_rol=r.rol_id_rol
WHERE usuario like '%".$buscar."%' or nombre_usuario like '%".$buscar."%' 
or estado_usuario like '%".$buscar."%' or correo_electronico like '%".$buscar."%' ";
//$productos = mysqli_query($mysqli,"SELECT * FROM tbl_usuario u, roles r where u.id_rol=r.rol_id_rol and fecha_creacion BETWEEN '$desde' AND '$hasta' order by id_usuario;");
//echo "$sql";
$productos = mysqli_query($mysqli,$sql);

$item = 0;
$totaluni = 0;
$totaldis = 0;
while($productos2 = mysqli_fetch_array($productos)){
		if ($productos2['fecha_creacion'] > $desde && $productos2['fecha_creacion'] < $hasta) {
			$pdf->Cell(35, 8, $productos2['nombre_usuario'], 0);
			$pdf->Cell(35, 8, $productos2['usuario'], 0);
			$pdf->Cell(30, 8, $productos2['rol_nombre'], 0);
			$pdf->Cell(17, 8, $productos2['estado_usuario'], 0);
			$pdf->Cell(40, 8, $productos2['correo_electronico'], 0);
			$pdf->Cell(25, 8, date('d/m/Y', strtotime($productos2['fecha_creacion'])), 0);
			$pdf->Ln(8);
		}
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(104,8,'',0);
//'reporte.pdf','D'
$pdf->Output();
?>
