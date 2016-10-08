<?php
include("../funciones/librerias.php");
include("Includes/FusionCharts.php");
echo cabecera2();
echo menu_vertical();
 echo panel();



?>

<?php
include("politica.php");
include("politica2.php");
$conexion = conectar();

  	// dropdown list para turno
	$tur = "SELECT idturno, numTurno FROM turno";
	$turno = consultar($tur, $conexion);

	//drop down list para maquina
	$maq = "SELECT idmaquina, numeroMaq FROM maquina";
	$maquina = consultar($maq, $conexion);

    // dropdown turno
    $dropdown = "<select name='idturno' required title='Por favor seleccione turno.'>";
	$dropdown .= "<option value=''>-------------------------------------------------------------------------------</option>";
	while($row = mysql_fetch_assoc($turno)) {
	$dropdown .= "<option value='{$row['idturno']}'>{$row['numTurno']}</option>";
	}
	$dropdown .= "</select>";

    // dropdown maquina

    $dropdown1 = "<select name='idmaquina' required title='Por favor seleccione maquina.'>";
	$dropdown1 .= "<option value=''>-------------------------------------------------------------------------------</option>";
	while($row1 = mysql_fetch_assoc($maquina)) {
	$dropdown1 .= "<option value='{$row1['idmaquina']}'>{$row1['numeroMaq']}</option>";
	}
	$dropdown1 .= "</select>";



?>

 <link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
    <SCRIPT LANGUAGE="Javascript" SRC="FusionCharts/FusionCharts.js"></SCRIPT>

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
	
	
form {
 	 background:url(../imagenes/logo.png); 
	 background-size:500px;
	 background-repeat: no-repeat;
 background-position: 50% 80%;

  width:400px;
  margin:0px auto;
  border-radius:0.4em;

  overflow:hidden;
  position:relative;
  box-shadow: 0 5px 10px 5px rgba(0,0,0,0.2);
}

