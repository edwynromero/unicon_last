<div align="center"><fieldset class="formulario2" >
 <legend class="titulo" align="center" style="color:#000"> <strong><font size="4"> Seleccione Categoria a Buscar: </font></strong></legend>

  <form name="form1" method="post" action="inicio.php?gestion=estadimarca">
  <table width="587" height="27">
      <tr>
        <td width="127" height="21" align="right"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Categoria:</strong></td>
        <td width="136"><?php  require_once("select.php");
		   		saca_menu_desplegable("select Id_Cat1,nombre from catego1",$txtusuario,"txtusuario" );
					echo $txtusuario;
			  ?></td>
        <td width="134"><div align="center">
          <input type="submit" name="Submit" value="Consultar">
        </div></td>
        <td width="170">&nbsp;</td>
      </tr>
    </table>
  </form>
  </fieldset>
</div>

 <?php if($_POST) 
{ 
$txtusuario=$_POST['txtusuario'];

?>




<?php
include("Includes/FusionCharts.php");
?>


<p align="center"> <div style="background-color:#fff; border:0px solid #745C92; width: 600px;">
    <?php

	$pro=array();
	$cantpro=array();

    $sql="SELECT * FROM marcas  where id_categoria='$txtusuario' AND estatus=1
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

      
	  echo renderChart("FusionCharts/Columna3D.swf", "", $strXML, "myFirst", 800, 350, false, true, true);
    ?>
	    <?php }?>