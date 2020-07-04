<?php
    // Connection variables 
    $host = "localhost"; // MySQL host name eg. localhost o IP de servidor remoto
    $user = "root"; // MySQL user. eg. root ( if your on localserver)
    $password = ""; // MySQL user password  (if password is not set for your root user then keep it empty )
    $database = "calificaciones_alumnos"; // MySQL Database name

    // Connect to MySQL Database
    $con = new mysqli($host, $user, $password, $database);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
?>