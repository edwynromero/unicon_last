<?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();

echo panel_auditoria();
echo reporteAUDITORIA();
if (isset($_GET['Buscar_auditoria'])){
	echo listaBusquedaAUDITORIA();
}

?>