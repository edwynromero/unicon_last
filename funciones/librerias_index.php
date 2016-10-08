<?php
                error_reporting(E_ALL & ~E_NOTICE);
@session_start();

 function conectar()
{
	$idc=mysql_connect('localhost','root','');

	if(!$idc)
	{
		echo 'Error Conectando con Servidor '.mysql_error($idc);
		die();
	}

	$r=mysql_select_db('sidepo',$idc);

	if(!$r)
	{
		echo 'Error Conectando con Base de datos '.mysql_error($idc);
		die();
	}
	return $idc;
}

function consultar($sql,$c)
{
	return @mysql_query($sql,$c); //ejecuta una sentencia sql, devuelve un arreglo con el resultado
}
function cantidad($r)
{
	return @mysql_num_rows($r);  //cuenta cantidad de registros que contiene el resultdo de ejecutar un sentencia sql
}
function asociativo($r)
{
	return @mysql_fetch_array($r);  //cuenta cantidad de registros que contiene el resultado de ejecutar un sentencia sql
}

/*function entrada($datos){

extract($datos);//Obtengo todos los Datos que vienen via POST y los Guardo en Variables que tienen por nombre el name de cada campo
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
		$eEntrada='Usuario o Clave Incorrectos';
	}
}
else
{
	$_SESSION['msj_1']='Datos Vacios, por favor verifique';
}

if($con==1)
{

	header ("Location: ../admin/index.php");
}
else
{
  	$_SESSION['error']=true;
 	header ("Location: ../index.php");
}


}

*/



function cabecera()
{

/*if(isset($_SESSION['usuario_activo'])) $user=$_SESSION['usuario_activo'];
else $user=' NO IDENTIFICADO';*/

	$html='
    <!DOCTYPE html>
<style type="text/css">


#contenedorform {
	border-radius:20px;
  width:500px;
  margin-left:320px;
  margin-top:100px;
  background: url(imagenes/logo.png	),url(imagenes/bg.png);
  border:1px solid #CCC;
  padding:10px 0 10px 0;
}

#contenedorform form label {
  width:120px;
  float:left;
  font-family:verdana;
  font-size:14px;
}
.botonsubmit {
  color:blue;
  background-color:#bbb;
  border: 1px solid #fff;
  text-align: right;
}
fieldset {
	border-radius:20px;

}</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/estilos_index.css" type="text/css"/>
<title>Control de producci&oacute;n de Unicon</title>

</head>

<body background="imagenes/unicont.png">
<div id="contenedor">
	<div id="cabecera">

		 </div>
		 <div id="cuerpo">';
	return $html;
}




function usuario(){

$html = '<div id="contenedorform">
<form method="post">
<fieldset>
<legend><h1 align="center"> Acceso al sistema</h1></legend>
	<table align="center">
		<tr>
			<th valign="top">Usuario:</th>
			<td style="padding-bottom: 15px;">
				<input type="text" name="usuario" size="12" required="required" maxlength="12" placeholder="Ingrese usuario">
			</td>
		</tr>
		<tr>
			<th>Clave:</th>
			<td><input type="password" name="clave" size="12" required="required" maxlength="12" placeholder="Ingrese clave"></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input class="botonsubmit" type="submit" name="boton" value="Ingresar"></td>
		</tr>
	</table>
</form>
</div>';
return $html;
}
function pie()
{
	$html='</div>
	</div>
</div>
</body>
</html>';
return $html;
}
?>
