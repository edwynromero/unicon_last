<?php
 include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();

      $consu = conectar();
      $codProd = $_GET['codigoPrd'];
      if (isset($_GET['buscar'])){

$query =("SELECT * FROM productos WHERE codigoPrd=".$codProd."");
$rcsPaci1 = consultar($query, $consu);
$row_rcsPaci1 = asociativo($rcsPaci1);
$totalRows_rcsPaci1 = cantidad($rcsPaci1);
}

?>

<div id="contenedor1">

<!--                                  ZONA DE TRABAJO                          -->

	<h2 align="center">Buscar Productos</h2>


                      <form action="B_productos.php" method="get">
                <table align="center">
                    <tr>
                        <td valign="middle" align="center">Coloque  codigo del producto:
            <input type="text" name="codigoPrd" value="" size="17" /></td>
                      <td valign="top"><input type="submit" name="buscar" value="Buscar" /></td>
                    </tr>
                </table>
            </form>
       <br />
  				<!-- SI LA CONSULTA ESTA VACIA -->
		  <?php if (isset($_GET['buscar']) && $totalRows_rcsPaci1 == 0) { // Show if recordset empty ?>
                  <h1>No hay registros</h1>
             <?php } // Show if recordset empty ?>
            <!--FIN DE LA CONSULTA-->
	   		<!-- SI LA CONSULTA NO ESTA VACIA -->

                     <?php if ($totalRows_rcsPaci1 > 0) {


                     // Show if recordset not empty ?>
                           <div style='overflow:auto; height:430px;' >
<div class='datagrid'>
 <table align="center">
<thead>
<tr>
<h3>
RESULTADO DE LA BUSQUEDA </h3>  </tr>      </thead>


                <thead>
                  <tr>


                    <th>Producto </th>
                    <th>Codigo</th>
                    <th colspan="3">Peso</th>
                    </tr>
                    </thead>

                    <?php   do{  ?>

                    <tr>
                     <td ><?php echo $row_rcsPaci1['descripcion']; ?></td>
                      <td ><?php echo $row_rcsPaci1['codigoPrd']; ?></td>
                      <td ><?php echo $row_rcsPaci1['pesoProd']; ?></td>
                       <?php } while ($row_rcsPaci1 = asociativo($rcsPaci1)); ?>

                     <td>
                    </td>
                    </tr>
                </table>


        	<?php } // Show if recordset not empty ?>
<!--                            FIN DE ZONA DE TRABAJO                         -->
    	</div>
        	</div>


<?php
echo pie2();
?>