<?php
include("conexionBD.php");


if(isset($_POST))
{
    $id = $_POST["id"];
    $apellidoPaterno = $_POST["apellidoPaterno"];
    $apellidoMaterno = $_POST["apellidoMaterno"];
    $nombre = $_POST["nombre"];
    $primerParcial = $_POST["primerParcial"];
    $segundoParcial = $_POST["segundoParcial"];
    $tercerParcial = $_POST["tercerParcial"];
    $final = $_POST["promedio"];


    // Updaste User details
    $query = "UPDATE alumnos 
              SET
              apellido_paterno = '$apellidoPaterno',
              apellido_materno = '$apellidoMaterno',
              nombre = '$nombre',
              primer_parcial = '$primerParcial',
              segundo_parcial = '$segundoParcial',
              tercer_parcial = '$tercerParcial',
              final = '$final'
              WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}
