<?php
//include ("Auto.php");
include("../funciones/librerias.php");

if(usuario_conectar()){
  if(usuario_administrador() or usuario_empleado()){
echo cabecera2();
echo menu_vertical();
 echo panel_inicio();
 echo calendario();   
?>
<link rel="stylesheet" type="text/css" href="../css/calendario.css"/>
    <script type="text/javascript" src="../js/basiccalendar.js"></script>
<script type="text/javascript">


</script>
<script src="../Spry-UI-1.7/includes/SpryDOMUtils.js" type="text/javascript"></script>
<script src="../Spry-UI-1.7/includes/SpryDOMEffects.js" type="text/javascript"></script>
<script src="../Spry-UI-1.7/includes/SpryWidget.js" type="text/javascript"></script>
<script src="../Spry-UI-1.7/includes/SpryPanelSelector.js" type="text/javascript"></script>
<script src="../Spry-UI-1.7/includes/SpryPanelSet.js" type="text/javascript"></script>
<script src="../Spry-UI-1.7/includes/SpryFadingPanels.js" type="text/javascript"></script>
<script src="../Spry-UI-1.7/includes/SprySliderPanels.js" type="text/javascript"></script>
<script src="../Spry-UI-1.7/includes/SpryFilmStrip.js" type="text/javascript"></script>
<script src="../Spry-UI-1.7/includes/SpryImageLoader.js" type="text/javascript"></script>
<script src="../Spry-UI-1.7/includes/SpryImageSlideShow.js" type="text/javascript"></script>
<script src="../Spry-UI-1.7/includes/plugins/ImageSlideShow/SpryThumbnailFilmStripPlugin.js" type="text/javascript"></script>
<script src="../Spry-UI-1.7/includes/plugins/ImageSlideShow/SpryTitleSliderPlugin.js" type="text/javascript"></script>
<script src="../Spry-UI-1.7/includes/plugins/ImageSlideShow/SpryPanAndZoomPlugin.js" type="text/javascript"></script>
<link href="../Spry-UI-1.7/css/ImageSlideShow/basicFS/basic_fs.css" rel="stylesheet" type="text/css" />
<style type="text/css">
/* BeginOAWidget_Instance_2141543: #ImageSlideShow */




#move{
margin: -300px 0px 0px 150px;
border-radius: 20px;

}

#ImageSlideShow {
	width: 550px;
	height:350px;
	margin: 30px 0px 0px 150px;
	padding-top: 10px;
}

#ImageSlideShow .ISSName {
	top: -14px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: normal;
	font-size: 18px;
	text-transform: uppercase;
	color: #AAAAAA;
}

#ImageSlideShow .ISSSlideTitle {
	top: -18px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: normal;
	font-size: 12px;
	overflow: hidden;
	color: #AAAAAA;
	text-transform: none;
}

#ImageSlideShow .ISSClip {
	height: 280px;
	margin: 28 10px 10px 10px;
	border: solid 1px #AAAAAA;
	background-color: #000000;
}

#ImageSlideShow .ISSControls {
	top: 11px;
	height: 502px;
}

#ImageSlideShow .FilmStrip {
	height: 80px;
	background-color: #CCCCCC;
}

#ImageSlideShow .FilmStripPreviousButton, #ImageSlideShow .FilmStripNextButton {
	width: 5px;
	height: 80px;
}

#ImageSlideShow .FilmStripTrack {
	height: 80px;
}

#ImageSlideShow .FilmStripContainer {
	height: 80px;
}

#ImageSlideShow .FilmStripPanel {
	height: 80px;
	padding-left: 10px;
	margin-right: 0px;
}

#ImageSlideShow .FilmStripPanel .ISSSlideLink {
	margin-top: 10px;
	border: solid 1px #AAAAAA;
	background-color: #FFFFFF;
}

#ImageSlideShow .FilmStripPanel .ISSSlideLinkRight {
	border: solid 1px #AAAAAA;
	width: 56px;
	height: 47px;
	margin: 4px 4px 4px 4px;
}

#ImageSlideShow .FilmStripCurrentPanel .ISSSlideLink {
	background-color: #FFFFFF;
	border-color: #FF0000;
}

#ImageSlideShow .FilmStripCurrentPanel .ISSSlideLinkRight {
	border-color: #AAAAAA;
}

/* EndOAWidget_Instance_2141543 */
</style>
<script type="text/xml">
<!--
<oa:widgets>
  <oa:widget wid="2141543" binding="#ImageSlideShow" />
