<?php   
	session_start();
	//Le damos nombre a las variables 
	$uploadedfileload = true;
	$img_name    = $_FILES['archivo']["name"];
	$img_tipo    = $_FILES['archivo']["type"];
	$img_tam     = $_FILES['archivo']["size"];
	$img_local   = $_FILES["archivo"]["tmp_name"];
	$codigo      = substr($_SESSION["codalu"], 0, -1);
	$remote_file = $codigo.".jpg";
	$ruta        = $_SESSION["nucleo"];

	/*if (!($img_tipo == "image/jpeg" OR $img_tipo == "image/jpg"))
	{
		echo '<script>';
		echo 'alert("Debe seleccionar una imagen tipo JPG o JPEG!");';
		echo 'window.location="perfil.php?pagina=8";';
		echo '</script>';
		$uploadedfileload = false;
	}*/

	//Verifica el tamaño del archivo
	if ($img_tam < 6000 && $img_tam > 30000)
	{
		echo '<script>';
		echo 'alert("El archivo debe ser entre 6 y 30 Kb!");';
		echo 'window.location="perfil.php?pagina=8";';
		echo '</script>';
		$uploadedfileload = false;
	} 

	//Verifica que existe el archivo
	if($uploadedfileload == true)
	{
		//Comprobamos que se haya enviado algo desde el formulario
		if(is_uploaded_file($img_local))
		{
			//Definimos las variables
			$host = "dnsiutepi.no-ip.net";			
			$port = 21;			
			$user = "fotowebi";			
			$pass = "ImaGel*A1";	

			//Realizamos la conexion con el servidor
			$conn_id=@ftp_connect($host,$port);

			//Verifica si ha conexion
			if($conn_id)
			{
				//Realizamos el login con nuestro usuario y contraseña
				if(@ftp_login($conn_id,$user,$pass))
				{			
					//cambiar directorio
					ftp_chdir($conn_id, $ruta);

					// activar modo pasivo
					ftp_pasv($conn_id, true);

					//Subimos el fichero
					if(@ftp_put($conn_id, $remote_file, $img_local, FTP_BINARY))
					{
						echo '<script>';
						echo 'alert("Enviado exitosamente!\n Su foto sera actualiza despues de la entrega del carnet");';
						echo 'window.location="perfil.php?pagina=8";';
						echo '</script>';
					}
					else
					{
						echo '<script>';
						echo 'alert("Error al subir foto!");';
						echo 'window.location="perfil.php?pagina=8";';
						echo '</script>';
					}

				}
				else
				{
					echo '<script>';
					echo 'alert("Error de conexion con el servidor!");';
					echo 'window.location="perfil.php?pagina=8";';
					echo '</script>';
				}

				//Cerramos la conexion ftp
				ftp_close($conn_id);
			}
			else
			{
				echo '<script>';
				echo 'alert("Error de conexion el servidor!");';
				echo 'window.location="perfil.php?pagina=8";';
				echo '</script>';
			}
		}
	}

?>