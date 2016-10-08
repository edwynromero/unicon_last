                                                    <?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();
?>
     <link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
	<script>

                $(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});

         $(document).ready(function(){
  $("#flip2").click(function(){
    $("#panel2").slideToggle("slow");
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
#panel,#flip
{
padding:5px;
text-align:center;
background:url(../imagenes/bg.png);
/*background-color:#e5eecc;*/
border:solid 1px #c3c3c3;
}
#panel
{
padding:50px;
display:none;
}

#panel2,#flip2
{
padding:5px;
text-align:center;
background:url(../imagenes/bg.png);
/*background-color:#e5eecc;*/
border:solid 1px #c3c3c3;
}
#panel2
{
padding:50px;
display:none;
}

</style>


<div id="flip">Objetivos de la calidad</div>
<div id="panel">


Industrias Unicon, C.A. y Condusid C.A. fabricantes de tuberias, perfiles, l?minas de acero y servicios relacionados para los sectores de energ?a, construcci?n, metalmec?nica y automotriz, establece como Pol?tica de su Sistema de Gesti?n de la Calidad, su compromiso de :
- Garantizar la plena satisfaccion de nuestros clientes y contribuir con su sostenibilidad.

-Cumplir con los requisitos legales, reglamentarios y de las normas aplicables.

Mediante la innovaci?n, la excelencia, el uso eficiente de nuestros recursos y el mejoramiento continuo de la organizaci?n.</div>



<div id="flip2">Objetivos de la calidad</div>
<div id="panel2">


Industrias Unicon, C.A. y Condusid C.A. fabricantes de tuberias, perfiles, l?minas de acero y servicios relacionados para los sectores de energ?a, construcci?n, metalmec?nica y automotriz, establece como Pol?tica de su Sistema de Gesti?n de la Calidad, su compromiso de :
- Garantizar la plena satisfaccion de nuestros clientes y contribuir con su sostenibilidad.

-Cumplir con los requisitos legales, reglamentarios y de las normas aplicables.

Mediante la innovaci?n, la excelencia, el uso eficiente de nuestros recursos y el mejoramiento continuo de la organizaci?n.</div>



<?php
echo pie2();


?>