<?php

@session_start();

header("location:sid2.php");


session_unregister('resultado');
session_unregister('resultado_estimado');
session_unregister('resultado_real');

$_SESSION['msj']='finalizado';

//header("location:sid2.php");


?>
	