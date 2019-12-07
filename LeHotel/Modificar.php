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

<html lang="es-mx" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Hotel</title>

</head>
<body>
    <div class="Cajota" alt="Logo">
        <link rel="stylesheet" href="Styles/Add_Huesped_Styles.css" />
        <form action="Modify_User.php" method="post">
            <ul>

                <li>
                    <label for="user">Usuario:</label>
                    <input type="text" name="user" placeholder=<?php echo $data['usuario']?> disabled/>
                </li>
                 <li>
                    <label for="pass">Contraseña:</label>
                    <input type="password" name="password" placeholder=<?php echo $data['contrasena']?> disabled />
                </li>
                <li>
                    <label for="name">Nombre:</label>
                    <input type="text" name="nombre" placeholder=<?php echo $data['nombre']?> />
                </li>
                <li>
                    <label for="apellido_p">Apellido Paterno:</label>
                    <input type="text" name="apellido_p" placeholder=<?php echo $data['apellido_p']?> />
                </li>
                <li>
                    <label for="apellido_m">Apellido Materno:</label>
                    <input type="text" name="apellido_m" placeholder=<?php echo $data['apellido_m']?> />
                </li>
                <li>
                    <label for="calle">Calle:</label>
                    <input type="text" name="calle" placeholder=<?php echo $data['calle']?> />
                </li>
                <li>
                    <label for="num">Número:</label>
                    <input type="number" name="num" placeholder=<?php echo $data['num']?> />
                </li>
                <li>
                    <label for="numInt">Número Interior:</label>
                    <input type="number" name="numInt" placeholder=<?php echo $data['numInt']?> />
                </li>
                <li>
                    <label for="colonia">Colonia:</label>
                    <input type="text" name="colonia" placeholder=<?php echo $data['colonia']?> />
                </li>
                <li>
                    <label for="cp">Código Postal:</label>
                    <input type="number" name="cp" placeholder=<?php echo $data['cp']?> />
                </li>
                <li>
                    <label for="curp">Curp:</label>
                    <input type="text" name="curp" placeholder=<?php echo $data['curp']?> />
                </li>
                <li>
                    <label for="ce">Clave de Elector:</label>
                    <input type="text" name="ce" placeholder=<?php echo $data['clave_e']?> />
                </li>
                <li>
                    <label for="childs">Cantidad de Menores:</label>
                    <input type="number" name="cm" placeholder=<?php echo $data['cant_child']?> />
                </li>
                <li>
                    <label for="adults">Cantidad de Adultos:</label>
                    <input type="number" name="cd" placeholder=<?php echo $data['cant_adult']?> />
                </li>
                <li>
                    <input type="submit" value="Modificar Usuario" />
                </li>

            </ul>
            
        </form>
    </div>
</body>
</html>

