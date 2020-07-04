<?php
session_start();

if (!$_SESSION['admin']) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <?php
    include("./partials/bootstrarpCSS.php");
    ?>
    <!-- <link rel="stylesheet" href="assets/estilos.css"> -->
    <title>Calificaciones</title>

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <span class="navbar-brand">Gestión de calificaciones UTSV</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <a class="btn btn-outline-light my-2 my-sm-0" href="ajax/cerrarSesion.php">Cerrar sesión</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <div class="form-group">
                        <label for="apPaterno">Apellido Paterno
                        </label>
                        <input type="text" name="apPaterno" id="apPaterno" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="apMaterno">Apellido Materno
                        </label>
                        <input type="text" name="apMaterno" id="apMaterno" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre
                        </label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="notaParcial">Primer parcial
                        </label>
                        <input type="number" name="notaParcial" id="primerParcial" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="notaFinal">Segundo parcial
                        </label>
                        <input type="number" name="notaFinal" id="segundoParcial" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="notaFinal">Tercer parcial
                        </label>
                        <input type="number" name="notaFinal" id="tercerParcial" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-warning btn-block" onclick="reestablecer()">Reestablecer</button>

                        </div>
                        <div class="col-md-6"> <button class="btn btn-success btn-block" onclick="agregarAlumno()">Ingresar Alumno</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8" style="height: 80vh; overflow-y: auto" id="app">
            </div>
        </div>
    </div>
    </div>

    <!-- Modal - Update User details -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Actualizar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <div class="form-group">
                        <label for="idalumno">Apellido Paterno</label>
                        <input type="text" style="text-transform:uppercase" id="uApellidoPaterno" value="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="codalumno">Apellido Materno</label>
                        <input type="text" style="text-transform:uppercase" id="uApellidoMaterno" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="obs">Nombre</label>
                        <input style="text-transform:uppercase" id="uNombre" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="obs">Primer parcial</label>
                        <input type="number" id="uPrimerParcial" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="obs">Segundo parcial</label>
                        <input type="number" id="uSegundoParcial" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="obs">Tercer parcial</label>
                        <input type="number" id="uTercerParcial" class="form-control"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="actualizarAlumno()">Guardar Cambios</button>
                    <input type="hidden" id="alumnoID">
                </div>
            </div>
        </div>
    </div>
    <!-- // Modal -->


    <!-- Optional JavaScript -->
    <!-- Jquery JS file -->
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <!-- Custom JS file -->

    <script type="text/javascript" src="js/script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Placed at the end of the document so the pages load faster -->

</body>

</html>