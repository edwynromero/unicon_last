<?php
include("../funciones/librerias.php");
echo cabecera2();
echo menu_vertical();

?>
    <script type="text/javascript" src="../js/mootools-core-1.4.5.js"></script>
    <script type="text/javascript" src="../js/roller.js"></script>
    <style type="text/css">
        .heading{
            color:black;
            padding:20px;
            font-size:40px;
             background:url(../imagenes/bg.png);
        }
        .heading h1{
            margin:0;
            padding:0;
        }
        .page{
            width:950px;
            margin:0px 0px 0px 25m 0px;
            text-align:left;
             background:url(../imagenes/bg.png);
        }

        .ludo-roller{
           background:url(../imagenes/bg.png);
            position:relative;
            border-bottom:1px solid #444;
            border-top:1px solid #444;

            color:black;
        }
        .ludo-roller-text-container{

            position:absolute;
            width:400px;
            left:20px;
            top:40px;
            height:360px;
            color:black;
            font-weight:normal;
            font-family:helvetica,arial, serif;

            cursor:pointer;
            overflow:hidden;
        }
        .ludo-roller-text-container h1{
            font-size:40px;
            line-height:140%;

            color:black;
        }
        .ludo-roller-image-container{
            position:absolute;
            width:520px;
            height:380px;
            border-radius:5px;
            top:20px;
            right:20px;
            background-color:#191919;
            cursor:pointer;
            overflow:hidden;
        }
        .ludo-roller-image, .ludo-roller-text{
            position:absolute;
            width:100%;
            height:100%;
            padding:0;
            margin:0;
            background-repeat:no-repeat;
            background-position:center center;

        }
    </style>

<div class="page">
    <div class="heading"><h1>Manual del sistema</h1></div>
    <div id="rollerContainer" style="height:500px;margin-bottom:10px"></div>

<script type="text/javascript">
var roller = new Roller({
    renderTo:'rollerContainer',
    duration:8,
    preload:true,
    scramble:true,
    animation:{
        imageEffect:'slide',
        imageOutEffect:'slide',
        textEffect:'slide',
        textOutEffect:'slide',
        imageSlide: 'right',
        textSlide : 'right',
        duration :.7
    }
});
roller.add({
    img : '../imagenes/formularios.gif',
    text : '<h1>Formularios</h1><p>Se llenaran una serie de formularios que corresponden a la produccion de la  empresa.</p>' +
            '<p>Formulario de registro de personal.</P>' +
            '<p>Formulario de registro de produccion.</p>'+
            '<p>Formulario de registro de maquina.</P>' +
            '<p>Formulario de registro de turno.</P>' +
            '<p>Formulario de registro de produccion.</P>',
    url : 'manual.php'
});
roller.add({
    img : '../imagenes/listas.gif',
    text : '<h1>Listas</h1><p>Luego de registrar se puede observar toda la data en las listas.</p>'+'<p>Lista de personal</p>'
+'<p>Lista de productos</p>'
+'<p>Lista de maquinas</p>'
+'<p>Lista de turnos</p>'
+'<p>Lista de produccion</p>',
    url : 'lista_personal.php'
});
roller.add({
    img : '../imagenes/reporte.gif',
    text : '<h1>Reportes</h1><p>Encontraras todos los archivos pdfs de que ya han sido registrados y visualizados previamente.</p>',
    url : 'manual.php'
});
roller.add({
    img : '../imagenes/listas.gif',
    text : '<h1>Busquedas</h1><p>Aqui puedes realizar la busquedas del personal, productos, maquinas, turnos, produccion etc..</p>',
    url : 'B_personal.php'
});
roller.add({
    img : '../imagenes/listas.gif',
    text : '<h1>Mantenimiento</h1><p>Aqui podras realizar respaldo de la base de datos, restaurarla y realizar las respectivas auditorias del sistema.</p>',
    url : 'manual.php'
});


roller.add({
    img : '../imagenes/graficas.gif',
    text : '<h1>Graficas</h1><p>Podras revisar las diferentes graficas del area de produccion.</p>',
    url : 'grafica_calidad1.php'
});


roller.add({
    img : '../imagenes/graficas.gif',
    text : '<h1>Contactanos</h1><p>Tienes la posibilidad de contactar a los programadores del sistema.</p>',
    url : 'contactanos.php'
});

roller.add({
    img : '../imagenes/graficas.gif',
    text : '<h1>Si desea saber mas del sistema por favor revisar el manual</h1>',
    url : 'manual.php'
});
roller.start();

</script>
<?php
echo pie2();


?>