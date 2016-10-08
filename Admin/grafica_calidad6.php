<?php
include("../funciones/librerias.php");
include("Includes/FusionCharts.php");
echo cabecera2();
echo menu_vertical();

echo panel_produccion();
?>

 <link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
    <SCRIPT LANGUAGE="Javascript" SRC="FusionCharts/FusionCharts.js"></SCRIPT>

<script>
$(function() {
		$( document ).tooltip({
			position: {
				my: "center bottom-20",
				at: "center top",
				using: function( position, feedback ) {
					$( this ).css( position );
					$( "<div>" )
						.addClass( "arrow" )
						.addClass( feedback.vertical )
						.addClass( feedback.horizontal )
						.appendTo( this );
				}
			}
		});
	});

    $(function() {
		$( "#dialog-message" ).dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$( this ).dialog( "close" );
				}
			}
		});
	});
	</script>
	<style>
	.ui-tooltip, .arrow:after {
		background: black;
		border: 2px solid white;
	}
	.ui-tooltip {
		padding: 10px 20px;
		color: white;
		border-radius: 20px;
		font: bold 14px "Helvetica Neue", Sans-Serif;
		text-transform: uppercase;
		box-shadow: 0 0 7px black;
	}
	.arrow {
		width: 70px;
		height: 16px;
		overflow: hidden;
		position: absolute;
		left: 50%;
		margin-left: -35px;
		bottom: -16px;
	}
	.arrow.top {
		top: -16px;
		bottom: auto;
	}
	.arrow.left {
		left: 20%;
	}
	.arrow:after {
		content: "";
		position: absolute;
		left: 20px;
		top: -20px;
		width: 25px;
		height: 25px;
		box-shadow: 6px 5px 9px -9px black;
		-webkit-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		tranform: rotate(45deg);
	}
	.arrow.top:after {
		bottom: -20px;
		top: auto;
	}
	</style>

    <p align="center"> <div style=" 	background:url(../imagenes/bg.png);  border:0px solid #745C92; width: 900px; margin: 30px 0px 0px 220px;">
    <?php
       $FE1 = $_GET['fechaPro'];
$FE2 = $_GET['fechaPro1'];

    echo" <h1> Tubos de primera calidad </h1>";
     ?>
       <form action="grafica_calidad6.php" method="get">
     <table align="center" border="0">
        <tr>
       <td>Desde:<input type="date" name="fechaPro" /></td>
       <td>Hasta:<input type="date" name="fechaPro1" /></td>
              <td><a href="grafica_calidad1.php" style=" text-decoration: none; color: rgba(11, 11, 11, 1);" title="Grafica principal">Produccion total</a> </td>

       <td><input type="submit" value="Buscar" /></td>
       </tr>


     </table>
     </form>



     <?php

       $conexion = conectar();
   	$pro=array();
	$cantpro=array();

    $sql="
SELECT * FROM produccion group by idturno

     ";

	$cursor=mysql_query($sql);
    $num=cantidad($cursor);

                //utilizar between
	while($datos=mysql_fetch_array($cursor)){
      $idt=$datos['idturno'];

    //$sql2="SELECT * FROM produccion, turno c where idproduccion='".$datos['idproduccion']."' AND  c.idturno='$idt'  and fechaPro='".$_REQUEST['fechaPro']."' ";
$sql2="SELECT sum(cali1) as total, numTurno FROM produccion p, turno c where p.idturno='".$datos['idturno']."'  AND fechaPro BETWEEN '$FE1' AND '$FE2' AND  c.idturno=p.idturno group by numTurno";
     $cursor2=mysql_query($sql2);
     $num2=cantidad($cursor2);
     $r3=asociativo($cursor2);
  @extract($r3);
	 $pro[]= $numTurno;
	 $cantpro[] =  $total;
	 }

                        $turn = "turno";
    $strXML = "<chart bgAlpha='1,1' canvasBgAlpha='0' caption='Grafica de produccion' xAxisName='Turnos' yAxisName='Primera calidad'>";
      for ($i=0; $i < count($cantpro); $i++)
		{
		   $strXML .= "<set label='$turn $pro[$i]' value='$cantpro[$i]' />";
		}

	     $strXML .= "</chart>";


	  echo renderChart("FusionCharts/Columna3D.swf", "", $strXML, "myFirst", 900, 450, false, true, true);
    ?>



	</p>
</div>


<?php
echo pie2();


?>