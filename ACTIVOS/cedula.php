<?php 
  session_start();

  //SESION ACTIVA DE LA SEDE
  if ($_SESSION["nucleo"] == true) 
  {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">
    <title>..:: IUTEPI en Linea ::..</title>
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

  <body onload="form.cedula.focus()">

    <div class="container">

      <form class="form-signin" name="form" id="form" action="buscarced.php" method="post" autocomplete="off">
        <img src="img/iutepi.jpg">
            <center>
            <h3 class="form-signin-heading">IUTEPI en linea</h3>
                <div class="form-group has-success has-feedback">
                  <label class="control-label" for="inputSuccess2">Sede:</label>
                  <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" value="<?php 
                      //se obtiene la sede del alumno
                      switch ($_SESSION["nucleo"]) {
                        case 01:
                          echo "IUTEPI VALENCIA ISABELICA";
                          break;
                            
                        case 02:
                          echo "IUTEPI ACARIGUA";
                          break;

                        case 03:
                          echo "IUTEPI GUANARE";
                          break;

                        case 04:
                          echo "IUTEPI VALENCIA AV. LAS FERIAS";
                          break;
                      } 
                    ?>
                    " disabled>
                  <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                  <span id="inputSuccess2Status" class="sr-only">(success)</span>
                </div>
                <label>Cedula:</label>
                <input class="form-control" type="text" name="cedula" id="cedula" placeholder="00000000" maxlength="8" required> <br>
            <button class="btn btn-medium btn-danger" type="submit">Buscar</button>
            <button class="btn btn-medium btn-danger" type="button" onclick="salir();">Salir</button>
          </center>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php 
  } 
  else
  {
      header("location:index.php");
  } 
?>