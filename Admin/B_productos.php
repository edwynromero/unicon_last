<?php
 include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();
echo panel_productos();

 ?>
   <!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>jQuery UI Tabs - Content via Ajax</title>
   <link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery-ui-1.10.3.custom.js"></script>

   <script>
$(document).ready(function(){

        var consulta;

         //hacemos focus al campo de b?squeda
        $("#busqueda").focus();

        //comprobamos si se pulsa una tecla
        $("#busqueda").keyup(function(e){

              //obtenemos el texto introducido en el campo de b?squeda
              consulta = $("#busqueda").val();

              //hace la b?squeda

              $.ajax({
                    type: "POST",
                    url: "buscar_productos.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html("<p align='center'><img src='../imagenes/progress.gif' /></p>");
                    },
                    error: function(){
                          alert("error petici?n ajax");
                    },
                    success: function(data){
                          $("#resultado").empty();
                          $("#resultado").append(data);

                    }
              });


        });

});
	</script>
</head>
<body>
     <div style="  margin: -90px 0px 0px 300px;">
<h1>Buscar productos</h1><input type="text" id="busqueda" title="Ingresar codigo del producto" />

<div id="resultado"></div>
</div>
</body>
</html>


<?php
echo pie2();

?>