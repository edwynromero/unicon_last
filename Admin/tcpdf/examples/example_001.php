<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2009-03-18
// 
// Description : Example 001 for TCPDF class
//               Default Header and Footer
// 
// Author: Nicola Asuni
// 
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com s.r.l.
//               Via Della Pace, 11
//               09044 Quartucciu (CA)
//               ITALY
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @copyright 2004-2009 Nicola Asuni - Tecnick.com S.r.l (www.tecnick.com) Via Della Pace, 11 - 09044 - Quartucciu (CA) - ITALY - www.tecnick.com - info@tecnick.com
 * @link http://tcpdf.org
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 * @since 2008-03-04
 */

require_once('../config/lang/eng.php');
require_once('../tcpdf.php');


$conexion=conectar();
$sql="select * from recepcion where cliente_estado = 1";
$res= consultar($sql,$conexion);
$nun= cantidad($res);

$html='<table  border="0" align="center">
						<tr align="center">
									<td><b>id</b></td>
									<td><b>Cliente</b></td>
									<td><b>Cedula</b></td>
									<td><b>Telefono</b></td>
									<td><b>Compañia</b></td>
									<td><b>Direccion</b><</td>
									<td><b>N.Orden</b></td>
									<td><b>Recepcion</b></td>
									<td><b>Entrega</b></td>
									<td><b>Servicios</b></td>
									<td><b>Otros</b></td>
						</tr>';
						
								$contador=1;
								while($r=asociativo($res))
								{
									extract($r);
									if($contador%2==0) $bg="#99FF00"; else $bg="#FFFFFF";
								
									$html.='<tr aling="center" bgcolor="'.$bg.'">
						<td>'.$r['cliente_id'].'</td>
						<td>'.$cliente_nombre.'</td>
						<td>'.$cliente_cedula.'</td>
						<td>'.$cliente_telefono.'</td>
						<td>'.$cliente_compania.'</td>
						<td>'.$cliente_direccion.'</td>
						<td>'.$cliente_numero_orden.'</td>
						<td>'.$cliente_fecha_recep.'</td>
						<td>'.$cliente_entrega.'</td>
						<td>'.$cliente_servicios.'</td>
						<td>'.$cliente_otros.'</td>
						</tr>';
						
									$contador++;
								}
								
							$html.='</table>';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

//set some language-dependent strings
$pdf->setLanguageArray($l); 

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 16);

// add a page
$pdf->AddPage();

// print a line using Cell()
$pdf->Cell(0, 12, '$html', 1, 1, 'C');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE                                                 
//============================================================+
?>
