<?php
include("funciones_bd.php");
extract($_POST);

$resultado=($turnos*0.75*$velocidad)/$longitud;


if($resultado>0){

$_SESSION['resultado_estimado']=$resultado;

header("location:sid2.php");

}else{

$_SESSION['msj']='error';

header("location:sid2.php");

}
?>
	