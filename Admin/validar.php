<?php
@session_start();

include("../funciones/librerias.php");


extract($_GET);

if($turno==1){
$_SESSION['msj']='a';
header("location:R_produccion.php");
}

else if($turno==2){
$_SESSION['msj']='b';
header("location:R_produccion.php");
}

else if($turno==3){
$_SESSION['msj']='c';
header("location:R_produccion.php");
}


?>