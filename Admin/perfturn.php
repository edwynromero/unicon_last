
<?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();
echo panel_turno();

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Recordset1 = "-1";
if (isset($_GET['idturno'])) {
  $colname_Recordset1 = $_GET['idturno'];
}
$conexion = conectar();
$query_Recordset1 = sprintf("SELECT * FROM personal WHERE idturno = %s ORDER BY idpersonal ASC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1,
$conexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


$idp=$row_Recordset1['idpersonal'];
$idt=$row_Recordset1['idturno'];
$idm=$row_Recordset1['idmaquina'];
  
  $sql3="select * from personal b, turno c, maquina d where b.idpersonal='$idp' and c.idturno='$idt' and d.idmaquina='$idm'";
  $res3=consultar($sql3,$conexion);
   $r3=asociativo($res3);
  @extract($r3);

?>
<style type="text/css">
.datagrid table { border-collapse: collapse; text-align: left; width: 100%;  } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; color: black;  background:url(../imagenes/bg.png);   overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; width:700px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #A3A3A3; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: black; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #EBEBEB; color: black; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #8C8C8C;background: #EBEBEB;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #F5F5F5;border: 1px solid #8C8C8C;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #7D7D7D; color: #F5F5F5; background: none; background-color:#8C8C8C;}
</style>

<div style='overflow:auto; height:630px; width:1200px'  >

<div class="datagrid">
<table>
<thead><h1>Lista de personal por turno</h1>
<a href="pdf_auditoria.php" target="_blank" style=" text-decoration: none;"><img src='../imagenes/imprimira.PNG' title=' IMPRIMIR AUDITORIA'> </img ></a>
</thead>

  <thead>
 <tr>

    <th>Nombre</th>
    <th>Apellido</th>
    <th>Numero de Ficha</th>
    <th>Cargo</th>
	<th>Turno</th>

	


  </tr>
   </thead>
  <?php do { ?>
       <tr <?php echo $i++ % 2 ? 'class=""' : 'class="alt"'; ?>>

      <td><?php echo $row_Recordset1['nombre']; ?></td>
      <td><?php echo $row_Recordset1['apellido']; ?></td>
      <td><?php echo $row_Recordset1['NFicha']; ?></td>
      <td><?php echo $row_Recordset1['cargo']; ?></td>
	  <td><?php echo $numTurno; ?></td>


    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));  ?>
</table>
   </div>
 </div>
<?php mysql_free_result($Recordset1); ?>