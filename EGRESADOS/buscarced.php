<?php  
	session_start();

	$dsn = "egresados"; 
	//debe ser de sistema no de usuario
	$usuario = "";
	$clave = "";
	
	//realizamos la conexion mediante odbc
	$conexion = odbc_connect($dsn, $usuario, $clave) or die ("<strong>No se conecto a la Base de Datos</strong>");

	$cedula = $_POST["cedula"];

	$sql = "SELECT * FROM grados WHERE cedula='$cedula'";

	$resultado = odbc_exec($conexion, $sql);

	$registro = odbc_fetch_array($resultado);

	if (isset($registro["cedula"])) {
        $_SESSION["cedula"] = $registro["cedula"];
        $_SESSION["nombre"] = $registro["nombre"];
        $_SESSION["carrera"] = $registro["carrera"];
        $_SESSION["promocion"] = $registro["promocion"];
        $_SESSION["ia"] = $registro["ia"];
        $_SESSION["pos_pro"] = $registro["pos_pro"];
        $_SESSION["pos_car"] = $registro["pos_car"];
		header("location:egresado.php");
		
	}else{
		echo '<script>';
		echo 'alert("Cédula no Registrada");';
		echo 'window.location="index.php";';
		echo '</script>';
	}
?>
<meta charset="utf-8">