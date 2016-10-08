<?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();


$conexion = conectar();

  	// dropdown list para turno
	$tur = "SELECT idturno, numTurno FROM turno";
	$turno = consultar($tur, $conexion);

	//drop down list para maquina
	$maq = "SELECT idmaquina, numeroMaq FROM maquina";
	$maquina = consultar($maq, $conexion);

    //drop down list para supervisor
	$sup = " select nombre, apellido, idpersonal from personal where cargo='Supervisor'";
	$supervisor = consultar($sup, $conexion);

    //drop down list para producto y para codigo
	$pro = "SELECT * FROM productos";
	$productos = consultar($pro, $conexion);

	// dropdown turno
    $dropdown = "<select name='idturno' id='idturno'  required>";
	$dropdown .= "<option value=''>-------</option>";
	while($row = mysql_fetch_assoc($turno)) {
	$dropdown .= "<option value='{$row['idturno']}'>{$row['numTurno']}</option>";
	}
	$dropdown .= "</select>";

    // dropdown maquina

    $dropdown1 = "<select name='idmaquina' id='idmaquina' required onchange=\"input_dos_datos('dato_operador.php','asistencia_ver','idturno','idmaquina')\">";
	$dropdown1 .= "<option value=''>-------</option>";
	while($row1 = mysql_fetch_assoc($maquina)) {
	$dropdown1 .= "<option value='{$row1['idmaquina']}'>{$row1['numeroMaq']}</option>";
	}
	$dropdown1 .= "</select>";

    // dropdown supervisor

    $dropdown2 = "<select name='idpersonal' required >";
	$dropdown2 .= "<option value=''>Nombre | Apellido</option>";
	while($row2 = mysql_fetch_assoc($supervisor)) {
	$dropdown2 .= "<option value='{$row2['idpersonal']}'>{$row2['nombre']} | {$row2['apellido']}</option>";
	}
	$dropdown2 .= "</select>";

$kg = "kg";
$min ="min";

    // dropdown producto || codigo

    $dropdown3 = "<select name='idproductos' id='idproductos' required>";
	$dropdown3 .= "<option value=0>-----------------------------------</option>";
	while($row = mysql_fetch_assoc($productos)) {
	$dropdown3 .= "<option value='{$row['idproductos']}'>{$row['descripcion']} </option>";
	}
	$dropdown3 .= "</select>";


