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

    $query="SELECT *  from hosts";

    $answer=mysqli_query($conexion,$query);

    $data=mysqli_fetch_array($answer);

    if($data['room']==""){
        header("location: NoHostRegister.html");
    }

?>
<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Styles/CheckByRoomStyles.css" />
    <title>Hotel</title>
</head>
<body>
    <div class="Cajita" alt="Logo">
        <img class="logo" src="Styles/Images/Logo.png" />
        <form action="ShowRoom.php" method="post">
            <label for="room">Seleccione el Cuarto a Revisar</label>
            <select name="room">
            <option>Habitación</option>
            <?php $answer=mysqli_query($conexion,$query);
                    while($data2=mysqli_fetch_array($answer)){
                        echo "<option value='".$data2['room']."'>".$data2['room']."</option>";?>
            <?php
            }?>
                </select>
            <input type="submit" value="Revisar" />
        </form>
</div>
</body>
</html>