<?php include("../funciones/librerias.php");
  ?>
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

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
                                            $conexion = conectar();
$query_Recordset1 = "SELECT * FROM personal ORDER BY idpersonal DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;


?>

<div id="body">
	<img src="../imagenes/grunge72.jpg" width="720" height="120" /><br /><br /><br />
		<h4 align="center" style="text-decoration:underline;">LISTA DE PERSONAL</h4><br />

		<div align="center">
<table border="0" width="60%" align="center">


    <tr align="center">
	<td bgcolor="#666666" color="#FFFFFF" ><b>Nombre</b></td>
		<td bgcolor="#666666" color="#FFFFFF" ><b>Apellido</b></td>
	<td bgcolor="#666666" color="#FFFFFF"><b>Numero de ficha</b></td>
	<td bgcolor="#666666" color="#FFFFFF"><b>nivel</b></td>
	</tr>  <?php
     $contador=1;

    while ($r = mysql_fetch_assoc($Recordset1)){;
    extract($r);
    if($contador%2==0){
	$color='#EAEAEA';
	}else{
	$color='#FFFFFF';
	}
     ?>
    <tr>
      <td  align="center"> <?php echo $nombre; ?></td>
      <td  align="center"> <?php echo $apellido; ?></td>
      <td  align="center"> <?php echo $NFicha; ?></td>
      <td  align="center"> <?php echo $nivel; ?></td>
    </tr>
    <?php }

     ?>
</table>
 </div>
        <div align="center" id="print">
          <table width="250">
				<tr>
                    <td align="left"><a href="javascript: history.go(-1)"><-- Volver</a></td>
                    <td align="right"><a href="index.php" onclick="window.print()">Imprimir --></a></td>
                 </tr>
             </table>
         </div>
</div>
<?php
mysql_free_result($Recordset1);
?>