<?php
    $servidor="localhost";
    $usuario="root";
    $contrasena="";
    $db="hotel";

    $user=$_POST['id'];
    $pass=$_POST['contrasena'];

    $conexion=mysqli_connect($servidor,$usuario,$contrasena,$db);

    $consulta="SELECT * FROM personas WHERE user='$user' AND pass='$pass'";
    $resultado= mysqli_query($conexion,$consulta);
    $filas=mysqli_num_rows($resultado);
    $Le_Info=mysqli_fetch_array($resultado);
    //$result = "SELECT * FROM personas WHERE id LIKE '$id'";
    $query="SELECT * FROM hosts WHERE usuario='$user'";

    $answer=mysqli_query($conexion,$query);

    $Le_Info=mysqli_fetch_array($answer);
    session_start();

    //echo $_SESSION['dato'];

    if($filas>0){
        $_SESSION['id']=$user;
        $_SESSION['pass']=$pass;
        if($user=="Admin"){
            $_SESSION['welcome']="Bienvenido Administrador del Sistema";
        }else{
            $_SESSION['welcome']="Bienvenid@: ".$Le_Info["nombre"]." ".$Le_Info["apellido_p"]." ".$Le_Info["apellido_m"]."<br>";
        } 
        header("location: Main_Panel.php");
    }else{
        header("location: BadLogin.html");
    }
    mysqli_close($conexion);
?>