

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



