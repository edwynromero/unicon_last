<?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();
echo panel_productos();

echo actualizar_productos();
if (isset($_REQUEST['actualizar_productos'])) {
 echo insert_updateProducto();

       header('location:lista_productos.php');
    }
echo pie2();

?>