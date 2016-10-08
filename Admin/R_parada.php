 <?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();
 ?>

<?php
                              $conexion = conectar();

    $q = "SELECT idproduccion FROM produccion ORDER BY idproduccion DESC LIMIT 1";
    $idP = mysql_fetch_assoc(mysql_query($q));
    $idPro = $idP['idproduccion'];


  	// dropdown list para paradas
	$par = "SELECT * FROM paradas";
	$parada = consultar($par, $conexion);

   // drown para paradas
    $dropdown = "<select name='idparadas[]' >";
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


<html>

<head>
  <title></title>

<style type="text/css">

#tablas {
	/*margin: 30px 0px 0px 150px;*/
	border-radius: 10px;
}
.titulos {
	text-align:center;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
	font-weight:bold;
}

</style>
</head>

<body>

<div style='overflow:auto; height:630px; width:1200px; margin:0px 0px 0px 232px;'  >
<form action="#" method="post">
        <table border="1" id="tablas"  width="15%" height="80%">
          <tr>
		<td colspan="6" class="titulos"> <h1>CONTROL DE PARADAS</h1>  </td>
	</tr>

        <tr border="2">
            <td colspan="1">CAUSA PARADA</td>
            <td colspan="1">SUB EQUIPO</td>
            <td colspan="1" >TIEMPO</td>

          </tr>

      <?php    for ($i = 0; $i<=10; $i++){ ?>
        <tr> <td> <?php echo $dropdown;?>
		</td>
        <td> <?php echo $dropdown2;?>    </td>
            <td><input type="text" name="tiempo[]" title="Ingrese tiempo de parada" maxlength="12"  size="10"  onkeypress="return numeros(event)" ></td>

          </tr>

       <?php   }   ?>
<tr>

          <input type="hidden" name="idproduccion" value="<?php $idPro  ?>" />
		<td colspan="5" style="text-align:center;"><input type="reset" value="RESTABLECER" name="BORRAR" /> <input type="submit" value="ENVIAR" name="enviar2" /> </td>
	</tr>
        </table>






<?php
if (isset($_POST['enviar2'])){
    insert_produccion();
  echo insert_paradas();
   header('location:lista_produccion.php');
}

echo pie2();

?>

