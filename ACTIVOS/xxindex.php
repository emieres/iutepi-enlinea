<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>..:: IUTEPI en Linea ::..</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
  </head>

  <body>

    <div class="container">
        
      <form class="form-signin" name="form" action="sede.php" method="post">
        <img src="img/iutepi.png">
            <center>
            <h3 class="form-signin-heading">IUTEPI en linea</h3>            
                <?php
                    $dsn = "egresados"; 
                    $conexion = odbc_connect($dsn, "", "") or die ("<strong>No se conecto a la Base de Datos</strong>");
                    $sql = "SELECT * from nucleos";
                    $resultado = odbc_exec($conexion, $sql) or die("<strong>ERROR DE CONEXION</strong>");
                         
                    echo '<select class="input-block-level" size="1" name="nucleo">';	
                          
                      while( $registro = odbc_fetch_array($resultado)) {				
                                  
                        echo '<option value="'.$registro["carpeta"].'">'.$registro["nucleo"].'</option>';
                                 
                      }
                          
                    echo '</select>';					 
                ?>
                <br>
            <button class="btn btn-medium btn-danger" type="submit">Ingresar</button>
            </center>
      </form>

    </div> 

  </body>
</html>