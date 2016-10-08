
     <link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>
	
	<script>

                $(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("fast");
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

  width: 220px;
padding:5px;
text-align:center;
    /*background-color:#e5eecc;*/
}
#panel
{

  margin-top: -9%;
   margin-left: 121%;
 position: absolute;
width: 220px;
padding:5px;
display:none;
}
</style>


<div id="flip"><img src="../imagenes/registros.png" title="usuario"   WIDTH=16 HEIGHT=16></img></div>
<div id="panel">
 
  <?php echo layout_admin();?>
  </br>
 
	  <?php echo panel_inicio();?>
	  </br>


.</div>

