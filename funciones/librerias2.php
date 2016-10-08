                                              <?php
    include("librerias_index3.php");


function entrar(){

session_start();

$usuario = $_POST['usuario'];
$clave  =  $_POST['clave'];

$conexion=conectar();

$sql =("SELECT usuario, clave, nivel FROM personal  WHERE usuario = '$usuario' and clave = '$clave' ");

$resul = consultar($sql, $conexion);

$fila = asociativo($resul);



$usu = $fila['usuario'];
$cla = $fila['clave'];
$nivel = $fila['nivel'];
$idp = $fila['idpersonal'];

$_SESSION['usuario']=$fila['usuario'];
$_SESSION['usuario_id']=$fila['idpersonal'];

if (($usuario == $usu) && ($clave == $cla)) {




    if ($nivel == "A")
    {

		$_SESSION['aut'] = 'Admin';
   @		$_SESSION['uid'] = $uid;
       	header('location:Admin/index.php');
	}
    else if ($nivel == "B")
    {
       header('location:Usuario/index.php');
    }
 	else
 	{
     	header('location:Usuario1/index.php');
     }
}

else {
	echo "<h2 style='color:red'>SU USUARIO O CLAVE NO ES CORRECTA</h2>";
}

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

 	$sql4="insert into bitacora (id_usuario_bit,usuario_bit,modulo_bit,accion_bit,informacion_bit,fecha_bit,hora_bit,estado_bit) values ('$id_bit','$usuario','Registro','Registro Personal','$informacion','$fecha','$hora',1)";
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

   	$sql4="insert into bitacora (id_usuario_bit,usuario_bit,modulo_bit,accion_bit,informacion_bit,fecha_bit,hora_bit,estado_bit) values ('$id_bit','$usuario','Login','Inicio Sesion','$informacion','$fecha','$hora',1)";

   $res=consultar($sql4,$conexion);

mysql_close($conexion);



}

function cabecera2()
{
/*	if(isset($_SESSION['usuario_activo'])) $user=$_SESSION['usuario_activo'];
	else $user=' NO IDENTIFICADO';*/
	$html='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

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
    patron =/[A-Za-?z??\s]/; // igual que el ejemplo,
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
function validar_inscripcion()
{
	res= false;
	if(vacio(document.Nue_Insc.Cedula_Estudiante))
	if(numero(document.Nue_Insc.Cedula_Estudiante))
	if(vacio(document.Nue_Insc.Nombre_Estudiante))
	if(vacio(document.Nue_Insc.Apellido_Estudiante))

	if(seleccionar(document.Nue_Insc.Edad))
	if(vacio(document.Nue_Insc.Estado))
	if(vacio(document.Nue_Insc.Lugar_de_Nacimiento))
	if(vacio(document.Nue_Insc.Telefono_Estudiante))
	if(numero(document.Nue_Insc.Telefono_Estudiante))
	if(vacio(document.Nue_Insc.Direccion_Estudiante))
	if(vacio(document.Nue_Insc.Senial_Particular))
	if(vacio(document.Nue_Insc.Enfermedades))

	if(vacio(document.Nue_Insc.Cedula_Representante))
	if(numero(document.Nue_Insc.Cedula_Representante))
	if(seleccionar(document.Nue_Insc.Parentezco))
	if(vacio(document.Nue_Insc.Nombre_Madre))
	if(vacio(document.Nue_Insc.Apellido_Madre))
	if(vacio(document.Nue_Insc.Nombre_Padre))
	if(vacio(document.Nue_Insc.Apellido_Padre))
	{
		msj= "Deseas Registrar los datos del Estudiante "+document.Nue_Insc.Nombre_Estudiante.value;
		res= confirm(msj);
	}
	return res;
}
*/



</script>
      <style type="text/css">


      .datagrid-perfil table { border-collapse: collapse; text-align: left; width: 100%; }
.datagrid-perfil {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #006699; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 13px; width :800px; margin: 30px 0px 0px 250px;    }
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
   .datagrid-productos table tbody td { color: #7D7D7D; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }
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




.datagrid table { border-collapse: collapse; text-align: center; width: 100%; }
.datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff;
margin: 30px 0px 0px 250px;
width :800px; overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px;
}
.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8C8C8C", endColorstr="#7D7D7D");
background-color:#8C8C8C;
 color:#FFFFFF; font-size: 15px;
  font-weight: bold; border-left: 1px solid #A3A3A3; }
   .datagrid table thead th:first-child { border: none; }
   .datagrid table tbody td { color: #7D7D7D; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #EBEBEB; color: #7D7D7D; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }


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


#contenedorform {
         background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(255,255,255,0)));
	border-radius:20px;

	width:500px;

  margin-left:350px;
  margin-top:80px;
  /*background-color:white;*/
  padding:10px 0 10px 0;
}


