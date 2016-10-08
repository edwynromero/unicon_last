
<?php
include("../funciones/librerias.php");

@session_start();
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" href="resources/css/style.css" rel="stylesheet" type="text/css">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<title>sidepo</title>

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
    patron = /\d/; // Solo acepta nْmeros
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

	</head>
    ?>
<?php
 echo cabecera2();
echo menu_vertical();
?>

	<fieldset class="afieldset">
	<legend class="bordes_legend"><b>Control de asistencia</b></legend>
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

	<option value="<?php echo $numTurno;?>"  <?php if(@$_SESSION['turno']==$numTurno && @$_SESSION['msjs']=='datos'){?> selected="selected"<?php } ?>><?php echo 'Turno '.$numTurno;?></option>

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
	<br />
    <fieldset><legend>Listado Personal</legend>
	<table border="1" align="center">
	<tr align="center">
	<td>N°</td>
	<td>Numero de Ficha</td>
	<td>Nombre</td>
	<td>Apellido</td>
	<td>Cargo</td>
	<td>Nivel</td>
	<td>Accion</td>
	</tr>
	<?php
	while($r3=asociativo($res3)){
	@extract($r3);
	?>
	<tr align="center">
	<td><?php echo $contador;?></td>
	<td><?php echo $NFicha;?></td>
	<td><?php echo $nombre;?></td>
	<td><?php echo $apellido;?></td>
	<td><?php echo $cargo;?></td>
	<td><?php echo $nivel;?></td>
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
	</fieldset>
	<?php
	}
	}
	?>
	</fieldset>
