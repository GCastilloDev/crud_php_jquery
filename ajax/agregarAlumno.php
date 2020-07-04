<?php

if (isset($_POST)) {

    include('conexionBD.php');

    $apellidoPaterno = $_POST["apellidoPaterno"];
    $apellidoMaterno = $_POST["apellidoMaterno"];
    $nombre = $_POST["nombre"];
    $primerParcial = $_POST["primerParcial"];
    $segundoParcial = $_POST["segundoParcial"];
    $tercerParcial = $_POST["tercerParcial"];
    $final = $_POST["promedio"];

    $query = "INSERT INTO 
                  alumnos(
                  apellido_paterno,
                  apellido_materno,
                  nombre,
                  primer_parcial,
                  segundo_parcial,
                  tercer_parcial,
                  final
                  ) VALUES
                  (
                      '$apellidoPaterno',
                      '$apellidoMaterno',
                      '$nombre',
                      '$primerParcial',
                      '$segundoParcial',
                      '$tercerParcial',
                      '$final'
                  )";

    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
    echo "1 Record Added!";
}
