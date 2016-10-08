<?php
    include("../funciones/librerias.php");

	$connec = conectar();
	
	// QUERY PARA PRODUCCION
	$sql = "SELECT idproduccion, idturno, idproductos FROM produccion WHERE idproduccion = '$_GET[idproduccion]'";
    
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
	
	//QUERY PARA EFICIENCIA
	$sql3 = "SELECT * FROM eficiencia WHERE idproduccion = '$fila[idproduccion]'";
	
	$resu3 = consultar($sql3, $connec);
	
	$fila3 = asociativo($resu3);	

	$tnE = $fila3['tonEstim'];
	$tnR = $fila3['tonReal'];

	function porEfi($te, $tr){
		
		$efi = ($tr * 100) / $te;
		return $efi;
}
?>

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
		<td><?php echo $tnE; ?></td>
		<td><?php echo $tnR; ?></td>
		<td><?php echo round(porEfi($tnE, $tnR), 2); ?> %</td>
	</tr>
</table>