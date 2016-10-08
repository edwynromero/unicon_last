<?php
    include("librerias_index.php");
function entrar(){

session_start();

$usuario = $_POST['usuario'];
$clave  =  $_POST['clave'];

$conexion=conectar();
$sql =("SELECT * FROM personal  WHERE usuario = '$usuario' and clave = '$clave' ");

$resul = consultar($sql, $conexion);

$fila = asociativo($resul);

@extract($fila);

$usu = $usuario;
$cla = $clave;
$nivel = $nivel;
$idp = $idpersonal;

$_SESSION['usuario']=$usuario;
$_SESSION['usuario_id']=$idpersonal;
$_SESSION['nivel']=$nivel;

if (($usuario == $usu) && ($clave == $cla)) {




    if ($nivel == "A")
    {

		$_SESSION['aut'] = 'Admin';
   @		$_SESSION['uid'] = $idp;
       	header('location:Admin/index.php');
	}
    else if ($nivel == "B")
    {
       header('location:admin/index.php');
    }


else {
	echo "<h1 style='color:red'>SU USUARIO O CLAVE NO ES CORRECTA</h1>";
}

}
}

function usuario_conectar(){
    if(isset($_SESSION['usuario_id']) && $_SESSION['usuario_id']>0)
    return true;
    else
    return false;
    }

     function usuario_administrador(){
    if(isset($_SESSION['nivel']) && $_SESSION['nivel']=='A')
    return true;
    else
    return false;
    }

      function usuario_empleado(){
    if(isset($_SESSION['nivel']) && $_SESSION['nivel']=='B')
    return true;
    else
    return false;
    }
function bitacora4(){

     $conexion=conectar();
$sup = " select * from personal";
	$supervisor = consultar($sup, $conexion);
     $reg = asociativo($supervisor);
	 extract($reg);

    $informacion='Nuevo Registro Produccion ';

 	$usuario=$_SESSION['usuario'];
 	$id=$_SESSION['usuario_id'];

	date_default_timezone_set("America/Caracas") ;
	$hora = date('h:i:s-A',time() - 3600*date('I'));

	$dia=date("d");
	$mes=date("m");
	$ano=date("Y");

	$fecha=$ano.'/'.$mes.'/'.$dia;

 	$sql4="insert into bitacora (id_usuario_bit,usuario_bit,modulo_bit,accion_bit,informacion_bit,fecha_bit,hora_bit,estado_bit) values ('$id','$usuario','PRODUCCION','Registro de Produccion','$informacion','$fecha','$hora',1)";
	$res4=consultar($sql4,$conexion);



mysql_close($conexion);


}

function atras(){


echo " <input type='button' value='<--Atras' onClick='history.go(-1);'>  ";



}

function adelante(){


echo " <input type='button' value='adelante-->' onClick='history.go(1);'> ";



}

function bitacoraProductos(){

     $conexion=conectar();


    $informacion='Nuevo Registro Producto: '.$_REQUEST['descripcion'];
 	$usuario=$_SESSION['usuario'];
 	$id=$_SESSION['usuario_id'];

	date_default_timezone_set("America/Caracas") ;
	$hora = date('h:i:s-A',time() - 3600*date('I'));

	$dia=date("d");
	$mes=date("m");
	$ano=date("Y");

	$fecha=$ano.'/'.$mes.'/'.$dia;

 	$sql4="insert into bitacora (id_usuario_bit,usuario_bit,modulo_bit,accion_bit,informacion_bit,fecha_bit,hora_bit,estado_bit) values ('$id','$usuario','Productos','Registro productos','$informacion','$fecha','$hora',1)";
	$res4=consultar($sql4,$conexion);



mysql_close($conexion);



}

function bitacora_update_personal(){

     $conexion=conectar();


    $informacion='Actualizo Personal: '.$_REQUEST['nombre'];
 	$usuario=$_SESSION['usuario'];
 	$id=$_SESSION['usuario_id'];

	date_default_timezone_set("America/Caracas") ;
	$hora = date('h:i:s-A',time() - 3600*date('I'));

	$dia=date("d");
	$mes=date("m");
	$ano=date("Y");

	$fecha=$ano.'/'.$mes.'/'.$dia;

 	$sql4="insert into bitacora (id_usuario_bit,usuario_bit,modulo_bit,accion_bit,informacion_bit,fecha_bit,hora_bit,estado_bit) values ('$id','$usuario','Personal','Actualizo personal','$informacion','$fecha','$hora',1)";
	$res4=consultar($sql4,$conexion);



mysql_close($conexion);



}

function bitacora2(){

     $conexion=conectar();


    $informacion='Nuevo Registro Personal: '.$_REQUEST['nombre'];
 	$usuario=$_SESSION['usuario'];
 	$id=$_SESSION['usuario_id'];

	date_default_timezone_set("America/Caracas") ;
	$hora = date('h:i:s-A',time() - 3600*date('I'));

	$dia=date("d");
	$mes=date("m");
	$ano=date("Y");

	$fecha=$ano.'/'.$mes.'/'.$dia;

 	$sql4="insert into bitacora (id_usuario_bit,usuario_bit,modulo_bit,accion_bit,informacion_bit,fecha_bit,hora_bit,estado_bit) values ('$id','$usuario','Personal','Registro Personal','$informacion','$fecha','$hora',1)";
	$res4=consultar($sql4,$conexion);



mysql_close($conexion);



}

function bitacora()
{
    $conexion=conectar();

 $informacion='Inicio Sesion el Usuario: '.$_SESSION['usuario'];
 	$usuario=$_SESSION['usuario'];
 	$id=$_SESSION['usuario_id'];

	date_default_timezone_set("America/Caracas") ;
	$hora = date('h:i:s-A',time() - 3600*date('I'));

	$dia=date("d");
	$mes=date("m");
	$ano=date("Y");

	$fecha=$ano.'/'.$mes.'/'.$dia;

   	$sql4="insert into bitacora (id_usuario_bit,usuario_bit,modulo_bit,accion_bit,informacion_bit,fecha_bit,hora_bit,estado_bit) values ('$id','$usuario','Login','Inicio Sesion','$informacion','$fecha','$hora',1)";

   $res=consultar($sql4,$conexion);

mysql_close($conexion);



}

function cabecera2()
{
/*	if(isset($_SESSION['usuario_activo'])) $user=$_SESSION['usuario_activo'];
	else $user=' NO IDENTIFICADO';*/
	$html='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
	<script src="../js/funciones.js"></script>

<script type="text/javascript">

     $(function() {
		$( "#dialog-message" ).dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$( this ).dialog( "close" );
				}
			}
		});
	});



function vacio(k)
{
	if(k.value == null || k.value.length == 0 || /^\s+$/.test(k.value))
	{
		k.value ="";
		k.focus();
		alert("El Campo "+k.name+" no puede estar Vacio Verifiquelo!!!");
		return false;
	}
	else
	{
		return true;
	}
}

function numero(k)
{
	if(isNaN(k.value))
	{
		k.focus();
		alert("Lo sentimos el Campo: "+k.name+" No puede contener Caracteres verifiquelo!!!");
		return false;
	}
	else
	{
		return true;
	}
}

