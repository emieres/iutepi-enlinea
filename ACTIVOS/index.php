<?php 
    session_start();

    if ($_SESSION['cedula'] != true) {       

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">
    <title>IUTEPI en Linea</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sede.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="js/valida.js" type="text/javascript"></script>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" name="form" action="sede.php" method="post">
        <img src="img/iutepi.jpg">
            <center>
            <h3 class="form-signin-heading">IUTEPI en linea</h3>    
            <label class="control-label" for="inputSuccess2">Sede:</label>        
                <?php

                    $dsn = "nucleos";
                    $conexion = odbc_connect($dsn, "", "") or die ("<strong>No se conecto a la Base de Datos</strong>");
                    $sql = "SELECT * from nucleos";
                    $resultado = odbc_exec($conexion, $sql) or die("<strong>ERROR DE CONEXION</strong>");

                    //LISTA LAS SEDES DEL IUTEPI     
                    echo '<select class="form-control" size="1" name="nucleo">'; 
                          
                    while( $registro = odbc_fetch_array($resultado)) 
                    {                                          
                        echo '<option value="'.$registro["carpeta"].'">'.$registro["nucleo"].'</option>';                                 
                    }
                          
                    echo '</select>';          
                ?>
                <br>
            <button class="btn btn-medium btn-danger" type="submit">Ingresar</button>
            </center>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php } else{
    header("location:perfil.php");
    } ?>