form:after {
  content:"";
  display:block;
  position:absolute;
  height:1px;
  width:100px;
  left:20%;
  background:linear-gradient(left, #111, #444, #b6b6b8, #444, #111);
  top:10;
}

form:before {
 	content:"";
  display:block;
  position:absolute;
  width:8px;
  height:5px;
  border-radius:50%;
  left:34%;
  top:-7px;
  box-shadow: 0 0 6px 4px #fff;
}

.inset {
 	padding:20px; 
  border-top:1px solid #19191a;
  
}

form h1 {
	color: black;
  font-size:28px;
  text-shadow:0 1px 0 black;
  text-align:center;
  padding:15px 0;
  border-bottom:1px solid rgba(0,0,0,1);
  position:relative;
}

form h1:after {
 	content:"";
  display:block;
  width:250px;
  height:100px;
  position:absolute;
  top:0;
  left:50px;
  pointer-events:none;
  transform:rotate(70deg);
  background:linear-gradient(50deg, rgba(255,255,255,0.15), rgba(0,0,0,0));
  
}

label {
 	color:black;
  display:block;
  padding-bottom:9px;
}

input[type=text],
input[type=password], select {
text-align:center;
 width:100%;
  padding:8px 5px;
   background:url(../imagenes/bg.png); 
  border:1px solid #222;
  box-shadow:
    0 1px 0 rgba(255,255,255,0.1);
  border-radius:0.3em;
  margin-bottom:20px;
  font-weight:bold;
  cursor:pointer;
  font-size:23px;
}

label{

 	color:black;
  display:inline-block;
  padding-bottom:0;
  padding-top:5px;
   font-size:20px;
    font-weight:bold;
}



.p-container {
 	padding:0 20px 20px 20px; 
}

.p-container:after {
 	clear:both;
  display:table;
  content:"";
}

.p-container span {
  display:block;
  float:left;
  color:black;
  padding-top:8px;
}

input[type=submit],[type=reset] {
 	padding:5px 20px;
  border:1px solid rgba(0,0,0,0.4);
  text-shadow:0 -1px 0 rgba(0,0,0,0.4);
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.3),
    inset 0 10px 10px rgba(255,255,255,0.1);
  border-radius:0.3em;
  background:#0184ff;
  background: rgb(252,255,244); /* Old browsers */
background: -moz-linear-gradient(top, rgba(252,255,244,1) 0%, rgba(223,229,215,1) 40%, rgba(179,190,173,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(252,255,244,1)), color-stop(40%,rgba(223,229,215,1)), color-stop(100%,rgba(179,190,173,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%); /* W3C */

  float:right;
  font-weight:bold;
  cursor:pointer;
  font-size:23px;
}

input[type=submit]:hover {
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.3),
    inset 0 -10px 10px rgba(255,255,255,0.1);
}

input[type=text]:hover,
input[type=password]:hover,
label:hover ~ input[type=text],
label:hover ~ input[type=password], select {
 	 background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(255,255,255,0))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#00ffffff',GradientType=0 ); /* IE6-9 */

	</style>
    <?PHP
    if(usuario_conectar()){
  if(usuario_administrador()){
         ?>
		 		 <div style='overflow:auto;   margin-top:-120px; height:630px; width:1200px;'>

		 <div id="contenedorform3">
<form method="post" action="#"  name="Nue_Insc" id="Nue_Insc">
  <h1>Registro de Personal  </h1>
  <div class="inset">
  <p>
    <label for="">Nombres:</label>
 <input type="text" pattern="[A_-Za_-z]{1,20}" onkeypress="return letras(event)" name="nombre" size="12" maxlength="20" required title="Por favor ingrese su nombre." >
  </p>
  <p>
    <label for="password">Apellidos:</label>
  <input type="text"   "pattern="[A_-Za_-z]{1,20}" onkeypress="return letras(event)" name="apellido" size="12" maxlength="20" required title="Por favor ingrese su apellido." >
  </p>
  <p>
    <label for="password">Numero de Ficha:</label>
  <input type="text" onkeypress="return numeros(event)" name="NFicha"  size="12" maxlength="12" required title="Por favor ingrese el numero de ficha." >
  </p>
   <p>
    <label for="password">Cargo:</label>
  <select name="cargo" required title="Por favor seleccione el cargo." >
            <option value="">-------------------------------------------------------------------------------</option>
            <option value="SUPERVISOR">SUPERVISOR</option>
            <option value="ANALISTA">ANALISTA</option>
            <option value="GERENTE">GERENTE</option>
            <option value="COORDINADOR">COORDINADOR</option>
			 <option value="OBSERVADOR">OBSERVADOR DE SEGURIDAD (GOS)</option>
            <option value="TRABAJADORUTILITY">TRABAJADOR UTILITY</option>
            <option value="OPERADORUTILITY">OPERADOR ESPECIALIZADO UTILITY</option>
            <option value="OPERADORFORM">OPERADOR ESPECIALIZADO FORM SOLD</option>
            <option value="OPERADOREMPATE">OPERADOR MESA DE EMPATE</option>
            <option value="TRABAJADOREMPATE">TRABAJADOR MESA DE EMPATE</option>
            <option value="GRUA">OPERADOR DE GRÚA</option>
            <option value="EMPAQUETADO">TRABAJADOR DE EMPAQUETADO</option>
			 <option value="INSPECTOR">INSPECTOR DE CALIDAD</option>
            <option value="CORTADORA">OPERADOR DE CORTADORA</option>
			 <option value="HORNO">TRABAJADOR DE HORNO GALV</option>
            <option value="BISELADORA">OPERADOR DE BISELADORA</option>
			 <option value="PROCESOS">INSPECTOR DE PROCESOS</option>
            <option value="FLEJES">OPERADOR DE LAMINADOR DE FLEJES</option>
			  <option value="PINTADO">PINTADO DE EXTREMOS</option>
            
			</select>
  </p>
   <p>
    <label for="password">Turno:</label>
  <?php echo $dropdown; ?>
  </p>
    <p>
    <label for="password">Maquina:</label>
  <?php echo $dropdown1; ?>
  </p>
  
  <p>
  <label for="password">Nivel:</label>
  <select name="nivel" required title="Por favor selecciones el nivel.">
            <option value="">-------------------------------------------------------------------------------</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            </select>
	 </p>
<p>	 
  <label for="password">Usuario:</label>
  <input type="text" pattern="[A_-Za_-z]{1,20}"  name="usuario" size="12" maxlength="20"  title="Por favor ingrese el usuario." required >
   </p>
  <p>
  <label for="password">Clave:</label>
  <input type="password" pattern="[A_-Za_-z]{1,20}"  name="clave" size="12" maxlength="20"  title="Por favor ingrese la clave." required >
   </p>
  
  </div>
  <p class="p-container">
   <input  type="submit" value="Ingresar" name="enviar_personal">
   <input class="botonsubmit" type="reset" value="Borrar">
            
  </p>
</form>
     
</div>
	    </div>  	 
	

<?php
if (isset($_POST['enviar_personal'])){

echo insert_personal();

echo bitacora2();
?>

<div id="dialog-message" style=" align: center;" title="Registro completado">
	<p>
		<span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 20px;"></span>
		Usted ha sido registrado con exito gracias.
	</p>
	<p>   Por favor revisar:
	<a href="lista_personal.php">lista de personal</a></b>.
	</p>
</div>


<?php
}echo pie2();

}else{
    header("location:index.php");

    }
}else{
header("location:../index.php");

}

?>