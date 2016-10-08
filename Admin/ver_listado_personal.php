<?php
include("../funciones/librerias.php");

@session_start();
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" href="resources/css/style.css" rel="stylesheet" type="text/css">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<title>sidepo</title>
</head>
<body>
	 <?php
	 $conexion=conectar();
	$sql_lis="select * from personal";
	$sql_lis=$sql_lis." order by estado desc";
	$res_lis=consultar($sql_lis,$conexion);
	$num_lis=cantidad($res_lis);
	
	if($num_lis>0){
	$contador_lis=1;
		?>
	<fieldset><legend>Listado Personal (<?php echo date("d/m/Y");?>) <a href="pdf_listapersonal_asistencia.php">Imprimir Listado</a></legend>
	<table border="1" align="center">
	<tr align="center">
	<td>N°</td>
	<td>Numero de Ficha</td>
	<td>Nombre</td>
	<td>Apellido</td>
	<td>Cargo</td>
	<td>Nivel</td>
	<td>Estado</td>
	</tr>
	<?php
	while(@$r_lis=asociativo($res_lis)){
		@extract($r_lis);
		
		if($estado==2){
		$estado_actual='<font color="green">Asistio</font>';
		}else if($estado==0){
		$estado_actual='<font color="red">No Asistio</font>';
		}else{
		$estado_actual='<font color="brown">Ausente</font>';
		}
	?>
	<tr align="center">
	<td><?php echo $contador_lis;?></td>
	<td><?php echo $NFicha;?></td>
	<td><?php echo $nombre;?></td>
	<td><?php echo $apellido;?></td>
	<td><?php echo $cargo;?></td>
	<td><?php echo $nivel;?></td>
	<td><?php echo $estado_actual;?></td>
	</tr>
	<?php
	$contador_lis++;
	}
	?>
	</table>
	</fieldset>
		<?php
		}
		?>
		</body>
		</html>