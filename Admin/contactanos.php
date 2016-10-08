<?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();

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

    #menup {
  font-family: Arial;
  margin:5px;
}

#menup p {
  margin:0px;
  padding:0px;
}

#menup a {
  display: block;
  padding: 3px;
  width: 260px;
           background:url(../imagenes/bg.png);
  border-bottom: 1px solid #eee;
  text-align:center;
}

#menup a:link, #menup a:visited {
  color: black;
  text-decoration: none;
}

#menup a:hover {
  color: #fff;
}

#detalles {
           background:url(../imagenes/bg.png);
  text-align:left;
  font-family:verdana;
  padding:5px;
  color: black;
  margin:5px;
}


	</style>
    <script type="text/javascript">

    addEvent(window,'load',inicializarEventos,false);

function inicializarEventos()
{
  var ob;
  for(f=1;f<=12;f++)
  {
    ob=document.getElementById('enlace'+f);
    addEvent(ob,'click',presionEnlace,false);
  }
}

function presionEnlace(e)
{
  if (window.event)
  {
    window.event.returnValue=false;
    var url=window.event.srcElement.getAttribute('href');
    cargarHoroscopo(url);
  }
  else
    if (e)
    {
      e.preventDefault();
      var url=e.target.getAttribute('href');
      cargarHoroscopo(url);
    }
}


var conexion1;
function cargarHoroscopo(url)
{
  if(url=='')
  {
    return;
  }
  conexion1=crearXMLHttpRequest();
  conexion1.onreadystatechange = procesarEventos;
  conexion1.open("GET", url, true);
  conexion1.send(null);
}

function procesarEventos()
{
  var detalles = document.getElementById("detalles");
  if(conexion1.readyState == 4)
  {
    detalles.innerHTML = conexion1.responseText;
  }
  else
  {
    detalles.innerHTML = 'Cargando...';
  }
}

//***************************************
//Funciones comunes a todos los problemas
//***************************************
function addEvent(elemento,nomevento,funcion,captura)
{
  if (elemento.attachEvent)
  {
    elemento.attachEvent('on'+nomevento,funcion);
    return true;
  }
  else
    if (elemento.addEventListener)
    {
      elemento.addEventListener(nomevento,funcion,captura);
      return true;
    }
    else
      return false;
}

function crearXMLHttpRequest()
{
  var xmlHttp=null;
  if (window.ActiveXObject)
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  else
    if (window.XMLHttpRequest)
      xmlHttp = new XMLHttpRequest();
  return xmlHttp;
}


    </script>

         <div style='overflow:auto;  height:630px; width:1200px;'>
<h1>Desarrolladores</h1>
<div id="menup">
<p><a id="enlace1" href="contacto1.php?cod=1">Edwyn Romero</a></p>
<p><a id="enlace2" href="contacto1.php?cod=2">Jesus Gutierrez</a></p>
<p><a id="enlace3" href="contacto1.php?cod=3">Jorge Altuve</a></p>
</div>
<div id="detalles">Seleccione Desarrollador.</div>
 </DIV>
<?php
echo pie2();


?>