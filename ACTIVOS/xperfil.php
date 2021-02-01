<?php 
	session_start();

    if ($_SESSION["nombre"] == true) {
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>..:: IUTEPI en Linea ::..</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/valida.js"></script>
</head>
<body>

    <div class="container">
        
        <div class="encabezado">
            
            <div class="image"><img src="img/iutepi.jpg"></div><br>

            <div class="usuario"> Usuario: <?php echo $_SESSION["nombre"] ?> </div>
            
        </div><!-- encabezado -->       
            
            <div class="menu_simple">
              <ul>
                <li><a href="javascript:pagina(1)">INICIO</a></li>
                <li><a href="javascript:pagina(2)">ESTADO DE CUENTA</a></li>
                <li><a href="javascript:pagina(3)">MODIFICAR DATOS</a></li>
                <li><a href="javascript:pagina(4)">SITUACION ACADEMICA</a></li>
                <li><a href="javascript:pagina(5)">HISTORIAL DE CALIFICACIONES</a></li>
                <li><a href="javascript:pagina(6)">REPORTE DE INSCRIPCION</a></li>
                <li><a href="javascript:pagina(7)">CORTE DE NOTAS</a></li>
                <li><a href="javascript:salir()">SALIR</a></li>
              </ul>
            </div>       
        
        <div class="articulo">
            
            <?php  
                if (isset($_GET['pagina'])) {
                  switch ($_GET['pagina']){
                      case 1:
                          require_once("alumno.php");
                      break;
                      case 2:
                          require_once("edocuenta.php");
                      break;
                      case 3:
                          require_once("modidatos.php");
                      break;
                      case 4:
                          require_once("situacion.php");
                      break; 
                      case 5:
                          require_once("historial.php");
                      break; 
                      case 6:
                          require_once("reporteinscri.php");
                      break;
                      case 7:
                          require_once("cortenotas.php");
                      break;            
                  }
                } else{
                  include("alumno.php");
                }	
          ?>

        </div><!-- /articulo -->
        
        <div class="pie">Diseñado por <a href='http://www.educonsult.com.ve' target='_blank'>Educonsult C.A</a><br></div><!-- /pie -->

    </div> <!-- /container -->

  </body>
</html>
<?php 
    } else{
        header("location:index.php");
    } 
?>