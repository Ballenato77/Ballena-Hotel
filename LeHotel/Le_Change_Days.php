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
   $conexion=mysqli_connect($servidor,$usuario,$contrasena,$db);
   $query="SELECT * from hosts WHERE usuario='$var_usuario'";

   $answer=mysqli_query($conexion,$query);

   $data=mysqli_fetch_array($answer);

   $day_rv=$_POST['day'];

   $Current_R=strtotime($data['fecha_ini']);
   
   $LeDuration="+".$day_rv." day";

   $later=strtotime($LeDuration,$Current_R);

   $plazo=date("Y-m-d H:i:s",$later);

   //echo $data['fecha_ini']."<br>";
   //echo $plazo;
   $LeCost=0;
   $roomtype=$data['room_type'];
   if($roomtype=="Ejecutiva"){
       $LeCost=500;
   }
   if($roomtype=="Doble"){
       $LeCost=350;
   }
   if($roomtype=="Sencilla"){
       $LeCost=250;
   }
   $LeCosto=($day_rv*$LeCost);
   $query2="UPDATE hosts set fecha_fin ='$plazo', day_r ='$day_rv', costo_total='$LeCosto' where usuario='$var_usuario'";

   mysqli_query($conexion,$query2);

   header("location: ModifyDays_Success.html");

?>