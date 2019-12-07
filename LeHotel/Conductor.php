<?php
    session_start();
    if($_POST['salir']){
        header("location: Cerrar_Sesion.php");
    }
    if($_POST['consulta1']){
        header("location: ConsultaTotal.php");
    }
    if($_POST['consulta2']){
        header("location: CheckAutor.html");
    }
    if($_POST['panel1']){
        header("location: Main_Panel.php");
    }
    if($_POST['fail'] || $_SESSION['id']==null){
        header("location: index.html");
        die();
    }
    if($_POST['consulta3']){
        header("location: CheckName.html");
    }
    if($_POST['consulta4']){
        header("location: CheckBySubject.html");
    }

?>