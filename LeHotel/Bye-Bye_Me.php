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

     $query4="SELECT * from hosts Where usuario='$var_usuario'";

     $answer=mysqli_query($conexion,$query4);

     $data=mysqli_fetch_array($answer);

    $bye=$data['id'];

    $bye_u=$data['usuario'];

    $query="DELETE from hosts Where id='$bye'";

    $query2="DELETE from personas where id='$bye'";

    $query3="DELETE from login where user='$bye_u'";

    $query5="DELETE from habitaciones where id_Persona='$bye'";

    mysqli_query($conexion,$query);

    mysqli_query($conexion,$query2);

    mysqli_query($conexion,$query3);

    mysqli_query($conexion,$query5);

    header("location: SuccesfullyEliminationV2.html");
?>