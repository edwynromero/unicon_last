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


	<fieldset><legend>Calculo Estimado</legend>
	<?php
	$conexion=conectar();
	$sql="select * from turno";
	$res=consultar($sql,$conexion);
	$num=cantidad($res);
	?>
	<table border="1" align="center">
	<form name="estimado" method="post" action="calculo_estimado.php" onsubmit="return validar_estimado();">
	<tr align="center">
	<td>Turno</td>
	<td>Velocidad</td>
	<td>Longitud</td>
	<td>Accion</td>
	</tr>
	<tr>
	<td>
	<select name="turnos">
	<option value="0">-</option>
	<?php
	$sql2="select * from turno";
	$sql2=$sql2." order by numTurno";
	$res2=consultar($sql2,$conexion);
	$num2=cantidad($res2);

	if($num2>0){
	while($r2=asociativo($res2)){
	@extract($r2);
	?>
	<option value="<?php echo $tiempoTurno;?>"><?php echo $numTurno;?></option>
	<?php
	}

	}
	?>
	</select>
	</td>
	<td><input type="text" name="velocidad" size="10" onkeypress="return numeros(event);"></td>
	<td><input type="text" name="longitud" size="10" onkeypress="return numeros(event);"></td>
	<td><input type="submit" value="enviar"></td>
	</tr>
	</form>
	</table>
	</fieldset>
	<?php
	if(@$_SESSION['resultado_estimado']){
	?>
	<br />
	<fieldset><legend>Calculo Real</legend>
	<table border="1" align="center">
	<form name="real" method="post" action="calculo_real.php" onsubmit="return validar_real();">
	<tr align="center">
	<td>Producto</td>
	<td>Peso</td>
	<td>Cant.Tubos</td>
	<td>Accion</td>
	</tr>
	<tr>
	
	<td>
	<?php echo $dropdown3;
		 ?>
</td>
<script>
         $("#idproductos").change(function(e){
              //obtenemos el texto introducido en el campo de b?squeda
              orden = $("#idproductos").val();
              $.ajax({
                    type: "POST",
                    url: "carga_peso.php",
                    data:"pesoProd="+orden,
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petici?n ajax");
                    },
                    success: function(data){
                      $("#pesoProd").val(data);

                    }
              });


        }); </script>

	<td><input type="text" name="peso" size="10" id="pesoProd"  readonly></td>
	<td><input type="text" name="cantidad"  size="10" onkeypress="return numeros(event);"  /></td>
	<td><input type="submit" value="enviar"></td>
	
	</tr>
	</table>
	</fieldset>
	<?php
	}

	if($_SESSION['resultado']){

	$estim=$_SESSION['resultado_estimado'];
	$real=$_SESSION['resultado_real'];
	$efi=$_SESSION['resultado'];
	?>
	<br />
	<fieldset><legend>Resultados</legend>
	<table border="1" align="center">
	<tr>
	<td>Calculo Estimado:</td><td><?php echo $estim;?></td>
	</tr>
	<tr>
	<td>Calculo Real:</td><td><?php echo $real;?></td>
	</tr>
	<tr>
	<td>Eficiencia:</td><td><?php echo $efi.' % ';?></td>
	</tr>
	<tr align="center">
	<td colspan="2">
	<a href="finalizar_calculo.php" onclick="return finalizar();">Finalizar</a>
	</td>
	</tr>
	</table>
	<br />
	</fieldset>
	<?php
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