#contenedorform form label {
  width:120px;
  float:left;
  font-family:verdana;
  font-size:14px;
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


function menu_vertical()
{
	$html=' <div id="menu">
<div id="cssmenu">
<ul>
   <li class="active"><a href="#"><span>Unicon</span></a>
   <ul>
        <li><a href="index.php"><span></span>Inicio</a></li>

      </ul>

  </li>
    <li class="has-sub"><a href="#"><span>Listas</span></a>
     <ul>
         <li><a href="lista_personal.php"><span>Lista de personal</span></a></li>
         <li><a href="lista_productos.php"><span>Lista de productos</span></a></li>
         <li><a href="lista_maquina.php"><span>Lista de Maquina</span></a></li>
         <li><a href="lista_turno.php"><span>Lista de Turnos</span></a></li>
         <li><a href="lista_produccion.php"><span>Lista de Produccion</span></a></li>
          </ul>



    </li>
      <li><a href="#"><span>Reportes</span></a>
          <ul>
         <li><a href="pdf_listapersonal.php" target="_blank"><span>Reporte de personal</span></a></li>
          <li><a href="pdf_auditoria.php" target="_blank"><span>Reporte de auditoria</span></a></li>
          <li><a href="pdf_paradas.php" target="_blank"><span>Reporte de paradas</span></a></li>
                                                                                                <li><a href="pdf_sub_paradas.php" target="_blank"><span>Reporte de sub_paradas</span></a></li>



                </ul>
                </li>

       <li><a href="#"><span>Busqueda</span></a>
          <ul>
         <li><a href="B_personal.php"><span>Busqueda personal</span></a></li>
          <li><a href="B_productos.php"><span>Busqueda productos</span></a></li>
          <li><a href="B_maquina.php"><span>Busqueda maquina</span></a></li>
          <li><a href="B_turno.php"><span>Busqueda turno</span></a></li>
          <li><a href="reporteProduccion.php"><span>Busqueda Produccion</span></a></li>




                </ul>
                </li>
               <li><a href="#"><span>Mantenimiento</span></a>
               <ul>
         <li><a href="respaldo.php"><span>Respaldo de la base de datos</span></a></li>
        <li><a href="subir_bd.php"><span>Restaurar la base de datos</span></a></li>
        <li><a href="auditoria.php"><span>Auditorias </span></a></li>


                </ul>
               </li>

               <li><a href="cerrar.php">   <span>Salir</span></a>
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
$conexion=conectar();
mysql_select_db("sidepo",$conexion) or
  die("Problemas en la seleccion de la base de datos");

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


			<th valign="top" align="right">Cargo:</th>
			<td><select name="cargo" required>
            <option value="">---------------------</option>
            <option value="SUPERVISOR" >SUPERVISOR</option>
            <option value="ANALISTA">ANALISTA</option>
            <option value="GERENTE">GERENTE</option>

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




		<tr>
        	<th valign="top" align="right">Usuario:</th>
			<td><input type="text" pattern="[A_-Za_-z]{1,100}"  name="usuario" size="12" maxlength="12" required value="'.$row_rcspers['usuario'].'" ></td>
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
  $per = $_GET['idpersonal'];
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
mysql_select_db("sidepo",$conexion) or
  die("Problemas en la seleccion de la base de datos");


   $sq="select * from personal where NFicha=".$Nficha."";
  $res=consultar($sq,$conexion);
$can=cantidad($res);
if($can==0){
    $sql = ("update personal set nombre='$nombre' ,apellido='$apellido', NFicha='$Nficha', cargo='$cargo', nivel='$nivel', idturno='$idturno', idmaquina='$idmaquina', usuario='$usuario' WHERE idpersonal=" .$per." ")  or die("Problemas en el select".mysql_error());

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
mysql_select_db ("sidepo",$conexion) or
  die("Problemas en la seleccion de la base de datos");

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
  $res=0;
}
             return $res;


}



