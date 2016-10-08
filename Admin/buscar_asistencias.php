<?php
include("funciones_bd.php");
extract($_GET);
$conexion=conectar();

if($seleccion>0){

$sql="select * from personal where idturno='$seleccion' and estado=1";
$sql=$sql." order by nombre";

$res=consultar($sql,$conexion);
$num=cantidad($res);
	
	if($num>0){
	$_SESSION['msjs']='datos';
	$_SESSION['turno']=$seleccion;
	$_SESSION['msj_sql']=$sql;
	header("location:sid.php");
	}else{
	@session_unregister('msjs');
	$_SESSION['msj']='noexiste';
	header("location:sid.php");
	}

}else{
$_SESSION['msj']='vacio';
header("location:sid.php");
}
?>
	