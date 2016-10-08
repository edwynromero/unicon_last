<?php
include("../funciones/librerias_index.php");
include('tcpdf/config/lang/eng.php');
include('tcpdf/tcpdf.php');
 $prod = $_GET['idproduccion'];
          $conexion = conectar();

  $q1= "SELECT * FROM produccion  WHERE idproduccion=" .$prod."";
  $idP = consultar($q1,$conexion);
  $idCP = consultar($q1,$conexion);
  $row= asociativo($idP);
  $maq = $row['idmaquina'];
  $tur = $row['idturno'];
  $produ = $row['idproductos'];
  $per = $row['idpersonal'];



  $q= "SELECT m.numeroMaq, t.numTurno, t.tiempoTurno, p.nombre, p.apellido, pr.descripcion, pr.codigoPrd, pr.ordenFabric, pr.tirasAProce   FROM  maquina m, turno t, personal p, productos pr
        WHERE m.idmaquina='$row[idmaquina]' AND t.idturno='$row[idturno]' AND p.idpersonal='$row[idpersonal]' AND pr.idproductos='$row[idproductos]'";
      $idP1 = consultar($q,$conexion);
      $row1= asociativo($idP1);
  $totalT = $row['cali1'] + $row['cali2'] + $row['cali_a2'] + $row['cali3'];


	if($contador%2==0){
	$color='#EAEAEA';
	}else{
	$color='#FFFFFF';
	}
$q51= "SELECT sum(tiempo) as total2 FROM paproduccion  WHERE idproduccion=" .$prod."";
  $idP2 = consultar($q51,$conexion);
  $row8=asociativo($idP2);
  $q5= "SELECT * FROM paproduccion  WHERE idproduccion=" .$prod."";
  $idP = consultar($q5,$conexion);
 //$row5= asociativo($idP);

  //$pa = $row5['idparadas'];
  //$sub = $row5['idsub_equipo'];
    $html.='<table border="1" >';
	$html.='<tr>
		<td colspan="5" align="center" bgcolor="#666666" color="#FFFFFF"><b>CONTROL DE PRODUCCION</b></td>
	    </tr>';
		

		  $tirasRest =   $row1['tirasAProce'] - $row['tiraProc'];
          $total = $tirasAProce + $tiraProc;


   $totaPro =  $row1['tiempoTurno'] - $row['tmu'] - $row8['total2']  - $row['tca'];

      


        $html.='<tr>
		<td>Fecha: '.$row['fechaPro'].'</td>
		<td>Turno: '.$row1['numTurno'].'</td>
        <td>Maquina: '.$row1['numeroMaq'].' </td>
		<td colspan="2">Supervisor: '.$row1['nombre'].'</td>
		</tr>';
		$html.='<tr>
		<td colspan="5" bgcolor="#666666" color="#FFFFFF"><b>DESCRIPCION DEL PRODUCTO</b></td>
		</tr>';
		$html.='<tr>
		<td colspan="1">Orden de fabricacion: '.$row1['ordenFabric'].'</td>
		<td colspan="4"> Producto:'.'<br/>'.'  '.$row1['descripcion'].'</td>
	    </tr>';
	    $html.='<tr>
		<td colspan="5" bgcolor="#666666" color="#FFFFFF"><b>Clasificacion de Tuberia</b></td>
	    </tr>';
         $html.='<tr>
		<td>1era Cal: '.$row['cali1'].'</td>
		<td>2da Cal galv: '.$row['cali2'].'</td>
		<td>2da Cal neg: '.$row['cali_a2'].'</td>
		<td>3ra Cal: '.$row['cali3'].'</td>
        <td>Total de tubos: '.$totalT.'</td>
	    </tr>';
	    $html.='<tr>
		<td colspan="5" bgcolor="#666666" color="#FFFFFF"><b>Control de Tiras</b></td>
	    </tr>';
	    $html.='<tr>
		<td colspan="2">Cantidad de tiras requeridas: '.$row1['tirasAProce'].'</td>
		<td colspan="2">Cantidad de tiras procesadas: '.$row['tiraProc'].'</td>
		<td>Tiras restantes:'.$tirasRest.'</td>
	    </tr>';
	    $html.='<tr>
		<td colspan="5" bgcolor="#666666" color="#FFFFFF"><b>Notificacion de Produccion (Tiempos min)</b></td>
    	</tr>';
	    $html.='<tr>
		<td>Tiempo total: '.$row1['tiempoTurno'].''.'minutos'.'</td>
		<td>Parada:'.'<br/>'.'  '.$row8['total2'].''.'minutos'.'</td>
		<td>Cambio: '.'<br/>'.' '.@$row['tca'].''.'minutos'.'</td>
		<td>T. muerto:'.'<br/>'.' '.@$row['tmu'].''.'minutos'.'</td>
        <td>T. de produccion: '.$totaPro.''.'minutos'.'</td> </tr>
		<tr>
		<br />
		
	    <td colspan="5" bgcolor="#666666" color="#FFFFFF"><b>NOVEDADES DE LA PRODUCCION:</b></td>
		</tr>
		<tr>
		<td colspan="5">'.'<br/>'.' '.@$row['novedades'].'</td>
		
		</tr>
		';

        $html.='</table><br />';
		

    $html.='<table border="1">';
	
        $html.='<tr>
		<td colspan="3" align="center"> <b>CONTROL DE PARADAS</b>  </td>
	    </tr>';
		while($row5=asociativo($idP)){
  	$contador=1;
	

	if($contador%2==0){
	$color='#EAEAEA';
	}else{
	$color='#FFFFFF';
	}

	   @$sql2="select * from paradas a,sub_equipo b where a.id='{$row5['idparadas']}' and b.id={$row5['idsub_equipo']}";
		$res2=consultar($sql2,$conexion);
		$r2=asociativo($res2);
    /*    	@$sql3="select * from paproduccion";
		$res4=consultar($sql3,$conexion);
		$r3=asociativo($res4);
        @extract($r3);
    */



       $html.='<table border="0" width="100%" align="center">';

	$html.='<tr align="center">
	<td bgcolor="#666666" color="#FFFFFF" align="center"><b>Nombre Paradas</b></td>
	<td bgcolor="#666666" color="#FFFFFF"><b>Nombre Sub-Equipos</b></td>
	<td bgcolor="#666666" color="#FFFFFF"><b>Tiempo de parada</b></td>

    </tr>';


	$html.='<tr>
	<td bgcolor="'.$color.'">'.$r2['nombre_parada'].'</td>
	<td bgcolor="'.$color.'">'.$r2['nombre_subequipo'].'</td>
	<td bgcolor="'.$color.'">'.$row5['tiempo'].'</td>
   
	 
			
		
    </tr>
	
	
	';

            $html.='</table>';
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
$t='<u>Listado de produccion</u>';
$pdf->SetFont('helvetica', 'B', 14);
$pdf->writeHTML($t, true,false, false, false, 'C');
$pdf->SetFont('helvetica', '', 12);
$pdf->ln(20);
$pdf->SetFont('helvetica','', 10);
$pdf->writeHTML($html, true,false, false, false, 'C');
$pdf->ln(5);
$pdf->writeHTMLCell(0, 0, '10', '260', 'Industrias Unicon, C.A  RIF: J-00007702-9, Av. Gran colombia, Zona Industrial La Chapa, La Victoria 2121
Telefono:0244-3221411 ', 0, 1, 0, true, 'C');
@$pdf->Output('produccion_listado_'.$id.'.pdf', 'I');
?>