function lista_persona(){


               $conexion = conectar();
  $lista_personal = "SELECT * FROM personal  ORDER BY idpersonal  DESC ";
  $personal = consultar($lista_personal, $conexion);
  $row = asociativo($personal);





        $i = 0;

$lista1 = "
<div style='overflow:auto; height:630px; width:1200px'  >
<div class='datagrid'>
<table>
<thead>
<tr>
<h3>
LISTA DE PERSONAL </h3>  </tr>      </thead>
<thead>
<tr><th>NOMBRE</th><th>APELLIDO</th><th colspan='2' >ACCION</th></tr></thead>



            </tr>
";
               $i = 1;
               $z=  $i++ % 2 ? 'class=""' : 'class="alt"';
                do {
$lista1 .= "  <tbody>
<tr ".$z." ><td class='active'>" . $row['nombre'] . "</td>";
$lista1 .=  "<td class='active'>" . $row['apellido'] . "</td>";
$lista1 .="
 <td class='active'><a href='perfPers.php?idpersonal=".$row['idpersonal'] ."'><img src='../imagenes/USER.png' title='Ver perfil'></img ></a></td>
                  <td><a href='actualizar_personal.php?idpersonal=".$row['idpersonal'] ."'><img src='../imagenes/editar.png'  title='Editar perfil'></img></a></td>

                  </tr>";
                 } while ($row = asociativo($personal));
                  $lista1 .= "</table> </div> </div>
                  ";
return $lista1;
}

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
<div class='datagrid-perfil'>

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



