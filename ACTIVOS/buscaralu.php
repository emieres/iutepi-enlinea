<?php	
	//datos recibidos de login
	$codigo = $_POST["codalu"];
	$fecha = $_POST["fecnac"];	

	session_start();

	$cedula = $_SESSION["cedula"];

	//debe ser de sistema no de usuario
	$dsn = $_SESSION["nucleo"]; 
	
	//realizamos la conexion mediante odbc
	$conexion = odbc_connect($dsn,"","") or die ("<strong>No se conecto a la Base de Datos</strong>");

	//hacemos la consulta
	$sql = "SELECT * FROM alumno WHERE cedula='$cedula' and codalu='$codigo' and fecnac='$fecha'";
	$resultado = odbc_exec($conexion, $sql);

	//obtienes el resultado del registro
	$registro = odbc_fetch_array($resultado);

	//si existe el regitro lo recorremos
	if ($registro <> 0) 
	{
		$_SESSION["codalu"] = $registro["codalu"];
		$_SESSION["nombre"] = $registro["nombre"];
		$_SESSION["cedula"] = $registro["cedula"];
		$_SESSION["carrera"] = $registro["carrera"];
		$_SESSION["ciudad"]	=  $registro["ciunac"];
		$_SESSION["estado"] = $registro["edonac"];
		$_SESSION["direccion"] = $registro["dirhab"];
		$_SESSION["telcel"] = $registro["telcel"];
		$_SESSION["telhab"] = $registro["telhab"];
		$_SESSION["telemp"] = $registro["telemp"];
		$_SESSION["empresa"] = $registro["empresa"];
		$_SESSION["email"] = $registro["email"];
		$_SESSION["pensum"] = $registro["codpen"];
		$_SESSION["puntos"] = $registro["ia"];
        $_SESSION["mora"] = $registro["mora"];
        $_SESSION["saldo"] = $registro["saldo"];
		$_SESSION["codsem"] = $registro["codsem"];
		$_SESSION["nro_ins"] = $registro["nro_ins"];
		$_SESSION["fec_ins"] = $registro["fec_ins"];
		$_SESSION["codpen"] = $registro["codpen"];
		header("location:perfil.php");	
 	} 
 	else 
 	{
		echo '<script>';
		echo 'alert("Datos incorrectos vuelva a intentar");';
		echo 'window.location="login.php"';
		echo '</script>';
	}

?>