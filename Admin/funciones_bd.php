<?php
@session_start();

//conectar a la base de datos
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
//exucuta una sentencia sql, devuelve un arreglo con el resultado

function consultar($sql,$c)
{
	return mysql_query($sql,$c); 
}
 //cuneta cantidad de registros que contiene el resultdo de ejecutar un sentencia sql
function cantidad($r)
{
	return @mysql_num_rows($r); 
}
//convierte en un arreglo asociativo lis registros que contiene el resultdo de ejecutar un sentencia sql
function asociativo($r)
{
	return @mysql_fetch_array($r); 
}
//cierra una conexion a la base de datos
function cerrar($i)
{
	@mysql_close($i); 
}
