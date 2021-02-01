<?php include "funciones.php"; ?>
<fieldset>
    <legend>Registro de Inscripción</legend>
                
            <div class="inscri" id="sit">       
                <div style="font-family: arial">         
					<img src="img/iutepi.jpg" style="width:250px"><br><br>
					<?php
						echo horarios($_SESSION["codalu"])               
					?>
					<div id="nota"></div>
                </div>
            </div><!-- /inscri -->
                
</fieldset>
<br>
<center><button class="btn btn-medium btn-danger" onclick="imprimir()">Imprimir</button></center>