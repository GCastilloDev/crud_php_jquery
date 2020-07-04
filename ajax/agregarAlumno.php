<?php

if (isset($_POST)) {

    include('conexionBD.php');

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
    
    $query = "INSERT INTO 
                  alumnos(
                  matricula,
                  nombre,
                  apellidos,
                  edad,
                  sexo,
                  grupo,
                  carrera,
                  calificacion_parcial,
                  nota_final,
                  promedio
                  ) VALUES
                  (
                      '$matricula',
                      '$nombre',
                      '$apellidos',
                      '$edad',
                      '$sexo',
                      '$grupo',
                      '$carrera',
                      '$calificacionParcial',
                      '$notaFinal',
                      '$promedio'
                  )";

    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
    echo "1 Record Added!";
}
