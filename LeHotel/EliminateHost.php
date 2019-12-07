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
     $query="SELECT *from hosts";
     $answer=mysqli_query($conexion,$query);
     $data=mysqli_fetch_array($answer);

     if($data['id']=""){
         header("location: NotHostRegister.html");
     }
?>
<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel</title>
    <link rel="stylesheet" href="Styles/EliminateHostStyles.css" />
</head>
<body>
    <div class="Cajita" alt="Logo">
        <form action="Bye-Bye_Host.php" method="post">
            <img class="logo" src="Styles/Images/Logo.png" />
            <h1>Seleccione el ID del Huésped a dar de Baja</h1>
            <label for="id">Huéspedes Actuales:</label>
            <select name="id_eliminate">
            <option>Huéspedes</option>
            <?php $answer=mysqli_query($conexion,$query);
                    while($data2=mysqli_fetch_array($answer)){
                        echo "<option value='".$data2['id']."'>".$data2['id']."</option>";?>
            <?php
            }?>
                </select>
                <input type="submit" value="Despachar" />
        </form>
    </div>
</body>
</html>