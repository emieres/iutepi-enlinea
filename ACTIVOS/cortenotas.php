<fieldset>
        <legend>Corte de Notas</legend>
                        
            <div class="cortenot" id="sit">
                <div style="font-family: arial;">
                <img src="img/iutepi.jpg" style="width:250px"><br><br>

                <?php
                    //LLAMAMOS AL ARCHIVO FUNCIONES Y CONEXION
                    include("conexion.php");
                    include("funciones.php");
                    $sql = "SELECT * from inscri WHERE codalu='$codigo'";
                    $resultado = odbc_exec($conexion, $sql);
                ?>

                <table width="800">
                    <tr>
                    <td><? echo sede($_SESSION["nucleo"]); ?></td>
                    <td align="right"><? echo date('d/m/Y  h:i a'); ?></td>
                    </tr>
                </table>

                <!--Se cargan los datos del alumno -->

                <table width="800">
                <tr>
                    <td>ALUMNO: <? echo $_SESSION["codalu"]; ?> V<? echo $_SESSION["cedula"]; ?> <? echo $_SESSION["nombre"]; ?></td>
                </tr>
                <tr>
                    <td><? echo periodo($_SESSION['codsem']); ?></td>
                </tr>
                <tr>
                    <td>CARRERA: <? echo $_SESSION['carrera']; ?></td>
                </tr>
                <tr>
                    <td>PENSUM: <? echo $_SESSION['codpen']; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">NOTAS DE PERIODO</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                </table> 
                <table width='800'>
                <tr style="font-weight: bold;">
                    <td>CODIGO</td>
                    <td>MATERIA</td>
                    <td>UC</td>
                    <td>C1</td>
                    <td>C2</td>
                    <td>C3</td>
                    <td>C4</td>
                    <td>C5</td>
                </tr>

                <!--cargamos las notas-->
                <?php 
                    while ($registro = odbc_fetch_array($resultado)) 
                    {
                        echo '<tr>';
                        echo materia($registro["codmat"]);
                        echo '<td>'.$registro['nota1'].'</td>
                                <td>'.$registro['nota2'].'</td>
                                <td>'.$registro['nota3'].'</td>
                                <td>'.$registro['nota4'].'</td>
                                <td>'.$registro['nota5'].'</td>
                            </tr>';
                    } 
                ?>
                
                </table><br>
                    
                <br>
                    <div id="nota"></div>
                </div>
            </div><!-- /inscri -->
                
</fieldset>
<br>
<center><button class="btn btn-medium btn-danger" onclick="imprimir()">Imprimir</button></center>