<fieldset>
	<legend>Datos del Alumno</legend>
	<div class="col-sm-6 text-left"> 
		<h4>Requisitos para la foto:</h4>
		<ul>
			<li>La fotografía debe ser reciente.</li>
			<li>El fondo debe ser blanco y uniforme, sin sombras (del cuello para arriba).</li>
			<li>La fotografía ha de ser en color, centrada y enfocada.</li>
			<li>La cara de la persona debe aparecer mirando directamente a la cámara.</li>
			<li>Los ojos deben estar abiertos, no rojos por el efecto del flash y no cubiertos por el pelo.</li>
			<li>No se aceptarán fotografías realizadas con sombrero, gorro, pañuelo o visera.</li>
			<li>No se procesarán fotografías digitalizadas o de baja calidad.</li>
			<li>Tamaño estimado es de 8 a 20 Kbytes en formato JPEG.</li>
		</ul>
	</div>
    <div class="col-sm-6 text-left"> 
	<center>
	<form method="post" enctype="multipart/form-data" action="enviarfoto.php">	

		<div id="marcoVistaPrevia">
		    <img id="vistaPrevia" src="" alt="">
		</div><br>
		
		<div class="contenedor">
		    <div class="titulo">
		        <span>Vista Previa:</span> 
		        <span id="infoNombre">[Seleccione una imagen]</span><br/>
		        <span id="infoTamaño"></span>
		    </div>
		</div><br>

		<div id='botonera'>
		    <input type="file" id="archivo" name="archivo" accept="image/*" required>		    
		</div>	<br>

		<div>
			<input type="submit" name="enviar" value="Enviar">&nbsp;&nbsp;<input type="button" id="cancelar" value="Cancelar">
		</div>

	</form>
	</center>
	</div>
</fieldset>