//if ($row1['idmaquina']==1 && $row['idturno'] ==1 ){


  //  $total = 480."Minutos".;
   // }





    ?>
    <script>
   $(document).ready(function(){

        var consulta;

         //hacemos focus al campo de b?squeda

        //comprobamos si se pulsa una tecla
        $("#cargar").click(function(e){
              //obtenemos el texto introducido en el campo de b?squeda
              total = $("#total").val();

              di='carga'+total;
              total = parseInt(total) + 1;
              $("#total").val(total);
              //hace la b?squeda

              $.ajax({
                    type: "POST",
                    url: "carga_parada.php",
                    data:"total="+total,
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petici?n ajax");
                    },
                    success: function(data){
                                    // alert(di);

                         // $("#"+di).empty();
                          $("#"+di).html(data);

                    }
              });


        });

        $("#idturno").change(function(e){
              //obtenemos el texto introducido en el campo de b?squeda
              turno = $("#idturno").val();
              $.ajax({
                    type: "POST",
                    url: "carga_tiempo.php",
                    data:"turno="+turno,
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petici?n ajax");
                    },
                    success: function(data){
                      $("#tt").val(data);

                    }
              });


        });

		
        $("#idproductos").change(function(e){
              //obtenemos el texto introducido en el campo de b?squeda
              orden = $("#idproductos").val();
              $.ajax({
                    type: "POST",
                    url: "carga_orden.php",
                    data:"ordenFabric="+orden,
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petici?n ajax");
                    },
                    success: function(data){
                      $("#ordenFabric").val(data);

                    }
              });


        });

		
        $("#idproductos").change(function(e){
              //obtenemos el texto introducido en el campo de b?squeda
              orden = $("#idproductos").val();
              $.ajax({
                    type: "POST",
                    url: "carga_tiras.php",
                    data:"tirasAProce="+orden,
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petici?n ajax");
                    },
                    success: function(data){
                      $("#tirasAProce").val(data);

                    }
              });


        });

});
</script>
       <?PHP
    if(usuario_conectar()){
  if(usuario_administrador()){
         ?>


<?php echo panel_produccion();

?>


<div id="contenedorform2">

<form method="post" name="Nue_Insc" id="Nue_Insc">

 <div id="tablas" style="width:600px; margin:0 auto;">


<table border="10" 	>
	<tr>
		<td colspan="5" style="text-align:center;" class="titulos" ><h2>CONTROL DE PRODUCCION</h2></td>
	</tr>      </div>



	<tr>
		<td>Fecha: <input type="date" name="fechaPro" required="Ingrese fecha por favor" size="5" /></td>
		<td>Turno:<br />  <?php echo $dropdown ?>

            </td>

		<td>Maquina: <br /> <?php echo $dropdown1 ?>
		</td>
		<td colspan="2">Supervisor: <?php echo $dropdown2 ?>
		</td>
		</tr>
		<tr>
		<td colspan="5" class="titulos"><h2>Descripcion del Producto</h2></td>
		</tr>
		<tr>
		<td colspan="1">Orden de fabricacion: <br> <input type="text" id="ordenFabric" name="ordenFabric" title="Ingrese la orden de fabricacion" maxlength="5" required size="10" onkeypress="return numeros(event)" readonly></td>
		<td colspan="4"> Producto:   <br>
        	<?php echo $dropdown3 ?>



	</tr>
	<tr>
		<td colspan="5" class="titulos"><h2>Clasificacion de Tuberia(Unidades)</h2></td>
	</tr>
	<tr>
		<td>1era Cal: <br> <input type="text" name="cali1" size="10" maxlength="12" required onkeypress="return numerospunto(event)" title="Por favor ingrese un valor." /> </td>
		<td >2da Cal galv: <input type="text" name="cali2" size="10" maxlength="12" required onkeypress="return numerospunto(event)" title="Por favor ingrese un valor." /></td>
		<td >2da Cal neg: <input type="text" name="cali_a2" size="10" maxlength="12" required onkeypress="return numerospunto(event)" title="Por favor ingrese un valor." /></td>
		<td>3ra Cal: <br> <input type="text" name="cali3" size="10" maxlength="12" required onkeypress="return numerospunto(event)" title="Por favor ingrese un valor."  /></td>
		<td colspan="1">Chatarra: <br> <input type="text" name="chat" size="10" maxlength="12" required onkeypress="return numerospunto(event)" title="Por favor ingrese un valor." /></td>

	</tr>
	<tr>
		<td colspan="5" class="titulos"><h2>Control de Tiras(Piezas)</h2></td>
	</tr>
	<tr>
		<td colspan="2">Cantidad de tiras requeridas: <br /> <input type="text" name="tirasAProce" id="tirasAProce"  size="10" maxlength="12" required onkeypress="return numerospunto(event)" readonly /></td>
		<td colspan="3">Cantidad de tiras procesadas:<br /> <input type="text" name="tiraProc" size="10" maxlength="12" required onkeypress="return numerospunto(event)" title="Por favor ingrese un valor." /></td>

	</tr>
	<tr>
		<td colspan="5" class="titulos"><h2>Notificacion de Produccion (Minutos)</h2></td>
	</tr>
	<tr>
		<td>Tiempo total: <input type="text" id="tt" name="tt" size="10" maxlength="12" required value=""  readonly /></td>
    	<td colspan="2">Cambio: <br /> <input type="text" name="tca" size="10" maxlength="12" required onkeypress="return numerospunto(event)" title="Por favor ingrese un valor." /></td>
		<td colspan="2">T. muerto:<br /> <input type="text" name="tmu" size="10" maxlength="12" required onkeypress="return numerospunto(event)" title="Por favor ingrese un valor." /></td>
	</tr>
    <tr>
		<td colspan="5" style="text-align:center;"></td>
	</tr>

    </table>
    <input type="hidden" id="total" name="total" value="0" />

    <input type="button" id="cargar" value="cargar parada" />
     <div id="carga0">

     </div>





    </div> 
	<table border="1" width="600px">
	 
			<td>NOVEDADES DE LA PRODUCCION<BR /><textarea maxlength="900"  rows="10" cols="70"  name="novedades" required title="Por favor ingrese la novedad de la produccion."></textarea></td>
			</table>
    <input type="reset" value="RESTABLECER" name="BORRAR" />  <input type="submit" value="PROCESAR" name="enviar" />
     </form>
     </table>
<?php

  if (isset($_POST['enviar'])){
     echo insert_produccion();
	 echo bitacora4();
header("location:lista_produccion.php");
}  ?>

<?PHP
echo pie2();

}else{
    header("location:index.php");

    }
}else{
header("location:../index.php");

}
?>