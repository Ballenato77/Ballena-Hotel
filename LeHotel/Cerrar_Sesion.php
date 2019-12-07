<?php
     session_start();
     if($_SESSION['id']==null){
        header("location: NotDataLogin.html");
        die();
     }
    $var_usuario=$_SESSION['id'];
    if($var_usuario=="" || $var_usuario==null){
        echo "Usted no ha iniciado una sesión";
        die();
    } 
    $servidor="localhost";
    $usuario="root";
    $contrasena="";
    $db="hotel";
    $LeActive=false;
    $conexion=mysqli_connect($servidor,$usuario,$contrasena,$db);
    $query="UPDATE login set active = '$LeActive' where user='$var_usuario'";
    mysqli_query($conexion,$query);
    session_destroy();
    header("location: index.html");
?>