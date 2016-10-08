<?php
include("../funciones/librerias.php");
$conexion = conectar();
$idproductos = $_POST['pesoProd'];
if(isset($idproductos) && $idproductos > 0){

   	$par = "SELECT * FROM productos WHERE idproductos = $idproductos ";
	$parada = consultar($par, $conexion);
   $row = asociativo($parada);
  echo	$row['pesoProd'];}
  else echo '';
    ?>