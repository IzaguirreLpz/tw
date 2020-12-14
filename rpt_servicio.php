<?php


if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
	$desde = $_GET['desde'];
	$hasta = $_GET['hasta'];

	$verDesde = date('d-m-Y', strtotime($desde));
	$verHasta = date('d-m-Y', strtotime($hasta));
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
$pdf->SetFont('Arial', '', 10);
$pdf->Image('images/tecniwahs_logo.png' , 70 ,15, 90, 15,'PNG');
$pdf->Cell(1, 10, ' ', 0);
$pdf->Cell(70, 8, 'Fecha Y Hora: '.date('d-m-Y H:i:s').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'Listado de Productos Registrados', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
if ($verDesde != '') {
	$pdf->Cell(60, 8, 'Desde: '.$verDesde.' hasta: '.$verHasta, 8);
}
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 8, 'Codigo', 0);
$pdf->Cell(40, 8, 'Nombre Producto', 0);
$pdf->Cell(30, 8, 'Fecha De Ingreso', 0);
$pdf->Cell(25, 8, 'Precio Venta', 0);
$pdf->Cell(25, 8, 'Precio Compra', 0);
$pdf->Cell(20, 8, 'Cantidad', 0);
//$pdf->Cell(25, 8, 'Proveedor', 0);


$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$sql = "SELECT p.codigo_producto, p.nombre_producto, p.precio_producto, p.precio_costo, p.cant, p.tipo, p.date_added FROM bd_tw.products p
WHERE codigo_producto like '%".$buscar."%' or nombre_producto like '%".$buscar."%' 
or precio_producto like '%".$buscar."%' or precio_costo like '%".$buscar."%' or date_added like '%".$buscar."%';";
//echo "$sql";
$productos = mysqli_query($mysqli,$sql);
$item = 0;
$totaluni = 0;
$totaldis = 0;
while($productos2 = mysqli_fetch_array($productos)){
	if ($productos2['tipo'] == '1') {
		if ($productos2['date_added'] > $desde && $productos2['date_added'] < $hasta) {
			$pdf->Cell(20, 8, $productos2['codigo_producto'], 0);
			$pdf->Cell(40, 8, $productos2['nombre_producto'], 0);
			$pdf->Cell(30, 8, date('d/m/Y', strtotime($productos2['date_added'])), 0);
			$pdf->Cell(25, 8, $productos2['precio_producto'], 0);
			$pdf->Cell(25, 8, $productos2['precio_costo'], 0);
			$pdf->Cell(20, 8, $productos2['cant'], 0);
			$pdf->Ln(8);	
		}
	}	
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(104,8,'',0);
//'reporte.pdf','D'
$pdf->Output();
?>
