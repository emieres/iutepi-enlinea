<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>..:: Egresados IUTEPI ::..</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="js/valida.js"></script>
    <!-- Le styles -->
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      
        .datos{
            /*background-color: coral;*/
            width: 420px;
            font-size: 12px;
        }
        .da label{
            color: darkred;
            font-weight: bold;
        }
        td{
            color: gray;
            font-weight: bold;
        }
    </style>
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>
<body>

    <div class="container">
        
        <div class="encabezado">
            
            <div class="image"><img src="img/egresados.jpg"></div>
            
            
        </div><!-- encabezado -->
        
        <div class="articulo">
            <fieldset><legend>Informacion Personal</legend>
            
                <div class="datos">
                
                <table border="0" width="420px" class="da">
					<tr>
						<td><label>Cedula:</label></td>
						<td><?php echo $_SESSION["cedula"] ?></td>
					</tr>
					<tr>
						<td><label>Nombre y Apellido:</label></td>
						<td><?php echo $_SESSION["nombre"] ?></td>
					</tr>
                    <tr>
						<td><label>Egresado de la Carrera:</label></td>
						<td><?php echo $_SESSION["carrera"] ?></td>
					</tr>
                    <tr>
						<td><label>Promoción:</label></td>
						<td><?php echo $_SESSION["promocion"] ?></td>
					</tr>
                    <tr>
						<td><label>Indice Académico:</label></td>
						<td><?php echo $_SESSION["ia"] ?></td>
					</tr>
                    <tr>
						<td><label>Posición en la Promoción:</label></td>
						<td><?php echo $_SESSION["pos_pro"] ?></td>
					</tr>
                    <tr>
						<td><label>Posición en la Carrera:</label></td>
						<td><?php echo $_SESSION["pos_car"] ?></td>
					</tr>
				</table>
                
            </div><!-- /datos -->
                
            </fieldset>
            <hr>
            <center><button class="btn btn-medium btn-danger" onclick="salir()">Salir</button></center>
            
        </div><!-- /articulo -->

    </div> <!-- /container -->

  </body>
</html>