</oa:widgets>
-->
</script>   <script language="javascript" type="text/javascript" src="../js/funciones.js"></script>



<div id="move">
          	<ul id="ImageSlideShow">
          	  <li><a href="../imagenes/index1.png" title="UNICON"><img src="../imagenes/index1.png" alt="Frente del Modulo" /></a></li>
          	  <li><a href="../imagenes/index2.png" title="UNICON"><img src="../imagenes/index2.png" alt="Pasillo" /></a></li>
          	  <li><a href="../imagenes/index3.png" title="UNICON"><img src="../imagenes/index3.png" alt="Sala de Espera" /></a></li>
          	  <li><a href="../imagenes/index4.png" title="UNICON"><img src="../imagenes/index4.png" alt="La Placita" /></a></li>
          	  <li><a href="../imagenes/index5.png" title="UNICON"><img src="../imagenes/index5.png" alt="Frente del Modulo" /></a></li>
          	  <li><a href="../imagenes/index6.png" title="UNICON"><img src="../imagenes/index6.png" alt="Pasillo" /></a></li>
          	  <li><a href="../imagenes/index7.png" title="UNICON"><img src="../imagenes/index7.png" alt="Sala de Espera" /></a></li>
          	  <li><a href="../imagenes/index8.png" title="UNICON"><img src="../imagenes/index8.png" alt="La Placita" /></a></li>
          	  <li><a href="../imagenes/index9.png" title="UNICON"><img src="../imagenes/index9.png" alt="Frente del Modulo" /></a></li>
          	  <li><a href="../imagenes/index10.png" title="UNICON"><img src="../imagenes/index10.png" alt="Pasillo" /></a></li>
          	  <li><a href="../imagenes/index11.png" title="UNICON"><img src="../imagenes/index11.png" alt="Sala de Espera" /></a></li>
          	  <li><a href="../imagenes/index12.png" title="UNICON"><img src="../imagenes/index12.png" alt="La Placita" /></a></li>
          	  <li><a href="../imagenes/index13.png" title="UNICON"><img src="../imagenes/index13.png" alt="Frente del Modulo" /></a></li>
          	  <li><a href="../imagenes/index14.png" title="UNICON"><img src="../imagenes/index14.png" alt="Pasillo" /></a></li>
          	  <li><a href="../imagenes/index15.png" title="UNICON"><img src="../imagenes/index15.png" alt="Sala de Espera" /></a></li>
          	  <li><a href="../imagenes/index16.png" title="UNICON"><img src="../imagenes/index16.png" alt="La Placita" /></a></li>
              <li><a href="../imagenes/index17.png" title="UNICON"><img src="../imagenes/index17.png" alt="Frente del Modulo" /></a></li>
          	  <li><a href="../imagenes/index18.png" title="UNICON"><img src="../imagenes/index18.png" alt="Pasillo" /></a></li>
          	  <li><a href="../imagenes/index19.png" title="UNICON"><img src="../imagenes/index19.png" alt="Sala de Espera" /></a></li>
          	  <li><a href="../imagenes/index20.png" title="UNICON"><img src="../imagenes/index20.png" alt="La Placita" /></a></li>
              <li><a href="../../imagenes/index21.png" title="UNICON"><img src="../imagenes/index21.png" alt="La Placita" /></a></li>
       	    </ul>
            <script type="text/javascript">
// BeginOAWidget_Instance_2141543: #ImageSlideShow

var ImageSlideShow = new Spry.Widget.ImageSlideShow("#ImageSlideShow", {
	widgetID: "ImageSlideShow",
	widgetClass: "BasicSlideShowFS",
	injectionType: "replace",
	autoPlay: true,
	displayInterval: 5000,
	transitionDuration: 3000,
	componentOrder: ["name", "title", "view", "controls", "links"],
	sliceMap: { BasicSlideShowFS: "3slice", ISSSlideLink: "3slice" },
	plugIns: [ Spry.Widget.ImageSlideShow.ThumbnailFilmStripPlugin, Spry.Widget.ImageSlideShow.PanAndZoomPlugin ],
	TFSP: { pageIncrement: 8, wraparound: true }
});
// EndOAWidget_Instance_2141543
            </script>
          </div>


<?php
echo pie2();

    }else{
    header("location:../index.php");

    }
}else{
header("location:../index.php");

}
?>
