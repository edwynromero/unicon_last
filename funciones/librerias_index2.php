<?php
include("../funciones/librerias.php");
@session_start();

 function conectar()
{
	$idc=mysql_connect('localhost','root','');

	if(!$idc)
	{
	echo 'Error Conectando con Servidor '.mysql_error($idc);
	die();
	}

	$r=mysql_select_db('sidepo',$idc);

	if(!$r)
	{
	echo 'Error Conectando con Base de datos '.mysql_error($idc);
	die();
	}
	return $idc;
}

function consultar($sql,$c)
{
	return @mysql_query($sql,$c); //ejecuta una sentencia sql, devuelve un arreglo con el resultado
}
function cantidad($r)
{
	return @mysql_num_rows($r);  //cuenta cantidad de registros que contiene el resultdo de ejecutar un sentencia sql
}
function asociativo($r)
{
	return @mysql_fetch_array($r);  //cuenta cantidad de registros que contiene el resultado de ejecutar un sentencia sql
}


?>
