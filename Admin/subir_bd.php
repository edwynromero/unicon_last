<?php
//include ("Auto.php");
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();
?>
<script language="javascript">
function validar_restauracion(){
if(confirm("esta seguro de restaurar la base de datos?")){
return true;
else
return false;
}
</script>
<br />
	<fieldset style="width:80%">
	<form name="eleccion_bd" method="post" action="subir_bd_accion.php" onsubmit="return validar_restauracion()">
	<input type="file" name="nombre_bd">
	<input type="submit" value="subir">
	</form>
	</fieldset>
<?php
echo pie2();
?>