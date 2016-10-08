  <?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();
echo panel_turno();

echo actualizar_turno();
if (isset($_REQUEST['actualizar_turno'])) {
echo insert_updateTurno();
 header('location:lista_turno.php');
    }

echo pie2();
  ?>