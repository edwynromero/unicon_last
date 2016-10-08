<?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();
echo panel();

echo update_personal();
if (isset($_REQUEST['actualizar_personal'])) {
 echo insert_updatePersonal();
echo bitacora_update_personal();
       header('location:lista_personal.php');
    }
echo pie2();
   ?>