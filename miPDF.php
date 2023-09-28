<?php
/* este archivo se repite tantas veces como informes queramos tener*/
require_once('class.ezpdf.php');
$pdf = new Cezpdf('a4');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$conexion = mysqli_connect("SERVIDOR", "USUARIO", "CLAVE");
mysqli_select_db($conexion,"BASE DE DATOS");
$queEmp = "SENTENCIA SQL";
$resEmp = mysqli_query($conexion, $queEmp) or die(mysqli_error());
$totEmp = mysqli_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysqli_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'num'=>'<b>Num</b>',
				'CAMPO1'=>'<b>TITULO1</b>',
				'CAMPO2'=>'<b>TITULO2</b>',
				'CAMPO...N'=>'<b>TITULO...N</b>'
				);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
$txttit = "<b>TITULO DEL INFORME</b>\n";
$txttit.= "HECHO POR PROFE DUQUE \n";

$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();
?>