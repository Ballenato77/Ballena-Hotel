<?php
    $servidor="localhost";
    $usuario="root";
    $contrasena="";
    $db="hotel";

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
    $conexion=mysqli_connect($servidor,$usuario,$contrasena,$db);
    $query="SELECT * from hosts WHERE usuario='$var_usuario'";

    $answer=mysqli_query($conexion,$query);

    $data=mysqli_fetch_array($answer);

    date_default_timezone_set("America/Mexico_City");

    $now=time();
    $date=date("Y-m-d H:i:s",$now);
    $dayA=date("d", $now);
    $dateI=strtotime($data['fecha_ini']);
    $dayI=date("d",$dateI);
    $totala_day=$dayA-$dayI;
    $LeCost=0;
    $roomtype=$data['room_type'];
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Styles/TerminateStayStyles.css" />
    <title>Hotel</title>
</head>
<body>
    <div class="Cajita" alt="Logo">
        <img class="logo" src="Styles/Images/Logo.png" />
        <form action="Bye-Bye_Me.php" method="post">
            <h1><?php echo "Estimad@ ".$data['nombre']." ".$data['apellido_p']." ".$data['apellido_m'];?></h1>
            <h2><?php echo "Su total a Pagar es de: $".$LeTotalCost;?></h2>
            <input type="submit" value="Pagar" />
        </form>
    </div>
</body>
</html>