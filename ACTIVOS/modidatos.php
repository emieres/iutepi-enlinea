<fieldset>
	<legend>Datos Personales</legend>
                
            <div class="foto">
					<?php  
						//carga la foto actual de alumno
						$foto = $_SESSION["codalu"];
						$ruta = "../DB/ACTIVOS/".$_SESSION["nucleo"]."/fotos/".$foto;
						$ruta2 = "../DB/ACTIVOS/".$_SESSION["nucleo"]."/fotos/usuario.png";
					?>
						<img src="<?php echo $ruta ?>" onerror="this.src='<?php echo $ruta2 ?>'" width="110px" style="border-radius:10px;">
                
            </div> <!-- foto -->
                        
            <div class="datos">
                
                <form name="form" id="form" method="post" action="actreg.php" autocomplete="off" onsubmit="return valida()">
					<table border="0" widt="500px" class="da">
							<tr>
								<td><label class="titulo1">Cédula: </label></td>
								<td style="color: gray"><input type="text" class="form-control" disabled="disabled" value="<?php echo $_SESSION["cedula"] ?>"></td>
							</tr>
							<tr>
								<td><label class="titulo1">Nombre: </label></td>
								<td style="color: gray"><input type="text" class="form-control" disabled="disabled" value="<?php echo $_SESSION["nombre"] ?>"></td>
							</tr>
							<tr>
								<td><label class="titulo1">Ciudad de nacimiento: </label></td>
								<td><input type="text" class="form-control" name="ciudad" value="<?php echo $_SESSION['ciudad'] ?> " maxlength="30" onkeypress="return validarletras(event)"></td>
							</tr>
							<tr>
								<td><label class="titulo1">Estado: </label></td>
								<td>
									<select class="form-control" name="estado">
										<option selected><?php echo $_SESSION["estado"] ?></option>
										<option>AMAZONAS</option>
										<option>ANZOATEGUI</option>
										<option>APURE</option>
										<option>ARAGUA</option>
										<option>BARINAS</option>
										<option>BOLIVAR</option>
										<option>CARABOBO</option>
										<option>COJEDES</option>
										<option>DELTA AMACURO</option>
										<option>FALCON</option>
										<option>DISTRITO CAPITAL</option>
										<option>GUARICO</option>
										<option>LARA</option>
										<option>MERIDA</option>
										<option>MIRANDA</option>
										<option>MONAGAS</option>
										<option>NUEVA ESPARTA</option>
										<option>PORTUGUESA</option>
										<option>SUCRE</option>
										<option>TACHIRA</option>
										<option>TRUJILLO</option>
										<option>VARGAS</option>
										<option>YARACUY</option>
										<option>ZULIA</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><label class="titulo1">Direccion de habitación: </label></td>
								<td><textarea name="direccion" class="form-control"><?php echo $_SESSION["direccion"]; ?></textarea></td>
							</tr> 
							<tr>
								<td><label class="titulo1">Telefono de contacto: </label></td>
								<td><input type="text" class="form-control" name="telcel" value="<?php echo $_SESSION['telcel'] ?>" maxlength="11" onkeypress="return validarnumeros(event)"></td>
							</tr>
							<tr>
								<td><label class="titulo1">Telefono de habitación: </label></td>
								<td><input type="text" class="form-control" name="telhab" value="<?php echo $_SESSION['telhab'] ?>" maxlength="11" onkeypress="return validarnumeros(event)"></td>
							</tr>
							<tr>
								<td><label class="titulo1">Empresa donde labora: </label></td>
								<td><input type="text" class="form-control" name="empresa" value="<?php echo $_SESSION['empresa'] ?>"></td>
							</tr>
							<tr>
								<td><label class="titulo1">Telefono de la empresa: </label></td>
								<td><input type="text" class="form-control" name="telemp" value="<?php echo $_SESSION['telemp'] ?>" maxlength="11" onkeypress="return validarnumeros(event)"></td>
							</tr>
							<tr>
								<td><label class="titulo1">Correo Personal: </label></td>
								<td><input type="text" class="form-control" name="email" value="<?php echo $_SESSION['email'] ?>"></td>
							</tr>
					</table>
					<center><button type="submit" class="btn btn-medium btn-danger">Guardar</button></center>
					</form>
                
            </div><!-- /datos -->
                
</fieldset>