/*function R_produccion()
    {
  	$conexion = conectar();

  	// dropdown list para turno
	$tur = "SELECT idturno, numTurno FROM turno";
	$turno = consultar($tur, $conexion);

	//drop down list para maquina
	$maq = "SELECT idmaquina, numeroMaq FROM maquina";
	$maquina = consultar($maq, $conexion);

    //drop down list para supervisor
	$sup = " select nombre, apellido, idpersonal from personal where cargo='Supervisor'";
	$supervisor = consultar($sup, $conexion);

    //drop down list para producto y para codigo
	$pro = "SELECT * FROM productos";
	$productos = consultar($pro, $conexion);

	// dropdown turno
    $dropdown = "<select name='idturno' id='idturno' onChange='ChangeUrlTipo(this.form)' required>";
	$dropdown .= "<option value=''>-------</option>";
	while($row = mysql_fetch_assoc($turno)) {
	$dropdown .= "<option value='{$row['idturno']}'>{$row['numTurno']}</option>";
	}
	$dropdown .= "</select>";

    // dropdown maquina

    $dropdown1 = "<select name='idmaquina' id='idmaquina' required onchange=\"input_dos_datos('dato_operador.php','asistencia_ver','idturno','idmaquina')\">";
	$dropdown1 .= "<option value=''>-------</option>";
	while($row1 = mysql_fetch_assoc($maquina)) {
	$dropdown1 .= "<option value='{$row1['idmaquina']}'>{$row1['numeroMaq']}</option>";
	}
	$dropdown1 .= "</select>";

    // dropdown supervisor

    $dropdown2 = "<select name='idpersonal' required >";
	$dropdown2 .= "<option value=''>Nombre | Apellido</option>";
	while($row2 = mysql_fetch_assoc($supervisor)) {
	$dropdown2 .= "<option value='{$row2['idpersonal']}'>{$row2['nombre']} | {$row2['apellido']}</option>";
	}
	$dropdown2 .= "</select>";



    // dropdown producto || codigo

    $dropdown3 = "<select name='idproductos'>";
	$dropdown3 .= "<option value=0>-----------------------------------</option>";
	while($row = mysql_fetch_assoc($productos)) {
	$dropdown3 .= "<option value='{$row['idproductos']}'>{$row['descripcion']} </option>";
	}
	$dropdown3 .= "</select>";


//if ($row1['idmaquina']==1 && $row['idturno'] ==1 ){


  //  $total = 480."Minutos".;
   // }







    $html='<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
<link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
 <script>

 function ChangeUrlTipo(formulaire){
destino = "asistencia.php"
if (formulaire.idturno.selectedIndex != 0)
{location.href = destino + "?idturno="+formulaire.idturno.options[formulaire.idturno.selectedIndex].value;}}

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
 </script>

<style type="text/css">

#tablas {
	/*margin: 30px 0px 0px 150px;*/
	/*border-radius: 10px;
}
.titulos {
	text-align:center;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
	font-weight:bold;
}

</style>


	<script src="../js/jquery-ui-1.10.3.custom.js"></script>

	<script src="../js/ajax.js"></script>


</head>

<body>
<div style="overflow:auto; height:430px;">
<div id="flip">

 <div id="tablas" style="width:500px; border:black solid 2px; margin:0 auto;">
<table border="1" width="100%" height="10%" 	>
<form method="post" name="Nue_Insc" id="Nue_Insc">
	<tr>
		<td colspan="5" style="text-align:center;" class="titulos" ><h2>CONTROL DE PRODUCCION</h2></td>
	</tr>      </div>
<div id="panel">


	<tr>
		<td>Fecha: <input type="date" name="fecha" required="Ingrese fecha por favor" size="5" /></td>
		<td >Turno:  '   .$dropdown. '';

            	//<td>Total: <input type="text" name="total" size="10" maxlength="12" required /></td>
            //dividir en 3 partes las celdas.......
            // orden de fabricacion debe ser 6 numeros, codigo de 14 y la descripcion debe ser amplia
$html .= '</td>
		<td>Maquina: '   .$dropdown1. '';
		$html .= '</td>
		<td colspan="2">Supervisor: '   .$dropdown2. '';
		$html .= '</td>
		</tr>
        </table>
        <table border="1" width="100%" height="10%" 	>
    <tr>
		<td colspan="5" style="text-align:center;" class="titulos" ><h2>CONTROL DE ASISTENCIAS</h2></td>
      <tr>
      <td colspan="5" >Descripcion de Asistencia<br>

      <div id="asistencia_ver">

   </div></td>
	</tr>
    </tr>
    </table>
    <table border="1" width="100%" height="10%" 	>
		<tr>
		<td colspan="5" class="titulos"><h2>Descripcion del Producto</h2></td>
		</tr>
		<tr>
		<td colspan="1">Orden de fabricacion: <br> <input type="text" name="o/f" title="Ingrese la orden de fabricacion" maxlength="12" required size="10" onkeypress="return numeros(event)" ></td>
		<td colspan="3"> Producto:   <br>
        	'.$dropdown3.'';



	$html.=' </tr>
     </table>
     <table border="1" width="100%" height="10%" 	>
	<tr>
		<td colspan="5" class="titulos"><h2>Clasificacion de Tuberia</h2></td>
	</tr>
	<tr>
		<td>1era Cal: <br> <input type="text" name="1cali" size="10" maxlength="12" required onkeypress="return numerospunto(event)" /></td>
		<td >2da Cal galv: <input type="text" name="2cali" size="10" maxlength="12" required onkeypress="return numerospunto(event)" /></td>
		<td >2da Cal neg: <input type="text" name="2cali_a" size="10" maxlength="12" required onkeypress="return numerospunto(event)" /></td>
		<td colspan="2">3ra Cal: <br> <input type="text" name="3cali" size="10" maxlength="12" required onkeypress="return numerospunto(event)" /></td>

	</tr>
    </table>
    <table border="1" width="100%" height="10%">
	<tr>
		<td colspan="5" class="titulos"><h2>Control de Tiras</h2></td>
	</tr>
	<tr>
		<td colspan="2">Cantidad de tiras requeridas: <input type="text" name="tirasAProce" size="10" maxlength="12" required onkeypress="return numerospunto(event)" /></td>
		<td colspan="2">Cantidad de tiras procesadas: <input type="text" name="tiraProc" size="10" maxlength="12" required onkeypress="return numerospunto(event)" /></td>
		<td>Tiras restantes: <input type="text" name="ti/re" size="10" maxlength="12" required onkeypress="return numerospunto(event)" value=""  readonly /></td>
	</tr>
    </table>
    <table border="1" width="100%" height="10%" 	>
	<tr>
		<td colspan="5" class="titulos"><h2>Notificacion de Produccion (Tiempos min)</h2></td>
	</tr>
	<tr>
		<td>Tiempo total: <input type="text" name="tt" size="10" maxlength="12" required value="345"  readonly /></td>
		<td>Parada: <input type="text" name="tpa" size="10" maxlength="12" required onkeypress="return numerospunto(event)" /></td>
		<td>Cambio: <input type="text" name="tca" size="10" maxlength="12" required onkeypress="return numerospunto(event)" /></td>
		<td>T. muerto: <input type="text" name="tmu" size="10" maxlength="12" required onkeypress="return numerospunto(event)" /></td>
	</tr>
    <tr>
		<td colspan="5" style="text-align:center;"><input type="reset" value="RESTABLECER" name="BORRAR" />  <input type="submit" value="ENVIAR" name="enviar" /></td>
	</tr>

    </table>

    </div>


<div>
</div>
</body>
</html>
';
return $html;
}*/

    /*<table border="1" width="10%" height="10%" 	>
    <tr>
		<td colspan="5" style="text-align:center;" class="titulos" ><h2>CONTROL DE PARADAS</h2></td>
	</tr>
	<tr>
		<td colspan="5" style="text-align:center;"><input type="reset" value="RESTABLECER" name="BORRAR" />  <input type="submit" value="ENVIAR" /></td>
	</tr>

</table>*/





    //listas.......

