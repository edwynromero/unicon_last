<?php
include("funciones_bd.php");
extract($_GET);
$conexion=conectar();

$sql="update personal set estado=0 where idpersonal=$id";
$res=consultar($sql,$conexion);

if($res){

$fecha=date("Y/m/d");

$sql2="insert into asistencias (id_personal_asistencia,fecha_asistencia,estado_asistencia) values ('$id','$fecha',0)";
$res2=consultar($sql2,$conexion);

$informacion='No Asistio';

 	$usuario=$_SESSION['usuario'];
 	$id=$_SESSION['usuario_id'];

	date_default_timezone_set("America/Caracas") ;
	$hora = date('h:i:s-A',time() - 3600*date('I'));

	$dia=date("d");
	$mes=date("m");
	$ano=date("Y");

	$fecha=$ano.'/'.$mes.'/'.$dia;

 	$sql4="insert into bitacora 

(id_usuario_bit,usuario_bit,modulo_bit,accion_bit,informacion_bit,fecha_bit,hora_bit,estado_bit) values 

('$id','$usuario','Asistencias','Control de asistencias','$informacion','$fecha','$hora',1)";
	$res4=consultar($sql4,$conexion);

$_SESSION['msj']='ok';

header("location:sid.php");

}else{

$_SESSION['msj']='no';

header("location:sid.php");

}
?>
	