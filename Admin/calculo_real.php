<?php
include("../funciones/librerias.php");
extract($_POST);
$conexion=conectar();

$resultado2=($cantidad*$peso)/1000;


$_SESSION['resultado_real']=$resultado2; 

if($resultado2>0){

$estimado=$_SESSION['resultado_estimado'];

$eficiencia=($cantidad/$estimado)*100;

$eficiencia=round($eficiencia,5);


	if($eficiencia>0){
	
	$sql="insert into eficiencia (tonEstim,tonReal,eficiencia) values ('$estimado','$resultado2','$eficiencia')";
	$res=consultar($sql,$conexion);
	
		if($res){
		
		$informacion='Calculo de Eficiencia';
 		//$usuario=$_SESSION['usuario'];
 		//$id=$_SESSION['usuario_id'];
		
		$usuario='edwin';
		$id=1;
	
		date_default_timezone_set("America/Caracas");
		$hora = date('h:i:s-A',time() - 3600*date('I'));
	
		$dia=date("d");
		$mes=date("m");
		$ano=date("Y");
	
		$fecha=$ano.'/'.$mes.'/'.$dia;
	
 		$sql4="insert into bitacora (id_usuario_bit,usuario_bit,modulo_bit,accion_bit,informacion_bit,fecha_bit,hora_bit,estado_bit) values ('$id','$usuario','Registro de Produccion','Eficiencia','$informacion','$fecha','$hora',1)";
		$res4=consultar($sql4,$conexion);
	
				if($res4){

		
				$_SESSION['resultado']=$eficiencia;

				header("location:sid2.php");
		
				}else{
		
				$_SESSION['msj']='ingreso';

				header("location:sid2.php");
				
				}
		
		}else{
		
		$_SESSION['msj']='ingreso';

		header("location:sid2.php");
		}
	
	
	}else{
	
	$_SESSION['msj']='error';

	header("location:sid2.php");
	
	}

}else{

$_SESSION['msj']='error';

header("location:sid2.php");

}
?>
	