<?php
include("Includes/FusionCharts.php");
?>


<p align="center"> <div style="background-color:#fff; border:0px solid #745C92; width: 600px;">
    <?php
	$conexion=mysql_connect("localhost","root","") or die("Problemas en la conexion");
    mysql_select_db("bd",$conexion) or die("Problemas en la seleccion de la base de datos");

	$pro=array();
	$cantpro=array();

    $sql="
SELECT * FROM catego1
	 group by Id_Cat1
     ";
	
	$cursor=mysql_query($sql);
    $num=mysql_num_rows($cursor);	

	
	while($datos=mysql_fetch_array($cursor)){
 

    $sql2="SELECT * FROM catego1 where Id_Cat1='".$datos['Id_Cat1']."'";
     $cursor2=mysql_query($sql2);
     $num2=mysql_num_rows($cursor2);
	 $pro[]= $datos['nombre'];
	 $cantpro[] =  $datos['status'];
	 }
	 
			
    $strXML = "<chart bgAlpha='0,0' canvasBgAlpha='0' caption='Inventario de Categorias' xAxisName='Categorias' yAxisName='Existencia'>";
      for ($i=0; $i < count($cantpro); $i++)
		{
		   $strXML .= "<set label='$pro[$i]' value='$cantpro[$i]' />";    
		}
	  
	     $strXML .= "</chart>";

      
	  echo renderChart("FusionCharts/Pastel3D.swf", "", $strXML, "myFirst", 800, 350, false, true, true);
    ?>
   