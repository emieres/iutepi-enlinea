<fieldset>
    <legend>Estado de Cuenta</legend>
                        
            <div class="cuenta">
                <div id="sit" style="font-family: arial">
				
				<table width="800px">
                        <tr>
                            <td align="left"><label>Alumno(a): </label></td>
                            <td align="left"><?php echo $_SESSION["nombre"] ?></td>
                            <td><label class="titulo1">Cedula:</label></td>
							<td><?php echo $_SESSION["cedula"] ?></td>
                        </tr>
                </table>
                    <br>
				
                <table width="800px" class="table">
					<thead>
						<tr align="center">
							<th><label class="titulo2">Codigo</label></th>
							<th><label class="titulo2">Fecha</label></th>
							<th><label class="titulo2">Referencia</label></th>
							<th><label class="titulo2">Descripcion</label></th>
							<th><label class="titulo2">Cargo</label></th>
							<th><label class="titulo2">Abono</label></th>
						</tr>
					</thead>
					<tbody>

						<?php  
							//carga las funciones de php
							include("funciones.php");
							$dsn = $_SESSION["nucleo"]; 
							//debe ser de sistema no de usuario
							$codigo = $_SESSION["codalu"];		
							//realizamos la conexion mediante odbc
							$conexion = odbc_connect($dsn, "", "") or die("<strong>ERROR DE CONEXION</strong>");
							$sql = "SELECT * FROM movim WHERE codalu='$codigo'";
							$resultado = odbc_exec($conexion, $sql) or die ("<strong>No se conecto a la Base de Datos</strong>");
								//mostramos el registro   
								while ($registro = odbc_fetch_array($resultado)) 
								{
									echo '<tr>';
									echo '<td>'.$registro["codalu"].'</td>';
									echo '<td>'.$registro["fecha"].'</td>';
									echo '<td>'.$registro["referencia"].'</td>';
									echo '<td style="text-align:left;">'.$registro["desc"].'</td>';
											   
									if($registro["monto"] > 0)
									{
										echo '<td style="text-align:right;"">'.number_format($registro["monto"], 2, '.', ',').'</td>
											  <td></td>';   
									}
									else
									{
										echo '<td></td>        
											  <td style="text-align:right;">'.number_format($registro["monto"], 2, '.', ',').'</td>';
									}
											
									echo '</tr>';  
								} 
							
						?>
					</tbody>
				</table>
                <br>
                
                <div align="right">

					<table width="200px" class="table table-condensed">
						<tbody>
							<tr>
								<td>Saldo Total:</td>
								<td align="right"><?php echo number_format($_SESSION["saldo"], 2, '.', ',') ?></td>
							</tr>
							<tr>
								<td>Saldo Vencido:</td>
								<td align="right"><?php echo number_format($_SESSION["mora"], 2, '.', ',') ?></td>
							</tr>
						</tbody>
					</table>
					
                </div>
				<div id="nota"></div>
                </div>
            </div><!-- /datos -->
                
</fieldset>

<center><button class="btn btn-medium btn-danger" onclick="imprimir()">Imprimir</button></center>