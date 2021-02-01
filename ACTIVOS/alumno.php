<fieldset>
	<legend>Datos del Alumno</legend>
    	<div class="foto">                
			
			<?php
			
				$ruta          = "../DB/ACTIVOS/".$_SESSION["nucleo"]."/fotos/";
              	$foto          = substr($_SESSION['codalu'], 0, -1);
              	$foto_alu      = "$foto.jpg";
              	$no_foto       = "usuario.jpg";
              	$foto_final    = $ruta.$foto_alu;
             	$no_foto_final = $ruta.$no_foto;
				
				//Verifica que la foto exista
				if (file_exists($foto_final)) 
			    { 
					echo "<img src='".$foto_final."' width='110px' style='border-radius: 5px;'>";
				} 
				else 
				{
					echo "<img src='".$no_foto_final."' width='110px' style='border-radius: 5px;'>";
				}

			?>
        </div> <!-- foto -->
            
        <div class="datos">
                
            <table border="0" width="500px" class="da">
				<tr>
					<td><label class="titulo1">Cedula:</label></td>
					<td><?php echo $_SESSION["cedula"] ?></td>
				</tr>
				<tr>
					<td><label class="titulo1">Alumno:</label></td>
					<td><?php echo $_SESSION["nombre"] ?></td>
				</tr>
				<tr>
					<td><label class="titulo1">Carrera:</label></td>
					<td><?php echo $_SESSION["carrera"] ?></td>
				</tr>
				<tr>
					<td><label class="titulo1">Sede:</label></td>
					<td>
						<?php 
							//se obtiene la sede del alumno
							include("funciones.php");
							echo sede($_SESSION["nucleo"]);
						?>
					</td>
				</tr>
			</table>
                
        </div><!-- /datos -->
                
</fieldset>