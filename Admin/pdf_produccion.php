<?php
include("../funciones/librerias_index.php");
include('tcpdf/config/lang/eng.php');
include('tcpdf/tcpdf.php');

$conexion=conectar();

extract($_GET);

@$sql="select * from produccion where idproduccion='$id'";
$res=consultar($sql,$conexion);
$num=cantidad($res);



	$contador=1;
	while($r=asociativo($res)){
	extract($r);

	if($contador%2==0){
	$color='#EAEAEA';
	}else{
	$color='#FFFFFF';
	}

		@$sql2="select * from paradas a,sub_equipo b where a.id='$id' and b.id='$id'";
		$res2=consultar($sql2,$conexion);
		$r2=asociativo($res2);
        @extract($r2);

        	@$sql3="select * from paproduccion";
		$res4=consultar($sql3,$conexion);
		$r3=asociativo($res4);
        @extract($r3);
          $tirasRest =   $tirasAProce - $tiraProc;
          $total = $tirasAProce + $tiraProc;




    $html.='<table border="1">';
	$html.='<tr>
		<td colspan="5" align="center" bgcolor="#666666" color="#FFFFFF"><b>CONTROL DE PRODUCCION</b></td>
	    </tr>';
        $html.='<tr>
		<td>Fecha:'.$fechaPro.'</td>
		<td>Turno:</td>
        <td>Maquina:</td>
		<td colspan="2">Supervisor:'.$fechaPro.'</td>
		</tr>';
		$html.='<tr>
		<td colspan="5" bgcolor="#666666" color="#FFFFFF"><b>DESCRIPCION DEL PRODUCTO</b></td>
		</tr>';
		$html.='<tr>
		<td colspan="1">Orden de fabricacion: '.$ordenFabric.'</td>
		<td colspan="4"> Producto: '.$fechaPro.'</td>
	    </tr>';
	    $html.='<tr>
		<td colspan="5" bgcolor="#666666" color="#FFFFFF"><b>Clasificacion de Tuberia</b></td>
	    </tr>';
         $html.='<tr>
		<td>1era Cal: '.$cali1.'</td>
		<td>2da Cal galv: '.$cali2.'</td>
		<td>2da Cal neg: '.$cali_a2.'</td>
		<td colspan="2">3ra Cal: '.$cali3.'</td>
	    </tr>';
	    $html.='<tr>
		<td colspan="5" bgcolor="#666666" color="#FFFFFF"><b>Control de Tiras</b></td>
	    </tr>';
	    $html.='<tr>
		<td colspan="2">Cantidad de tiras requeridas: '.$tirasAProce.'</td>
		<td colspan="2">Cantidad de tiras procesadas: '.$tiraProc.'</td>
		<td>Tiras restantes:'.$tirasRest.'</td>
	    </tr>';
	    $html.='<tr>
		<td colspan="5" bgcolor="#666666" color="#FFFFFF"><b>Notificacion de Produccion (Tiempos min)</b></td>
    	</tr>';
	    $html.='<tr>
		<td>Tiempo total:</td>
		<td>Parada:'.@$tiempo.'</td>
		<td>Cambio:</td>
		<td>T. muerto:</td>
        <td>T. de produccion:</td>
	    </tr>';

        $html.='</table><br />';


        $html.='<table border="1">';
        $html.='<tr>
		<td colspan="3" align="center"> <b>CONTROL DE PARADAS</b>  </td>
	    </tr>';

       $html.='<table border="0" width="100%" align="center">';

	$html.='<tr align="center">
	<td bgcolor="#666666" color="#FFFFFF" align="center"><b>Nombre Paradas</b></td>
	<td bgcolor="#666666" color="#FFFFFF"><b>Nombre Sub-Equipos</b></td>

    </tr>';


	$html.='<tr>
	<td bgcolor="'.$color.'">'.@$idparadas.'</td>
	<td bgcolor="'.$color.'">'.@$nombre_subequipo.'</td>

    </tr>';

            $html.='</table>';
	$contador++;
	}



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
$t='<u>Listado de produccion</u>';
$pdf->SetFont('helvetica', 'B', 14);
$pdf->writeHTML($t, true,false, false, false, 'C');
$pdf->SetFont('helvetica', '', 12);
$pdf->ln(20);
$pdf->SetFont('helvetica','', 10);
$pdf->writeHTML($html, true,false, false, false, 'C');
$pdf->ln(5);
$pdf->writeHTMLCell(0, 0, '10', '260', 'Industrias Unicon, C.A  RIF: J-00007702-9, Urbanizacion Industrial La Chapa, La Victoria 2121
Teléfono:0212-7534111 ', 0, 1, 0, true, 'C');
@$pdf->Output('produccion_listado_'.$id.'.pdf', 'I');
?>