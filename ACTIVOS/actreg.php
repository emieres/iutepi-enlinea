<?php  
	session_start();

	$dsn = $_SESSION["nucleo"]; 
	//debe ser de sistema no de usuario
	$usuario = "";
	$clave = "";
	
	//realizamos la conexion mediante odbc
	$conexion = odbc_connect($dsn, $usuario, $clave) or die ("<strong>No se conecto a la Base de Datos</strong>");

	$codigo = $_SESSION["codalu"];
	$ciudad = $_POST["ciudad"];
	$estado = $_POST["estado"];
	$direccion = $_POST["direccion"];
	$telcel = $_POST["telcel"];
	$telhab = $_POST["telhab"];
	$empresa = $_POST["empresa"];
	$telemp = $_POST["telemp"];
	$email = $_POST["email"];

	$sql = "UPDATE alumno SET ciunac='$ciudad', edonac='$estado', dirhab='$direccion', telcel='$telcel', telhab='$telhab', empresa='$empresa', telemp='$telemp', email='$email' WHERE codalu='$codigo'";

	if ($resultado = odbc_exec($conexion, $sql)) 
	{
		echo '<script>';
		echo 'alert("Datos guardados");';
		echo 'window.location="perfil.php?pagina=3";';
		echo '</script>';
	}
?>