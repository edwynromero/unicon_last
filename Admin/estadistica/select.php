<?php require_once("tienda.php");

	function saca_menu_desplegable($ssql,$valor,$nombre){
   		 echo "<select name='$nombre'>";
    		 $resultado=mysql_query($ssql);
   		 while ($fila=mysql_fetch_row($resultado)){
     	  		if ($fila[0]==$valor){
    	    		 echo "<option selected value='$fila[0]'>$fila[1]";
    	  		 }
    	 		 else{
     	    			echo "<option value='$fila[0]'>$fila[1]";
     	 		 }
  		}
   	echo "</select>";
	}

//***********a ver si logro que coloque el nombre y el apellido del supervisor
	function saca_menu_desplegable1($ssql,$valor,$nombre){
   	 	echo "<select name='$nombre'>";
    		$resultado=mysql_query($ssql);
   		while ($fila=mysql_fetch_row($resultado)){
     	 		 if ($fila[0]==$valor){
    	   			echo "<option selected value='$fila[0]'>$fila[1] $fila[2]";
    	 		  }
    			  else{
     	  			echo "<option value='$fila[0]'>$fila[1] $fila[2]";
     	 		 }
  		}
   		echo "</select>";
	}

//FUNCION PARA CAMBIAR EL FORMATO DE LA FECHA AL FORMATO DE MYSQL
	function cambiaf_a_mysql($fecha){
	    ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);
	    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
	    return $lafecha;
	}
//FUNCION PARA CAMBIAR EL FORMATO DE LA FECHA AL FORMATO NORMAL
    function cambiaf_a_normal($fecha){
    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
    $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
    return $lafecha;
}

//Funcion para comparar fechas
function compara_fechas($fecha1,$fecha2){
      if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha1))
           list($dia1,$mes1,$año1)=split("/",$fecha1);
      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha1))
              list($dia1,$mes1,$año1)=split("-",$fecha1);
      if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha2))
              list($dia2,$mes2,$año2)=split("/",$fecha2);
      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha2))
              list($dia2,$mes2,$año2)=split("-",$fecha2);
        $dif = mktime(0,0,0,$mes1,$dia1,$año1) - mktime(0,0,0, $mes2,$dia2,$año2);
        return ($dif);
}
//diferencia en dias entre 2 fechas
function resta_fechas($fecha1,$fecha2){
      if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha1))
              list($dia1,$mes1,$año1)=split("/",$fecha1);
      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha1))
              list($dia1,$mes1,$año1)=split("-",$fecha1);
        if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha2))
              list($dia2,$mes2,$año2)=split("/",$fecha2);
      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha2))
              list($dia2,$mes2,$año2)=split("-",$fecha2);
        $dif = mktime(0,0,0,$mes1,$dia1,$año1) - mktime(0,0,0,$mes2,$dia2,$año2);
      $ndias=floor($dif/(24*60*60));
      return($ndias);
}
?>