<?php

	function ponderacion($ponderacion,$nota)
	{        
		switch ($ponderacion) 
		{
			case 1:
                
				if ($nota >= 10) 
				{
					echo "<td>".$nota."</td>";
				}
				elseif ($nota <=9) 
				{
					echo "<td>".$nota."</td>";
				}
				break;

			case 2:
                
				if ($nota = 1) 
				{                    
					echo "<td>APROBADO</td>";                    
				}
				elseif($nota = 0)
				{                    
					echo "<td>REPROBADO</td>";                    
				}
				elseif($nota = -1)
				{                    
                    echo "<td>REPROBADO</td>";
                }
				break;

			case 3:
                
                if ($nota < 120) 
                {
					echo "<td>".$nota." Hrs</td>";
                }
                else
                {
                    echo "<td>".$nota." Hrs</td>";
                }
				break;
		}
	}

	function materia($codigomateria)
	{
        //conexion a las tablas
		$dsn = $_SESSION["nucleo"];		
		$conexion = odbc_connect($dsn, "", "") or die("<strong>ERROR DE CONEXION</strong>");
		$sql = "SELECT * FROM materia WHERE codmat='$codigomateria'";
		$resultado = odbc_exec($conexion, $sql);
		$registro = odbc_fetch_array($resultado);
        
		if($registro <> 0)
		{            
			echo '<td>'.$registro["codmat"].'</td><td style="text-align:left;">'.$registro["nommat"].'</td><td>'.$registro["uc"].'</td></td>';            
		}        
	}

	function horarios($codalumno)
	{
        //conexion a las tablas
        $dsn = $_SESSION["nucleo"];     
        $conexion = odbc_connect($dsn, "", "") or die("<strong>ERROR DE CONEXION</strong>");

        //variables de la tabla horarios
        $sql = "SELECT * FROM horarios WHERE codalu='$codalumno'";      
        $resultado = odbc_exec($conexion, $sql);
        	while ($registro = odbc_fetch_array($resultado)) 
        	{
	            echo "<textarea disabled style='background:#FFFFFF; min-width:890px; max-width:890px; min-height:1040px; max-height:1040px; border:0; font-family: consolas; font-size: 13px; color: black;'>";
	            echo $registro["memo1"];
	            echo $registro["memo2"];
	            echo $registro["memo3"];
	            echo "</textarea>";
	        }
    }
	
	function estatus($estatus)
	{        
		switch ($estatus) 
		{
			case 1:
				$ruta = /*"../DB/ACTIVOS/".$_SESSION["nucleo"]."/fotos*/"img/ok.jpg";
				echo "<td><img src='".$ruta."' width='13px' title='Aprobado'></td>";
				break;
			
			case 2:
				$ruta = /*"../DB/ACTIVOS/".$_SESSION["nucleo"]."/fotos*/"img/puede.jpg";
				echo "<td><img src='".$ruta."' width='13px' title='Puede inscribir'></td>";
				break;

			case 3:
				$ruta = /*"../DB/ACTIVOS/".$_SESSION["nucleo"]."/fotos*/"img/cursando.gif";
				echo "<td><img src='".$ruta."' width='13px' title='Cursando'></td>";
				break;

			default:
				$ruta = /*"../DB/ACTIVOS/".$_SESSION["nucleo"]."/fotos*/"img/error.jpg";
				echo "<td><img src='".$ruta."' width='13px' title='No puede inscribir'></td>";
				break;
		}        
	}

	function profesor($codigoprofesor)
	{
        //conexion a las tablas
		$dsn = $_SESSION["nucleo"];
		$conexion = odbc_connect($dsn, "", "") or die("<strong>ERROR DE CONEXION</strong>");
		
		//variables de la tabla profesor		
		$sql = "SELECT * FROM profesor WHERE codpro='$codigoprofesor'";
		$resultado = odbc_exec($conexion, $sql);
		$registro = odbc_fetch_array($resultado);
        
		if($registro <> 0)
		{            
			echo '<td>'.$registro["nombre"].' '.$registro["apellido"].'</td>';            
		}
        
	}

	function periodo($codigosemestre)
	{
		//conexion a las tablas
		$dsn = $_SESSION["nucleo"];
		$conexion = odbc_connect($dsn, "", "") or die("<strong>ERROR DE CONEXION</strong>");
				
		//variables de la tabla profesor
		$sql = "SELECT * FROM semestre WHERE codsem='$codigosemestre'";
		$resultado = odbc_exec($conexion, $sql);
		$registro = odbc_fetch_array($resultado);
        
		if($registro <> 0)
		{
			$semestre = substr_replace($codigosemestre,'-',4,0);
			echo 'PERIODO: '.$semestre.' '.$registro["inicio"].' - '.$registro["fin"];
		}
	}

	function sede($nucleo)
	{
		switch ($_SESSION["nucleo"]) 
		{
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
	}

?>