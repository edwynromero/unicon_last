                                                             <?php
include("../funciones/librerias_index2.php");
include('tcpdf/config/lang/eng.php');
include('tcpdf/tcpdf.php');

$conexion=conectar();

extract($_GET);

$sql="select * from sub_equipo ";
$res=consultar($sql,$conexion);
$num=cantidad($res);



	$html='<table border="0" width="100%" align="center">';

	$html.='<tr align="center">
		<td bgcolor="#666666" color="#FFFFFF" align="center" colspan="1"><b>Nombre de los sub_equipos</b></td>

	</tr>';

	$contador=1;
	while($r=asociativo($res)){
	extract($r);

	if($contador%2==0){
	$color='#EAEAEA';
	}else{
	$color='#FFFFFF';
	}

	$html.='<tr>
	<td bgcolor="'.$color.'">'.$nombre_subequipo.'</td>
		</tr>';
	$contador++;
	}
	$html.='</table>';



$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetAuthor('Edwyn');
$pdf->SetTitle('Listado');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(10, 10,10);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setLanguageArray($l);

$pdf->AddPage();
$pdf->Image('tcpdf/images/logocentral.png',10,8);
$fecha=date("d/m/Y");
$pdf->writeHTMLCell(0, 0, '40', '10', '<font><b>Fecha:'.$fecha.'</b></font>&nbsp;&nbsp;&nbsp;&nbsp;', 0, 1, 0, true, 'R');
$pdf->ln(5);
$pdf->ln(20);
$t='<u>Listado de sub_paradas</u>';
$pdf->SetFont('helvetica', 'B', 14);
$pdf->writeHTML($t, true,false, false, false, 'C');
$pdf->SetFont('helvetica', '', 12);
$pdf->ln(20);
$pdf->SetFont('helvetica','', 10);
$pdf->writeHTML($html, true,false, false, false, 'C');
$pdf->ln(5);
$pdf->writeHTMLCell(0, 0, '10', '260', 'Industrias Unicon, C.A  RIF: J-00007702-9, Urbanización Industrial La Chapa, La Victoria 2121
Tel&eacute;fono:0212-7534111 ', 0, 1, 0, true, 'C');
$pdf->Output('sub_paradas_listado_.pdf', 'I');
?>