<?php
include("../funciones/librerias.php");
extract($_GET);

$conexion = conectar();
$sql="SELECT * FROM personal WHERE id = " .$p." ";

$result = consultar($conexion,$sql);
$row = asociativo($result);

echo "<table border='1'>
<tr>
<th>Firstname:</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";


  echo "<tr>";
  echo "<td>" . $row['nombre'] . "</td>";
  echo "<td>" . $row['apellido'] . "</td>";
  echo "<td>" . $row['cargo'] . "</td>";
  echo "<td>" . $row['NFicha'] . "</td>";
  echo "<td>" . $row['usuario'] . "</td>";
  echo "</tr>";

echo "</table>";

?>