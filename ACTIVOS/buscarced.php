<?php  
	//datos recibidos de cedula
	$cedula = $_POST["cedula"];

	session_start();

	$dsn = $_SESSION["nucleo"]; //debe ser de sistema no de usuario
	
	//realizamos la conexion mediante odbc
	$conexion = odbc_connect($dsn, "", "") or die ("<strong>No se conecto a la Base de Datos</strong>");	

	//hacemos la consulta
	$sql = "SELECT * FROM alumno WHERE cedula='$cedula'";
	$resultado = odbc_exec($conexion, $sql);

	$registro = odbc_fetch_array($resultado);

	//si el registro existe lo corremos    
	if (isset($registro["cedula"])) 
	{
		$_SESSION["cedula"] = $registro["cedula"];
		$_SESSION["codalu"] = $registro["codalu"];
		header("location:login.php");
		
	}
	else
	{
		echo '<script>';
		echo 'alert("Cédula no Registrada");';
		echo 'window.location="cedula.php";';
		echo '</script>';
	}
?>
<meta charset="utf-8">