<?php
include("../funciones/librerias.php");


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

<div class='datagrid-perfil'>

<form action='rep_pers.php' method='get'>
<table>
<thead><tr><th colspan='4' align='center'> Perfil del personal
</th></tr></thead>
  <tr>

<tbody>
<tr><th align='right' scope='row'>Apellidos:</th>
       <td><?php echo $row['apellido'] ?></td>
 </tr>
  <tr>
    <th align='right' scope='row'>Nombres:</th>
         <td><?php echo $row['nombre'] ?></td>
         </tr>
  <tr>

    <th align='right' scope='row'>Numero de ficha:</th>
         <td><?php echo $row['NFicha']?></td>
         </tr>
  <tr>
    <th align='right' scope='row'>Cargo:</th>
         <td><?php echo $row['cargo']?></td>
         </tr>
  <tr>
    <th align='right' scope='row'>Nivel:</th>
        <td><?php echo $row['nivel']?></td>
        </tr>
          <tr>
   <th align='right' scope='row'>Turno:</th>
        <td><?php echo $row1['numTurno']?></td>
             </tr>
             <tr>
   <th align='right' scope='row'>Maquina:</th>
                <td><?php echo $row1['numeroMaq']?></td>
                  </tr>
    <tr>
    <th align='right' scope='row'>Usuario:</th>

            <td><?php echo $row['usuario']?></td>
            </tr>
               </tbody>

  </table>

          <input type='hidden' name='idpersonal' value=".$row['idpersonal']." />
    <td align='left><a href='javascript: history.go(-1)'> <input type="button" value="volver"></a></td>
                    <td align='right'><a href='index.php' onclick='window.print()'> <input type="button" value="imprimir"> </a></td>
 </form>

