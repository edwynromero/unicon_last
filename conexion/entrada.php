<?php
include("../funciones/librerias_index.php");
extract($_POST);//Obtengo todos los Datos que vienen via POST y los Guardo en Variables que tienen por nombre el name de cada campo
$usuario= strtoupper($usuario);// convertir a mayuscula
$clave= strtoupper($clave);
$con=0;
if(!empty($usuario) && !empty($clave))
{

	$conexion=conectar();
	//Selecciono Usuario Cuando el Usuario y la Clave Concuerdan
	$sql="select * from personal where UPPER(usuario)='$usuario' and UPPER(clave)= '$clave' ";
	$res=consultar($sql,$conexion);
	$nun = cantidad($res);
	if($nun>0) 	//Verifico si encontro usuario
	{
		$r= asociativo($res);
		$id=$r['id'];
		//Creo Variables de SESSION
		$_SESSION['id_usuario_activo']=$r['id'];
		$_SESSION['usuario_activo']=$r['usuario'];

		$con=1;
	}
	else
	{
		$_SESSION['msj']='Usuario o Clave Incorrectos';
	}
}
else
{
	$_SESSION['msj']='Datos Vacios, por favor verifique';
}

if($con==0)
{
	$_SESSION['error']=true;
	header ("Location: ../admin/index.php");
}
else
{
	header ("Location: ../index.php");
}
?>