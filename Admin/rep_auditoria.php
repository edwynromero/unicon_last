<?php

include("../funciones/librerias.php");
include('tcpdf/config/lang/eng.php');
include('tcpdf/tcpdf.php');

                $conexion = conectar();
$query_Recordset1 = "SELECT * FROM bitacora ";
$Recordset1 = mysql_query($query_Recordset1, $conexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

    	$html='<table border="1" width="100%" align="center" cellpadding="5">';


	$html.='<tr align="center">
	<td width="50%" color="#FFFFFF" bgcolor="#999999"><b>N*</b></td>
	<td width="70%" color="#FFFFFF" bgcolor="#999999"><b>Usuario</b></td>
	<td width="100%" color="#FFFFFF" bgcolor="#999999"><b>Modulo</b></td>
	<td width="100%" color="#FFFFFF" bgcolor="#999999"><b>Accion</b></td>
	<td width="100%" color="#FFFFFF" bgcolor="#999999"><b>Informacion</b></td>
	<td width="100%" color="#FFFFFF" bgcolor="#999999"><b>Fecha</b></td>
	<td width="100%" color="#FFFFFF" bgcolor="#999999"><b>Hora</b></td>
	</tr>';





	$color='#FFFFFF';

	$color2='#FFFF99';
          do {


	$html.='<tr>
	<td width="50%" align="center" bgcolor="'.$color.'">'.$row_Recordset1['id_bit'].'</td>
	<td width="70%" align="center" bgcolor="'.$color.'">'.$row_Recordset1['usuario_bit'];.'</td>
	<td width="100%" align="center" bgcolor="'.$color.'">'.$row_Recordset1['modulo_bit'].'</td>
	<td width="100%" align="center" bgcolor="'.$color.'">'.$row_Recordset1['nombre'].'</td>
	<td width="100%" bgcolor="'.$color.'">'.$row_Recordset1['nombre'].'</td>
	<td width="100%" align="center" bgcolor="'.$color.'">'.$row_Recordset1['nombre'].'</td>
	<td width="100%" align="center" bgcolor="'.$color.'">'.$row_Recordset1['apellido'].'</td>
	</tr>';
            }



            	while($r=asociativo($res));
		$html.='</table>';


$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetAuthor('Edwyn');
$pdf->SetTitle('Listado de ');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(10, 10,10);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setLanguageArray($l);

$pdf->AddPage();
$pdf->Image('../imagenes/grunge72.jpg',-8,-2);
$fecha=date("d/m/Y");
$pdf->writeHTMLCell(0, 0, '40', '10', '<font><b>Fecha:'.$fecha.'</b></font>&nbsp;&nbsp;&nbsp;&nbsp;', 0, 1, 0, true, 'R');
$pdf->ln(5);
$pdf->ln(20);
$t='<u>Listado De Personal</u>';
$pdf->SetFont('helvetica', 'B', 14);
$pdf->writeHTML($t, true,false, false, false, 'C');
$pdf->SetFont('helvetica', '', 12);
$pdf->ln(20);
$pdf->SetFont('helvetica','', 10);
$pdf->writeHTML($html, true,false, false, false, 'C');
$pdf->ln(5);
$pdf->writeHTMLCell(0, 0, '10', '260', 'Gonzalez C.A RIF: J-29864643-8, Carpinteria y Servicios Gonzalez C.A, Sector la Casona. Sabaneta (Calle 2, Casa N° 29), El Consejo Edo. Aragua Telfs.:(0244) 415.1572.', 0, 1, 0, true, 'C');
$pdf->Output('Lista de personal'.$per.'.pdf', 'I');
?>