function seleccionar(a)
{
	if(a.selectedIndex==0)
	{
		a.focus();
		alert("Lo sentimos el Campo "+a.name+" Debe ser Seleccionado verifiquelo!!!");
		re=false;
	}
	else re=true;
	return re;
}
function letras(letra) { // 1
    tecla = (document.all) ? letra.keyCode : letra.which; // 2
    if (tecla==0 || tecla==8) return true; // 3
    patron =/[A-Za-�z??\s]/; // igual que el ejemplo,
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}
function numeros(numero) { // 1
    tecla = (document.all) ? numero.keyCode : numero.which; // 2
   if (tecla==0 || tecla==8) return true; // 3
   //alert(tecla);
    patron = /\d/; // Solo acepta n?meros
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}
function numerospunto(numero) { // 1 solo numeros y coma
    tecla = (document.all) ? numero.keyCode : numero.which; // 2
   if (tecla==0 || tecla==8 || tecla==44) return true; // 3
  // alert(tecla);vvvvvv
    patron = /\d/; // Solo acepta n?meros
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

  



function validar_inscripcion()
{
	res= false;
	//if(vacio(document.Nue_Insc.Cedula_Estudiante))
	//if(numero(document.Nue_Insc.Cedula_Estudiante))
	if(vacio(document.Nue_Insc.nombre))
	if(vacio(document.Nue_Insc.Apellido_Estudiante))
	if(seleccionar(document.Nue_Insc.Edad))
	{
		msj= "Deseas Registrar los datos del Estudiante "+document.Nue_Insc.nombre.value;
		res= confirm(msj);
	}
	return res;
}

/*
*/



</script>
      <style type="text/css">


      .datagrid-perfil table { border-collapse: collapse; text-align: left; width: 100%; }
.datagrid-perfil {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #006699; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 13px; width :500px; margin: 30px 0px 0px 250px;    }
.datagrid-perfil table td,
.datagrid-perfil table th { padding: 3px 10px; }
.datagrid-perfil table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8C8C8C", endColorstr="#7D7D7D");background-color:#8C8C8C; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #A3A3A3; }
.datagrid-perfil table thead th:first-child { border: none; }
.datagrid-perfil table tbody td { color: #00496B; border-left: 1px solid #E1EEF4;font-size: 12px;font-weight: normal; }
.datagrid-perfil table tbody .alt td { background: #E1EEF4; color: #00496B; }
.datagrid-perfil table tbody td:first-child { border-left: none; }
.datagrid-perfil table tbody tr:last-child td { border-bottom: none; }


.datagrid-produccion table { border-collapse: collapse; text-align: center; width: 100%; }
.datagrid-productos {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff;
margin: 30px 0px 0px 250px;
width :800px; overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px;
}
.datagrid-productos table td, .datagrid table th { padding: 3px 10px; }
.datagrid-productos table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8C8C8C", endColorstr="#7D7D7D");
background-color:#8C8C8C;
 color:#FFFFFF; font-size: 15px;
  font-weight: bold; border-left: 1px solid #A3A3A3; }
   .datagrid-productos table thead th:first-child { border: none; }
   .datagrid-productos table tbody td { color: #7D7D7D; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }
.datagrid-productos table tbody .alt td { background: #EBEBEB; color: #7D7D7D; }.datagrid-productos table tbody td:first-child { border-left: none; }
.datagrid-productos table tbody tr:last-child td { border-bottom: none; }




.datagrid-productos table { border-collapse: collapse; text-align: center; width: 100%; }
.datagrid-productos {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff;
margin: 30px 0px 0px 250px;
width :800px; overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px;
}
.datagrid-productos table td, .datagrid table th { padding: 3px 10px; }
.datagrid-productos table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8C8C8C", endColorstr="#7D7D7D");
background-color:#8C8C8C;
 color:#FFFFFF; font-size: 15px;
  font-weight: bold; border-left: 1px solid #A3A3A3; }
   .datagrid-productos table thead th:first-child { border: none; }
   .datagrid-productos table tbody td { color: #7D7D7D; border-left: 1px solid #DBDBDB;font-size: 18px;font-weight: normal; }
.datagrid-productos table tbody .alt td { background: #EBEBEB; color: #7D7D7D; }.datagrid-productos table tbody td:first-child { border-left: none; }
.datagrid-productos table tbody tr:last-child td { border-bottom: none; }

.datagrid_auditoria table { border-collapse: collapse; text-align: center; width: 100%; }
.datagrid_auditoria {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff;
margin: 30px 0px 0px 250px;
width :800px; overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px;
}
.datagrid_auditoria table td,
.datagrid_auditoria table th { padding: 3px 10px; }
.datagrid_auditoria table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8C8C8C", endColorstr="#7D7D7D");
background-color:#8C8C8C;
 color:#FFFFFF; font-size: 15px;
  font-weight: bold; border-left: 1px solid #A3A3A3; }
   .datagrid_auditoria table thead th:first-child { border: none; }
   .datagrid_auditoria table tbody td { color: #7D7D7D; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }.datagrid_auditoria table tbody .alt td { background: #EBEBEB; color: #7D7D7D; }.datagrid_auditoria table tbody td:first-child { border-left: none; }.datagrid_auditoria table tbody tr:last-child td { border-bottom: none; }




.datagrid table { border-collapse: collapse; text-align: center; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #006699; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; width:800px; margin: 30px 0px 0px 250px; }
.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#006699, endColorstr=#00557F);background-color:#006699; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #0070A8; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #00496B; border-left: 1px solid #E1EEF4;font-size: 18px;font-weight: normal; }.datagrid table tbody .alt td { background: #E1EEF4; color: #00496B; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }
.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#006699, endColorstr=#00557F);background-color:#006699; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #0070A8; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #00496B; border-left: 1px solid #E1EEF4;font-size: 18px;font-weight: normal; }.datagrid table tbody .alt td { background: #E1EEF4; color: #00496B; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }


.datagrid_registro table { border-collapse: collapse; text-align: center; width: 100%; }
.datagrid_registro {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff;
margin: 30px 0px 0px 250px;
width :800px; overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px;
}
.datagrid_registro table td, .datagrid table th { padding: 3px 10px; }
.datagrid_registro table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8C8C8C", endColorstr="#7D7D7D");
background-color:#8C8C8C;
 color:#FFFFFF; font-size: 15px;
  font-weight: bold; border-left: 1px solid #A3A3A3; }
   .datagrid_registro table thead th:first-child { border: none; }
   .datagrid_registro table tbody td { color: #7D7D7D; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }
.datagrid_registro table tbody .alt td { background: #EBEBEB; color: #7D7D7D; }.datagrid table tbody td:first-child { border-left: none; }
.datagrid_registro table tbody tr:last-child td { border-bottom: none; }


#contenedorform2 {

	width:740px;
border-radius: 12px;
  margin-left:250px;
  margin-top:-90px;
  /*background-color:white;*/
  padding:10px 0 10px 0;
  font-weight: bold;
  
}
#contenedorform3 {

	width:600px;
border-radius: 12px;
  margin-left:350px;
  margin-top:51px;
  /*background-color:white;*/
  padding:10px 0 10px 0;
}


input, textarea, select {


    background: #2d2d2d;
    background: rgba(45,45,45,.15);
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    border: 1px solid #3d3d3d;
     border: 1px solid rgba(255,255,255,.15);
    -moz-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
    -webkit-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
    box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;

    font-size: 18px;
    color: BLACK;
    text-shadow: 0 1px 2px rgba(0,0,0,.1);
    -o-transition: all .2s;
    -moz-transition: all .2s;
    -webkit-transition: all .2s;
    -ms-transition: all .2s;
}

input:-moz-placeholder { color: #fff; }
input:-ms-input-placeholder { color: #fff; }
input::-webkit-input-placeholder { color: #fff; }

input:focus {
    outline: none;
    -moz-box-shadow:
        0 2px 3px 0 rgba(0,0,0,.1) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    -webkit-box-shadow:
        0 2px 3px 0 rgba(0,0,0,.1) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    box-shadow:
        0 2px 3px 0 rgba(0,0,0,.1) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
}



#contenedorform {

	width:100px;
border-radius: 12px;
  margin-left:350px;
  margin-top:-10px;
  /*background-color:white;*/
  padding:10px 0 10px 0;
}




fieldset {
border-radius:20px;
}
body{
	background:url(../imagenes/unicont.png);
}
</style>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/estilos.css" type="text/css"/>

<title>Control de producci&oacute;n de Unicon</title>


</head>

<body>
<div id="contenedor">
	<div id="cabecera">

		 </div>';
	return $html;
}  
function calendario(){
$cal='

        <link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>

     <style>

    #content{
  color: (255, 255, 240, 1);
 margin: -50px 0px 0px 960px;

border-radius: 20px;
border-collapse: collapse;
opacity: 9;
 	width: 250px;
	height:250px;

    }


	.ui-tooltip, .arrow:after {
		background: black;
		border: 2px solid white;
	}
	.ui-tooltip {
		padding: 10px 20px;
		color: white;
		border-radius: 20px;
		font: bold 14px "Helvetica Neue", Sans-Serif;
		text-transform: uppercase;
		box-shadow: 0 0 7px black;
	}
	.arrow {
		width: 70px;
		height: 16px;
		overflow: hidden;
		position: absolute;
		left: 50%;
		margin-left: -35px;
		bottom: -16px;
	}
	.arrow.top {
		top: -16px;
		bottom: auto;
	}
	.arrow.left {
		left: 20%;
	}
	.arrow:after {
		content: "";
		position: absolute;
		left: 20px;
		top: -20px;
		width: 25px;
		height: 25px;
		box-shadow: 6px 5px 9px -9px black;
		-webkit-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		tranform: rotate(45deg);
	}
	.arrow.top:after {
		bottom: -20px;
		top: auto;
	}
    </style>
      <script>
	$(function() {
		$( "#content" ).datepicker();
	});
    $(function() {
		$( document ).tooltip({
			position: {
				my: "center bottom-20",
				at: "center top",
				using: function( position, feedback ) {
					$( this ).css( position );
					$( "<div>" )
						.addClass( "arrow" )
						.addClass( feedback.vertical )
						.addClass( feedback.horizontal )
						.appendTo( this );
				}
			}
		});
	});

	</script>

 <div id="content"></div>';


	return $cal;

}
 function calendario2(){
$cal='

        <link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>

     <style>

    #content{
  color: (255, 255, 240, 1);
border-radius: 200px;
border-collapse: collapse;
opacity: 9;
 	width: 230px;
	height:250px;
	margin-left:-6px;

    }


	.ui-tooltip, .arrow:after {
		background: black;
		border: 2px solid white;
	}
	.ui-tooltip {
		padding: 10px 20px;
		color: white;
		border-radius: 20px;
		font: bold 14px "Helvetica Neue", Sans-Serif;
		text-transform: uppercase;
		box-shadow: 0 0 7px black;
	}
	.arrow {
		width: 70px;
		height: 16px;
		overflow: hidden;
		position: absolute;
		left: 50%;
		margin-left: -35px;
		bottom: -16px;
	}
	.arrow.top {
		top: -16px;
		bottom: auto;
	}
	.arrow.left {
		left: 20%;
	}
	.arrow:after {
		content: "";
		position: absolute;
		left: 17px;
		top: -20px;
		width: 25px;
		height: 25px;
		box-shadow: 6px 5px 9px -9px black;
		-webkit-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		tranform: rotate(45deg);
	}
	.arrow.top:after {
		bottom: -20px;
		top: auto;
	}
    </style>
      <script>
	$(function() {
		$( "#content" ).datepicker();
	});
    $(function() {
		$( document ).tooltip({
			position: {
				my: "center bottom-20",
				at: "center top",
				using: function( position, feedback ) {
					$( this ).css( position );
					$( "<div>" )
						.addClass( "arrow" )
						.addClass( feedback.vertical )
						.addClass( feedback.horizontal )
						.appendTo( this );
				}
			}
		});
	});

	</script>


 <div id="content"></div>';
	return $cal;

}
function timess(){

	$html='<script type="text/javascript">
function startTime(){
today=new Date();
h=today.getHours();
m=today.getMinutes();
s=today.getSeconds();
m=checkTime(m);
s=checkTime(s);
document.getElementById("reloj").innerHTML=h+":"+m+":"+s;
t=setTimeout("startTime()",500);}
function checkTime(i)
{if (i<10) {i="0" + i;}return i;}
window.onload=function(){startTime();}
</script>
<div id="reloj" style="font-size:20px;"></div>

';

	return $html;
}
function layout_admin()
{
   	$conexion = conectar();

 $sql=" SELECT * FROM personal ";
$query = consultar($sql, $conexion);
$z= asociativo($query);
extract($z);
$usuario=$_SESSION['usuario'];
 	$idpersonal=$_SESSION['usuario_id'];
     $nivel=$_SESSION['nivel'];


$layout='
<table border="1">
<tr>
<td>Usuario:  ' .$usuario.'</td>

</tr>
<tr>
<td>Nivel: ' .$nivel.' </td>

</tr>

</table>

';
return $layout;
}
function marcoder(){
?>

 <link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>

     <style>

    #content{
  color: (255, 255, 240, 1);
border-radius: 200px;
border-collapse: collapse;
opacity: 9;
 	width: 230px;
	height:250px;
	margin-left:-6px;

    }


	.ui-tooltip, .arrow:after {
		background: black;
		border: 2px solid white;
	}
	.ui-tooltip {
		padding: 10px 20px;
		color: white;
		border-radius: 20px;
		font: bold 14px "Helvetica Neue", Sans-Serif;
		text-transform: uppercase;
		box-shadow: 0 0 7px black;
	}
	.arrow {
		width: 70px;
		height: 16px;
		overflow: hidden;
		position: absolute;
		left: 50%;
		margin-left: -35px;
		bottom: -16px;
	}
	.arrow.top {
		top: -16px;
		bottom: auto;
	}
	.arrow.left {
		left: 20%;
	}
	.arrow:after {
		content: "";
		position: absolute;
		left: 17px;
		top: -20px;
		width: 25px;
		height: 25px;
		box-shadow: 6px 5px 9px -9px black;
		-webkit-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		tranform: rotate(45deg);
	}
	.arrow.top:after {
		bottom: -20px;
		top: auto;
	}
    </style>
      <script>
	$(function() {
		$( "#content" ).datepicker();
	});
    $(function() {
		$( document ).tooltip({
			position: {
				my: "center bottom-20",
				at: "center top",
				using: function( position, feedback ) {
					$( this ).css( position );
					$( "<div>" )
						.addClass( "arrow" )
						.addClass( feedback.vertical )
						.addClass( feedback.horizontal )
						.appendTo( this );
				}
			}
		});
	});

	</script>


 <div id="content"></div>

<?php
}
function menu_vertical()
{
	$html=' <div id="menu">
<div id="cssmenu">
<ul>
   <li class="active"><a href="#"><span><img src="../imagenes/home.png" title="Inicio" WIDTH=29 HEIGHT=16></img>Unicon </span></a>
   <ul>
        <li><a href="index.php"><span></span>Inicio </a></li>
        </ul>

  </li>
   <li class="has-sub"><a href="#"><span><img src="../imagenes/registros.png" title="Registrar"   WIDTH=16 HEIGHT=16></img>Registros</span></a>
      <ul>
         <li><a href="R_personal.php"><span>Registro de personal</span></a>
		 
		 </li>
		 
         <li><a href="R_productos.php"><span>Registro de productos</span></a></li>
         <li><a href="R_maquina.php"><span>Registro de Maquina</span></a></li>
          <li><a href="R_turnos.php"><span>Registro de Turnos</span></a></li>
		  <li><a href="R_produccion.php"><span>Registro de Produccion</span></a></li>
          <li><a href="sid2.php"><span>Registro de eficiencia</span></a>
		  
		  </li>

                </ul>
				
   </li>
    <li class="has-sub"><a href="#"><span><img src="../imagenes/user.png" title="Listas"
    WIDTH=16 HEIGHT=16></img>Consultas</span></a>
     <ul>
         <li><a href="lista_personal.php"><span>Lista de personal</span></a></li>
         <li><a href="lista_productos.php"><span>Lista de productos</span></a></li>
         <li><a href="lista_maquina.php"><span>Lista de Maquina</span></a></li>
         <li><a href="lista_turno.php"><span>Lista de Turnos</span></a></li>
         <li><a href="lista_produccion.php"><span>Lista de Produccion</span></a>
		 <li><a href="lista_usuario.php"><span>Lista de Usuarios</span></a>
		 <li><a href="lista_parada.php"><span>Lista de Paradas</span></a>
		 <li><a href="lista_subequipo.php"><span>Lista de Sub_Equipos</span></a>
		 </li>

          </ul>



    </li>
      <li><a href="#"><span><img src="../imagenes/imprimir.png" title="Reportes"  WIDTH=16 HEIGHT=16></img>Imprimir </span></a>
          <ul>
         <li><a href="pdf_listapersonal.php" target="_blank"><span>Reporte de personal</span></a></li>
          <li><a href="pdf_listaproductos.php" target="_blank"><span>Reporte de productos</span></a></li>
          <li><a href="pdf_listamaquina.php" target="_blank"><span>Reporte de maquinas</span></a></li>
                                                                                                <li><a href="pdf_listaturnos.php" target="_blank"><span>Reporte de turnos</span></a></li>


          <li><a href="pdf_auditoria.php" target="_blank"><span>Reporte de auditoria</span></a></li>



                </ul>
                </li>

               <li><a href="#"><span><img src="../imagenes/config.png" title="Auditorias" WIDTH=30 HEIGHT=16></img>Mantenimiento</span></a>
               <ul>
         <li><a href="respaldo.php"><span>Respaldo de la base de datos</span></a></li>
        <li><a href="subir_bd.php"><span>Restaurar la base de datos</span></a></li>
        <li><a href="auditoria.php"><span>Auditorias </span></a></li>


                </ul>
               </li>


               <li class="has-sub"><a href="#"><span><img src="../imagenes/chart_bar.gif" title="Graficas"></img>Graficas</span></a>
     <ul>
         <li><a href="grafica_calidad1.php"><span>Primera calidad</span></a></li>
         <li><a href="grafica_calidad2.php"><span>Segunda calidad galvanizado</span></a></li>
         <li><a href="grafica_calidad2n.php"><span>Segunda calidad negra </span></a></li>
         <li><a href="grafica_calidad3.php"><span>Tercera calidad</span></a></li>
         <li><a href="grafica_tca.php"><span>Tiempo de cambio</span></a></li>
         <li><a href="grafica_tmu.php"><span>Tiempo muerto</span></a></li>
         <li><a href="grafica_tt.php"><span>Tiempo total de produccion</span></a></li>
          </ul>



    </li>


               <li class="has-sub"><a href="paseo.php"><span><img src="../imagenes/application_form.png" title="Manual"></img>Manual</span></a>



    </li>
   


    <li><a href="cerrar.php">   <span ><img src="../imagenes/Login.png" title="Salir" WIDTH=30 HEIGHT=16></img>salir('.$usuario=$_SESSION["usuario"].') </span></a>



   </ul>

</div>
</div>
<div id="cuerpo">

';
	return $html;
}

//...............................CODIGOS DE LOS FORMULARIOS...................................






/*function R_personal(){

	$conexion = conectar();

  	// dropdown list para turno
	$tur = "SELECT idturno, numTurno FROM turno";
	$turno = consultar($tur, $conexion);

	//drop down list para maquina
	$maq = "SELECT idmaquina, numeroMaq FROM maquina";
	$maquina = consultar($maq, $conexion);

    // dropdown turno
    $dropdown = "<select name='idturno' required>";
	$dropdown .= "<option value=''>---------------------</option>";
	while($row = mysql_fetch_assoc($turno)) {
	$dropdown .= "<option value='{$row['idturno']}'>{$row['numTurno']}</option>";
	}
	$dropdown .= "</select>";

    // dropdown maquina

    $dropdown1 = "<select name='idmaquina' required>";
	$dropdown1 .= "<option value=''>---------------------</option>";
	while($row1 = mysql_fetch_assoc($maquina)) {
	$dropdown1 .= "<option value='{$row1['idmaquina']}'>{$row1['numeroMaq']}</option>";
	}
	$dropdown1 .= "</select>";


$html='<!DOCTYPE html>


<div id="contenedorform">
<form method="post" name="Nue_Insc" id="Nue_Insc">
<fieldset>
<legend><h1 align="center"> Registro de Personal </h1></legend>
	<table align="center">
		<tr>


			<th valign="top" align="right">Nombres:</th>
			<td ><input type="text" pattern="[A_-Za_-z]{1,10}" onkeypress="return letras(event)" name="nombre" size="12" maxlength="12" required ></td>
		</tr>
		<tr>
			<th valign="top" align="right">Apellidos:</th>
			<td ><input type="text"   "pattern="[A_-Za_-z]{1,10}" onkeypress="return letras(event)" name="apellido" size="12" maxlength="12" required ></td>
		</tr>
        <tr>
			<th valign="top" align="right">Numero de Ficha:</th>
			<td><input type="text" pattern="[0-9]" onkeypress="return numeros(event)" name="NFicha"  size="12" maxlength="12" required ></td>
		</tr>
        <tr>
			<th valign="top" align="right">Cargo:</th>
			<td><select name="cargo" required>
            <option value="">---------------------</option>
            <option value="SUPERVISOR">SUPERVISOR</option>
            <option value="ANALISTA">ANALISTA</option>
            <option value="GERENTE">GERENTE</option>
            <option value="SUPERVISOR">SUPERVISOR</option>
            </select>
            </td>
		</tr>
        <tr>
			<th valign="top" align="right">Nivel:</th>
			<td><input type="text" pattern="[A_-Za_-z]{1,10}" onkeypress="return numeros(event)" name="nivel" size="12" maxlength="12" required ></td>
		</tr>

        <th valign="top" align="right">Turno:</th>
			<td>'. $dropdown.'';
            $html.='</td>
		</tr>

        <th valign="top" align="right">Maquina:</th>
			<td>'. $dropdown1.'';
            $html.='</td>
		</tr>
		<tr>
        	<th valign="top" align="right">Usuario:</th>
			<td><input type="text" pattern="[A_-Za_-z]{1,10}"  name="usuario" size="12" maxlength="12" required ></td>
		</tr>
		<tr>
        	<th valign="top" align="right">Clave:</th>
			<td><input type="text" pattern="[A_-Za_-z]{1,10}"  name="clave" size="12" maxlength="12" required ></td>
		</tr>
            <tr>
			<td colspan="2" align="right"><input class="botonsubmit" type="reset" value="Borrar">
            <input class="botonsubmit" type="submit" value="Ingresar">
            </td>
        </tr>
	</table>
</form></div>';
return $html;
} */



function update_personal()
{
   $per = $_GET['idpersonal'];
//$per = $_POST['id'];
//if(empty($per)) $per = $_GET['idpersonal'];
$conexion=conectar();
$sql = ("SELECT * FROM personal WHERE idpersonal=".$per."");


   $res=consultar($sql,$conexion);
   $row_rcspers = asociativo($res);
  // $r= asociativo($res);

  $q= "SELECT m.numeroMaq, t.numTurno  FROM  maquina m, turno t
        WHERE m.idmaquina='$row_rcspers[idmaquina]' AND t.idturno='$row_rcspers[idturno]'";
      $idP1 = consultar($q,$conexion);
       $row_rcspers1 = asociativo($idP1);

     	// dropdown list para turno
	$tur = "SELECT idturno, numTurno FROM turno";
	$turno = consultar($tur, $conexion);

	//drop down list para maquina
	$maq = "SELECT idmaquina, numeroMaq FROM maquina";
	$maquina = consultar($maq, $conexion);

    // dropdown turno
    $dropdown = "<select name='idturno' required>";
	$dropdown .= "<option value=''>---------------------</option>";
	while($row = mysql_fetch_assoc($turno)) {
      if($row_rcspers['idturno']== $row['idturno']) $s="selected";
            else $s='';
	$dropdown .= "<option value='{$row['idturno']}' $s>{$row['numTurno']}</option>";
	}
	$dropdown .= "</select>";

    // dropdown maquina

    $dropdown1 = "<select name='idmaquina' required>";
	$dropdown1 .= "<option value=''>---------------------</option>";
	while($row1 = mysql_fetch_assoc($maquina)) {
            if($row_rcspers['idmaquina']== $row1['idmaquina']) $s="selected";
            else $s='';

	$dropdown1 .= "<option value='{$row1['idmaquina']}' $s>{$row1['numeroMaq']}</option>";
	}
	$dropdown1 .= "</select>";

                                                                      // ($row_rcspers['cargo'] == 'SUPERVISOR') ? 'select' : '';
$car = "SELECT idpersonal, cargo FROM personal";
	$cargo = consultar($car, $conexion);

    $dropdown8 = "<select name='idpersonal' required>";
	$dropdown8 .= "<option value=''>---------------------</option>";
	while($row = mysql_fetch_assoc($cargo)) {
      if($row_rcspers['idpersonal']== $row['idpersonal']) $s="selected";
            else $s='';
	$dropdown8 .= "<option value='{$row['idpersonal']}' $s>{$row['cargo']}</option>";
	}
	$dropdown8 .= "</select>";



$html='<!DOCTYPE html>


<div id="contenedorform">
<form method="post" name="Nue_Insc" id="Nue_Insc">
<fieldset>
<legend><h1 align="center"> Actualizar Personal </h1></legend>
	<table align="center">
		<tr>


			<th valign="top" align="right">Nombres:</th>
			<td ><input type="text" pattern="[A_-Za_-z]{1,10}" onkeypress="return letras(event)" name="nombre" size="12" maxlength="12" required value="'.$row_rcspers['nombre'].'" ></td>
		</tr>
		<tr>
			<th valign="top" align="right">Apellidos:</th>
			<td ><input type="text"   "pattern="[A_-Za_-z]{1,10}" onkeypress="return letras(event)" name="apellido" size="12" maxlength="12" required value="'.$row_rcspers['apellido'].'" ></td>
		</tr>
        <tr>
			<th valign="top" align="right">Numero de Ficha:</th>
			<td><input type="text"  onkeypress="return numeros(event)" name="NFicha"  size="12" maxlength="12" required value="'.$row_rcspers ['NFicha'].'" ></td>
		</tr>
        <tr>
			<th valign="top" align="right">Cargo:</th>;


			<td><select name="cargo" required title="Por favor seleccione el cargo." style="width: 110px">
            <option value="">---------------</option>
            <option value="SUPERVISOR">SUPERVISOR</option>
            <option value="ANALISTA">ANALISTA</option>
            <option value="GERENTE">GERENTE</option>
            <option value="COORDINADOR">COORDINADOR</option>
			 <option value="OBSERVADOR">OBSERVADOR DE SEGURIDAD (GOS)</option>
            <option value="TRABAJADORUTILITY">TRABAJADOR UTILITY</option>
            <option value="OPERADORUTILITY">OPERADOR ESPECIALIZADO UTILITY</option>
            <option value="OPERADORFORM">OPERADOR ESPECIALIZADO FORM SOLD</option>
            <option value="OPERADOREMPATE">OPERADOR MESA DE EMPATE</option>
            <option value="TRABAJADOREMPATE">TRABAJADOR MESA DE EMPATE</option>
            <option value="GRUA">OPERADOR DE GRÚA</option>
            <option value="EMPAQUETADO">TRABAJADOR DE EMPAQUETADO</option>
			 <option value="INSPECTOR">INSPECTOR DE CALIDAD</option>
            <option value="CORTADORA">OPERADOR DE CORTADORA</option>
			 <option value="HORNO">TRABAJADOR DE HORNO GALV</option>
            <option value="BISELADORA">OPERADOR DE BISELADORA</option>
			 <option value="PROCESOS">INSPECTOR DE PROCESOS</option>
            <option value="FLEJES">OPERADOR DE LAMINADOR DE FLEJES</option>
			  <option value="PINTADO">PINTADO DE EXTREMOS</option>
            
			</select>
            </td>
		</tr>


        <tr>
			<th valign="top" align="right"> maquina:</th>
			<td>'  .$dropdown1. '
            </td>
		</tr>

        <tr>
			<th valign="top" align="right">Turno:</th>
			<td>'  .$dropdown. '
            </td>
		</tr>

        <tr>
			<th valign="top" align="right">Nivel:</th>
			<td><input type="text" pattern="[A_-Za_-z]{1,100}" onkeypress="return letras(event)" name="nivel" size="12" maxlength="12" required value="'.$row_rcspers['nivel'].'" ></td>
		</tr>





              <input type="hidden" name="idpersonal" value="'.$row_rcspers['idpersonal'].'" />
            <tr>
        	<td colspan="2" align="right">
            <input class="botonsubmit" type="submit" value="Actualizar" name="actualizar_personal">
            </td>
        </tr>
	</table>
</form></div>';
return $html;
}

function insert_updatePersonal()
{
extract($_POST);

$conexion=conectar();



   $sq="select * from personal where NFicha=".$Nficha."";
  $res=consultar($sq,$conexion);
$can=cantidad($res);
if($can==0){
    $sql = ("update personal set nombre='$nombre' ,apellido='$apellido', NFicha='$NFicha', cargo='$cargo', nivel='$nivel', idturno='$idturno', idmaquina='$idmaquina' WHERE idpersonal=" .$idpersonal." ")  or die("Problemas en el select".mysql_error());

   $res=consultar($sql,$conexion);
   mysql_close($conexion);

}

else{
  //echo "La ficha ya esta registrada";
  $res=0;
}
             return $res;


}










function insert_personal(){
  $res=false;
$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];
$Nficha = $_REQUEST['NFicha'];
$cargo = $_REQUEST['cargo'];
$nivel = $_REQUEST['nivel'];
$usuario = $_REQUEST['usuario'];
$clave = $_REQUEST['clave'];
$idturno =$_REQUEST['idturno'];
$idmaquina = $_REQUEST['idmaquina'];

$conexion=conectar();

  $sq="select * from personal where NFicha=".$Nficha."";
  $res=consultar($sq,$conexion);
$can=cantidad($res);
if($can==0){
    $sql = ("insert into personal(nombre, apellido, NFicha, cargo, nivel, idturno, idmaquina, usuario, clave) values
   ('$nombre', '$apellido', '$Nficha', '$cargo', '$nivel', '$idturno', '$idmaquina', '$usuario', '$clave') ") or die("Problemas en el select".mysql_error());

    $res=consultar($sql,$conexion);
    $res=true;


  /* $r= asociativo($res);*/
    mysql_close($conexion);
}
else{
  //echo "La ficha ya esta registrada";
 // $res=0;
}
             return $res;


}



function lista_persona(){


               $conexion = conectar();
  $lista_personal = "SELECT * FROM personal  ORDER BY idpersonal  DESC ";
  $personal = consultar($lista_personal, $conexion);
  $row = asociativo($personal);







?>
<div style='overflow:auto; height:630px; width:1200px'  >
<div class='datagrid'>
<table>
<thead>

<tr>
<h3>
LISTA DE PERSONAL </h3>  </tr>      </thead>
<thead>
<tr><th>NOMBRE</th><th>APELLIDO</th><th colspan='4' >ACCION</th></tr></thead>




            <?php   $i = 0;

                do { ?>
  <tbody>
<tr <?php echo $i++ % 2 ? 'class=""' : 'class="alt"'; ?> ><td class='active'><?php echo $row['nombre']; ?></td>
<td class='active'> <?php echo $row['apellido']; ?> </td>

 <td class='active'><a href='perfPers.php?idpersonal=<?php echo $row['idpersonal']; ?>'><img src='../imagenes/USER.png' title='Ver perfil'></img ></a></td>
                  <td><a href='actualizar_personal.php?idpersonal=<?php echo $row['idpersonal']; ?>'><img src='../imagenes/editar.png'  title='Editar perfil'></img></a></td>
<td><a href='eliminar_personal.php?idpersonal= ?>'><img src='../imagenes/eliminar.gif' title='Borrar perfil'></img ></a></a>
<td><a href='imprimir_personal.php?idpersonal="<?php echo $row['idpersonal']; ?>"'><img src='../imagenes/imprimir.png' title='Imprimir perfil'></img ></a></td>

                  </tr>
                 <?php } while ($row = asociativo($personal));?>
                 </table> </div> </div>

 <?php
}
 ?>
<?php
 function perfilPersonal()
 {
   $per = $_GET['idpersonal'];
          $conexion = conectar();

  $q1= "SELECT * FROM personal  WHERE idpersonal=" .$per."";
  $idP = consultar($q1,$conexion);
  $row= asociativo($idP);

  $maq = $row['idmaquina'];
  $tur = $row['idturno'];

  $q= "SELECT m.numeroMaq, t.numTurno  FROM  maquina m, turno t
        WHERE m.idmaquina='$row[idmaquina]' AND t.idturno='$row[idturno]'";
      $idP1 = consultar($q,$conexion);
      $row1= asociativo($idP1);




 $html= "

<div style='overflow:auto; height:630px; width:1200px'  >
<div class='datagrid'>

<form action='pdf_perfilPersonal.php' method='get'><table>
<thead><tr><th colspan='4' align='center'> Perfil del personal
</th></tr></thead>
  <tr>

<tbody>
<tr><th align='right' scope='row'>Apellidos:</th>
       <td>".$row['apellido']."</td>";
 $html.= "</tr>
  <tr>
    <th align='right' scope='row'>Nombres:</th>
         <td>".$row['nombre']."</td>";
 $html.= " </tr>
  <tr>

    <th align='right' scope='row'>Numero de ficha:</th>
         <td>".$row['NFicha']."</td>";
  $html.= "</tr>
  <tr>
    <th align='right' scope='row'>Cargo:</th>
         <td>".$row['cargo']."</td>";
  $html.= "</tr>
  <tr>
    <th align='right' scope='row'>Nivel:</th>
        <td>".$row['nivel']."</td>";
  $html.= "</tr>
   <th align='right' scope='row'>Turno:</th>
        <td>".$row1['numTurno']."</td>";
  $html.= "</tr>
   <th align='right' scope='row'>Maquina:</th>
        <td>".$row1['numeroMaq']."</td>";
  $html.= "</tr>
    <tr>
    <th align='right' scope='row'>Usuario:</th>
            <td>".$row['usuario']."</td>";
  $html.= "</tr>
               </tbody>

  </table>
                 <input type='hidden' name='idpersonal' value=".$row['idpersonal']." />
    <input class='botonsubmit' type='submit' value='Reporte' name='reporte_personal'>
    </a></td>
 </form>

  ";


      return $html;



 }

/* function asistencia()
 {

 $per = $_GET['idpersonal'];
$conexion=conectar();
mysql_select_db("sidepo",$conexion) or
  die("Problemas en la seleccion de la base de datos");

   $sql=("SELECT * FROM produccion p , personal e  WHERE p.turno = e.turno and p.maquina = e.maquina");


   $res=consultar($sql,$conexion);
    $r= asociativo($res);
    $filas = cantidad($r);

mysql_close($conexion);



              $lista1 = "<div style='overflow:auto; height:430px;' >
<table id='tabla_personal' border='1' width='10%' height='10%' style='margin: 30px 0px 0px 150px;
	border-radius: 10px;'>

       <tr> <th> Control de asistencia </th>
      <tr>

                 <td>NOMBRE</td>
                 <td>Asistencia</td>
                 <td colspan='3'>ACCION</td>

                 </tr> ";
                  do{

              $html.="<tr>

             <td><input type='radio' name='asistio[]' value='asistio'>asistio  <input type='radio' name='noasistio[]' value='noasistio'>noasistio</td> <td> <textarea name='desAsistencia[]'</textarea>
<input type='hidden' name='idpersonal[]' value='".$filas['idpersonal']."'  />

'

   </tr>";
                 }while( $filas = cantidad($r));
                 $html.="<tr> <td colspan='2'> <input type='submit' name='enviar' value='enviar'></td> </tr> ";    }
                                                                     */


 function insert_asistencia()
 {

 $per = $_GET['idpersonal'];
$conexion=conectar();
mysql_select_db("sidepo",$conexion) or
  die("Problemas en la seleccion de la base de datos");

   $sql=("SELECT * FROM produccion p , personal e  WHERE p.turno = e.turno and p.maquina = e.maquina");


   $res=consultar($sql,$conexion);
  /* $r= asociativo($res);*/

mysql_close($conexion);






 }


    function panel_produccion(){

          ?>
<link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
<style type="text/css">



.dhtmlgoodies_question{	/* Styling question */
	/* Start layout CSS */
	color:#FFF;
	font-size:0.9em;
  background: rgb(76,76,76); /* Old browsers */
background: -moz-linear-gradient(top, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 50%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(76,76,76,1)), color-stop(12%,rgba(89,89,89,1)), color-stop(25%,rgba(102,102,102,1)), color-stop(39%,rgba(71,71,71,1)), color-stop(50%,rgba(44,44,44,1)), color-stop(51%,rgba(0,0,0,1)), color-stop(60%,rgba(17,17,17,1)), color-stop(76%,rgba(43,43,43,1)), color-stop(91%,rgba(28,28,28,1)), color-stop(100%,rgba(19,19,19,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313',GradientType=0 ); /* IE6-9 */


	width:230px;
	margin-bottom:2px;
	margin-top:2px;
	padding-left:2px;

	background-repeat:no-repeat;
	background-position:top right;
	height:20px;

	/* End layout CSS */

	overflow:hidden;
	cursor:pointer;
}
.dhtmlgoodies_answer{	/* Parent box of slide down content */
	/* Start layout CSS */
	border:1px solid ;
	 background: url(../imagenes/bg.png);
	width:230px;

	/* End layout CSS */

	visibility:hidden;
	height:0px;
	overflow:hidden;
	position:relative;

}
.dhtmlgoodies_answer_content{	/* Content that is slided down */
	padding:1px;
	font-size:0.9em;
	position:relative;
    color: black;
}

</style>
<script type="text/javascript">
/************************************************************************************************************
Show hide content with slide effect
Copyright (C) August 2010  DTHMLGoodies.com, Alf Magne Kalleland

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
written by Alf Magne Kalleland.

Alf Magne Kalleland, 2010
Owner of DHTMLgoodies.com

************************************************************************************************************/

var dhtmlgoodies_slideSpeed = 10;	// Higher value = faster
var dhtmlgoodies_timer = 10;	// Lower value = faster

var objectIdToSlideDown = false;
var dhtmlgoodies_activeId = false;
var dhtmlgoodies_slideInProgress = false;
var dhtmlgoodies_slideInProgress = false;
var dhtmlgoodies_expandMultiple = false; // true if you want to be able to have multiple items expanded at the same time.

function showHideContent(e,inputId)
{
	if(dhtmlgoodies_slideInProgress)return;
	dhtmlgoodies_slideInProgress = true;
	if(!inputId)inputId = this.id;
	inputId = inputId + '';
	var numericId = inputId.replace(/[^0-9]/g,'');
	var answerDiv = document.getElementById('dhtmlgoodies_a' + numericId);

	objectIdToSlideDown = false;

	if(!answerDiv.style.display || answerDiv.style.display=='none'){
		if(dhtmlgoodies_activeId &&  dhtmlgoodies_activeId!=numericId && !dhtmlgoodies_expandMultiple){
			objectIdToSlideDown = numericId;
			slideContent(dhtmlgoodies_activeId,(dhtmlgoodies_slideSpeed*-1));
		}else{

			answerDiv.style.display='block';
			answerDiv.style.visibility = 'visible';

			slideContent(numericId,dhtmlgoodies_slideSpeed);
		}
	}else{
		slideContent(numericId,(dhtmlgoodies_slideSpeed*-1));
		dhtmlgoodies_activeId = false;
	}
}

function slideContent(inputId,direction)
{

	var obj =document.getElementById('dhtmlgoodies_a' + inputId);
	var contentObj = document.getElementById('dhtmlgoodies_ac' + inputId);
	height = obj.clientHeight;
	if(height==0)height = obj.offsetHeight;
	height = height + direction;
	rerunFunction = true;
	if(height>contentObj.offsetHeight){
		height = contentObj.offsetHeight;
		rerunFunction = false;
	}
	if(height<=1){
		height = 1;
		rerunFunction = false;
	}

	obj.style.height = height + 'px';
	var topPos = height - contentObj.offsetHeight;
	if(topPos>0)topPos=0;
	contentObj.style.top = topPos + 'px';
	if(rerunFunction){
		setTimeout('slideContent(' + inputId + ',' + direction + ')',dhtmlgoodies_timer);
	}else{
		if(height<=1){
			obj.style.display='none';
			if(objectIdToSlideDown && objectIdToSlideDown!=inputId){
				document.getElementById('dhtmlgoodies_a' + objectIdToSlideDown).style.display='block';
				document.getElementById('dhtmlgoodies_a' + objectIdToSlideDown).style.visibility='visible';
				slideContent(objectIdToSlideDown,dhtmlgoodies_slideSpeed);
			}else{
				dhtmlgoodies_slideInProgress = false;
			}
		}else{
			dhtmlgoodies_activeId = inputId;
			dhtmlgoodies_slideInProgress = false;
		}
	}
}



function initShowHideDivs()
{
	var divs = document.getElementsByTagName('DIV');
	var divCounter = 1;
	for(var no=0;no<divs.length;no++){
		if(divs[no].className=='dhtmlgoodies_question'){
			divs[no].onclick = showHideContent;
			divs[no].id = 'dhtmlgoodies_q'+divCounter;
			var answer = divs[no].nextSibling;
			while(answer && answer.tagName!='DIV'){
				answer = answer.nextSibling;
			}
			answer.id = 'dhtmlgoodies_a'+divCounter;
			contentDiv = answer.getElementsByTagName('DIV')[0];
			contentDiv.style.top = 0 - contentDiv.offsetHeight + 'px';
			contentDiv.className='dhtmlgoodies_answer_content';
			contentDiv.id = 'dhtmlgoodies_ac' + divCounter;
			answer.style.display='none';
			answer.style.height='1px';
			divCounter++;
		}
	}
}
window.onload = initShowHideDivs;
</script>



</head>

<body>

<div style='overflow:auto; height:630px; width:1200px'  >
                   <div class="dhtmlgoodies_question">Produccion</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/lista_produccion.php" style="text-decoration: none; color: black;">Ver listado</a><br />

	</div>
</div>
<div class="dhtmlgoodies_question">Buscar produccion</div>
<div class="dhtmlgoodies_answer">
	<div>
     <a href="../Admin/reporteProduccion.php" style="text-decoration: none; color: black;">Buscar produccion</a>
<br />
	</div>
</div>
<div class="dhtmlgoodies_question">Asistencia</div>
<div class="dhtmlgoodies_answer">
	<div>
     <a href="../Admin/sid.php"  style="text-decoration: none; color: black; ">Asistencia</a>
	
<br />
 <a href="../Admin/pdf_asistencias.php"  style="text-decoration: none; color: black; ">Reporte</a>
<br />
 <a href="../Admin/listado_asistencia.php"  style="text-decoration: none; color: black; ">Lista de asistencia</a>

 </div>
</div>

<div class="dhtmlgoodies_question">Graficas</div>
<div class="dhtmlgoodies_answer">
	<div>
     <a href="../Admin/grafica_calidad1.php"  style="text-decoration: none; color: black; ">Tubos de primera calidad</a>
<br />
 <a href="../Admin/grafica_calidad2.php"  style="text-decoration: none; color: black;">Tubos de segunda calidad</a>
<br />
	 <a href="../Admin/grafica_calidad2n.php"  style="text-decoration: none; color: black; ">Tubos de segunda calidad negra</a>
<br />
	 <a href="../Admin/grafica_calidad3.php" style="text-decoration: none; color: black; ">Tubos de tercera calidad</a>


</div>
</div>

<div class="dhtmlgoodies_question">Imprimir Toda la produccion</div>
<div class="dhtmlgoodies_answer">
	<div>
     <a href="../Admin/pdf_allproduction.php" target="_blank" style="text-decoration: none; color: black; ">Imprimir produccion</a>
	</div>
</div>



            <?php

    }

     function panel(){

          ?>
<link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
<style type="text/css">



.dhtmlgoodies_question{	/* Styling question */
	/* Start layout CSS */
	color:#FFF;
	font-size:0.9em;
	background: rgb(76,76,76); /* Old browsers */
background: -moz-linear-gradient(top, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 50%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(76,76,76,1)), color-stop(12%,rgba(89,89,89,1)), color-stop(25%,rgba(102,102,102,1)), color-stop(39%,rgba(71,71,71,1)), color-stop(50%,rgba(44,44,44,1)), color-stop(51%,rgba(0,0,0,1)), color-stop(60%,rgba(17,17,17,1)), color-stop(76%,rgba(43,43,43,1)), color-stop(91%,rgba(28,28,28,1)), color-stop(100%,rgba(19,19,19,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313',GradientType=0 ); /* IE6-9 */
	width:230px;
	margin-bottom:2px;
	margin-top:2px;
	padding-left:2px;

	background-repeat:no-repeat;
	background-position:top right;
	height:20px;

	/* End layout CSS */

	overflow:hidden;
	cursor:pointer;
}
.dhtmlgoodies_answer{	/* Parent box of slide down content */
	/* Start layout CSS */
	border:1px solid #317082;
	 background: url(../imagenes/bg.png);
	width:230px;

	/* End layout CSS */

	visibility:hidden;
	height:0px;
	overflow:hidden;
	position:relative;

}
.dhtmlgoodies_answer_content{	/* Content that is slided down */
	padding:1px;
	font-size:0.9em;
	position:relative;
    color: black;
}

</style>
<script type="text/javascript">
/************************************************************************************************************
Show hide content with slide effect
Copyright (C) August 2010  DTHMLGoodies.com, Alf Magne Kalleland

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
written by Alf Magne Kalleland.

Alf Magne Kalleland, 2010
Owner of DHTMLgoodies.com

************************************************************************************************************/

var dhtmlgoodies_slideSpeed = 10;	// Higher value = faster
var dhtmlgoodies_timer = 10;	// Lower value = faster

var objectIdToSlideDown = false;
var dhtmlgoodies_activeId = false;
var dhtmlgoodies_slideInProgress = false;
var dhtmlgoodies_slideInProgress = false;
var dhtmlgoodies_expandMultiple = false; // true if you want to be able to have multiple items expanded at the same time.

function showHideContent(e,inputId)
{
	if(dhtmlgoodies_slideInProgress)return;
	dhtmlgoodies_slideInProgress = true;
	if(!inputId)inputId = this.id;
	inputId = inputId + '';
	var numericId = inputId.replace(/[^0-9]/g,'');
	var answerDiv = document.getElementById('dhtmlgoodies_a' + numericId);

	objectIdToSlideDown = false;

	if(!answerDiv.style.display || answerDiv.style.display=='none'){
		if(dhtmlgoodies_activeId &&  dhtmlgoodies_activeId!=numericId && !dhtmlgoodies_expandMultiple){
			objectIdToSlideDown = numericId;
			slideContent(dhtmlgoodies_activeId,(dhtmlgoodies_slideSpeed*-1));
		}else{

			answerDiv.style.display='block';
			answerDiv.style.visibility = 'visible';

			slideContent(numericId,dhtmlgoodies_slideSpeed);
		}
	}else{
		slideContent(numericId,(dhtmlgoodies_slideSpeed*-1));
		dhtmlgoodies_activeId = false;
	}
}

function slideContent(inputId,direction)
{

	var obj =document.getElementById('dhtmlgoodies_a' + inputId);
	var contentObj = document.getElementById('dhtmlgoodies_ac' + inputId);
	height = obj.clientHeight;
	if(height==0)height = obj.offsetHeight;
	height = height + direction;
	rerunFunction = true;
	if(height>contentObj.offsetHeight){
		height = contentObj.offsetHeight;
		rerunFunction = false;
	}
	if(height<=1){
		height = 1;
		rerunFunction = false;
	}

	obj.style.height = height + 'px';
	var topPos = height - contentObj.offsetHeight;
	if(topPos>0)topPos=0;
	contentObj.style.top = topPos + 'px';
	if(rerunFunction){
		setTimeout('slideContent(' + inputId + ',' + direction + ')',dhtmlgoodies_timer);
	}else{
		if(height<=1){
			obj.style.display='none';
			if(objectIdToSlideDown && objectIdToSlideDown!=inputId){
				document.getElementById('dhtmlgoodies_a' + objectIdToSlideDown).style.display='block';
				document.getElementById('dhtmlgoodies_a' + objectIdToSlideDown).style.visibility='visible';
				slideContent(objectIdToSlideDown,dhtmlgoodies_slideSpeed);
			}else{
				dhtmlgoodies_slideInProgress = false;
			}
		}else{
			dhtmlgoodies_activeId = inputId;
			dhtmlgoodies_slideInProgress = false;
		}
	}
}



function initShowHideDivs()
{
	var divs = document.getElementsByTagName('DIV');
	var divCounter = 1;
	for(var no=0;no<divs.length;no++){
		if(divs[no].className=='dhtmlgoodies_question'){
			divs[no].onclick = showHideContent;
			divs[no].id = 'dhtmlgoodies_q'+divCounter;
			var answer = divs[no].nextSibling;
			while(answer && answer.tagName!='DIV'){
				answer = answer.nextSibling;
			}
			answer.id = 'dhtmlgoodies_a'+divCounter;
			contentDiv = answer.getElementsByTagName('DIV')[0];
			contentDiv.style.top = 0 - contentDiv.offsetHeight + 'px';
			contentDiv.className='dhtmlgoodies_answer_content';
			contentDiv.id = 'dhtmlgoodies_ac' + divCounter;
			answer.style.display='none';
			answer.style.height='1px';
			divCounter++;
		}
	}
}
window.onload = initShowHideDivs;
</script>



</head>

                   <div class="dhtmlgoodies_question">Lista de personal:</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/lista_personal.php" style="text-decoration: none; color: black;">Ver listado</a><br />

	</div>
</div>
<div class="dhtmlgoodies_question">Buscar empleado:</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/B_personal.php" style="text-decoration: none; color: black;">Buscar Personal</a>
	</div>
</div>
<div class="dhtmlgoodies_question">Imprimir listado de empleados</div>
<div class="dhtmlgoodies_answer">
	<div>
          <a href="../Admin/pdf_listapersonal.php" target="_blank" style="text-decoration: none; color: black;">lista de Personal </a>
	</div>
</div>

           <?php
           }
        function panel_inicio(){

          ?>
<link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
<style type="text/css">



.dhtmlgoodies_question{	/* Styling question */
	/* Start layout CSS */
	color:#FFF;
	font-size:0.9em;
	background: -moz-linear-gradient(top, rgba(0,0,0,0.65) 0%, rgba(0,0,0,0) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.65)), color-stop(100%,rgba(0,0,0,0))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=0 ); /* IE6-9 */

	width:230px;
	margin-bottom:2px;
	margin-top:2px;
	padding-left:2px;

	background-repeat:no-repeat;
	background-position:top right;
	height:20px;

	/* End layout CSS */

	overflow:hidden;
	cursor:pointer;
}
.dhtmlgoodies_answer{	/* Parent box of slide down content */
	/* Start layout CSS */
	border:1px solid #317082;
	 background: url(../imagenes/bg.png);
	width:230px;

	/* End layout CSS */

	visibility:hidden;
	height:0px;
	overflow:hidden;
	position:relative;

}
.dhtmlgoodies_answer_content{	/* Content that is slided down */
	padding:1px;
	font-size:0.9em;
	position:relative;
    color: black;
}

</style>
<script type="text/javascript">
/************************************************************************************************************
Show hide content with slide effect
Copyright (C) August 2010  DTHMLGoodies.com, Alf Magne Kalleland

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
written by Alf Magne Kalleland.

Alf Magne Kalleland, 2010
Owner of DHTMLgoodies.com

************************************************************************************************************/

var dhtmlgoodies_slideSpeed = 10;	// Higher value = faster
var dhtmlgoodies_timer = 10;	// Lower value = faster

var objectIdToSlideDown = false;
var dhtmlgoodies_activeId = false;
var dhtmlgoodies_slideInProgress = false;
var dhtmlgoodies_slideInProgress = false;
var dhtmlgoodies_expandMultiple = false; // true if you want to be able to have multiple items expanded at the same time.

function showHideContent(e,inputId)
{
	if(dhtmlgoodies_slideInProgress)return;
	dhtmlgoodies_slideInProgress = true;
	if(!inputId)inputId = this.id;
	inputId = inputId + '';
	var numericId = inputId.replace(/[^0-9]/g,'');
	var answerDiv = document.getElementById('dhtmlgoodies_a' + numericId);

	objectIdToSlideDown = false;

	if(!answerDiv.style.display || answerDiv.style.display=='none'){
		if(dhtmlgoodies_activeId &&  dhtmlgoodies_activeId!=numericId && !dhtmlgoodies_expandMultiple){
			objectIdToSlideDown = numericId;
			slideContent(dhtmlgoodies_activeId,(dhtmlgoodies_slideSpeed*-1));
		}else{

			answerDiv.style.display='block';
			answerDiv.style.visibility = 'visible';

			slideContent(numericId,dhtmlgoodies_slideSpeed);
		}
	}else{
		slideContent(numericId,(dhtmlgoodies_slideSpeed*-1));
		dhtmlgoodies_activeId = false;
	}
}

function slideContent(inputId,direction)
{

	var obj =document.getElementById('dhtmlgoodies_a' + inputId);
	var contentObj = document.getElementById('dhtmlgoodies_ac' + inputId);
	height = obj.clientHeight;
	if(height==0)height = obj.offsetHeight;
	height = height + direction;
	rerunFunction = true;
	if(height>contentObj.offsetHeight){
		height = contentObj.offsetHeight;
		rerunFunction = false;
	}
	if(height<=1){
		height = 1;
		rerunFunction = false;
	}

	obj.style.height = height + 'px';
	var topPos = height - contentObj.offsetHeight;
	if(topPos>0)topPos=0;
	contentObj.style.top = topPos + 'px';
	if(rerunFunction){
		setTimeout('slideContent(' + inputId + ',' + direction + ')',dhtmlgoodies_timer);
	}else{
		if(height<=1){
			obj.style.display='none';
			if(objectIdToSlideDown && objectIdToSlideDown!=inputId){
				document.getElementById('dhtmlgoodies_a' + objectIdToSlideDown).style.display='block';
				document.getElementById('dhtmlgoodies_a' + objectIdToSlideDown).style.visibility='visible';
				slideContent(objectIdToSlideDown,dhtmlgoodies_slideSpeed);
			}else{
				dhtmlgoodies_slideInProgress = false;
			}
		}else{
			dhtmlgoodies_activeId = inputId;
			dhtmlgoodies_slideInProgress = false;
		}
	}
}



function initShowHideDivs()
{
	var divs = document.getElementsByTagName('DIV');
	var divCounter = 1;
	for(var no=0;no<divs.length;no++){
		if(divs[no].className=='dhtmlgoodies_question'){
			divs[no].onclick = showHideContent;
			divs[no].id = 'dhtmlgoodies_q'+divCounter;
			var answer = divs[no].nextSibling;
			while(answer && answer.tagName!='DIV'){
				answer = answer.nextSibling;
			}
			answer.id = 'dhtmlgoodies_a'+divCounter;
			contentDiv = answer.getElementsByTagName('DIV')[0];
			contentDiv.style.top = 0 - contentDiv.offsetHeight + 'px';
			contentDiv.className='dhtmlgoodies_answer_content';
			contentDiv.id = 'dhtmlgoodies_ac' + divCounter;
			answer.style.display='none';
			answer.style.height='1px';
			divCounter++;
		}
	}
}
window.onload = initShowHideDivs;
</script>



</head>

                   <div class="dhtmlgoodies_question"> Personal</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/lista_personal.php" style="text-decoration: none; color: black;">Inicio</a><br />

	</div>
</div>
<div class="dhtmlgoodies_question">Productos</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/lista_productos.php" style="text-decoration: none; color: black;">Inicio</a>
	</div>
</div>
<div class="dhtmlgoodies_question">Maquina</div>
<div class="dhtmlgoodies_answer">
	<div>
          <a href="../Admin/lista_maquina.php" target="_blank" style="text-decoration: none; color: black;">Inicio </a>
	</div>
</div>

   <div class="dhtmlgoodies_question">Turno</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/lista_turno.php" style="text-decoration: none; color: black;">Inicio</a><br />

	</div>
</div>
<div class="dhtmlgoodies_question">Produccion</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/lista_produccion.php" style="text-decoration: none; color: black;">Inicio</a>
	</div>
</div>
<div class="dhtmlgoodies_question">Auditoria</div>
<div class="dhtmlgoodies_answer">
	<div>
          <a href="../Admin/auditoria.php"  style="text-decoration: none; color: black;">Inicio</a>
	</div>
</div>



            <?php

    }


     function panel_auditoria(){

          ?>
<link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
<style type="text/css">



.dhtmlgoodies_question{	/* Styling question */
	/* Start layout CSS */

    color:#FFF;
	font-size:0.9em;
	background: rgb(76,76,76); /* Old browsers */
background: -moz-linear-gradient(top, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 50%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(76,76,76,1)), color-stop(12%,rgba(89,89,89,1)), color-stop(25%,rgba(102,102,102,1)), color-stop(39%,rgba(71,71,71,1)), color-stop(50%,rgba(44,44,44,1)), color-stop(51%,rgba(0,0,0,1)), color-stop(60%,rgba(17,17,17,1)), color-stop(76%,rgba(43,43,43,1)), color-stop(91%,rgba(28,28,28,1)), color-stop(100%,rgba(19,19,19,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313',GradientType=0 ); /* IE6-9 */

	width:230px;
	margin-bottom:2px;
	margin-top:2px;
	padding-left:2px;

	background-repeat:no-repeat;
	background-position:top right;
	height:20px;

	/* End layout CSS */

	overflow:hidden;
	cursor:pointer;
}
.dhtmlgoodies_answer{	/* Parent box of slide down content */
	/* Start layout CSS */
	border:1px solid #317082;
	 background: url(../imagenes/bg.png);
	width:230px;

	/* End layout CSS */

	visibility:hidden;
	height:0px;
	overflow:hidden;
	position:relative;

}
.dhtmlgoodies_answer_content{	/* Content that is slided down */

padding:1px;
	font-size:0.9em;
	position:relative;
    color: black;
}

</style>
<script type="text/javascript">
/************************************************************************************************************
Show hide content with slide effect
Copyright (C) August 2010  DTHMLGoodies.com, Alf Magne Kalleland

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
written by Alf Magne Kalleland.

Alf Magne Kalleland, 2010
Owner of DHTMLgoodies.com

************************************************************************************************************/

var dhtmlgoodies_slideSpeed = 10;	// Higher value = faster
var dhtmlgoodies_timer = 10;	// Lower value = faster

var objectIdToSlideDown = false;
var dhtmlgoodies_activeId = false;
var dhtmlgoodies_slideInProgress = false;
var dhtmlgoodies_slideInProgress = false;
var dhtmlgoodies_expandMultiple = false; // true if you want to be able to have multiple items expanded at the same time.

function showHideContent(e,inputId)
{
	if(dhtmlgoodies_slideInProgress)return;
	dhtmlgoodies_slideInProgress = true;
	if(!inputId)inputId = this.id;
	inputId = inputId + '';
	var numericId = inputId.replace(/[^0-9]/g,'');
	var answerDiv = document.getElementById('dhtmlgoodies_a' + numericId);

	objectIdToSlideDown = false;

	if(!answerDiv.style.display || answerDiv.style.display=='none'){
		if(dhtmlgoodies_activeId &&  dhtmlgoodies_activeId!=numericId && !dhtmlgoodies_expandMultiple){
			objectIdToSlideDown = numericId;
			slideContent(dhtmlgoodies_activeId,(dhtmlgoodies_slideSpeed*-1));
		}else{

			answerDiv.style.display='block';
			answerDiv.style.visibility = 'visible';

			slideContent(numericId,dhtmlgoodies_slideSpeed);
		}
	}else{
		slideContent(numericId,(dhtmlgoodies_slideSpeed*-1));
		dhtmlgoodies_activeId = false;
	}
}

function slideContent(inputId,direction)
{

	var obj =document.getElementById('dhtmlgoodies_a' + inputId);
	var contentObj = document.getElementById('dhtmlgoodies_ac' + inputId);
	height = obj.clientHeight;
	if(height==0)height = obj.offsetHeight;
	height = height + direction;
	rerunFunction = true;
	if(height>contentObj.offsetHeight){
		height = contentObj.offsetHeight;
		rerunFunction = false;
	}
	if(height<=1){
		height = 1;
		rerunFunction = false;
	}

	obj.style.height = height + 'px';
	var topPos = height - contentObj.offsetHeight;
	if(topPos>0)topPos=0;
	contentObj.style.top = topPos + 'px';
	if(rerunFunction){
		setTimeout('slideContent(' + inputId + ',' + direction + ')',dhtmlgoodies_timer);
	}else{
		if(height<=1){
			obj.style.display='none';
			if(objectIdToSlideDown && objectIdToSlideDown!=inputId){
				document.getElementById('dhtmlgoodies_a' + objectIdToSlideDown).style.display='block';
				document.getElementById('dhtmlgoodies_a' + objectIdToSlideDown).style.visibility='visible';
				slideContent(objectIdToSlideDown,dhtmlgoodies_slideSpeed);
			}else{
				dhtmlgoodies_slideInProgress = false;
			}
		}else{
			dhtmlgoodies_activeId = inputId;
			dhtmlgoodies_slideInProgress = false;
		}
	}
}



function initShowHideDivs()
{
	var divs = document.getElementsByTagName('DIV');
	var divCounter = 1;
	for(var no=0;no<divs.length;no++){
		if(divs[no].className=='dhtmlgoodies_question'){
			divs[no].onclick = showHideContent;
			divs[no].id = 'dhtmlgoodies_q'+divCounter;
			var answer = divs[no].nextSibling;
			while(answer && answer.tagName!='DIV'){
				answer = answer.nextSibling;
			}
			answer.id = 'dhtmlgoodies_a'+divCounter;
			contentDiv = answer.getElementsByTagName('DIV')[0];
			contentDiv.style.top = 0 - contentDiv.offsetHeight + 'px';
			contentDiv.className='dhtmlgoodies_answer_content';
			contentDiv.id = 'dhtmlgoodies_ac' + divCounter;
			answer.style.display='none';
			answer.style.height='1px';
			divCounter++;
		}
	}
}
window.onload = initShowHideDivs;
</script>


</head>

<body>


                   <div class="dhtmlgoodies_question">Auditoria General:</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/auditoria.php" style="text-decoration: none; color: black;">Ver listado</a><br />

	</div>
</div>
<div class="dhtmlgoodies_question">Busqueda:</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/reporteAuditoria.php" style="text-decoration: none; color: black;">Buscar</a>
	</div>
</div>




            <?php

    }

    function panel_productos(){

          ?>
<link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
	<script src="../js/funciones.js"></script>
<style type="text/css">



.dhtmlgoodies_question{	/* Styling question */
	/* Start layout CSS */
	color:#FFF;
	font-size:0.9em;
  background: rgb(76,76,76); /* Old browsers */
background: -moz-linear-gradient(top, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 50%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(76,76,76,1)), color-stop(12%,rgba(89,89,89,1)), color-stop(25%,rgba(102,102,102,1)), color-stop(39%,rgba(71,71,71,1)), color-stop(50%,rgba(44,44,44,1)), color-stop(51%,rgba(0,0,0,1)), color-stop(60%,rgba(17,17,17,1)), color-stop(76%,rgba(43,43,43,1)), color-stop(91%,rgba(28,28,28,1)), color-stop(100%,rgba(19,19,19,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313',GradientType=0 ); /* IE6-9 */

	width:230px;
	margin-bottom:2px;
	margin-top:2px;
	padding-left:2px;

	background-repeat:no-repeat;
	background-position:top right;
	height:20px;

	/* End layout CSS */

	overflow:hidden;
	cursor:pointer;
}
.dhtmlgoodies_answer{	/* Parent box of slide down content */
	/* Start layout CSS */
	border:1px solid #317082;
	 background: url(../imagenes/bg.png);
	width:230px;

	/* End layout CSS */

	visibility:hidden;
	height:0px;
	overflow:hidden;
	position:relative;

}
.dhtmlgoodies_answer_content{	/* Content that is slided down */
	padding:1px;
	font-size:0.9em;
	position:relative;
    color: black;
}

</style>
<script type="text/javascript">
/************************************************************************************************************
Show hide content with slide effect
Copyright (C) August 2010  DTHMLGoodies.com, Alf Magne Kalleland

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
written by Alf Magne Kalleland.

Alf Magne Kalleland, 2010
Owner of DHTMLgoodies.com

************************************************************************************************************/

var dhtmlgoodies_slideSpeed = 10;	// Higher value = faster
var dhtmlgoodies_timer = 10;	// Lower value = faster

var objectIdToSlideDown = false;
var dhtmlgoodies_activeId = false;
var dhtmlgoodies_slideInProgress = false;
var dhtmlgoodies_slideInProgress = false;
var dhtmlgoodies_expandMultiple = false; // true if you want to be able to have multiple items expanded at the same time.

function showHideContent(e,inputId)
{
	if(dhtmlgoodies_slideInProgress)return;
	dhtmlgoodies_slideInProgress = true;
	if(!inputId)inputId = this.id;
	inputId = inputId + '';
	var numericId = inputId.replace(/[^0-9]/g,'');
	var answerDiv = document.getElementById('dhtmlgoodies_a' + numericId);

	objectIdToSlideDown = false;

	if(!answerDiv.style.display || answerDiv.style.display=='none'){
		if(dhtmlgoodies_activeId &&  dhtmlgoodies_activeId!=numericId && !dhtmlgoodies_expandMultiple){
			objectIdToSlideDown = numericId;
			slideContent(dhtmlgoodies_activeId,(dhtmlgoodies_slideSpeed*-1));
		}else{

			answerDiv.style.display='block';
			answerDiv.style.visibility = 'visible';

			slideContent(numericId,dhtmlgoodies_slideSpeed);
		}
	}else{
		slideContent(numericId,(dhtmlgoodies_slideSpeed*-1));
		dhtmlgoodies_activeId = false;
	}
}

function slideContent(inputId,direction)
{

	var obj =document.getElementById('dhtmlgoodies_a' + inputId);
	var contentObj = document.getElementById('dhtmlgoodies_ac' + inputId);
	height = obj.clientHeight;
	if(height==0)height = obj.offsetHeight;
	height = height + direction;
	rerunFunction = true;
	if(height>contentObj.offsetHeight){
		height = contentObj.offsetHeight;
		rerunFunction = false;
	}
	if(height<=1){
		height = 1;
		rerunFunction = false;
	}

	obj.style.height = height + 'px';
	var topPos = height - contentObj.offsetHeight;
	if(topPos>0)topPos=0;
	contentObj.style.top = topPos + 'px';
	if(rerunFunction){
		setTimeout('slideContent(' + inputId + ',' + direction + ')',dhtmlgoodies_timer);
	}else{
		if(height<=1){
			obj.style.display='none';
			if(objectIdToSlideDown && objectIdToSlideDown!=inputId){
				document.getElementById('dhtmlgoodies_a' + objectIdToSlideDown).style.display='block';
				document.getElementById('dhtmlgoodies_a' + objectIdToSlideDown).style.visibility='visible';
				slideContent(objectIdToSlideDown,dhtmlgoodies_slideSpeed);
			}else{
				dhtmlgoodies_slideInProgress = false;
			}
		}else{
			dhtmlgoodies_activeId = inputId;
			dhtmlgoodies_slideInProgress = false;
		}
	}
}



function initShowHideDivs()
{
	var divs = document.getElementsByTagName('DIV');
	var divCounter = 1;
	for(var no=0;no<divs.length;no++){
		if(divs[no].className=='dhtmlgoodies_question'){
			divs[no].onclick = showHideContent;
			divs[no].id = 'dhtmlgoodies_q'+divCounter;
			var answer = divs[no].nextSibling;
			while(answer && answer.tagName!='DIV'){
				answer = answer.nextSibling;
			}
			answer.id = 'dhtmlgoodies_a'+divCounter;
			contentDiv = answer.getElementsByTagName('DIV')[0];
			contentDiv.style.top = 0 - contentDiv.offsetHeight + 'px';
			contentDiv.className='dhtmlgoodies_answer_content';
			contentDiv.id = 'dhtmlgoodies_ac' + divCounter;
			answer.style.display='none';
			answer.style.height='1px';
			divCounter++;
		}
	}
}
window.onload = initShowHideDivs;
</script>



</head>

<body>

                   <div class="dhtmlgoodies_question">Lista de productos:</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/lista_productos.php" style="text-decoration: none; color: black;">Ver listado</a><br />

	</div>
</div>
<div class="dhtmlgoodies_question">Buscar producto:</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/B_productos.php" style="text-decoration: none; color: black;">Buscar Producto</a>
	</div>
</div>
<div class="dhtmlgoodies_question">Imprimir listado de productos</div>
<div class="dhtmlgoodies_answer">
	<div>
          <a href="../Admin/pdf_listaproductos.php" target="_blank" style="text-decoration: none; color: black;">lista de Productos </a>

	</div>
</div>



            <?php

    }

      function panel_turno(){

          ?>
<link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
<style type="text/css">



.dhtmlgoodies_question{	/* Styling question */
	/* Start layout CSS */
	color:#FFF;
	font-size:0.9em;
   background: rgb(76,76,76); /* Old browsers */
background: -moz-linear-gradient(top, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 50%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(76,76,76,1)), color-stop(12%,rgba(89,89,89,1)), color-stop(25%,rgba(102,102,102,1)), color-stop(39%,rgba(71,71,71,1)), color-stop(50%,rgba(44,44,44,1)), color-stop(51%,rgba(0,0,0,1)), color-stop(60%,rgba(17,17,17,1)), color-stop(76%,rgba(43,43,43,1)), color-stop(91%,rgba(28,28,28,1)), color-stop(100%,rgba(19,19,19,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313',GradientType=0 ); /* IE6-9 */

	width:230px;
	margin-bottom:2px;
	margin-top:2px;
	padding-left:2px;

	background-repeat:no-repeat;
	background-position:top right;
	height:20px;

	/* End layout CSS */

	overflow:hidden;
	cursor:pointer;
}
.dhtmlgoodies_answer{	/* Parent box of slide down content */
	/* Start layout CSS */
	border:1px solid #317082;
	 background: url(../imagenes/bg.png);
	width:230px;

	/* End layout CSS */

	visibility:hidden;
	height:0px;
	overflow:hidden;
	position:relative;

}
.dhtmlgoodies_answer_content{	/* Content that is slided down */
	padding:1px;
	font-size:0.9em;
	position:relative;
    color: black;
}

</style>
<script type="text/javascript">
/************************************************************************************************************
Show hide content with slide effect
Copyright (C) August 2010  DTHMLGoodies.com, Alf Magne Kalleland

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
written by Alf Magne Kalleland.

Alf Magne Kalleland, 2010
Owner of DHTMLgoodies.com

************************************************************************************************************/

var dhtmlgoodies_slideSpeed = 10;	// Higher value = faster
var dhtmlgoodies_timer = 10;	// Lower value = faster

var objectIdToSlideDown = false;
var dhtmlgoodies_activeId = false;
var dhtmlgoodies_slideInProgress = false;
var dhtmlgoodies_slideInProgress = false;
var dhtmlgoodies_expandMultiple = false; // true if you want to be able to have multiple items expanded at the same time.

function showHideContent(e,inputId)
{
	if(dhtmlgoodies_slideInProgress)return;
	dhtmlgoodies_slideInProgress = true;
	if(!inputId)inputId = this.id;
	inputId = inputId + '';
	var numericId = inputId.replace(/[^0-9]/g,'');
	var answerDiv = document.getElementById('dhtmlgoodies_a' + numericId);

	objectIdToSlideDown = false;

	if(!answerDiv.style.display || answerDiv.style.display=='none'){
		if(dhtmlgoodies_activeId &&  dhtmlgoodies_activeId!=numericId && !dhtmlgoodies_expandMultiple){
			objectIdToSlideDown = numericId;
			slideContent(dhtmlgoodies_activeId,(dhtmlgoodies_slideSpeed*-1));
		}else{

			answerDiv.style.display='block';
			answerDiv.style.visibility = 'visible';

			slideContent(numericId,dhtmlgoodies_slideSpeed);
		}
	}else{
		slideContent(numericId,(dhtmlgoodies_slideSpeed*-1));
		dhtmlgoodies_activeId = false;
	}
}

function slideContent(inputId,direction)
{

	var obj =document.getElementById('dhtmlgoodies_a' + inputId);
	var contentObj = document.getElementById('dhtmlgoodies_ac' + inputId);
	height = obj.clientHeight;
	if(height==0)height = obj.offsetHeight;
	height = height + direction;
	rerunFunction = true;
	if(height>contentObj.offsetHeight){
		height = contentObj.offsetHeight;
		rerunFunction = false;
	}
	if(height<=1){
		height = 1;
		rerunFunction = false;
	}

	obj.style.height = height + 'px';
	var topPos = height - contentObj.offsetHeight;
	if(topPos>0)topPos=0;
	contentObj.style.top = topPos + 'px';
	if(rerunFunction){
		setTimeout('slideContent(' + inputId + ',' + direction + ')',dhtmlgoodies_timer);
	}else{
		if(height<=1){
			obj.style.display='none';
			if(objectIdToSlideDown && objectIdToSlideDown!=inputId){
				document.getElementById('dhtmlgoodies_a' + objectIdToSlideDown).style.display='block';
				document.getElementById('dhtmlgoodies_a' + objectIdToSlideDown).style.visibility='visible';
				slideContent(objectIdToSlideDown,dhtmlgoodies_slideSpeed);
			}else{
				dhtmlgoodies_slideInProgress = false;
			}
		}else{
			dhtmlgoodies_activeId = inputId;
			dhtmlgoodies_slideInProgress = false;
		}
	}
}



function initShowHideDivs()
{
	var divs = document.getElementsByTagName('DIV');
	var divCounter = 1;
	for(var no=0;no<divs.length;no++){
		if(divs[no].className=='dhtmlgoodies_question'){
			divs[no].onclick = showHideContent;
			divs[no].id = 'dhtmlgoodies_q'+divCounter;
			var answer = divs[no].nextSibling;
			while(answer && answer.tagName!='DIV'){
				answer = answer.nextSibling;
			}
			answer.id = 'dhtmlgoodies_a'+divCounter;
			contentDiv = answer.getElementsByTagName('DIV')[0];
			contentDiv.style.top = 0 - contentDiv.offsetHeight + 'px';
			contentDiv.className='dhtmlgoodies_answer_content';
			contentDiv.id = 'dhtmlgoodies_ac' + divCounter;
			answer.style.display='none';
			answer.style.height='1px';
			divCounter++;
		}
	}
}
window.onload = initShowHideDivs;
</script>



</head>

<body>

                   <div class="dhtmlgoodies_question">Lista de turnos:</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/lista_turno.php" style="text-decoration: none; color: black;">Ver listado</a><br />

	</div>
</div>
<div class="dhtmlgoodies_question">Buscar turno:</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/B_turno.php" style="text-decoration: none; color: black;">Buscar turno</a>
	</div>
</div>
<div class="dhtmlgoodies_question">Imprimir listado de turnos</div>
<div class="dhtmlgoodies_answer">
	<div>
          <a href="../Admin/pdf_listaturnos.php" target="_blank" style="text-decoration: none; color: black;">lista de Turnos </a>
	</div>
</div>



            <?php

    }
    function panel_maquina(){

          ?>
<link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
<style type="text/css">



.dhtmlgoodies_question{	/* Styling question */
	/* Start layout CSS */
	color:#FFF;
	font-size:0.9em;
   background: rgb(76,76,76); /* Old browsers */
background: -moz-linear-gradient(top, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 50%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(76,76,76,1)), color-stop(12%,rgba(89,89,89,1)), color-stop(25%,rgba(102,102,102,1)), color-stop(39%,rgba(71,71,71,1)), color-stop(50%,rgba(44,44,44,1)), color-stop(51%,rgba(0,0,0,1)), color-stop(60%,rgba(17,17,17,1)), color-stop(76%,rgba(43,43,43,1)), color-stop(91%,rgba(28,28,28,1)), color-stop(100%,rgba(19,19,19,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313',GradientType=0 ); /* IE6-9 */

	width:230px;
	margin-bottom:2px;
	margin-top:2px;
	padding-left:2px;

	background-repeat:no-repeat;
	background-position:top right;
	height:20px;

	/* End layout CSS */

	overflow:hidden;
	cursor:pointer;
}
.dhtmlgoodies_answer{	/* Parent box of slide down content */
	/* Start layout CSS */
	border:1px solid #317082;
	 background: url(../imagenes/bg.png);
	width:230px;

	/* End layout CSS */

	visibility:hidden;
	height:0px;
	overflow:hidden;
	position:relative;

}
.dhtmlgoodies_answer_content{	/* Content that is slided down */
	padding:1px;
	font-size:0.9em;
	position:relative;
    color: black;
}

</style>
<script type="text/javascript">
/************************************************************************************************************
Show hide content with slide effect
Copyright (C) August 2010  DTHMLGoodies.com, Alf Magne Kalleland

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
written by Alf Magne Kalleland.

Alf Magne Kalleland, 2010
Owner of DHTMLgoodies.com

************************************************************************************************************/

var dhtmlgoodies_slideSpeed = 10;	// Higher value = faster
var dhtmlgoodies_timer = 10;	// Lower value = faster

var objectIdToSlideDown = false;
var dhtmlgoodies_activeId = false;
var dhtmlgoodies_slideInProgress = false;
var dhtmlgoodies_slideInProgress = false;
var dhtmlgoodies_expandMultiple = false; // true if you want to be able to have multiple items expanded at the same time.

function showHideContent(e,inputId)
{
	if(dhtmlgoodies_slideInProgress)return;
	dhtmlgoodies_slideInProgress = true;
	if(!inputId)inputId = this.id;
	inputId = inputId + '';
	var numericId = inputId.replace(/[^0-9]/g,'');
	var answerDiv = document.getElementById('dhtmlgoodies_a' + numericId);

	objectIdToSlideDown = false;

	if(!answerDiv.style.display || answerDiv.style.display=='none'){
		if(dhtmlgoodies_activeId &&  dhtmlgoodies_activeId!=numericId && !dhtmlgoodies_expandMultiple){
			objectIdToSlideDown = numericId;
			slideContent(dhtmlgoodies_activeId,(dhtmlgoodies_slideSpeed*-1));
		}else{

			answerDiv.style.display='block';
			answerDiv.style.visibility = 'visible';

			slideContent(numericId,dhtmlgoodies_slideSpeed);
		}
	}else{
		slideContent(numericId,(dhtmlgoodies_slideSpeed*-1));
		dhtmlgoodies_activeId = false;
	}
}

function slideContent(inputId,direction)
{

	var obj =document.getElementById('dhtmlgoodies_a' + inputId);
	var contentObj = document.getElementById('dhtmlgoodies_ac' + inputId);
	height = obj.clientHeight;
	if(height==0)height = obj.offsetHeight;
	height = height + direction;
	rerunFunction = true;
	if(height>contentObj.offsetHeight){
		height = contentObj.offsetHeight;
		rerunFunction = false;
	}
	if(height<=1){
		height = 1;
		rerunFunction = false;
	}

	obj.style.height = height + 'px';
	var topPos = height - contentObj.offsetHeight;
	if(topPos>0)topPos=0;
	contentObj.style.top = topPos + 'px';
	if(rerunFunction){
		setTimeout('slideContent(' + inputId + ',' + direction + ')',dhtmlgoodies_timer);
	}else{
		if(height<=1){
			obj.style.display='none';
			if(objectIdToSlideDown && objectIdToSlideDown!=inputId){
				document.getElementById('dhtmlgoodies_a' + objectIdToSlideDown).style.display='block';
				document.getElementById('dhtmlgoodies_a' + objectIdToSlideDown).style.visibility='visible';
				slideContent(objectIdToSlideDown,dhtmlgoodies_slideSpeed);
			}else{
				dhtmlgoodies_slideInProgress = false;
			}
		}else{
			dhtmlgoodies_activeId = inputId;
			dhtmlgoodies_slideInProgress = false;
		}
	}
}



function initShowHideDivs()
{
	var divs = document.getElementsByTagName('DIV');
	var divCounter = 1;
	for(var no=0;no<divs.length;no++){
		if(divs[no].className=='dhtmlgoodies_question'){
			divs[no].onclick = showHideContent;
			divs[no].id = 'dhtmlgoodies_q'+divCounter;
			var answer = divs[no].nextSibling;
			while(answer && answer.tagName!='DIV'){
				answer = answer.nextSibling;
			}
			answer.id = 'dhtmlgoodies_a'+divCounter;
			contentDiv = answer.getElementsByTagName('DIV')[0];
			contentDiv.style.top = 0 - contentDiv.offsetHeight + 'px';
			contentDiv.className='dhtmlgoodies_answer_content';
			contentDiv.id = 'dhtmlgoodies_ac' + divCounter;
			answer.style.display='none';
			answer.style.height='1px';
			divCounter++;
		}
	}
}
window.onload = initShowHideDivs;
</script>



</head>

<body>


                   <div class="dhtmlgoodies_question">Lista de maquinas:</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/lista_maquina.php" style="text-decoration: none; color: black;">Ver listado</a><br />

	</div>
</div>
<div class="dhtmlgoodies_question">Buscar maquina:</div>
<div class="dhtmlgoodies_answer">
	<div>
      <a href="../Admin/B_maquina.php" style="text-decoration: none; color: black;">Buscar Maquina</a>
	</div>
</div>
<div class="dhtmlgoodies_question">Imprimir listado de Maquinas</div>
<div class="dhtmlgoodies_answer">
	<div>
          <a href="../Admin/pdf_listamaquina.php" target="_blank" style="text-decoration: none; color: black;">lista de maquinas </a>
	</div>
</div>



          

<?php

    }
function insert_produccion()
    {
extract($_POST);
$conexion=conectar();
$sql="select * from produccion where idmaquina=".$idmaquina." AND idturno=".$idturno." AND fechaPro=".$fechaPro." ";
$res=consultar($sql,$conexion);
@$can=cantidad($res);
if(@$can==0){

$sql1 = ("insert into produccion(fechaPro, idmaquina, idturno, idpersonal, idproductos, cali1, cali2, cali_a2, cali3, tiraProc, tt, tca, tmu, chat, novedades) values ('$fechaPro', '$idmaquina', '$idturno', '$idpersonal', '$idproductos', '$cali1', '$cali2', '$cali_a2', '$cali3','$tiraProc', '$tt', '$tca', '$tmu', '$chat', '$novedades')");
$res=consultar($sql1,$conexion);

$sql="select idproduccion from produccion where fechaPro = '$fechaPro' and idmaquina='$idmaquina' and idturno='$idturno' and idpersonal= '$idpersonal' ";
$res=consultar($sql,$conexion);
$dato= asociativo($res);
    $idproduccion = $dato['idproduccion'];
        $idtiempos = $tiempo;
        $idparadas = $idparadas;
        $idsub_equipo = $idsub_equipo;
                 for ($i = 0; $i<=$total; $i++){

                   if($idparadas[$i]>0 && $idtiempos[$i]>0 && $idsub_equipo[$i]>0){

   $sql = "insert into paproduccion (idproduccion, tiempo, idparadas, idsub_equipo) values
   ('$idproduccion', '$idtiempos[$i]', '$idparadas[$i]', '$idsub_equipo[$i]')";

   $res=consultar($sql,$conexion);

                   }
            }
  /* $r= asociativo($res);*/
   $res=true;
mysql_close($conexion);


    }
    }
function reporteAUDITORIA()
    {

         	$conexion = conectar();
		


    	//drop down list para la auditoria
	$usu_bit = "SELECT * FROM bitacora group by usuario_bit asc";
	$usuarioBit = consultar($usu_bit, $conexion);



     // dropdown auditoria

    $dropdown1 = "<select name='id_bit'>";
	$dropdown1 .= "<option value=0>-------</option>";
	while($row1 = asociativo($usuarioBit)) {
	$dropdown1 .= "<option value='{$row1['id_bit']}'>{$row1['usuario_bit']}</option>";
	}
	$dropdown1 .= "</select>";







  $html='  <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>

    <div class="datagrid-productos">

<table>


<thead>
<tr>   
<form action="" method="get">
<h3>
Reporte de Auditoria </h3> </tr> </thead>


<thead><tr>
             <tbody>

		<tr><td>Desde: <input type="date" name="fecha_bit" /></td>
       <td>Hasta: <input type="date" name="fecha_bit1" /></td>
	   <td> usuario:'.$dropdown1.'</td>
	  ';
		
$html .= '
	</tr>
	<tr>
		<th colspan="3" align="center"><input type="submit" value="Buscar"  name="Buscar_auditoria"/></th>
	</tr>

</thead>
    </form>
</table>';
return $html;
}


function listaBusquedaAUDITORIA()
{


           	$conexion = conectar();

      
         $usuB = $_GET['usuario_bit'];
         $FE1 = $_GET['fecha_bit'];
		 $FE2 = $_GET['fecha_bit1'];
	


    


         $que = "SELECT  * FROM bitacora WHERE fecha_bit BETWEEN '$FE1' AND '$FE2' OR usuario_bit='$usuB'";
         $query=consultar($que,$conexion);
         $row_P = asociativo($query);
         $num = cantidad($query);



   $html = '<table style="border-collapse: collapse; font-family:arial;
  font-size:15px;
  text-align: center;
  margin:     10px;
  font-weight: bold;
  padding:10px;

  ">
         <div style="overflow: autoscroll height:630px; width:1200px";>
            <tr>
			<td>Fecha:</td>
                 <td>Hora:</td>
				 <td>usuario:</td>
                 

            </tr>
';
    if ($num > 0) {
                do {
$html .=            '<tr>
<td>' . $row_P['fecha_bit'] . '</td>
<td>' . $row_P['hora_bit'] . '</td>
	    <td>' . $row_P['usuario_bit'] . '</td>
      
       
        <td><a href="../Admin/pdf_auditoria2.php?id_bit='.$row_P['id_bit'].'" target="_blank"><img src="../imagenes/imprimir.png" title="Imprimir" ></a></td>




        </tr>';
                 } while ($row_P = asociativo($query));
$html .= '</table>';
} else {
            $html .= '<h2>NO HAY REGISTROS</h2>';
}
$html .= '</div>';


return $html;
    }


function reporteProduccion()
    {

         	$conexion = conectar();
		
  	// dropdown list para turno
	$tur = "SELECT idturno, numTurno FROM turno";
	$turno = consultar($tur, $conexion);

    	//drop down list para maquina
	$maq = "SELECT idmaquina, numeroMaq FROM maquina";
	$maquina = consultar($maq, $conexion);



     // dropdown maquina

    $dropdown1 = "<select name='idmaquina'>";
	$dropdown1 .= "<option value=0>-------</option>";
	while($row1 = mysql_fetch_assoc($maquina)) {
	$dropdown1 .= "<option value='{$row1['idmaquina']}'>{$row1['numeroMaq']}</option>";
	}
	$dropdown1 .= "</select>";

    // dropdown turno
    $dropdown = "<select name='idturno'>";
	$dropdown .= "<option value=0>-------</option>";
	while($row = mysql_fetch_assoc($turno)) {
	$dropdown .= "<option value='{$row['idturno']}'>{$row['numTurno']}</option>";
	}
	$dropdown .= "</select>";






  $html='  <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>

    <div class="datagrid-productos">

<table>


<thead>
<tr>   
<form action="" method="get">
<h3>
FORMULARIO PARA EL REPORTE DE LA PRODUCCION </h3> </tr> </thead>


<thead><tr>
             <tbody>

		<tr><td>Desde:<input type="date" name="fechaPro" /></td>
       <td>Hasta:<input type="date" name="fechaPro1" /></td>
	   <th>Maquina:'   .$dropdown1. '';
		$html .= '</th>
		<th>Turno:'   .$dropdown. '';

$html .= '</th>
	</tr>
	<tr>
		<th colspan="3" align="center"><input type="submit" value="Buscar" /></th>
	</tr>

</thead>
    </form>
</table>';
return $html;
}

function listaBusquedaProduccion()
{


           	$conexion = conectar();

         $fecha = $_GET['fechaPro'];
         $maquina = $_GET['idmaquina'];
         $turno = $_GET['idturno'];
			$FE1 = $_GET['fechaPro'];
			$FE2 = $_GET['fechaPro1'];
	
			
    


         $que = "SELECT p.idproduccion, p.fechaPro, m.numeroMaq, t.numTurno
         FROM produccion p, maquina m, turno t
         WHERE m.idmaquina=p.idmaquina AND t.idturno=p.idturno
          AND p.fechaPro BETWEEN '$FE1' AND '$FE2' AND p.idmaquina='$maquina' AND p.idturno='$turno' ";
         $query=consultar($que,$conexion);
         $row_P = asociativo($query);
         $num = cantidad($query);



   $html = '<table style="border-collapse: collapse; font-family:arial;
  font-size:15px;
  text-align: center;
  margin:     10px;
  font-weight: bold;
  padding:10px;

  ">
      <div style="overflow: autoscroll height:630px; width:1200px";>
            <tr><td>Fecha:</td>
                 <td>Maquina:</td>
                 <td>Turno:</td>

            </tr>
';
    if ($num > 0) {
                do {
$html .=            '<tr>
<td>' . $row_P['fechaPro'] . '</td>
	    <td>' . $row_P['numeroMaq'] . '</td>
        <td>' . $row_P['numTurno'] .' </td>
       
        <td><a href="../Admin/pdf_produccion2.php?idproduccion='.$row_P['idproduccion'].'" target="_blank"><img src="../imagenes/imprimir.png" title="Imprimir" ></a></td>




        </tr>';
                 } while ($row_P = asociativo($query));
$html .= '</table>';
} else {
            $html .= '<h2>NO HAY REGISTROS</h2>';
}
$html .= '</div>';


return $html;
    }


    function lista_produccion(){


               $conexion = conectar();
  $lista_produccion = "SELECT * FROM produccion  ORDER BY idproduccion  DESC ";
  $produccion = consultar($lista_produccion, $conexion);
  $row = asociativo($produccion);







$lista1 = "<div style='overflow:auto; height:630px; width:1200px'  >
<div class='datagrid'>
<table>
<thead>
<tr>
<h3>
LISTA DE PRODUCCION </h3>  </tr>      </thead>
<thead>
<tr><th>Orden de Fabricación</th><th>Fecha de Producción</th><th colspan='2' >ACCION</th></tr></thead>



            </tr>
";

                do {
$lista1 .= "  <tbody>
<tr ><td>" . $row['ordenFabric'] . "</td>";
$lista1 .=  "<td>" . $row['fechaPro'] . "</td>";
$lista1 .="
 <td><a href='perfProd.php?idproduccion=".$row['idproduccion'] ."'><img src='../imagenes/USER.png' title='Ver perfil'></img ></a></td>

                  </tr>";
                 } while ($row = asociativo($produccion));
                  $lista1 .= "</table> </div> </div>
                  ";
return $lista1;
}

     function perfilPro()
 {
   $prod = $_GET['idproduccion'];
          $conexion = conectar();

  $q1= "SELECT * FROM produccion  WHERE idproduccion=" .$prod."";
  $idP = consultar($q1,$conexion);
  $row= asociativo($idP);

  $maq = $row['idmaquina'];
  $tur = $row['idturno'];
  $produ = $row['idproductos'];
  $per = $row['idpersonal'];



  $q= "SELECT m.numeroMaq, t.numTurno, t.tiempoTurno, p.nombre, p.apellido, pr.descripcion, pr.codigoPrd, pr.tirasAProce , pr.ordenFabric FROM  maquina m, turno t, personal p, productos pr
        WHERE m.idmaquina='$row[idmaquina]' AND t.idturno='$row[idturno]' AND p.idpersonal='$row[idpersonal]' AND pr.idproductos='$row[idproductos]'";
      $idP1 = consultar($q,$conexion);
      $row1= asociativo($idP1);
	  
	
  $totatiras = $row1['tirasAProce'] - $row['tiraProc'] ;
  $totalT = $row['cali1'] + $row['cali2'] + $row['cali_a2'] + $row['cali3']+ $row['chat'];
  $totaPro =  $row1['tiempoTurno'] - $row['tmu'] - $row8['total2'] - $row['tca'];

  $q51= "SELECT sum(tiempo) as total2 FROM paproduccion  WHERE idproduccion=" .$prod."";
  $idP2 = consultar($q51,$conexion);
  $row8=asociativo($idP2);
  $q5= "SELECT * FROM paproduccion  WHERE idproduccion=" .$prod."";
  $idP = consultar($q5,$conexion);
  
  $totaPro =  $row1['tiempoTurno'] - $row['tmu'] - $row8['total2']  - $row['tca'];
 $html= "  <div class='datagrid-perfil'>

<form action='#' method='get'>
<table>
<thead>
<tr>
<th colspan='4' align='center'> Perfil de produccion
</th>
</tr>
</thead>
  <tr>

<tbody>


<tr>


<th align='right' scope='row'>Supervisor:</th>
       <td>".$row1['nombre']." ".$row1['apellido']."</td>";
 $html.= "
       </tr>
  <tr>

    <th align='right' scope='row'>Orden de fabricacion:</th>
         <td>".$row1['ordenFabric']."</td>";
 $html.= "
         </tr>
  <tr>
    <th align='right' scope='row'>Fecha de produccion:</th>
         <td>".$row['fechaPro']."</td>";
 $html.= "
         </tr>
  <tr>
    <th align='right' scope='row'>Producto:</th>
        <td>".$row1['descripcion']."</td>";
 $html.= "
        </tr>
   <th align='right' scope='row'>Turno:</th>
        <td>".$row1['numTurno']."</td>";
 $html.= "
        </tr>
   <th align='right' scope='row'>Maquina:</th>
        <td>".$row1['numeroMaq']."</td>";
 $html.= "
        </tr>
    <tr>
    <th align='right' scope='row'>Tubos de primera calidad:</th>
            <td>".$row['cali1']."</td>";
 $html.= "
			</tr>
            <tr>
    <th align='right' scope='row'>Tubos de segunda calidad galvanizado:</th>
            <td>".$row['cali2']."</td>";
 $html.= "
			</tr>
            <tr>
    <th align='right' scope='row'>Tubos de segunda calidad negra:</th>
            <td>".$row['cali_a2']."</td>";
 $html.= "
			</tr>
            <tr>
    <th align='right' scope='row'>Tubos de tercera calidad:</th>
            <td>".$row['cali3']."</td>";
  $html.= "
        </tr>
    <tr>
    <th align='right' scope='row'>Tubos chatarra:</th>
            <td>".$row['chat']."</td>";
 $html.= "
			</tr>
            <tr>
    <th align='right' scope='row'>Tiras a procesar:</th>
            <td>".$row1['tirasAProce']."</td>";
 $html.= "
			</tr>
            <tr>
    <th align='right' scope='row'>Tiras procesadas:</th>
            <td>".$row['tiraProc']."</td>";
 $html.= "
			</tr>
            <tr>
    <th align='right' scope='row'>Tiras restantes:</th>
            <td>".$totatiras."</td>";
 $html.= "

			</tr>
            <tr>
    <th align='right' scope='row'>Total de tubos:</th>
            <td>".$totalT."</td>";
 $html.= "
			</tr>
            <tr>
    <th align='right' scope='row'>Tiempo de parada:</th>
            <td>".$row8['total2']."</td>";
 $html.= "
			</tr>
            <tr>
    <th align='right' scope='row'>Tiempo de cambio:</th>
            <td>".$row['tca']."</td>";
 $html.= "
			</tr>

            <tr>
    <th align='right' scope='row'>Tiempo muerto:</th>
            <td>".$row['tmu']."</td>";
 $html.= "
			</tr>

            <tr>
    <th align='right' scope='row'>Tiempo del turno:</th>
            <td>".$row1['tiempoTurno']."</td>";
 $html.= "
			</tr>

            <tr>
    <th align='right' scope='row'>Tiempo de la produccion:</th>
            <td>".$totaPro."</td>";
 $html.= "
			</tr>
		
		

            <tr>
    <th align='right' scope='row'><b>NOVEDADES DE LA PRODUCCION:</b></th>
          <td colspan='5'>"."<br/>"." ".@$row['novedades']."</td>";
 $html.= "
			</tr>
			
               </tbody>

  </table>
  


<td><a href='pdf_produccion2.php?idproduccion=".$row['idproduccion'] ."' target='blank'><img src='../imagenes/imprimira.PNG' title=' IMPRIMIR PRODUCCION'> </img ></a></td>
                 <input type='hidden' name='idproduccion' value=".$row['idproduccion']." />
				 
  
 </form>

  ";
 
    $html.='<table border="1">';
	
        $html.='<tr>
		<td colspan="3" align="center"> <b>CONTROL DE PARADAS</b>  </td>
	    </tr>';
		 while($row5=asociativo($idP)){
  	$contador=1;
	

 

	   @$sql2="select * from paradas a,sub_equipo b where a.id='{$row5['idparadas']}' and b.id={$row5['idsub_equipo']}";
		$res2=consultar($sql2,$conexion);
		$r2=asociativo($res2);
    /*    	@$sql3="select * from paproduccion";
		$res4=consultar($sql3,$conexion);
		$r3=asociativo($res4);
        @extract($r3);
    */



       $html.='<table border="0" width="100%" align="center">';

	$html.='<tr align="center">
	<td bgcolor="#666666" color="#FFFFFF" align="center" colspan="1"><b>Nombre Paradas</b></td>
	<td bgcolor="#666666" color="#FFFFFF"colspan="1"><b>Nombre Sub-Equipos</b></td>
	<td bgcolor="#666666" color="#FFFFFF"colspan="2"><b>Tiempo de parada</b></td>

    </tr>';


	$html.='<tr>
	
	<td bgcolor="'.$color.'" colspan="1">'.$r2['nombre_parada'].'</td>
	<td bgcolor="'.$color.'"colspan="2">'.$r2['nombre_subequipo'].'</td>
	<td bgcolor="'.$color.'"colspan="2">'.$row5['tiempo'].'</td>
   
	 
			
		
    </tr>
	
	
	';

            $html.='</table>';
	$contador++;

    }
  
 $html.='</table>';


      return $html;



 }

/*function reporteTiempos()
    {

         	$conexion = conectar();

  	// dropdown list para turno
	$tur = "SELECT idturno, numTurno FROM turno";
	$turno = consultar($tur, $conexion);

    	//drop down list para maquina
	$maq = "SELECT idmaquina, numeroMaq FROM maquina";
	$maquina = consultar($maq, $conexion);

     // dropdown maquina

    $dropdown1 = "<select name='idmaquina'>";
	$dropdown1 .= "<option value=0>-------</option>";
	while($row1 = mysql_fetch_assoc($maquina)) {
	$dropdown1 .= "<option value='{$row1['idmaquina']}'>{$row1['numeroMaq']}</option>";
	}
	$dropdown1 .= "</select>";

    // dropdown turno
    $dropdown = "<select name='idturno'>";
	$dropdown .= "<option value=0>-------</option>";
	while($row = mysql_fetch_assoc($turno)) {
	$dropdown .= "<option value='{$row['idturno']}'>{$row['numTurno']}</option>";
	}
	$dropdown .= "</select>";




      $html= '<h1>FORMULARIO PARA EL REPORTE DE TIEMPOS DE PRODUCCI?N</h1>

<form action="" method="get">
<table>
	<tr>
		<td>Fecha: <input type="date" name="fecha" /></td>
		<td>Maquina: '   .$dropdown1. '';
		$html .= '</td>
		<td>Turno:  '   .$dropdown. '';

$html .= '
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center"><input type="submit" value="Buscar" /></td>
	</tr>
</table>
</table>
</form>
</body>
</html>';

 return $html;


    }     */

function insert_paradas()
{
    $conexion=conectar();
                 //insert_paradas
    mysql_select_db("sidepo",$conexion) or
    die("Problemas en la seleccion dela base de datos");

        $idproduccion = $_POST['idproduccion'];
        $idtiempos = $_POST['tiempo'];
        $idparadas = $_POST['idparadas'];
        $idsub_equipo = $_POST['idsub_equipo'];

                 for ($i = 0; $i<=10; $i++){

                   if($idparadas[$i]>0 && $idtiempos[$i]>0 && $idsub_equipo[$i]>0){

            $sql = "insert into paproduccion (idproduccion, tiempo, idparadas, idsub_equipo) values
   ('$idproduccion', '$idtiempos[$i]', '$idparadas[$i]', '$idsub_equipo[$i]')";

   $res=consultar($sql,$conexion);


                   }
            }
  /* $r= asociativo($res);*/
mysql_close($conexion);
}

/* function R_paradas()
 {
       /* $conexion = conectar();
        $sql = "SELECT * FROM paproduccion";
          $sum = consultar($sql, $conexion);
          $fila = asociativo($sum);

          $fila1 = ['tiempo'];
       $tiempo = $fila;

                 $suma = $tiempo[0]+$tiempo[1]+$tiempo[2]+$tiempo[3]+$tiempo[4]+$tiempo[5]+$tiempo[6]+$tiempo[7]+$tiempo[8]+$tiempo[9]+$tiempo[10]+$tiempo[11];
*/
 /*   $conexion = conectar();

    $q = "SELECT idproduccion FROM produccion ORDER BY idproduccion DESC LIMIT 1";
    $idP = mysql_fetch_assoc(mysql_query($q));
    $idPro = $idP['idproduccion'];


  	// dropdown list para paradas
	$par = "SELECT * FROM paradas";
	$parada = consultar($par, $conexion);

   // drown para paradas
    $dropdown = "<select name='idparadas[]' >";
	$dropdown .= "<option value=''>-------------------------------</option>";
	while($row = mysql_fetch_assoc($parada)) {
	$dropdown .= "<option value='{$row['id']}'>{$row['nombre_parada']}</option>";
	}
	$dropdown .= "</select>";


    // dropdown list para paradas
	$par2 = "SELECT * FROM sub_equipo";
	$parada2 = consultar($par2, $conexion);

   // drown para paradas

    $dropdown2 = "<select name='idsub_equipo[]' >";
	$dropdown2 .= "<option value=''>-------------------------------</option>";
	while($row = mysql_fetch_assoc($parada2)) {
	$dropdown2 .= "<option value='{$row['id']}'>{$row['nombre_subequipo']}</option>";
	}
	$dropdown2 .= "</select>";

$html=' <!DOCTYPE html>

<html>

<head>
  <title></title>

<style type="text/css">

	border-radius: 10px;
}
.titulos {
	text-align:center;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
	font-weight:bold;
}

</style>
</head>

<body>

<div style="overflow:auto; height:430px; width:auto;  margin:0px 0px 0px 32px; ">
<form action="#" method="post">
        <table border="1" id="tablas"  width="15%" height="80%">
          <tr>
		<td colspan="6" class="titulos"> <h1>CONTROL DE PARADAS</h1>  </td>
	</tr>

        <tr border="2">
            <td colspan="1">CAUSA PARADA</td>
            <td colspan="1">SUB EQUIPO</td>
            <td colspan="1" >TIEMPO</td>

          </tr>';

          for ($i = 0; $i<=10; $i++){
        $html .= '<tr> <td>  '   .$dropdown. '';
		$html .= '</td>
        <td>' . $dropdown2. '';
		$html .= '
        </td>
            <td><input type="text" name="tiempo[]" title="Ingrese tiempo de parada" maxlength="12"  size="10"  onkeypress="return numeros(event)" ></td>

          </tr>';

          }
  $html .=   '<tr>

          <input type="hidden" name="idproduccion" value="'. $idPro .'" />
		<td colspan="5" style="text-align:center;"><input type="reset" value="RESTABLECER" name="BORRAR" />  <input type="submit" value="ENVIAR" name="enviar2" /></td>
	</tr>
        </table>
</form>
</div>
</div>
</body>
</html>';

 return $html;

 }*/






   /*

$html='<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
<style type="text/css">
#tabla {
	margin: 30px 0px 0px 150px;
	border-radius: 10px;
}
.titulos {
	text-align:center;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
	font-weight:bold;
}

</style>
</head>

<body>
<div style="overflow:auto; height:430px;">
<form method="get" action="#">
<table id="tabla" border="1" width="10%" height="10%" 	>
	<tr>
		<td colspan="5" style="text-align:center;" class="titulos" ><h2>CONTROL DE PRODUCCION</h2></td>
	</tr>
	<tr>
		<td>Fecha: <input type="date" name="fecha" required="Ingrese fecha por favor" size="5" /></td>
		<td>Turno: ' . $dropdown . '</td>

		<td>Maquina:' .$dropdown1.'</td>
		<td>Supervisor: ' .$dropdown2.'</td>
		<td>P/A: <input type="text" name="#"  size="10" title="Ingrese el personal ausente"/></td>
	</tr>
		<tr>
		<td colspan="5" class="titulos"><h2>Descripcion del Producto</h2></td>
		</tr>
		<tr>
		<td colspan="2">O/F: <br> <input type="text" name="o/f" title="Ingrese la orden de fabricacion" / size="10"></td>
		<td colspan="3"> Producto | Codigo: <br>
			<select name="producto">
				<option>------------</option>
			</select>

				</td>


	 </tr>
	<tr>
		<td colspan="5" class="titulos"><h2>Clasificacion de Tuberia</h2></td>
	</tr>
	<tr>
		<td>1era Cal: <br> <input type="text" name="1cali" size="10" /></td>
		<td>2da Cal galv: <input type="text" name="2cali" size="10" /></td>
		<td>2da Cal neg: <input type="text" name="2cali_a" size="10"/></td>
		<td>3ra Cal: <input type="text" name="3cali" size="10" /></td>
		<td>Total: <input type="text" name="total" size="10" /></td>
	</tr>
	<tr>
		<td colspan="5" class="titulos"><h2>Control de Tiras</h2></td>
	</tr>
	<tr>
		<td colspan="2">Cantidad de tiras requeridas: <input type="text" name="t/r" size="10" /></td>
		<td colspan="2">Cantidad de tiras procesadas: <input type="text" name="t/p" size="10" /></td>
		<td>Tiras restantes: <input type="text" name="ti/re" size="10" /></td>
	</tr>
	<tr>
		<td colspan="5" class="titulos"><h2>Notificacion de Produccion (Tiempos min)</h2></td>
	</tr>
	<tr>
		<td>Tiempo total: <input type="text" name="t/t" size="10" /></td>
		<td>Parada: <input type="text" name="t/pa" size="10" /></td>
		<td>Cambio: <input type="text" name="t/ca" size="10" /></td>
		<td>T. muerto: <input type="text" name="t/mu" size="10" /></td>
		<td>Produccion: <input type="text" name="t/pro" size="10" /></td>
	</tr>
	<tr>
		<td colspan="5" style="text-align:center;"><input type="reset" value="RESTABLECER" name="BORRAR" />  <input type="submit" value="ENVIAR" /></td>
	</tr>
</table>
</form>
</div>
</body>
</html>
';
return $html;*/



/*          function R_productos(){

$html='<div id="contenedorform">
<form method="post" action="#"  name="Nue_Insc" id="Nue_Insc" >
<fieldset>
<legend><h1 align="center"> Registro de productos </h1></legend>
	<table align="center">
		<tr>
            <th valign="top" align="right">Codigo del producto:</th>
			<td align="left"><input type="text"  pattern="[A_-Za_-z]{1,10}"   name="codigoPrd" size="12" maxlength="12" required onkeypress="return numeros(event)"  ></td>
          </tr>
          <tr>
            <th valign="top" align="right">Peso del producto:</th>
			<td align="left"><input type="text"  pattern="[A_-Za_-z]{1,10}"   name="pesoProd " size="12" maxlength="12" required onkeypress="return numeros(event)" ></td>
          </tr>
        <tr>
            <th valign="top" align="right">Descripcion del producto:</th>
			<td><textarea maxlength="150" onkeypress="return letras(event)" name="descripcion" required></textarea></td>
		</tr>
        <tr>
			<td colspan="2" align="right">
			<input class="botonsubmit" type="reset" value="Borrar">
            <input class="botonsubmit" type="submit" value="Ingresar" name="enviar_productos">
            </td>
        </tr>
	</table>
</form>
</div>';
return $html;
}*/






function insert_productos(){
extract($_POST);
$conexion=conectar();
  $sq="select * from productos where codigoPrd=".$codigoPrd." AND ordenFabric=".$ordenFabric." ";
  $res=consultar($sql,$conexion);
@$can=cantidad($res);
if(@$can==0){
$sql = ("insert into productos(descripcion, codigoPrd, pesoProd, ordenFabric, tirasAProce) values
   ('$descripcion', '$codigoPrd', '$pesoProd', '$ordenFabric', '$tirasAProce')") or die("Problemas en el select".mysql_error());


    $res=consultar($sql,$conexion);
    $res=true;
mysql_close($conexion);

}

}
function lista_productos(){
               $conexion = conectar();
  $lista_productos = "SELECT * FROM productos  ORDER BY idproductos  DESC";
  $productos = consultar($lista_productos, $conexion);
    $row = asociativo($productos);


       ?>

 <tbody>
<tr ><td> <div style='overflow:auto; height:630px; width:1200px'  >
<div class='datagrid'>
<table>
<thead>
<tr>
<h3>
LISTA DE PRODUCTOS </h3>  </tr>      </thead>
   <thead>
               <tr><th>CODIGO DEL PRODUCTO</th>
                 <th>DESCRIPCION DEL PRODUCTO</th>
                 <th>PESO DEL PRODUCTO</th>
                 <th colspan='3'>ACCION</th>
                 </thead>
            </tr>


               <?php
                $i = 0;

               do { ?>

<tr <?php echo $i++ % 2 ? 'class=""' : 'class="alt"'; ?>><td> <?php echo $row['codigoPrd'] ?></td>
	  <td><?php echo $row['descripcion'] ?></td>
      <td> <?php echo $row['pesoProd'] ?></td>
       <td><a href='actualizar_producto.php?idproductos="<?php $row['idproductos'] ?>"'><img src='../imagenes/editar.png'  title='Editar productos'></img></a></td>

                  </tr>
                <?php } while  ($row = asociativo($productos)); ?>
                  </table> </div>
        <?php
        }

        function actualizar_productos()
{


$per =$_GET['idproductos'];
$conexion=conectar();

$sql = ("SELECT * FROM productos WHERE idproductos=" .$per."");


   $res=consultar($sql,$conexion);
   $row_rcspers = asociativo($res);


$html = '<div id="contenedorform">
<form method="post" action="#"  name="Nue_Insc" id="Nue_Insc" >
<fieldset>
<legend><h1 align="center"> Actualizar productos </h1></legend>
	<table align="center">
		<tr>
            <th valign="top" align="right">Codigo del producto:</th>
			<td align="left"><input type="text"  pattern="[A_-Za_-z]{1,10}"   name="codigoPrd" size="12" maxlength="12" required value="'.$row_rcspers['codigoPrd'].'" onkeypress="return numeros(event)"  ></td>
          </tr>
          <tr>
            <th valign="top" align="right">Peso del producto:</th>
			<td align="left"><input type="text"   name="pesoProd" size="12" maxlength="12" required value="'.$row_rcspers['pesoProd'].'"  onkeypress="return numeros(event)" ></td>
          </tr>
        <tr>
            <th valign="top" align="right">Descripcion del producto:</th>
			<td><textarea maxlength="150"  name="descripcion" required>'.$row_rcspers['descripcion'].'</textarea> </td>
		</tr>
        <tr>
			<td colspan="2" align="right">

            <input class="botonsubmit" type="submit" value="Ingresar" name="actualizar_productos">
            </td>
        </tr>
	</table>
</form>
</div>';



return $html;



}

function insert_updateProducto()
{
        $pr = $_GET['idproductos'];
@$descripcion = $_REQUEST['descripcion'];
@$codigoprd = $_REQUEST['codigoPrd'];
@$pesoProd = $_REQUEST['pesoProd'];
$conexion=conectar();

  $sq="select * from productos where codigoPrd=".$codigoprd."";
  $res=consultar($sql,$conexion);
$can=cantidad($res);
if($can==0){

$sql = ("update productos set descripcion='$descripcion', codigoPrd='$codigoprd', pesoProd='$pesoProd' WHERE idproductos=".$pr."") or die("Problemas en el select".mysql_error());

   $res=consultar($sql,$conexion);
//  $r= asociativo($res);
mysql_close($conexion);





}

 }
                 /*
        function R_maquina(){
$html = '<div id="contenedorform">
<form method="post" action="#"  name="Nue_Insc" id="Nue_Insc" >
<fieldset>
<legend><h1 align="center"> Registro de maquina </h1></legend>
	<table align="center">
		<tr>

        <th valign="top" align="right">Numero de la maquina:</th>
		<td align="left"><input type="text" pattern="[A_-Za_-z]{1,10}"   name="nmaquina" size="12" maxlength="12" required ></td>

    	<tr>
        <th valign="top" align="right">Descripcion de la maquina:</th>
		<td ><textarea maxlength="150" required name="descripcion"></textarea></td>	</tr>
    	</tr>
            <tr>
			<td colspan="2" align="right"><input class="botonsubmit" type="reset" value="Borrar">
            <input class="botonsubmit" name="enviar_maquina" type="submit" value="Ingresar">
            </td>


        </tr>

	</table>
</form></div>';




return $html;
}
*/

function insert_maquina(){

@$numeroMaq = $_REQUEST['numeroMaq'];
@$descripcion = $_REQUEST['descripcion'];

$conexion=conectar();


  $sq="select * from maquina where numeroMaq=".$numeroMaq."";
  $res=consultar($sq,$conexion);
$can=cantidad($res);
if($can==0){

$sql = ("insert into maquina(numeroMaq, descripcion) values
   ('$numeroMaq', '$descripcion') ") or die("Problemas en el select".mysql_error());

   $res=consultar($sql,$conexion);
  /* $r= asociativo($res);*/
mysql_close($conexion);
}
}
        function lista_maquina(){
               $conexion = conectar();
  $lista_maquina = "SELECT * FROM maquina  ORDER BY idmaquina  DESC";
  $maquina = consultar($lista_maquina, $conexion);
    $row = asociativo($maquina);



$lista3= "<div style='overflow:auto; height:630px; width:1200px'  >
<div class='datagrid'>
<table>
<thead>
<tr>
<h3>
LISTA DE MAQUINAS </h3>  </tr>      </thead>


<thead>
<tr>
                 <th>Numero de maquina</th>
                 <th>Descripcion de la maquina</th>
                 <th colspan='3'>ACCION</th>
</thead>
</tr>
";

                do {
$lista3 .= " <tbody>
<tr><td>" . $row['numeroMaq'] . "</td>";
	  $lista3 .=  "<td>" . $row['descripcion'] . "</td>";
       $lista3 .="
                  <td><a href='actualizar_maquina.php?idmaquina=".$row['idmaquina'] ."'><img src='../imagenes/editar.png'  title='Editar maquina'></img></a></td>
                  </tr>";
                 } while ($row = asociativo($maquina));
                  $lista2 .= "</table>
                   </div>
                   </div>
                  </div>
                  ";
return $lista3;
        }

       /* function R_turnos(){



$html='<div id="contenedorform">
<form method="post" action="#"  name="Nue_Insc" id="Nue_Insc" >
<fieldset>
<legend><h1 align="center"> Registro de Turnos </h1></legend>
	<table align="center">
		<tr>

             <th valign="top" align="right">Numero de Turno:</th>
			<td align="left"><input type="text" pattern="[A_-Za_-z]{1,10}"   name="numTurno" size="12" maxlength="12" required onkeypress="return numeros(event)"  ></td>
          </tr>
        <tr>
            <th valign="top" align="right">Tiempo del Turno:</th>
			<td><input type="text" pattern="[A_-Za_-z]{1,10}"   name="tiempoTurno" size="12" maxlength="12" required onkeypress="return numeros(event)" ></td>	</tr>

            <tr>
			<td colspan="2" align="right"><input class="botonsubmit" type="reset" value="Borrar">
            <input class="botonsubmit" type="submit" value="Ingresar">
            </td>


        </tr>

	</table>
</form></div>';



return $html;
}*/

function actualizar_maquina()
{


$ma = $_GET['idmaquina'];
$conexion=conectar();


$sql = ("SELECT * FROM maquina WHERE idmaquina=".$ma."");


   $res=consultar($sql,$conexion);
   $row_rcspers = asociativo($res);
?>
	<style>
	.ui-tooltip, .arrow:after {
		background: black;
		border: 2px solid white;
	}
	.ui-tooltip {
		padding: 10px 20px;
		color: white;
		border-radius: 20px;
		font: bold 14px "Helvetica Neue", Sans-Serif;
		text-transform: uppercase;
		box-shadow: 0 0 7px black;
	}
	.arrow {
		width: 70px;
		height: 16px;
		overflow: hidden;
		position: absolute;
		left: 50%;
		margin-left: -35px;
		bottom: -16px;
	}
	.arrow.top {
		top: -16px;
		bottom: auto;
	}
	.arrow.left {
		left: 20%;
	}
	.arrow:after {
		content: "";
		position: absolute;
		left: 20px;
		top: -20px;
		width: 25px;
		height: 25px;
		box-shadow: 6px 5px 9px -9px black;
		-webkit-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		tranform: rotate(45deg);
	}
	.arrow.top:after {
		bottom: -20px;
		top: auto;
	}
	
	* { box-sizing: border-box; }


form {
 	 background:url(../imagenes/logo.png); 
	 background-size:500px;
	 background-repeat: no-repeat;
 background-position: 50% 80%;

  width:400px;
  margin:-40px auto;
  border-radius:0.4em;

  overflow:hidden;
  position:relative;
  box-shadow: 0 5px 10px 5px rgba(0,0,0,0.2);
}

form:after {
  content:"";
  display:block;
  position:absolute;
  height:1px;
  width:100px;
  left:20%;
  background:linear-gradient(left, #111, #444, #b6b6b8, #444, #111);
  top:10;
}

form:before {
 	content:"";
  display:block;
  position:absolute;
  width:8px;
  height:5px;
  border-radius:50%;
  left:34%;
  top:-7px;
  box-shadow: 0 0 6px 4px #fff;
}

.inset {
 	padding:20px; 
  border-top:1px solid #19191a;
  
}

form h1 {
	color: black;
  font-size:28px;
  text-shadow:0 1px 0 black;
  text-align:center;
  padding:15px 0;
  border-bottom:1px solid rgba(0,0,0,1);
  position:relative;
}

form h1:after {
 	content:"";
  display:block;
  width:250px;
  height:100px;
  position:absolute;
  top:0;
  left:50px;
  pointer-events:none;
  transform:rotate(70deg);
  background:linear-gradient(50deg, rgba(255,255,255,0.15), rgba(0,0,0,0));
  
}

label {
 	color:black;
  display:block;
  padding-bottom:9px;
}

input[type=text],
input[type=password],textarea {
text-align:center;
 	width:100%;
  padding:8px 5px;
   background:url(../imagenes/bg.png); 
  border:1px solid #222;
  box-shadow:
    0 1px 0 rgba(255,255,255,0.1);
  border-radius:0.3em;
  margin-bottom:20px;
  font-weight:bold;
  cursor:pointer;
  font-size:23px;
}

label{

 	color:black;
  display:inline-block;
  padding-bottom:0;
  padding-top:5px;
   font-size:20px;
    font-weight:bold;
}



.p-container {
 	padding:0 20px 20px 20px; 
}

.p-container:after {
 	clear:both;
  display:table;
  content:"";
}

.p-container span {
  display:block;
  float:left;
  color:black;
  padding-top:8px;
}

input[type=submit],[type=reset] {
 	padding:5px 20px;
  border:1px solid rgba(0,0,0,0.4);
  text-shadow:0 -1px 0 rgba(0,0,0,0.4);
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.3),
    inset 0 10px 10px rgba(255,255,255,0.1);
  border-radius:0.3em;
  background:#0184ff;
  background: rgb(252,255,244); /* Old browsers */
background: -moz-linear-gradient(top, rgba(252,255,244,1) 0%, rgba(223,229,215,1) 40%, rgba(179,190,173,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(252,255,244,1)), color-stop(40%,rgba(223,229,215,1)), color-stop(100%,rgba(179,190,173,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* W3C */

  float:right;
  font-weight:bold;
  cursor:pointer;
  font-size:23px;
}

input[type=submit]:hover {
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.3),
    inset 0 -10px 10px rgba(255,255,255,0.1);
}

input[type=text]:hover,
input[type=password]:hover,
label:hover ~ input[type=text],
label:hover ~ input[type=password], textarea {
 	 background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(255,255,255,0))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#00ffffff',GradientType=0 ); /* IE6-9 */
	</style>
	</style>
	</style>

<?php
$html = '		  <div id="contenedorform">
<form method="post" action="#"  name="Nue_Insc" id="Nue_Insc">
  <h1>Actualizar  maquina</h1>
  <div class="inset">
  <p>
    <label for="">Numero de la maquina:</label>
  <input type="text" pattern="[A_-Za_-z]{1,10}"   name="numeroMaq" size="12" maxlength="2" readonly required onkeypress="return numeros(event)" value="'.$row_rcspers['numeroMaq'].'" >
  </p>
  <p>
    <label for="password">Descripcion de la maquina:</label>
  <textarea maxlength="150"  name="descripcion"   required>'.$row_rcspers['descripcion'].'</textarea>
  </p>
 
  
  </div>
  <p class="p-container">
   <input name="actualizar_maquina" type="submit" value="Actualizar">
            
  </p>
</form>
           
</div>


';



return $html;



}

function insert_updateMaquina()
{
  $ma = $_GET['idmaquina'];
 extract($_POST);


$conexion=conectar();

    $sq="select * from maquina where numeroMaq=".$numeroMaq."";
  $res=consultar($sq,$conexion);
$can=cantidad($res);
if($can==0){


$sql = ("UPDATE maquina SET descripcion='$descripcion',numeroMaq='$numeroMaq' WHERE idmaquina =" .$ma. "") or die("Problemas en el select".mysql_error());

   $res=consultar($sql,$conexion);
  /* $r= asociativo($res);*/
  
  
mysql_close($conexion);




}
}

function actualizar_turno()
{


$tu = $_GET['idturno'];
$conexion=conectar();

$sql = ("SELECT * FROM turno WHERE idturno=" .$tu."");


   $res=consultar($sql,$conexion);
   $row_rcspers = asociativo($res);

?>
 <link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
<script>
$(function() {
		$( document ).tooltip({
			position: {
				my: "center bottom-20",
				at: "center top",
				using: function( position, feedback ) {
					$( this ).css( position );
					$( "<div>" )
						.addClass( "arrow" )
						.addClass( feedback.vertical )
						.addClass( feedback.horizontal )
						.appendTo( this );
				}
			}
		});
	});
	</script>
	<style>
	.ui-tooltip, .arrow:after {
		background: black;
		border: 2px solid white;
	}
	.ui-tooltip {
		padding: 10px 20px;
		color: white;
		border-radius: 20px;
		font: bold 14px "Helvetica Neue", Sans-Serif;
		text-transform: uppercase;
		box-shadow: 0 0 7px black;
	}
	.arrow {
		width: 70px;
		height: 16px;
		overflow: hidden;
		position: absolute;
		left: 50%;
		margin-left: -35px;
		bottom: -16px;
	}
	.arrow.top {
		top: -16px;
		bottom: auto;
	}
	.arrow.left {
		left: 20%;
	}
	.arrow:after {
		content: "";
		position: absolute;
		left: 20px;
		top: -20px;
		width: 25px;
		height: 25px;
		box-shadow: 6px 5px 9px -9px black;
		-webkit-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		tranform: rotate(45deg);
	}
	.arrow.top:after {
		bottom: -20px;
		top: auto;
	}
	* { box-sizing: border-box; }


form {
 	 background:url(../imagenes/logo.png); 
	 background-size:500px;
	 background-repeat: no-repeat;
 background-position: 50% 80%;

  width:400px;
  margin:-40px auto;
  border-radius:0.4em;

  overflow:hidden;
  position:relative;
  box-shadow: 0 5px 10px 5px rgba(0,0,0,0.2);
}

form:after {
  content:"";
  display:block;
  position:absolute;
  height:1px;
  width:100px;
  left:20%;
  background:linear-gradient(left, #111, #444, #b6b6b8, #444, #111);
  top:10;
}

form:before {
 	content:"";
  display:block;
  position:absolute;
  width:8px;
  height:5px;
  border-radius:50%;
  left:34%;
  top:-7px;
  box-shadow: 0 0 6px 4px #fff;
}

.inset {
 	padding:20px; 
  border-top:1px solid #19191a;
  
}

form h1 {
	color: black;
  font-size:28px;
  text-shadow:0 1px 0 black;
  text-align:center;
  padding:15px 0;
  border-bottom:1px solid rgba(0,0,0,1);
  position:relative;
}

form h1:after {
 	content:"";
  display:block;
  width:250px;
  height:100px;
  position:absolute;
  top:0;
  left:50px;
  pointer-events:none;
  transform:rotate(70deg);
  background:linear-gradient(50deg, rgba(255,255,255,0.15), rgba(0,0,0,0));
  
}

label {
 	color:black;
  display:block;
  padding-bottom:9px;
}

input[type=text],
input[type=password] {
text-align:center;
 	width:100%;
  padding:8px 5px;
   background:url(../imagenes/bg.png); 
  border:1px solid #222;
  box-shadow:
    0 1px 0 rgba(255,255,255,0.1);
  border-radius:0.3em;
  margin-bottom:20px;
  font-weight:bold;
  cursor:pointer;
  font-size:23px;
}

label{

 	color:black;
  display:inline-block;
  padding-bottom:0;
  padding-top:5px;
   font-size:20px;
    font-weight:bold;
}



.p-container {
 	padding:0 20px 20px 20px; 
}

.p-container:after {
 	clear:both;
  display:table;
  content:"";
}

.p-container span {
  display:block;
  float:left;
  color:black;
  padding-top:8px;
}

input[type=submit],[type=reset] {
 	padding:5px 20px;
  border:1px solid rgba(0,0,0,0.4);
  text-shadow:0 -1px 0 rgba(0,0,0,0.4);
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.3),
    inset 0 10px 10px rgba(255,255,255,0.1);
  border-radius:0.3em;
  background:#0184ff;
  background: rgb(252,255,244); /* Old browsers */
background: -moz-linear-gradient(top, rgba(252,255,244,1) 0%, rgba(223,229,215,1) 40%, rgba(179,190,173,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(252,255,244,1)), color-stop(40%,rgba(223,229,215,1)), color-stop(100%,rgba(179,190,173,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* W3C */

  float:right;
  font-weight:bold;
  cursor:pointer;
  font-size:23px;
}

input[type=submit]:hover {
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.3),
    inset 0 -10px 10px rgba(255,255,255,0.1);
}

input[type=text]:hover,
input[type=password]:hover,
label:hover ~ input[type=text],
label:hover ~ input[type=password] {
 	 background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(255,255,255,0))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#00ffffff',GradientType=0 ); /* IE6-9 */

	</style>
<?php
$html='
 <div id="contenedorform">
<form method="post" action="#"  name="Nue_Insc" id="Nue_Insc">
  <h1>Registro de Turnos </h1>
  <div class="inset">
  <p>
    <label for="">Turno:</label>
   <input type="text" pattern="[A_-Za_-z]{1,10}"   name="numTurno" size="12" maxlength="6" readonly required onkeypress="return vacio(event)"  required value="'.$row_rcspers['numTurno'].'">
  </p>
  <p>
    <label for="password">Tiempo del Turno:</label>
   <input type="text" pattern="[A_-Za_-z]{1,10}"   name="tiempoTurno" size="12" maxlength="3" required onkeypress="return numeros(event)"  value="'.$row_rcspers['tiempoTurno'].'">
  </p>
 
  
  </div>
  <p class="p-container">
   <input class="botonsubmit" type="submit" value="Actualizar" name="actualizar_turno">
   
            
  </p>
</form>
           
</div>

';



return $html;



}

function insert_updateTurno()
{


    $tu = $_GET['idturno'];
extract($_POST);

$conexion=conectar();

 $sq="select * from turno where numTurno=".$numeroturno."";
  $res=consultar($sq,$conexion);
$can=cantidad($res);
if($can==0){

$sql = ("update turno set numTurno ='$numTurno',tiempoTurno='$tiempoTurno' WHERE idturno=".$tu. "") or die("Problemas en el select".mysql_error());

   $res=consultar($sql,$conexion);
  /* $r= asociativo($res);*/
mysql_close($conexion);


}
}

function insert_turno(){

@$numeroturno = $_REQUEST['numTurno'];
@$tiempoturno = $_REQUEST['tiempoTurno'];

$conexion=conectar();
mysql_select_db("sidepo",$conexion) or
  die("Problemas en la seleccion de la base de datos");





    $sq="select * from turno where numTurno=".$numeroturno."";
  $res=consultar($sq,$conexion);
$can=cantidad($res);
if($can==0){
$sql = ("insert into turno(numTurno, tiempoTurno) values
   ('$numeroturno', '$tiempoturno') ") or die("Problemas en el select".mysql_error());



   $res=consultar($sql,$conexion);
  /* $r= asociativo($res);*/
mysql_close($conexion);


}
}


         function lista_turno(){
               $conexion = conectar();
  $lista_turno = "SELECT * FROM turno  ORDER BY idturno  DESC";
  $turno = consultar($lista_turno, $conexion);
    $row = asociativo($turno);



$lista4= " <div style='overflow:auto; height:630px; width:1200px'  >
<div class='datagrid'>
<table>
<thead>
<tr>
<h3>
LISTA DE TURNOS </h3>  </tr>      </thead>

            <tr>
<thead>
             <th>Numero del turno</th>
                 <th>Tiempo del turno</th>
                 <th colspan='3'>ACCION</th>
</thead>
    </tr>
";

                do {
$lista4 .= "<tr><td>" . $row['numTurno'] . "</td>";
	  $lista4 .=  "<td>" . $row['tiempoTurno'] . "</td>";
       $lista4 .="  <td><a href='actualizar_turno.php?idturno=".$row['idturno'] ."'><img src='../imagenes/editar.png'  title='Editar turno'></img></a></td>
                  </tr>";
                 } while ($row = asociativo($turno));
                  $lista4 .= "</table>";
return $lista4;
        }




/*function R_tiempos(){



$html='<div id="contenedorform">
<form method="post" action="#" >
<fieldset>
<legend><h1 align="center"> Registro de Tiempos </h1></legend>
	<table align="center">
		<tr>

             <th valign="top" align="right">Tiempo de Parada:</th>
			<td align="left"><input type="text" pattern="[A_-Za_-z]{1,10}"   name="tiempo_p" size="12" maxlength="12" required ></td>
          </tr>
        <tr>
              <th valign="top" align="right">Tiempo de Cambio:</th>
			<td align="left"><input type="text" pattern="[A_-Za_-z]{1,10}"   name="tiempo_c" size="12" maxlength="12" required ></td>

            </tr>
            <tr>

             <th valign="top" align="right">Tiempo Muerto:</th>
			<td align="left"><input type="text" pattern="[A_-Za_-z]{1,10}"   name="tiempo_m" size="12" maxlength="12" required ></td>
          </tr>

            <tr>
			<td colspan="2" align="right"><input class="botonsubmit" type="reset" value="Borrar">
            <input class="botonsubmit" type="submit" value="Ingresar">
            </td>


        </tr>

	</table>
</form></div>';



return $html;
}



  */







function pie2()
{
	$html='</div>
	</div>
	<div id="pie"><a href="contactanos.php" style="text-decoration:none; color:white;">
Copyright &copy; 2014.<br />
    	Estudiantes de la UPTA .<br />
        Derechos Reservados. <br />
		CLICK POR FAVOR
		</a>
</div>
</body>
</html>';
return $html;
}