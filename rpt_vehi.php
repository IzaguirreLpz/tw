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
date_default_timezone_set('America/El_Salvador');
$buscar = $_GET['buscar'];
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('images/tecniwahs_logo.png' , 70 ,15, 90, 15,'PNG');
//$pdf->Cell(18, 10, '', 0);
$pdf->Cell(1, 10, ' ', 0);
$pdf->Cell(70, 8, 'Fecha Y Hora: '.date('d-m-Y H:i:s').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'Listado de Vehiculo Registrados', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
if ($verDesde != '') {
	$pdf->Cell(60, 8, 'Desde: '.$verDesde.' hasta: '.$verHasta, 8);
}
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 8, 'Placa', 0);
$pdf->Cell(65, 8, 'Nombre Cliente ', 0);
$pdf->Cell(30, 8, 'Marca ', 0);
$pdf->Cell(30, 8, 'Modelo', 0);
$pdf->Cell(25, 8, 'Color', 0);

$pdf->Cell(15, 8, 'Registrado ', 0);



$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$sql = "SELECT v.id_vehiculo,v.marca,v.modelo,c.nom_cliente, c.ape_cliente , v.color, v.placa, v.fecha_registro
FROM bd_tw.tbl_vehiculos v inner join tbl_clientes c on v.cliente_id=c.id_cliente
WHERE v.marca like '%".$buscar."%' or v.modelo like '%".$buscar."%' 
or c.nom_cliente like '%".$buscar."%' or c.ape_cliente like '%".$buscar."%'
or v.color like '%".$buscar."%' or v.placa like '%".$buscar."%'";
//echo "$sql";
$productos = mysqli_query($mysqli,$sql);
//$productos = mysqli_query($mysqli,"SELECT v.id_vehiculo,v.marca,v.modelo,c.nom_cliente, c.ape_cliente , v.color, v.placa, v.fecha_registro FROM bd_tw.tbl_vehiculos v, tbl_clientes c where v.cliente_id=c.id_cliente and v.fecha_registro  BETWEEN '$desde' AND '$hasta'order by id_vehiculo ASC");
$item = 0;
$totaluni = 0;
$totaldis = 0;
while($productos2 = mysqli_fetch_array($productos)){
	$item = $item+1;
	if ($productos2['fecha_registro'] > $desde && $productos2['fecha_registro'] < $hasta) {
		$pdf->Cell(20, 8, $productos2['placa'], 0);
		$pdf->Cell(65, 8, $productos2['nom_cliente']." ". $productos2['ape_cliente'], 0);
		$pdf->Cell(30, 8, $productos2['marca'], 0);
		$pdf->Cell(30, 8, $productos2['modelo'], 0);
		$pdf->Cell(25, 8, $productos2['color'], 0);
		$pdf->Cell(15, 8, date('d/m/Y', strtotime($productos2['fecha_registro'])), 0);
		$pdf->Ln(8);
	}
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(104,8,'',0);
//'reporte.pdf','D'
$pdf->Output();
?>
