<?php

if (isset($_POST)) {
    

    include("conexionBD.php");

    
    $id = $_POST['id'];

    $query = "DELETE FROM alumnos WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}
