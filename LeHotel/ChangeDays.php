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


?>
<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Styles/ChangeDaysStyles.css" />
    <title>Hotel</title>
</head>
<body>
    <div class="Cajita" alt="Logo">
        <img class="logo" src="Styles/Images/Logo.png" />
        <form action="Le_Change_Days.php" method="post">
            <h1>Días actuales Reservados: <?php echo $data['day_r'] ?> </h1>
            <label for="day">Días a Reservar</label>
            <input type="number" name="day" />
            <input type="submit" value="Actualizar" />
        </form>
    </div>
</body>
</html>