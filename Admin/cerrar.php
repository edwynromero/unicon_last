<?php
                        include("funciones_bd.php");
$conexion=conectar();

$sql="update personal set estado=1";
$res=consultar($sql,$conexion);

if($res){

session_destroy();

header("location:../index.php");

}else{

$_SESSION['msj']='error';

header("location:");

}
                                   ?>