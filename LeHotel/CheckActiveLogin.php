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
     $LeBool=true;
     $conexion=mysqli_connect($servidor,$usuario,$contrasena,$db);
     $query="SELECT * from hosts AS h INNER JOIN login AS l on h.usuario = l.user WHERE l.active='$LeBool'";
     /*SELECT e.first_name, e.last_name, u.user_type, u.username 
     FROM `employee` AS e INNER JOIN `user` AS u ON e.id = u.employee_id;*/
     $answer=mysqli_query($conexion,$query);
     $query2="SELECT Count(*) total from login WHERE active= true";
     $answer2=mysqli_query($conexion,$query2);
     $cont=mysqli_fetch_assoc($answer2);
     if($answer==null || $cont['total']==0){
     header("location: NotHostRegister.html");
}else{
}
        $iterator=1;
     /*
     SELECT a.nombre, a.marca, i.lote, i.existencia FROM articulo a LEFT JOIN 
     inventario i ON a.clave = i.clave

*/
?>
<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Styles/CheckActiveLoginStyles.css" />
    <title>Hotel</title>
</head>
<body>
    <h1><?php echo "Se tiene un total de ".$cont['total']." Usuarios con Sesión Iniciada"; ?> </h1>
    <div class="Cajota">
        <form action="Main_Panel.php" method="post">
            <table>
            <thead>
                <td>Índice:</td>
                <td>ID:</td>
                <td>Usuario:</td>
                <td>Contraseña:</td>
                <td>Habitación:</td>
                <td>Nombre:</td>
                <td>Apellido Paterno:</td>
                <td>Apellido Materno:</td>
                <td>Calle:</td>
                <td>Número:</td>
                <td>Número Interior:</td>
                <td>Colonia</td>
                <td>Código Postal</td>
                <td>CURP</td>
                <td>Clave Electoral:</td>
                <td>Días Reservados:</td>
                <td>Cantidad de Menores:</td>
                <td>Cantidad de Adultos:</td>
                <td>Cantidad Total:</td>
                <td>Tipo de Habitación:</td>
                <td>Fecha de Entrada:</td>
                <td>Fecha de Salida:</td>
                <td>Costo de la Habitación:</td>
                <td>Costo Total:</td>
            </thead>
            <?php while($data=mysqli_fetch_array($answer)){?>
                <tr>
                    <td><?php echo $iterator;?></td>
                    <td><?php echo $data['id']?></td>
                    <td><?php echo $data['usuario']?></td>
                    <td><?php echo $data['contrasena']?></td>
                    <td><?php echo $data['room']?></td>
                    <td><?php echo $data['nombre']?></td>
                    <td><?php echo $data['apellido_p']?></td>
                    <td><?php echo $data['apellido_m']?></td>
                    <td><?php echo $data['calle']?></td>
                    <td><?php echo $data['num']?></td>
                    <td><?php echo $data['numInt']?></td>
                    <td><?php echo $data['colonia']?></td>
                    <td><?php echo $data['cp']?></td>
                    <td><?php echo $data['curp']?></td>
                    <td><?php echo $data['clave_e']?></td>
                    <td><?php echo $data['day_r']?></td>
                    <td><?php echo $data['cant_child']?></td>
                    <td><?php echo $data['cant_adult']?></td>
                    <td><?php echo $data['cant_total']?></td>
                    <td><?php echo $data['room_type']?></td>
                    <td><?php echo $data['fecha_ini']?></td>
                    <td><?php echo $data['fecha_fin']?></td>
                    <td><?php echo $data['costo_room']?></td>
                    <td><?php echo $data['costo_total']?></td>
                </tr>
            
                
                            

            <?php
            $iterator++;
        }
        ?>
        </table>
            <input type="submit" value="Regresar al Menú Principal" />
        </form>
    </div>
</body>
</html>