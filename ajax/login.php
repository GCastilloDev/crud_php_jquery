<?php

if(isset($_POST)) {

    $usuario = $_POST["usuario"];
    $contrasena = $_POST["password"];

    include('conexionBD.php');

    $query = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";

    echo $query;


    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
        header("Location:../index.php");
    }

    if(mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['admin'] = true;
        header("Location:../calificaciones.php");
    }

    if (mysqli_num_rows($result) <= 0) {
        header("Location:../index.php?error=true");
    }
}


?>