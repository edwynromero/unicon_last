<?php
include("../funciones/librerias_index.php");
include('tcpdf/config/lang/eng.php');
include('tcpdf/tcpdf.php');

$conexion=conectar();

extract($_GET);


$sql="select * from asistencias";
$res=consultar($sql,$conexion);
$num=cantidad($res);
  $row= asociativo($res);

  $per = $row['id_personal_asistencia'];
  
$q= "SELECT * FROM personal WHERE idpersonal='$per'";
      $idP1 = consultar($q,$conexion);
      $row1= asociativo($idP1);
	

	$html='<table border="0" width="100%" align="center">';

	$html.='<tr align="center">
	<td bgcolor="#666666" color="#FFFFFF" align="center"><b>N°</b></td>
	<td bgcolor="#666666" color="#FFFFFF" align="center"><b>Fecha</b></td>
	<td bgcolor="#666666" color="#FFFFFF" align="center"><b>Nombres</b></td>
	<td bgcolor="#666666" color="#FFFFFF"><b>Apellidos</b></td>
	<td bgcolor="#666666" color="#FFFFFF"><b>N. Ficha</b></td>
	<td bgcolor="#666666" color="#FFFFFF"><b>Cargo</b></td>
	<td bgcolor="#666666" color="#FFFFFF"><b>Nivel</b></td>
	<td bgcolor="#666666" color="#FFFFFF"><b>Estado</b></td>
	</tr>';

	$contador=1;
	while($row= asociativo($res)){
	extract($row);
	
	if($estado_asistencia==2){
		$estado_actual='Asistio';
		}else if($estado==0){
		$estado_actual='No Asistio';
		}else{
		$estado_actual='Ausente';
		}

	if($contador%2==0){
	$color='#EAEAEA';
	}else{
	$color='#FFFFFF';
	}

	$html.='<tr>
	<td bgcolor="'.$color.'">'.$contador.'</td>
	<td bgcolor="'.$color.'">'.$fecha_asistencia.'</td>
	<td bgcolor="'.$color.'">'.$row1['nombre'].'</td>
	<td bgcolor="'.$color.'">'.$row1['apellido'].'</td>
	<td bgcolor="'.$color.'" align="center">'.$row1['NFicha'].'</td>
	<td bgcolor="'.$color.'" align="center">'.$row1['cargo'].'</td>
	<td bgcolor="'.$color.'" align="center">'.$row1['nivel'].'</td>
	<td bgcolor="'.$color.'" align="center">'.$estado_actual.'</td>
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
$t='<u>Listado de personal</u>';
$pdf->SetFont('helvetica', 'B', 14);
$pdf->writeHTML($t, true,false, false, false, 'C');
$pdf->SetFont('helvetica', '', 12);
$pdf->ln(20);
$pdf->SetFont('helvetica','', 10);
$pdf->writeHTML($html, true,false, false, false, 'C');
$pdf->ln(5);
$pdf->writeHTMLCell(0, 0, '10', '260', 'Industrias Unicon, C.A  RIF: J-00007702-9, Urbanización Industrial La Chapa, La Victoria 2121
Teléfono:0212-7534111 ', 0, 1, 0, true, 'C');
$pdf->Output('produccion_listado_.pdf', 'I');
?>