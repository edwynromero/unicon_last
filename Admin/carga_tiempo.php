<?php
include("../funciones/librerias.php");
$conexion = conectar();
$idTiempo = $_POST['turno'];
if(isset($idTiempo) && $idTiempo > 0){

   	$par = "SELECT * FROM turno WHERE idturno = $idTiempo ";
	$parada = consultar($par, $conexion);
   $row = mysql_fetch_assoc($parada);
  echo	$row['tiempoTurno'];}
  else echo '';
    ?>