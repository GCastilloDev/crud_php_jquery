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
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="matricula">Matrícula
                            </label>
                            <input type="number" name="matricula" id="matricula" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre
                            </label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="apellidos">Apellidos
                            </label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="edad">Edad
                            </label>
                            <input type="number" name="edad" id="edad" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo
                            </label>
                            <select name="sexo" id="sexo" class="form-control" required>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="No binario">No binario</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="grupo">Grupo
                            </label>
                            <input type="number" name="grupo" id="grupo" class="form-control" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="carrera">Carrera
                            </label>
                            <select name="carrera" id="carrera" class="form-control" required>
                                <option value="TSU Tecnologías de Información y Comunicación">TSU Tecnologías de Información y Comunicación</option>
                                <option value="TSU Contaduría">TSU Contaduría</option>
                                <option value="TSU Mantenimiento Área Industrial">TSU Mantenimiento Área Industrial</option>
                                <option value="TSU Mecatrónica área Automatización"> TSU Mecatrónica área Automatización</option>
                                <option value="TSU Química Industrial"> TSU Química Industrial</option>
                                <option value="TSU Mecánica área Automotriz"> TSU Mecánica área Automotriz</option>
                                <option value="TSU Administración área Capital Humano">TSU Administración área Capital Humano</option>
                                <option value="TSU Energías Renovables">TSU Energías Renovables</option>
                                <option value="Ingeniería en Tecnologías de la Información">Ingeniería en Tecnologías de la Información</option>
                                <option value="Ingeniería en Mantenimiento Industrial">Ingeniería en Mantenimiento Industrial</option>
                                <option value="Ingeniería en Mecatrónica">Ingeniería en Mecatrónica</option>
                                <option value="Ingeniería Química">Ingeniería Química</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="calificacionParcial">Calificación parcial
                            </label>
                            <input type="number" name="calificacionParcial" id="calificacionParcial" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="notaFinal">Nota final
                            </label>
                            <input type="number" name="notaFinal" id="notaFinal" class="form-control" required>
                        </div>
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
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="matricula">Matrícula
                            </label>
                            <input type="number" name="matricula" id="uMatricula" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre
                            </label>
                            <input type="text" name="nombre" id="uNombre" class="form-control" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="apellidos">Apellidos
                            </label>
                            <input type="text" name="apellidos" id="uApellidos" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="edad">Edad
                            </label>
                            <input type="number" name="edad" id="uEdad" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo
                            </label>
                            <select name="sexo" id="uSexo" class="form-control" required>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="No binario">No binario</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="grupo">Grupo
                            </label>
                            <input type="number" name="grupo" id="uGrupo" class="form-control" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="carrera">Carrera
                            </label>
                            <select name="carrera" id="uCarrera" class="form-control" required>
                                <option value="TSU Tecnologías de Información y Comunicación">TSU Tecnologías de Información y Comunicación</option>
                                <option value="TSU Contaduría">TSU Contaduría</option>
                                <option value="TSU Mantenimiento Área Industrial">TSU Mantenimiento Área Industrial</option>
                                <option value="TSU Mecatrónica área Automatización"> TSU Mecatrónica área Automatización</option>
                                <option value="TSU Química Industrial"> TSU Química Industrial</option>
                                <option value="TSU Mecánica área Automotriz"> TSU Mecánica área Automotriz</option>
                                <option value="TSU Administración área Capital Humano">TSU Administración área Capital Humano</option>
                                <option value="TSU Energías Renovables">TSU Energías Renovables</option>
                                <option value="Ingeniería en Tecnologías de la Información">Ingeniería en Tecnologías de la Información</option>
                                <option value="Ingeniería en Mantenimiento Industrial">Ingeniería en Mantenimiento Industrial</option>
                                <option value="Ingeniería en Mecatrónica">Ingeniería en Mecatrónica</option>
                                <option value="Ingeniería Química">Ingeniería Química</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="calificacionParcial">Calificación parcial
                            </label>
                            <input type="number" name="calificacionParcial" id="uCalificacionParcial" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="notaFinal">Nota final
                            </label>
                            <input type="number" name="notaFinal" id="uNotaFinal" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6" hidden>
                            <label for="notaFinal">Nota final
                            </label>
                            <input type="number" name="notaFinal" id="alumnoID" class="form-control">
                        </div>
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