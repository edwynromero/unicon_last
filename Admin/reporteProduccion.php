<?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();

echo panel_produccion();
echo reporteProduccion();
if (isset($_GET['fechaPro'])){
	echo listaBusquedaProduccion();
}
echo pie2();


?>