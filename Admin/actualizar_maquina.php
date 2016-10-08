<?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();
echo panel_maquina();

echo actualizar_maquina();
if (isset($_REQUEST['actualizar_maquina'])) {
  echo insert_updateMaquina();
   header('location:lista_maquina.php');
    }
echo pie2();
  ?>