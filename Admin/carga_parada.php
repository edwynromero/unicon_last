<?php
include("../funciones/librerias.php");
$conexion = conectar();


  	// dropdown list para paradas
	$par = "SELECT * FROM paradas";
	$parada = consultar($par, $conexion);

   // drown para paradas
    $dropdown = "<select name='idparadas[]' style='width: 100px' >";
	$dropdown .= "<option value=''>-------------------------------</option>";
	while($row = mysql_fetch_assoc($parada)) {
	$dropdown .= "<option value='{$row['id']}'>{$row['nombre_parada']}</option>";
	}
	$dropdown .= "</select>";


    // dropdown list para paradas
	$par2 = "SELECT * FROM sub_equipo";
	$parada2 = consultar($par2, $conexion);

   // drown para paradas

    $dropdown2 = "<select name='idsub_equipo[]' >";
	$dropdown2 .= "<option value=''>-------------------------------</option>";
	while($row = mysql_fetch_assoc($parada2)) {
	$dropdown2 .= "<option value='{$row['id']}'>{$row['nombre_subequipo']}</option>";
	}
	$dropdown2 .= "</select>";
    ?>
       <table border=1>
       <?php if ($_POST['total']==1 ){
       ?>
                                  <tr>
       <td width='150px'>CAUSA PARADA</td>
            <td width='150px'>SUB EQUIPO</td>
            <td >TIEMPO</td>


     </tr>
       <?php
       }

        ?>
     <tr> <td width='150px'> <?php echo $dropdown;?>
		</td>
        <td width='150px'> <?php echo $dropdown2;?>    </td>
            <td ><input type="text" name="tiempo[]" title="Ingrese tiempo de parada" maxlength="12"  size="4"  onkeypress="return numeros(event)" ></td>

          </tr>

          </table>
          <div id="carga<?php echo $_POST['total']; ?>">
          </div>