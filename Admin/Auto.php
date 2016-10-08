<?php
    	error_reporting(E_ALL & ~E_NOTICE);
		// AUTENTICACION PARA PODER ACCEDER A LA PAGINA
		session_start();
		if (!($_SESSION['aut'] == 'Admin' && isset($_SESSION['uid']))) {
			header('location:../');
		}
?>