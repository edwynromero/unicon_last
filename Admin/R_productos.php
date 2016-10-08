<?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();
echo panel_productos(); 
include("politica.php");
include("politica2.php");
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
	</style>
            <?PHP
    if(usuario_conectar()){
  if(usuario_administrador()){
         ?>
<div id="contenedorform">
<form method="post" action="#"  name="Nue_Insc" id="Nue_Insc" >
<fieldset>
<legend><h1 align="center"> Registro de productos </h1></legend>
	<table align="center">
		<tr>
            <th valign="top" align="right">Codigo del producto:</th>
			<td align="left"><input type="text"  pattern="[A_-Za_-z]{1,10}"   name="codigoPrd" size="12" maxlength="12" required onkeypress="return vacio(event)" title="Por favor ingrese el c&oacute;digo del producto."  ></td>
          </tr>
          <tr>
            <th valign="top" align="right">Peso del producto:</th>
			<td align="left"><input type="text"   name="pesoProd" size="12" maxlength="12" required onkeypress="return numeros(event)" title="Por favor ingrese el peso del producto." ></td>
          </tr>
		  <tr>
            <th valign="top" align="right">orden de fabricacion:</th>
			<td align="left"><input type="text"   name="ordenFabric" id="ordenFabric"  size="12" maxlength="5" required onkeypress="return numeros(event)" title="Por favor ingrese la orden de fabricacion." ></td>
          </tr>
		    <tr>
            <th valign="top" align="right">Tiras a procesar:</th>
			<td align="left"><input type="text"   name="tirasAProce" id="tirasAProce"  size="12" maxlength="12" required onkeypress="return numeros(event)" title="Por favor ingrese la orden de fabricacion." ></td>
          </tr>
        <tr>
            <th valign="top" align="right">Descripcion del producto:</th>
			<td><textarea maxlength="150"  name="descripcion" required title="Por favor ingrese la descripcion del producto."></textarea></td>
		</tr>
        <tr>
			<td colspan="2" align="right">
			<input class="botonsubmit" type="reset" value="Borrar">
            <input class="botonsubmit" type="submit" value="Ingresar" name="enviar_productos">
            </td>
        </tr>
	</table>
</form>
</div>

</div>

 <?php
if (isset($_POST['enviar_productos']))  {


insert_productos();
  //header('location:lista_productos.php');
echo bitacoraProductos();


             ?>

     <div id="dialog-message" style=" align: right;" title="Registro completado">
	<p>
		<span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 20px;"></span>
		Usted ha  registrado el producto con exito gracias.
	</p>
	<p>   Por favor revisar:
	<a href="lista_productos.php">lista de de productos</a></b>.
	</p>
</div>






<?php
}
echo pie2();
    }else{
    header("location:index.php");

    }
}else{
header("location:../index.php");

}

?>