<?php
    include("../funciones/librerias.php");

	$connec = conectar();

	//QUERY PARA OBTENER EL IDPRODUCCION
	$res = "SELECT * FROM eficiencia WHERE id ='$_GET[id]'";
	$sqly = consultar($res, $connec);
	$row = asociativo($sqly);

	$id = $row['idproduccion'];

	$tnE = $row['tonEstim'];
	$tnR = $row['tonReal'];

	function porEfi($te, $tr){

		$efi = ($tr * 100) / $te;
		return $efi;
}

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
		$ins = "UPDATE eficiencia SET idproduccion = '$_POST[idproduccion]', tonEstim = '$_POST[tonEstim]', tonReal = '$_POST[tonReal]'";
		$tre = consultar($ins, $connec);

		header("location: index.php");
	}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	<table cellpadding="3" border="1">
		<tr>
			<th>Turno</th>
			<th>Producto</th>
			<th>Ton. Esti.</th>
			<th>Ton. Reales</th>
			<th>Eficiencia</th>
		</tr>
		<tr>
			<td><?php echo $fila2['numTurno']; ?></td>
			<td><?php echo $fila1['descripcion']; ?></td>
			<td><input type="text" name="tonEstim" required="required" pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" size="10" value="<?php echo $row['tonEstim']; ?>" /></td>
			<td><input type="text" name="tonReal" required="required" pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" size="10" value="<?php echo $row['tonReal']; ?>" /></td>
			<td><?php echo round(porEfi($tnE, $tnR), 2); ?> %</td>
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
			<input type="hidden" name="Pro" value="1" />
		</tr>
		<tr>
			<td align="right" colspan="4"><input type="submit" value="Enviar" /></td>
		</tr>
	</table>
</form>