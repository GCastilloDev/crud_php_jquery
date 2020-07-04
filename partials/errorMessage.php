<?php


if (isset($_GET["error"])) {

    $error = $_GET["error"];
    if ($error == 'true') {
        echo
            '
            <div class="alert alert-danger" role="alert">
            Usuario y/o contraseña incorrecta.
            </div>
            ';
    }
}

?>
