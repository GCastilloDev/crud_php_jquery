<?php
include("conexionBD.php");


if (isset($_POST)) {
    $id = $_POST["id"];
    $matricula = $_POST["matricula"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $sexo = $_POST["sexo"];
    $grupo = $_POST["grupo"];
    $carrera = $_POST["carrera"];
    $calificacionParcial = $_POST["calificacionParcial"];
    $notaFinal = $_POST["notaFinal"];
    $promedio = $_POST["promedio"];

    // Updaste User details
    $query = "UPDATE alumnos 
              SET
              matricula = '$matricula',
              nombre = '$nombre',
              apellidos = '$apellidos',
              edad = '$edad',
              sexo = '$sexo',
              grupo = '$grupo',
              carrera = '$carrera',
              calificacion_parcial = '$calificacionParcial',
              nota_final = '$notaFinal',
              promedio = '$promedio'
              WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    echo "Actualizacion exitosa!";
}
