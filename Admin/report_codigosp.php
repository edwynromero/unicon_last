<?php  include("../funciones/librerias.php"); ?>
<?php
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
                             $conexion = conectar();
$query_Recordset1 = "SELECT * FROM paradas ORDER BY id DESC";
$Recordset1 = mysql_query($query_Recordset1, $conexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$conexion = conectar();
$query_Recordset2 = "SELECT * FROM sub_equipo ORDER BY id ASC";
$Recordset2 = mysql_query($query_Recordset2, $conexion) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

?>


<?php
 echo cabecera2();
echo menu_vertical();
?>
<link href="../CSS/Level3_3.css" rel="stylesheet" type="text/css" media="print">
 <div style='overflow:auto; height:430px;' >
 <div class="datagrid">
<table border="1">
  <tr>

    <td><div align="center"><h1>Nombre_subequipo</h1></div></td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset2['nombre_subequipo']; ?></td>
    </tr>
    <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
</table>
<table border="1">
  <tr>

    <td width="203"><div align="center"><h1>Nombre_parada</h1></div></td>
  </tr>
  <?php do { ?>
    <tr>

      <td><?php echo $row_Recordset1['nombre_parada']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</div>
</div>
 <?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
echo pie2();

?>

