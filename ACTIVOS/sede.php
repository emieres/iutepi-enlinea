<?php
	session_start();

	//DATOS DE LA SEDE RECIBIDA
	$nucleo = $_POST["nucleo"];

	if ($nucleo) 
	{
		$_SESSION["nucleo"] = $nucleo;
		header("location:cedula.php");
	}
?>