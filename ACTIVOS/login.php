<?php 
  session_start();

  //SESION ACTIVA DEL ALUMNO
  if ($_SESSION["cedula"] == true) 
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

    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/jquery.maskedinput.js"></script>
      <script>
        jQuery(function($)
        {
          $("#fecnac").mask("99/99/9999");
        });
      </script>
  </head>

  <body onload="form.codalu.focus()">

    <div class="container">

      <form class="form-signin" name="form" id="form" action="buscaralu.php" method="post" autocomplete="off">
        <img src="img/iutepi.jpg">
            <center>
            <h3 class="form-signin-heading">IUTEPI en linea</h3>
                <?php  
                    //MUESTRA LA FOTO DEL ALUMNO 
                    $foto = $_SESSION["codalu"];
                    $ruta = "../DB/ACTIVOS/".$_SESSION["nucleo"]."/fotos/".$foto;
                    $ruta2 = "../DB/ACTIVOS/".$_SESSION["nucleo"]."/fotos/usuario.jpg";
                ?>
                <img src="<?php echo $ruta ?>" onerror="this.src='<?php echo $ruta2 ?>'" width="110px" style="border-radius: 5px;">
                <br><br>
                <div class="form-group has-success has-feedback">
                  <label class="control-label" for="inputSuccess2">Cedula:</label>
                  <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" value="<? echo $_SESSION["cedula"]; ?>" disabled>
                  <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                  <span id="inputSuccess2Status" class="sr-only">(success)</span>
                </div>
                <label class="lab">Codigo:</label>
                <input type="password" class="form-control" placeholder="Código" name="codalu" id="codalu" maxlength="6" required><br>
                <label class="lab">Fecha de nacimiento:</label>
                <input type="text" class="form-control" placeholder="00/00/0000" name="fecnac" id="fecnac" maxlength="10" required><br>
            <button class="btn btn-medium btn-danger" type="submit">Ingresar</button>
                <button class="btn btn-medium btn-danger" type="button" onclick="salir()">Salir</button>
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