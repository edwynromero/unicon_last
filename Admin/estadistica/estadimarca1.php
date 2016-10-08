<?php
include("Includes/FusionCharts.php");
?>


<p align="center"> <div style="background-color:#fff; border:0px solid #745C92; width: 600px;">
    <?php

	$pro=array();
	$cantpro=array();

    $sql="
SELECT * FROM marcas
	 group by IdLubri
     ";
	
	$cursor=mysql_query($sql);
    $num=mysql_num_rows($cursor);	

	
	while($datos=mysql_fetch_array($cursor)){
 

    $sql2="SELECT * FROM marcas where IdLubri='".$datos['IdLubri']."'";
     $cursor2=mysql_query($sql2);
     $num2=mysql_num_rows($cursor2);
	 $pro[]= $datos['Marca'];
	 $cantpro[] =  $datos['estatus'];
	 }
	 
			
    $strXML = "<chart bgAlpha='0,0' canvasBgAlpha='0' caption='Inventario de Marcas' xAxisName='Marcas' yAxisName='Existencia'>";
      for ($i=0; $i < count($cantpro); $i++)
		{
		   $strXML .= "<set label='$pro[$i]' value='$cantpro[$i]' />";    
		}
	  
	     $strXML .= "</chart>";

      
	  echo renderChart("FusionCharts/Pastel3D.swf", "", $strXML, "myFirst", 800, 350, false, true, true);
    ?>