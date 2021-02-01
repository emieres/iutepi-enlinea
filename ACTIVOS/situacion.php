<fieldset>
    <legend>Situación Académica</legend>
                        
            <div class="sit" id="sit">
                <div style="font-family: arial">
                <table border="0" width="800px">
                        <tr>
                            <td align="left"><label>Alumno(a): </label></td>
                            <td align="left"><strong><?php echo $_SESSION["nombre"] ?></strong></td>
                            <td align="left"><label>Especialidad: </label></td>
                            <td align="left"><strong><?php echo $_SESSION["carrera"] ?></strong></td>
                        </tr>
                </table>
                    <br>
                
                    <table border="0" width="800px" class="table">
                    <thead>
                        <tr align="center">
                            <th><label class="titulo2">PERIODO</label></th>
                            <th><label class="titulo2">SEMESTRE</label></th>
                            <th><label class="titulo2">COD. MATERIA</label></th>
                            <th><label class="titulo2">MATERIA</label></th>
                            <th><label class="titulo2">U/C</label></th>
                            <th><label class="titulo2">NOTA</label></th>
                            <th><label class="titulo2">ESTATUS </label></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //llamamos a las funciones 
                            include("conexion.php");
                            include("funciones.php");

                            //hacemos la consulta
                            $sql = "SELECT * from situac WHERE codalu='$codigo'";
                            $resultado = odbc_exec($conexion, $sql);

                            //Recorremos la tabla
                            while ($registro = odbc_fetch_array($resultado)) 
                            {
                                if ($registro["lapso"] %2 == 0) 
                                {                                            
                                    echo "<tr bgcolor='#D0EBF5'>";
                                    echo "<td>".$registro["per_aca"]."</td>";
                                    echo "<td>".$registro["lapso"]."</td>";
                                    echo materia($registro["codmat"]);
                                    echo ponderacion($registro["ponderacio"],$registro["nota"]);
                                    echo estatus($registro["status"]);
                                    echo "<tr>";                                             
                                }
                                else
                                {                                            
                                    echo "<tr>";
                                    echo "<td>".$registro["per_aca"]."</td>";
                                    echo "<td>".$registro["lapso"]."</td>";
                                    echo materia($registro["codmat"]);
                                    echo ponderacion($registro["ponderacio"],$registro["nota"]);
                                    echo estatus($registro["status"]);
                                    echo "<tr>";
                                }
                            }
                                
                        ?>
                        </tbody>
                    </table>

                    <br>
                    <table width="600px">
                    <tr>
                        <td><img src='img/ok.jpg' width='13px' title='Aprobado'> Aprobado</td>
                        <td><img src='img/puede.jpg' width='13px' title='Puede inscribir'> Puede inscribir</td>
                        <td><img src='img/cursando.gif' width='13px' title='Cursando'> Cursando</td>
                        <td><img src='img/error.jpg' width='13px' title='No puede inscribir'> No puede inscribir</td>
                    </tr>
                    </table>
                <br>
                    <div id="nota"></div>
                </div>
            </div><!-- /sit -->
                
            </fieldset>
            <br>
            <center><button class="btn btn-medium btn-danger" onclick="imprimir()">Imprimir</button></center>