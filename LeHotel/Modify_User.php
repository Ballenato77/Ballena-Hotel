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
    $cm=$_POST['cm'];
    $cd=$_POST['cd'];
    
    $ct=$cd+$cm;


    //echo $cm;
    $query2="UPDATE hosts SET nombre ='$nombre', apellido_p = '$apellido_pat', apellido_m='$apellido_mat', calle = '$calle', num='$numero', numInt= '$numInt' , colonia='$colonia', cp='$cp', curp='$curp', clave_e='$ce', cant_child= '$cm' , cant_adult= '$cd' , cant_total= '$ct' WHERE usuario='$var_usuario'";

    mysqli_query($conexion,$query2);

    header("location: ModifySuccess.html");

    /*UPDATE Empleados SET Puesto = ‘DBA’, sueldo = 19000 WHERE TRIM(ID_Empleado) = ‘68648’;
*/

?>
