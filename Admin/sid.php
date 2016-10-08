<?php
include("../funciones/librerias.php");

@session_start();
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" href="resources/css/style.css" rel="stylesheet" type="text/css">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<title>unicon</title>

	<script>

	function validar_estimado(){

	if(document.estimado.turnos.value==0){
	alert("seleccione turno");
	document.estimado.turnos.focus();
	return false;
	}else if(document.estimado.velocidad.value=='' || document.estimado.velocidad.value==0){
	alert("Ingrese Velocidad");
	document.estimado.velocidad.focus();
	return false;
	}else if(document.estimado.longitud.value==''  || document.estimado.longitud.value==0){
	alert("Ingrese Longitud");
	document.estimado.longitud.focus();
	return false;
	}

	if(confirm('Esta seguro de enviar Datos ?'))
	return true;
	else
	return false;
	}

	function finalizar(){
	if(confirm('Finalizar ?'))
	return true;
	else
	return false;
	}

	function asistencia(){
	if(confirm('Procesar ?'))
	return true;
	else
	return false;
	}

	function validar_real(){

	if(document.real.cantidad.value=='' || document.real.cantidad.value==0){
	alert("Ingrese Cantidad de Tubos");
	document.real.cantidad.focus();
	return false;
	}else if(document.real.peso.value=='' || document.real.peso.value==0){
	alert("Ingrese Peso");
	document.real.peso.focus();
	return false;
	}

	if(confirm('Esta seguro de enviar Datos ?'))
	return true;
	else
	return false;
	}

	function numeros(numero) { // 1
    tecla = (document.all) ? numero.keyCode : numero.which; // 2
   if (tecla==0 || tecla==8 || tecla==46) return true; // 3
   //alert(tecla);
    patron = /\d/; // Solo acepta números
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}



	</script>


	<script language='JavaScript'>
function ChangeUrlTipo(formulaire){
destino = 'buscar_asistencias.php'
if (formulaire.seleccion.selectedIndex != 0)
{location.href = destino + '?seleccion='+formulaire.seleccion.options[formulaire.seleccion.selectedIndex].value;}}
</Script>
<script language="javascript">
function listado_personal(){
	window.open('ver_listado_personal.php','','width=800px,height=700px');
	}
	</script>
	<?php
$conexion = conectar();

	  //drop down list para producto y para codigo
	$pro = "SELECT * FROM productos";
	$productos = consultar($pro, $conexion);
	
	// dropdown producto || codigo

    $dropdown3 = "<select name='idproductos' id='idproductos' required>";
	$dropdown3 .= "<option value=0>-----------------------------------</option>";
	while($row = mysql_fetch_assoc($productos)) {
	$dropdown3 .= "<option value='{$row['idproductos']}'>{$row['descripcion']} </option>";
	}
	$dropdown3 .= "</select>";
 echo cabecera2();
echo menu_vertical();
?>

	<fieldset class="afieldset">
	<legend class="bordes_legend"><b>Control de asistencia</b></legend>
	<table>
	<tr>
	<td>
	<a href="javascript:listado_personal()">Ver Listado</a>
	</td>
	</tr>
	</table>
	<form name="form1" method="post" action="">
	<select name="seleccion" class="estilo_select" onChange='ChangeUrlTipo(this.form)'>
	<option value="0">Seleccionar Turno</option>

	<?php
	$conexion=conectar();
	$sql="select * from turno";
	$sql=$sql." order by numTurno";
	$res=consultar($sql,$conexion);
	$num=cantidad($res);

	if($num>0){
	while($r=asociativo($res)){
	@extract($r);
	?>
	<option value="<?php echo $idturno;?>"  <?php if(@$_SESSION['turno']==$numTurno && @$_SESSION['msjs']=='datos'){?> selected="selected"<?php } ?>><?php echo 'Turno '.$numTurno;?></option>

	<?php
	}

	}
	  
	
	?>

	</select>
	</form>
	<?php
	if(@$_SESSION['msjs']=='datos'){

	$conexion=conectar();
	$sql3=$_SESSION['msj_sql'];
	$res3=consultar($sql3,$conexion);
	$num3=cantidad($res3);

	if($num3>0){
	$contador=1;
	?>

  <style type="text/css">
.datagrid table { border-collapse: collapse; text-align: left; width: 100%;  } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; color: black;  background:url(../imagenes/bg.png);   overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; width:700px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #A3A3A3; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: black; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #EBEBEB; color: black; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #8C8C8C;background: #EBEBEB;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #F5F5F5;border: 1px solid #8C8C8C;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #7D7D7D; color: #F5F5F5; background: none; background-color:#8C8C8C;}
</style>

<div class="datagrid">
<table>
<thead><h1> Asistencia de personal</h1></thead>

  <thead>
    <tr>
    <th>Numero</th>
	<th>Numero de Ficha</th>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Cargo</th>
	<th>Nivel</th>
    <th>Accion</th>


    </tr>
  </thead>
	<?php
	while($r3=asociativo($res3)){
	@extract($r3);
	?>
    <tr <?php echo $i++ % 2 ? 'class=""' : 'class="alt"'; ?>>
	<td><?php echo $contador;?></td>
	<td "active"><?php echo $NFicha;?></td>
	<td><?php echo $nombre;?></td>
	<td "active"><?php echo $apellido;?></td>
	<td><?php echo $cargo;?></td>
	<td "active"><?php echo $nivel;?></td>
	<td>
	<a href="asiste.php?id=<?php echo $idpersonal;?>" onclick="return asistencia();">Asistio</a> /
	<a href="noasiste.php?id=<?php echo $idpersonal;?>" onclick="return asistencia();">No Asistio</a>
	</td>
	</tr>
	<?php
	$contador++;
	}
	?>
	</table>
    </div>
	</fieldset>
	<?php
	}
	}
	?>

	
	<?php			
	
		if($_SESSION['msj']=='noexiste'){
		?>
		<script language="javascript" type="text/javascript">
		alert("No hay personal en ese turno");
		</script>
		<?php
		}
		if($_SESSION['msj']=='vacio'){
		?>
		<script language="javascript" type="text/javascript">
		alert("Ingrese turno");
		</script>
		<?php
		}
		if($_SESSION['msj']=='ok'){
		?>
		<script language="javascript" type="text/javascript">
		alert("Trabajador Procesado");
		</script>
		<?php
		}
		if($_SESSION['msj']=='no'){
		?>
		<script language="javascript" type="text/javascript">
		alert("Error al Procesar");
		</script>
		<?php
		}
		?>
		
		<?php	
		if($_SESSION['msj']=='error'){
		?>
		<script language="javascript" type="text/javascript">
		alert("El resultado es erroneo");
		</script>
		<?php
		}
		if($_SESSION['msj']=='ingreso'){
		?>
		<script language="javascript" type="text/javascript">
		alert("Error no se pudieron registrar los datos por favor intentelo nuevamente");
		</script>
		<?php
		}
		if($_SESSION['msj']=='finalizado'){
		?>
		<script language="javascript" type="text/javascript">
		alert("Calculo Finalizado");
		</script>
		<?php
		}
		?>							

	<?php
	
@session_unregister('msj');

?>

       <?php

echo pie2();
?>