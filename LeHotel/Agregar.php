<?php
    $user=$_POST['user'];
    $nombre=$_POST['nombre'];
    $apellido_pat=$_POST['apellido_p'];
    $apellido_mat=$_POST['apellido_m'];
    $calle=$_POST['calle'];
    $numero=$_POST['num'];
    $numInt=$_POST['numInt'];
    $colonia=$_POST['colonia'];
    $cp=$_POST['cp'];
    $curp=$_POST['curp'];
    $ce=$_POST['ce'];
    $day=$_POST['day'];
    $cm=$_POST['cm'];
    $cd=$_POST['cd'];
    $roomtype=$_POST['roomType'];
    $pass=$_POST['password'];
    
    $LeTotalHost=$cm+$cd;

    date_default_timezone_set("America/Mexico_City");

    $now=time();

    $LeDuration="+".$day." day";
    $later=strtotime($LeDuration,$now);

    $date=date("Y-m-d H:i:s",$now);

    $plazo=date("Y-m-d H:i:s",$later);

    $LeRoom=rand(1,7000);

    $LeCost=0;

    if($roomtype=="Ejecutiva"){
        $LeCost=500;
    }
    if($roomtype=="Doble"){
        $LeCost=350;
    }
    if($roomtype=="Sencilla"){
        $LeCost=250;
    }
    $LeTotalCost=($LeCost*$day);
    $varID1=rand(0,9);
    $varID2=rand(0,9);
    $varID3=rand(0,9);
    $varID4=rand(0,9);
    $varID5=rand(0,9);
    $aux=array($varID1,$varID2,$varID3,$varID4,$varID5);
    $LeId=implode($aux);

    $servidor="localhost";
    $usuario="root";
    $contrasena="";
    $db="hotel";

    $conexion=mysqli_connect($servidor,$usuario,$contrasena,$db);

    $query4="SELECT * FROM hosts";

    $query5="SELECT * FROM habitaciones";

    $answerH=mysqli_query($conexion,$query4);

    $answerR=mysqli_query($conexion,$query5);

    $dataH=mysqli_fetch_Array($answerH);
    
    if($dataH['id']==""){
        $query="INSERT INTO hosts (id,usuario,contrasena,room,nombre,apellido_p,apellido_m,calle,num,numInt,colonia,cp,curp,clave_e,day_r,cant_child,cant_adult,cant_total,room_type,fecha_ini,fecha_fin,costo_room,costo_total) Values ('$LeId','$user','$pass','$LeRoom','$nombre','$apellido_pat','$apellido_mat','$calle','$numero','$numInt','$colonia','$cp','$curp','$ce','$day','$cm','$cd','$LeTotalHost','$roomtype','$date','$plazo','$LeCost','$LeTotalCost')";
        $out=false;
        mysqli_query($conexion,$query);
    
        $LePos='Cliente';
        $query2="INSERT INTO personas(id,user,pass,permisos) Values ('$LeId','$user','$pass','Cliente')";
    
        $query3="INSERT INTO habitaciones(id,id_Persona) VALUES ('$LeRoom','$LeId')";
        mysqli_query($conexion,$query2);
    
        mysqli_query($conexion,$query3);
        header("location: Success_AU.php");
    }else{
        $query6="SELECT COUNT(*) total from habitaciones";
        $dataR=mysqli_fetch_Array($answerR);
        $value=mysqli_query($conexion,$query6);
        $cont=mysqli_fetch_assoc($value);
        while($dataH=mysqli_fetch_Array($answerH)){
            if($dataH['id']==$LeRoom){
                $LeRoom=rand(1,7000);
            }
        }
        $query="INSERT INTO hosts (id,usuario,contrasena,room,nombre,apellido_p,apellido_m,calle,num,numInt,colonia,cp,curp,clave_e,day_r,cant_child,cant_adult,cant_total,room_type,fecha_ini,fecha_fin,costo_room,costo_total) Values ('$LeId','$user','$pass','$LeRoom','$nombre','$apellido_pat','$apellido_mat','$calle','$numero','$numInt','$colonia','$cp','$curp','$ce','$day','$cm','$cd','$LeTotalHost','$roomtype','$date','$plazo','$LeCost','$LeTotalCost')";
        $out=false;
        mysqli_query($conexion,$query);
    
        $LePos='Cliente';
        $query2="INSERT INTO personas(id,user,pass,permisos) Values ('$LeId','$user','$pass','Cliente')";
    
        $query3="INSERT INTO habitaciones(id,id_Persona) VALUES ('$LeRoom','$LeId')";
        mysqli_query($conexion,$query2);
    
        mysqli_query($conexion,$query3);
        $query7="INSERT INTO login (user,active) VALUES ('$user','$out')";
        mysqli_query($conexion,$query7);
        header("location: Success_AU.php"); 
    }

?>