<fieldset>
    <legend>Histórico Académico</legend>
                        
        <div class="his" id="sit">
            <div style="font-family: arial;">
            <table border="0" width="800px">
                <tr>
                    <td align="left"><label>Alumno(a): </label></td>
                    <td align="left"><strong><?php echo $_SESSION["nombre"] ?></strong></td>
                    <td align="left"><label>Especialidad: </label></td>
                    <td align="left"><strong><?php echo $_SESSION["carrera"] ?></strong></td>
                </tr>
                <tr>
                    <td align="left"><label>Indice: </label></td>
                    <td align="left"><strong><?php echo $_SESSION["puntos"] ?></strong></td>
                    <td align="left"><label>Pensum: </label></td>
                    <td align="left"><strong><?php echo $_SESSION["pensum"] ?></strong></td>
                </tr>
            </table>
            <br>

            <table border="0" width="800px" class="table">
                <thead>
                <tr align="center">
                    <th><label class="titulo2">PERIODO</label></th>
                    <th><label class="titulo2">COD. MATERIA</label></th>
                    <th><label class="titulo2">MATERIA</label></th>
                    <th><label class="titulo2">U/C</label></th>
                    <th><label class="titulo2">NOTA</label></th>
                </tr>
                </thead>
                <?php
                    //llamado de las funciones
                    include("conexion.php");
                    include("funciones.php");

                    //hacemos la consulta
                    $sql = "SELECT * from notas WHERE codalu='$codigo' ORDER BY per_aca asc";
                    $resultado = odbc_exec($conexion,$sql);

                    //recorremos la tabla
                    while ($registro = odbc_fetch_array($resultado)) 
                    {				
                        echo "<tr>";
                        echo "<td>".$registro['per_aca']."</td>";
                        echo materia($registro["codmat"]);
                        echo ponderacion($registro["ponderacio"],$registro["nota"]);
                        echo "</tr>";
                    }
                ?>
            </table>
            <br>
            <div id="nota"></div>
            </div>
        </div><!-- /sit -->
                
</fieldset>
<br>
<center><button class="btn btn-medium btn-danger" onclick="imprimir()">Imprimir</button></center>