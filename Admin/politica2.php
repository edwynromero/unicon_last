<!DOCTYPE html>
<html>

     <link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
	<script>

                $(document).ready(function(){
  $("#flip2").click(function(){
    $("#panel2").slideToggle("fast");
  });
});


    	/*$( "#accordion" ).accordion();



		var availableTags = [
			"ActionScript",
			"AppleScript",
			"Asp",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"Scheme"
		];
		$( "#autocomplete" ).autocomplete({
			source: availableTags
		});



		$( "#button" ).button();
		$( "#radioset" ).buttonset();



		$( "#tabs" ).tabs();



		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 400,
			buttons: [
				{
					text: "Ok",
					click: function() {
						$( this ).dialog( "close" );
					}
				},
				{
					text: "Cancel",
					click: function() {
						$( this ).dialog( "close" );
					}
				}
			]
		});

		// Link to open the dialog
		$( "#dialog-link" ).click(function( event ) {
			$( "#dialog" ).dialog( "open" );
			event.preventDefault();
		});



		$( "#datepicker" ).datepicker({
			inline: true
		});



		$( "#slider" ).slider({
			range: true,
			values: [ 17, 67 ]
		});



		$( "#progressbar" ).progressbar({
			value: 20
		});


		// Hover states on the static widgets
		$( "#dialog-link, #icons li" ).hover(
			function() {
				$( this ).addClass( "ui-state-hover" );
			},
			function() {
				$( this ).removeClass( "ui-state-hover" );
			}
		);
	});   */

	</script>

<style type="text/css">
#panel2,#flip2
{

  width: 220px;
padding:5px;
text-align:center;
/*background-color:#e5eecc;*/
}
#panel2
{

  margin-top: -10%;
   margin-left: 50%;
 position: absolute;
width: 50px;
padding:5px;
display:none;
}
</style>

<body ONLOAD="Visualizartiempo()">

<div id="flip2"><img src="../imagenes/registros.png" title="Hora"   WIDTH=16 HEIGHT=16></img></div>
<div id="panel2">
      <script type="text/javascript">


function Cronometro() 
{
	var IdTiempo = null;
	var TiempoEjecucion = false;
	var TiempoActual = new Date();
	var Hora = TiempoActual.getHours();
	var minutos = TiempoActual.getMinutes();
	var segundos = TiempoActual.getSeconds();
	var ValorTiempo = "" + ((Hora >12) ? Hora -12 :Hora); 
	ValorTiempo = ((ValorTiempo <10)? "0":"") + ValorTiempo;
	ValorTiempo += ((minutos < 10) ? ":0" : ":") + minutos;
	ValorTiempo += ((segundos < 10) ? ":0" : ":") + segundos; 
	ValorTiempo += (Hora >= 12) ? " pm" : " am";
	TiempoEjecucion = true;
	return ValorTiempo;
}
function Visualizartiempo()
{
	document.FormularioTiempo.tiempo.value = Cronometro(); 
	IdTiempo = setTimeout("Visualizartiempo()",1000);
}//-->




</script>	<FORM NAME="FormularioTiempo" METHOD="post" ACTION="Reloj.html">
	<INPUT TYPE="text" ID="tiempo" SIZE="8" readonly>
	</FORM>

.</div>



</body>
</html>
