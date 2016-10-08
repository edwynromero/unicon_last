function EnviaFormulario(id_cargar,url_cargar,formulario) //Div a actualizar, accion, id_formulario
{
 	$.ajax
 	(
 		{
			type: "post",
			url: ""+url_cargar+"",
	 		async: true,
	 		dataType:'html',
			 
	 		data: $('#'+formulario).serialize(),
			beforeSend:function()
	 		{
	 			$('#guardando').show();
	 		},
	 		success:function(data)
	 		{
	 			$('#'+id_cargar).html(data);
	 			$('#guardando').hide();
	 		}
	 	}
	);
}
function validarguardar(id_cargar,url_cargar,formulario)
{
	EnviaFormulario(id_cargar,url_cargar,formulario);
}

function Cargar(id_cargar,url_cargar)
{
	$.ajax
 	(
 		{
			type: "post",
			url: ""+url_cargar+"",
	 		async: true,
	 		dataType:'html',
			beforeSend:function()
	 		{
	 			$('#cargando').show();
	 		},
	 		success:function(data)
	 		{
	 			$('#'+id_cargar).html(data);
	 			$('#cargando').hide();
	 		}
	 	}
	);
}

function CargarDatos(id_cargar,url_cargar,datos)
{
	$.ajax
 	(
 		{
			type: "post",
			url: ""+url_cargar+"",
	 		async: true,
			data:datos,
	 		dataType:'html',
			beforeSend:function()
	 		{
	 		   //	$('#cargando').show();
	 		},
	 		success:function(data)
	 		{
	 			$('#'+id_cargar).html(data);
	 			//$('#cargando').hide();
	 		}
	 	}
	);
}

function confirmar(url_cargar,id_cargar,pre)
{
	if(pre=="NO")
	{
		Cargar(id_cargar,url_cargar);
	}
	else
	{
		if(confirm(pre))
		{
			Cargar(id_cargar,url_cargar);
		}
		else
		{
			return false;
		}
	}
	return true;
}
function Cargarsimple(id_cargar,url_cargar)
{
 	$.ajax
 	(
 		{
			type: "post",
			url: ""+url_cargar+"",
	 		async: true,
	 		dataType:'html',
			beforeSend:function(){},
	 		success:function(data)
	 		{
	 			$('#'+id_cargar).html(data);
	 		}
	 	}
	);
}

function input_uno(url_cargar,id_cargar,u)
{
 	var uno = document.getElementById(u).value;
   	url_cargar = url_cargar+'/'+uno;
    Cargar(id_cargar,url_cargar);
}

function input_dos(url_cargar,id_cargar,u,d)
{
 	var uno = document.getElementById(u).value;
	var dos = document.getElementById(d).value;
   	url_cargar = url_cargar+'/'+uno+'/'+dos;
    Cargar(id_cargar,url_cargar);
}

function input_tres(url_cargar,id_cargar,u,d,t)
{
 	var uno = document.getElementById(u).value;
	var dos = document.getElementById(d).value;
	var tres = document.getElementById(t).value;
   	url_cargar = url_cargar+'/'+uno+'/'+dos+'/'+tres;
   Cargar(id_cargar,url_cargar);
}


function input_dos_datos(url_cargar,id_cargar,u,d)
{
 	var uno = document.getElementById(u).value;
	var dos = document.getElementById(d).value;

   	datos = u+'='+uno+'&'+d+'='+dos;
    CargarDatos(id_cargar,url_cargar,datos);
}

function input_tres_datos(url_cargar,id_cargar,u,d,t)
{
 	var uno = document.getElementById(u).value;
	var dos = document.getElementById(d).value;
	var tres = document.getElementById(t).value;
   	datos = u+'='+uno+'&'+d+'='+dos+'&'+t+'='+tres;
    CargarDatos(id_cargar,url_cargar,datos);
}

function mensaje(a){
                  alert(a);
}

