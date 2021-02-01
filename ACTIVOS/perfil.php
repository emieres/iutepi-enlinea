<?php 
  session_start();
  //SI ESTA ACTIVO EL USUARIO
    if ($_SESSION["nombre"] == true) 
    {
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>IUTEPI En linea</title>
  <script src="js/valida.js"></script>
  <meta charset="utf-8">
  <link rel="icon" href="img/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilos.css">
  <script src="js/vistaprevia.js"></script>
  <script src="js/jquery-3.1.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    /*var pepe;
    function ini() 
    {
      pepe = setTimeout('location="salir.php"',300000); // 5 segundos
    }
    function parar() 
    {
      clearTimeout(pepe);
      pepe = setTimeout('location="salir.php"',300000); // 5 segundos
    }*/
  </script>
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <link rel="stylesheet" type="text/css" href="css/estilos2.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/vistaprevia.js"></script>
  <style> 
  .container-fluid
  {
    width: 1000px;
  }
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .form-signin input[type="text"],
      .form-signin input[type="password"] 
      {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
    .navbar 
    {
      margin-bottom: 0;
      border-radius: 0;
      height: 85px;
      background-color: white;
    }
    .navbar1 
    {
      margin-bottom: 0;
      border-radius: 0;
      font-size: 12px;
      font-weight: bold;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav 
    {
      padding-top: 20px;
      /*background-color: #f1f1f1;*/
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    .navbar2 
    {
      /*background-color: #555;
      color: white;*/
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) 
    {
      .sidenav 
      {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>

</head>
<body onload="ini()" onkeypress="parar()" onclick="parar()">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="img/iutepi.jpg" width="270"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav navbar-right">
      
        <?php  
          //carga la foto actual de alumno
          $foto  = $_SESSION["codalu"];
          $ruta  = "../DB/ACTIVOS/".$_SESSION["nucleo"]."/fotos/".$foto;
          $ruta2 = "../DB/ACTIVOS/".$_SESSION["nucleo"]."/fotos/usuario.jpg";
        ?>        
        
        <li class="dropdown">        
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="<?php echo $ruta ?>" onerror="this.src='<?php echo $ruta2 ?>'" width="30px" style="border-radius:5px;"> <?php echo $_SESSION["cedula"] ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:pagina(3)">Editar perfil</a></li>
              <li class="divider"></li>
              <li><a href="javascript:salir()">Salir</a></li>
            </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<nav class="navbar1 navbar-default">
  <div class="container-fluid text-center">
  
    <ul class="nav navbar-nav">
        <li><a href="javascript:pagina(1)">Inicio</a></li>
        <li><a href="javascript:pagina(2)">Estado de Cuenta</a></li>

        <?php
            if (isset($_SESSION["codsem"]) and strlen(trim($_SESSION["codsem"])) > 0)
            {
                if ($_SESSION["mora"] > 0 ) 
                { 
                    //Bloquea los link
                    echo '<li><a href="javascript:msj1()">Situación Académica</a></li>';
                    echo '<li><a href="javascript:msj1()">Historial de Calificaciones</a></li>';
                    echo '<li><a href="javascript:msj1()">Reporte de Inscripcion</a></li>';
                    echo '<li><a href="javascript:msj1()">Corte de Notas</a></li>';
                    echo '<li><a href="javascript:msj1()">Foto para carnet</a></li>';         
                } 
                else
                { 
                    //Activa los link
                    echo '<li><a href="javascript:pagina(4)">Situación Académica</a></li>';
                    echo '<li><a href="javascript:pagina(5)">Historial de Calificaciones</a></li>';
                    echo '<li><a href="javascript:pagina(6)">Reporte de Inscripcion</a></li>';
                    echo '<li><a href="javascript:pagina(7)">Corte de notas</a></li>';
                 
                    //FOTOGRAFIA DEL CARNET
                    $ruta          = "../DB/ACTIVOS/".$_SESSION["nucleo"]."/fotos/";
                    $foto          = substr($_SESSION['codalu'], 0, -1);
                    $foto_alu      = "$foto.jpg";
                    $no_foto       = "usuario.jpg";
                    $foto_final    = $ruta.$foto_alu;
                    $no_foto_final = $ruta.$no_foto;              
                        
                    //VERIFICA QUE EL ARCHIVO EXISTE
                    if (file_exists($foto_final)) 
                    {
                        $fecha_foto = date("Ymd", filectime($foto_final));
                        $fecha_tope = date("Ymd", strtotime("now -1 year"));

                        //VERIFICA QUE LA FOTO EXISTA Y SEA MENOS DE MENOS UN AÑO
                        if ($fecha_foto < $fecha_tope)
                        {
                            echo '<li><a href="javascript:pagina(8)">Foto para carnet</a></li>';
                        }
                        else
                        {
                            echo '<li><a href="javascript:msj2()">Foto para carnet</a></li>';
                        }
                    }
                    else
                    {
                        //SI NO TIENE FOTOGRAFIA
                        echo '<li><a href="javascript:pagina(8)">Foto para carnet</a></li>';
                    }
                }
            }
            else
            {
               //Bloquea los link
                echo '<li><a href="javascript:pagina(4)">Situación Académica</a></li>';
                echo '<li><a href="javascript:pagina(5)">Historial de Calificaciones</a></li>';
                echo '<li><a href="javascript:msj3()">Reporte de Inscripcion</a></li>';
                echo '<li><a href="javascript:msj3()">Corte de Notas</a></li>';
                echo '<li><a href="javascript:msj3()">Foto para carnet</a></li>';
            }
        ?>

    </ul>

  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-12 text-left"> 
    <br>
      <?php  
        //Navegacion por pagina
        if (isset($_GET['pagina'])) 
        {
          switch ($_GET['pagina'])
          {
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
            case 8:
              require_once("fotocarnet.php");
            break;            
          }
        } 
        else
        {
          include("alumno.php");
        } 
      ?>
    </div>
  </div>
</div>

<br><br>
<footer class="navbar2 navbar-default navbar-fixed-bottom">
  <div class="pie">Diseñado por <a href='http://www.educonsult.com.ve' target='_blank'>Educonsult C.A</a><br></div><!-- /pie -->
</footer>

</body>
</html>
<?php 
    } 
    else
    {
        session_destroy();
        header("location:index.php");
    } 
?>