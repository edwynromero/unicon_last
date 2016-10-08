<?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();
?>
<?php
		$con = conectar();

		// QUERY PARA SACAR IDMAQUINA Y IDTRUNO
		//$idPro = $_GET['idproduccion'];

		$sql = "SELECT * FROM produccion WHERE idproduccion = '$_GET[idproduccion]'";
		$res = consultar($sql, $con);
		$fila = asociativo($res);

		$maq = $fila['idmaquina'];
		$tur = $fila['idturno'];

		//QUERY DE PERSONAL PARA SABER QUIEN TRABAJA EN EL TURNO Y EN LA MAQUINA
		$per = "SELECT * FROM personal WHERE idmaquina = '$maq' AND idturno = '$tur'";
		$res1 = consultar($per, $con);
		$row = asociativo($res1);

		//PARA INSERTAR
		if ($_POST['form'] == 1) {

					$Flag = $_POST['idpersonal'];
			for ($i = 0; $i <= count($Flag)-1; $i++) {
			$ins = "INSERT INTO asistencia (idproduccion, idpersonal, asistio, desAsistencia)
			 VALUE ('$_GET[idproduccion]', '$_GET[idpersonal]', '$_GET[asistio]', '$_GET[desAsistencia]')";
			consultar($ins, $con);
			}
		}


?>



<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
	<table border="1">
		<tr>
			<th>Persona</th>
			<th>Asistio</th>
			<th>Causa</th>
		</tr>
		<?php do { ?>
		<tr>
			<th><?php echo $row['apellido'] . ' ' . $row['nombre'] . ' ' . $row['NFicha']; ?></th>
			<th><input type="checkbox" name="asistio[]" value="s" checked="checked" /><br />
			</th>
			<th><input type="text" name="desAsistencia[]" style="width:100px; height:40px;"/></th>
			<input type="hidden" name="idpersonal[]" />
		</tr>
			<?php } while ($row = asociativo($res1)); ?>
		<tr><td colspan="3"><input type="submit" value="Enviar" /></td></tr>
			<input type="hidden" name="idproduccion" />
			<input type="hidden" name="form" value="1" />
	</table>
</form>





<?php
echo pie2();


?>