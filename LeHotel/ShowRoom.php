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

    $Le_Selected_Room=$_POST['room'];
    $query="SELECT cant_total from hosts WHERE room='$Le_Selected_Room'";
    $answer=mysqli_query($conexion,$query);
    $data=mysqli_fetch_array($answer);
?>
<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Styles/ShowRoomStyles.css" />
    <title>Hotel</title>
</head>
<body>
    <div class="Cajita" alt="Logo">
        <form action="Main_Panel.php" method="post">
            <img class="logo" src="Styles/Images/Logo.png" />
            <h1>La Habitación <?php echo $Le_Selected_Room." Tiene ".$data['cant_total']." Huéspedes";?></h1>
            <input type="submit" value="Regresar al Menú Principal" />
        </form>
    </div>
</body>
</html>