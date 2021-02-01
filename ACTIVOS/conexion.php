<?php
	session_start();
    $dsn = $_SESSION["nucleo"]; //debe ser de sistema no de usuario
	$codigo = $_SESSION["codalu"];	
	//realizamos la conexion mediante odbc
	$conexion = odbc_connect($dsn, "", "") or die("<strong>ERROR DE CONEXION</strong>");

?>