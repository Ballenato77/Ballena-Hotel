<?php
	 session_start();
     if($_SESSION['id']==null){
        header("location: NotDataLogin.html");
        die();
     }
     $var_usuario=$_SESSION['id'];
     if($var_usuario=="" || $var_usuario==null){
        //echo "Usted no ha iniciado una sesión";
        die();
        header("location: NotDataLogin.html");
    }
 	$servidor="localhost";
     $usuario="root";
     $contrasena="";
     $db="hotel"; 
     $user=$_SESSION['id'];
     $Le_Message=$_SESSION['welcome'];
     //echo $Le_Message;
     $conexion=mysqli_connect($servidor,$usuario,$contrasena,$db);
     $LeActive=true;
     $consulta="SELECT * FROM hosts WHERE usuario='$user'";
     $consulta2="SELECT permisos from personas WHERE user='$user'";
     $resultado= mysqli_query($conexion,$consulta);
     $answer=mysqli_query($conexion,$consulta2);
     $data=mysqli_fetch_array($answer);
     $Le_Info=mysqli_fetch_array($resultado);
    date_default_timezone_set("America/Mexico_City");

    $now=time();
    $date=date("Y-m-d H:i:s",$now);
    $dayA=date("d", $now);
    $dateI=strtotime($Le_Info['fecha_ini']);
    $dayI=date("d",$dateI);
    $totala_day=$dayA-$dayI;
    $LeCost=0;
    $roomtype=$Le_Info['room_type'];
    if($totala_day==0){
    $totala_day=1;
    }
    if($roomtype=="Ejecutiva"){
        $LeCost=500;
    }
    if($roomtype=="Doble"){
        $LeCost=350;
    }
    if($roomtype=="Sencilla"){
        $LeCost=250;
    }
    $LeTotalCost=($LeCost*$totala_day);
?>
<!DOCTYPE html>
<html lang="es-mx">
<head>
	<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
<link href="css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="Styles/Main_Panel_StylesPart2.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="#"><?php echo $Le_Message?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent1">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active"> <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> </li>
      <?php 
      if($data['permisos']=="Cliente"){
        $query="UPDATE login set active = '$LeActive' where user='$var_usuario'";
        mysqli_query($conexion,$query);
        ?>
		<li class="nav-item"> <a class="nav-link" ><?php echo "Su total a Pagar es de: $".$LeTotalCost;?></a> </li>
              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Modificar Datos </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
						<a class="dropdown-item" href="Modificar.php">Modificar Datos del Registro</a>
					  <div class="dropdown-divider"></div>
						<a class="dropdown-item" href="ChangeDays.php">Ampliar/Reducir Días de Estancia</a>
		</div>
	  </li>
	  <li class="nav-item"> <a class="nav-link" href="TerminateStay.php">Terminar Estancia</a> </li>
    <?php
      }else{?>
        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Consultas </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
      <a class="dropdown-item" href="CheckActiveLogin.php">Revisar los Login's Actuales</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="CheckByRoom.php">Consultar Datos por Habitación</a>
      </div>
	  </li>
		<li class="nav-item"> <a class="nav-link" href="EliminateHost.php">Despachar Huésped</a> </li>
      <?php

      }?>
      <li class="nav-item"> <a class="nav-link" href="Cerrar_Sesion.php">Cerrar Sesión</a> </li>
    </ul>

  </div>
</nav>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.3.1.js"></script>
</body>
</html>