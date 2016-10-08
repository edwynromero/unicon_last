<?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();
  echo panel();
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
?>
      <style type="text/css">
.datagrid table { border-collapse: collapse; text-align: left; width: 100%;  } .datagrid {font: normal 14px/150% Arial, Helvetica, sans-serif; color: black;  background:url(../imagenes/bg.png);   overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; width:400px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #A3A3A3; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: black; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #EBEBEB; color: black; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #8C8C8C;background: #EBEBEB;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #F5F5F5;border: 1px solid #8C8C8C;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #7D7D7D; color: #F5F5F5; background: none; background-color:#8C8C8C;}
</style>


    <div style='overflow:auto; height:630px; width:1200px'  >


<form action='pdf_perfilPersonal.php' method='get'>
<div class='datagrid-perfil'>
<table>
<thead><tr><th colspan='4' align='center'> Perfil del personal
</th></tr></thead>
  <tr>


<tr><th align='right' scope='row'>Apellidos:</th>
       <td> <?php echo $row['apellido'] ?></td>
 </tr>
  <tr>
    <th align='right' scope='row'>Nombres:</th>
         <td> <?php echo $row['nombre'] ?></td>
 </tr>
  <tr>

    <th align='right' scope='row'>Numero de ficha:</th>
         <td> <?php echo $row['NFicha'] ?></td>
  </tr>
  <tr>
    <th align='right' scope='row'>Cargo:</th>
         <td> <?php echo $row['cargo'] ?></td>
  </tr>
  <tr>
    <th align='right' scope='row'>Nivel:</th>
        <td> <?php echo $row['nivel'] ?></td>
  </tr>
   <th align='right' scope='row'>Turno:</th>
        <td> <?php echo $row1['numTurno'] ?></td>
  </tr>
  <tr>
   <th align='right' scope='row'>Maquina:</th>
        <td> <?php echo $row1['numeroMaq'] ?></td>
  </tr>


  </table>
                 <input type='hidden' name='idpersonal' value="<?php echo $row['idpersonal'] ?>" />
    <input class='botonsubmit' type='submit' value='Reporte' name='reporte_personal' formtarget="_blank"">
         </div>
 </form>




    </div>


<?php
echo pie2();


?>