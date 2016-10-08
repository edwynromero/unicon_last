<?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();
?>

<?php
	$connec = conectar();

	$res = "SELECT * FROM produccion ORDER BY idproduccion DESC";

	$sqly = consultar($res, $connec);

	$row = asociativo($sqly);

	$id = $row[idproduccion];

	// QUERY PARA PRODUCCION
	$sql = "SELECT idproduccion, idturno, idproductos FROM produccion WHERE idproduccion = '$id'";

	$resu = consultar($sql, $connec);

	$fila = asociativo($resu);

	// QUERY PARA PRODUCTOS
	$sql1 = "SELECT descripcion FROM productos WHERE idproductos = '$fila[idproductos]'";

	$resu1 = consultar($sql1, $connec);

	$fila1 = asociativo($resu1);

	//QUERY PARA TURNO
	$sql2 = "SELECT numTurno FROM turno WHERE idturno = '$fila[idturno]'";

	$resu2 = consultar($sql2, $connec);

	$fila2 = asociativo($resu2);

	//QUERY PARA LA INSERCION
	if ($_POST['Pro'] == 1) {
		$ins = "INSERT INTO eficiencia (idproduccion, tonEstim, tonReal) VALUE ('$_POST[idproduccion]', '$_POST[tonEstim]', '$_POST[tonReal]')";
		$tre = consultar($ins, $connec);
	}
    $conexion = conectar();

  	// dropdown list para turno
	$tur = "SELECT idturno, numTurno FROM turno";
	$turno = consultar($tur, $conexion);

  // dropdown turno
    $dropdown = "<select name='idturno' id='idturno' onchange=\"input_dos_datos('dato_operador.php','asistencia_ver','idturno','idmaquina')\" required>";
	$dropdown .= "<option value=''>-------</option>";
	while($row = mysql_fetch_assoc($turno)) {
	$dropdown .= "<option value='{$row['idturno']}'>{$row['numTurno']}</option>";
	}
	$dropdown .= "</select>";



    //drop down list para producto y para codigo
	$pro = "SELECT * FROM productos";
	$productos = consultar($pro, $conexion);



    // dropdown producto || codigo




    $dropdown3 = "<select name='idproductos'>";
	$dropdown3 .= "<option value=0>-----------------------------------</option>";
	while($row = mysql_fetch_assoc($productos)) {
	$dropdown3 .= "<option value='{$row['idproductos']}'>{$row['descripcion']} </option>";
	}
	$dropdown3 .= "</select>";


?>

<div style="overflow:auto; height:430px;">
<div id="contenedorform">

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
     <h1>Formulario de Eficiencia</h1>
	<table cellpadding="3" border="1">
		<tr>
			<th>Turno</th>
			<th>Producto</th>
			<th>Ton. Esti.</th>
			<th>Ton. Reales</th>
		</tr>
		<tr>
			<td><?php echo $dropdown; ?></td>
			<td><?php echo $dropdown3; ?></td>
			<td><input type="text" name="tonEstim" required="required" pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" size="10" /></td>
			<td><input type="text" name="tonReal" required="required" pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" size="10" /></td>
			<input type="hidden" name="idproduccion" value="<?php echo $fila['idproduccion']; ?>" />
			<input type="hidden" name="Pro" value="1" />
		</tr>
		<tr>
			<td align="right" colspan="4"><input type="submit" value="Enviar" /></td>
		</tr>
	</table>
</form>
</div>
   </div>



<?php
echo pie2();


?>