function insert_produccion()
    {
      $fecha = $_POST['fecha'];
         $maquina = $_POST['idmaquina'];
         $turno = $_POST['idturno'];
         $supervisorL = $_POST['idpersonal'];
         $descripcion_asistencia = $_POST['descripcion_asistencia'];
         $oF = $_POST['o/f'];
         $productosL = $_POST['idproductos'];
         $pri = $_POST['1cali'];
         $segCg = $_POST['2cali'];
         $segCn = $_POST['2cali_a'];
         $terC = $_POST['3cali'];
          $tRequeridas = $_POST['tirasAProce'];
          $tProcesadas = $_POST['tiraProc'];
          $tRestantes = $_POST['ti/re'];
          $tiTotal = $_POST['tt'];
          $tiParada = $_POST['tpa'];
          $tiCambio = $_POST['tca'];
          $tiMuerto = $_POST['tmu'];

          $conexion=conectar();
    mysql_select_db("sidepo",$conexion) or
  die("Problemas en la seleccion dela base de datos");


$sql = ("insert into produccion (fechaPro, idmaquina, idturno, idpersonal, descripcion_asistencia, ordenFabric, idproductos, 1cali,  2cali, 2cali_a, 3cali, tirasAProce, tiraProc, tirasRest, tt, tpa, tca, tmu) values
   ('$fecha', '$maquina', '$turno', '$supervisorL', '$descripcion_asistencia', '$oF', '$productosL', '$pri','$segCg','$segCn','$terC','$tRequeridas','$tProcesadas', '$tRestantes','$tiTotal','$tiParada','$tiCambio','$tiMuerto')") or die("Problemas en el select".mysql_error());

   $res=consultar($sql,$conexion);
  /* $r= asociativo($res);*/
mysql_close($conexion);

    header('location:R_parada.php');

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

		<th>Fecha: <input type="date" name="fechaPro" /></th>
		<th>Maquina:'   .$dropdown1. '';
		$html .= '</th>
		<th>Turno:  '   .$dropdown. '';

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
        /* $supervisorL = $_GET['idpersonal'];
         $descripcion_asistencia = $GET['descripcion_asistencia'];
         $oF = $GET['o/f'];
         $productosL = $GET['idproduccion'];
         $pri = $GET['1cali'];
         $segCg = $GET['2cali'];
         $segCn = $GET['2cali_a'];
         $terC = $GET[''];
          $tRequeridas = $GET[''];
          $tProcesadas = $GET[''];
          $tRestantes = $GET[''];
          $tiTotal = $GET[''];
          $tiParada = $GET[''];
          $tiCambio = $GET[''];
          $tiMuerto = $GET[''];*/




         $que = "SELECT p.idproduccion, p.fechaPro, m.numeroMaq, t.numTurno
         FROM produccion p, maquina m, turno t
         WHERE m.idmaquina=p.idmaquina AND t.idturno=p.idturno
          AND p.fechaPro='$fecha' AND p.idmaquina='$maquina' AND p.idturno='$turno'";
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
        <td><a href="modificar_prod.php">Modificar_Prod</a></td>
        <td><a href="../Admin/pdf_produccion.php?id='.$row_P['idproduccion'].'"><img src="../imagenes/imprimir.png" title="Imprimir" target="_blank"></a></td>
        <td><a href="modificar_Par.php">Modificar_Par</a></td>
        <td><a href="modificar_Asist.php">Modificar_Asist</a></td>


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
<tr><th>Orden de Fabricaci?n</th><th>Fecha de Producci?n</th><th colspan='2' >ACCION</th></tr></thead>



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



  $q= "SELECT m.numeroMaq, t.numTurno, p.nombre, p.apellido, pr.descripcion, pr.codigoPrd    FROM  maquina m, turno t, personal p, productos pr
        WHERE m.idmaquina='$row[idmaquina]' AND t.idturno='$row[idturno]' AND p.idpersonal='$row[idpersonal]' AND pr.idproductos='$row[idproductos]'";
      $idP1 = consultar($q,$conexion);
      $row1= asociativo($idP1);




 $html= "  <div class='datagrid-perfil'>

<form action='reportePersonal.php' method='get'><table>
<thead><tr><th colspan='4' align='center'> Perfil de produccion
</th></tr></thead>
  <tr>

<tbody>

<tr><th align='right' scope='row'>Nombres:</th>
       <td>".$row1['nombre']."</td>";
 $html.= "
       </tr>
  <tr>
    <th align='right' scope='row'>Apellidos:</th>
         <td> ".$row1['apellido']."</td>";
 $html.= "
          </tr>
  <tr>

    <th align='right' scope='row'>Orden de fabricacion:</th>
         <td>".$row['ordenFabric']."</td>";
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
    <th align='right' scope='row'>Codigo del producto:</th>
            <td>".$row1['codigoPrd']."</td>";
 $html.= "
			</tr>
               </tbody>

  </table>



                 <input type='hidden' name='idproduccion' value=".$row['idproduccion']." />
    <input class='botonsubmit'' type='submit' value='Reporte' name='reporte_personal'>
    </a></td>
 </form>

  ";


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
@$descripcion = $_REQUEST['descripcion'];
@$codigoprd = $_REQUEST['codigoPrd'];
@$pesoProd = $_REQUEST['pesoProd'];
$conexion=conectar();
mysql_select_db("sidepo",$conexion) or
  die("Problemas en la seleccion de la base de datos");
  $sq="select * from productos where codigoPrd=".$codigoprd."";
  $res=consultar($sql,$conexion);
$can=cantidad($res);
if($can==0){
$sql = ("insert into productos(descripcion, codigoPrd, pesoProd) values
   ('$descripcion', '$codigoprd', '$pesoProd')") or die("Problemas en el select".mysql_error());


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




$lista1 .= "  <tbody>
<tr ><td>" .

$lista2 = "<div style='overflow:auto; height:630px; width:1200px'  >
<div class='datagrid-productos'>
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
";

                do {

$lista2 .= "<tr><td>" . $row['codigoPrd'] . "</td>";
	  $lista2 .=  "<td>" . $row['descripcion'] . "</td>";
      $lista2 .=  "<td>" . $row['pesoProd'] . "</td>";
       $lista2 .="
                  <td><a href='actualizar_producto.php?idproductos=".$row['idproductos'] ."'><img src='../imagenes/editar.png'  title='Editar productos'></img></a></td>

                  </tr>";
                 } while ($row = asociativo($productos));
                  $lista2 .= "</table> </div>";
return $lista2;
        }

        function actualizar_productos()
{


$pr = $_GET['idproductos'];
$conexion=conectar();
mysql_select_db("sidepo",$conexion) or
  die("Problemas en la seleccion de la base de datos");

$sql = ("SELECT * FROM productos WHERE idproductos=" .$pr."");


   $res=consultar($sql,$conexion);
   $row_rcspers = mysql_fetch_assoc($res);


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
mysql_select_db("sidepo",$conexion) or
  die("Problemas en la seleccion de la base de datos");

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
mysql_select_db("sidepo",$conexion) or
  die("Problemas en la seleccion de la base de datos");


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
mysql_select_db("sidepo",$conexion) or
  die("Problemas en la seleccion de la base de datos");

$sql = ("SELECT * FROM maquina WHERE idmaquina=" .$ma."");


   $res=consultar($sql,$conexion);
   $row_rcspers = mysql_fetch_assoc($res);


$html = '<div id="contenedorform">
<form method="post" action="#"  name="Nue_Insc" id="Nue_Insc" >
<fieldset>
<legend><h1 align="center"> Registro de maquina </h1></legend>
	<table align="center">
		<tr>

        <th valign="top" align="right">Numero de la maquina:</th>
		<td align="left"><input type="text" pattern="[A_-Za_-z]{1,10}"   name="nmaquina" size="12" maxlength="12" required value="'.$row_rcspers['numeroMaq'].'" onkeypress="return numeros(event)"></td>
    	<tr>
        <th valign="top" align="right">Descripcion de la maquina:</th>
		<td ><textarea maxlength="150" required  name="descripcion"> '.$row_rcspers['descripcion'].'</textarea></td>	</tr>
    	</tr>
            <tr>
			<td colspan="2" align="right">
            <input name="actualizar_maquina" type="submit" value="Actualizar">
            </td>


        </tr>

	</table>
</form></div>';



return $html;



}

function insert_updateMaquina()
{
  $ma = $_GET['idmaquina'];
  @$numeroMaq = $_REQUEST['nmaquina'];
@$descripcion = $_REQUEST['descripcion'];

$conexion=conectar();
mysql_select_db("sidepo",$conexion) or
  die("Problemas en la seleccion de la base de datos");

    $sq="select * from maquina where numeroMaq=".$numeroMaq."";
  $res=consultar($sq,$conexion);
$can=cantidad($res);
if($can==0){


$sql = ("update maquina set numeroMaq='$numeroMaq', descripcion='$descripcion' WHERE   idmaquina=" .$ma."") or die("Problemas en el select".mysql_error());

   $res=consultar($sql,$conexion);
  /* $r= asociativo($res);*/
mysql_close($conexion);




}
}

function actualizar_turno()
{


$tu = $_GET['idturno'];
$conexion=conectar();
mysql_select_db("sidepo",$conexion) or
  die("Problemas en la seleccion de la base de datos");

$sql = ("SELECT * FROM turno WHERE idturno=" .$tu."");


   $res=consultar($sql,$conexion);
   $row_rcspers = mysql_fetch_assoc($res);



$html='<div id="contenedorform">
<form method="post" action="#"  name="Nue_Insc" id="Nue_Insc" >
<fieldset>
<legend><h1 align="center">  Actualizar Turnos </h1></legend>
	<table align="center">
		<tr>

             <th valign="top" align="right">Numero de Turno:</th>
			<td align="left"><input type="text" pattern="[A_-Za_-z]{1,10}"   name="numTurno" size="12" maxlength="12" required value="'.$row_rcspers['numTurno'].'" onkeypress="return numeros(event)" ></td>
          </tr>
        <tr>
            <th valign="top" align="right">Tiempo del Turno:</th>
			<td><input type="text" pattern="[A_-Za_-z]{1,10}"   name="tiempoTurno" size="12" maxlength="12" required value="'.$row_rcspers['tiempoTurno'].'"  onkeypress="return numeros(event)" ></td>	</tr>

            <tr>
			<td colspan="2" align="right">
            <input class="botonsubmit" type="submit" value="Actualizar" name="actualizar_turno">
            </td>


        </tr>

	</table>
</form></div>';



return $html;



}

function insert_updateTurno()
{
    $tu = $_GET['idturno'];
@$numeroturno = $_REQUEST['numTurno'];
@$tiempoturno = $_REQUEST['tiempoTurno'];

$conexion=conectar();
mysql_select_db("sidepo",$conexion) or
  die("Problemas en la seleccion de la base de datos");

 $sq="select * from turno where numTurno=".$numeroturno."";
  $res=consultar($sq,$conexion);
$can=cantidad($res);
if($can==0){

$sql = ("update turno set numTurno='$numeroturno', tiempoTurno='$tiempoturno' WHERE idturno=".$tu. "") or die("Problemas en el select".mysql_error());

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
</div>
</body>
</html>';
return $html;
}