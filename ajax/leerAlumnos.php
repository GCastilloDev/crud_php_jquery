<?php

include('conexionBD.php');

$data = '';

$query = "SELECT * FROM alumnos";

if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data .= '<div class="card" style="margin-bottom: 1rem;">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <h5 class="card-title">'.$row['nombre'].'</h5>
                                <h6 class="card-subtitle mb-2 text-muted">'.$row['apellidos'].'</h6>
                            </div>
                            <div class="col-md-4 d-flex justify-content-end">
                                <h5 class="card-title">Matrícula: '.$row['matricula'].'</h5>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <p><strong>Edad: </strong> '.$row['edad'].'</p>
                                <p><strong>Sexo: </strong> '.$row['sexo']. '</p>
                                <p><strong>Grupo: </strong> ' . $row['grupo'] . '</p>
                                <p><strong>Carrera: </strong> ' . $row['carrera'] . '</p>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="alert alert-info">
                                            <h6 class="text-center">Cal. parcial</h6>
                                            <h2 class="text-center">' . $row['calificacion_parcial'] . '</h2>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <h6 class="text-center">Nota final</h6>
                                            <h2 class="text-center">' . $row['nota_final'] . '</h2>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="alert alert-danger">
                                            <h6 class="text-center">Promedio</h6>
                                            <h2 class="text-center">' . $row['promedio'] . '</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="button" onclick="eliminarAlumno(' . $row['id'] . ')" class="btn btn-danger btn-sm" style="margin-right: 1rem"><i class="fas fa-trash-alt" style="margin-right: .5rem"></i>Eliminar</button>

                            <button type="button" onclick="obtenerDetalleAlumno(' . $row['id'] . ')" class="btn btn-primary btn-sm"><i class="fas fa-edit" style="margin-right: .5rem"></i>Editar</button>
                        </div>
                    </div>
                </div>';
    }
} else {
    // records now found 
    $data .= '<div class="text-center">
                    <img src="assets/robot.png" alt="Sin resultados" style="filter: grayscale(1); margin-top: 6rem">
                    <h3 class="text-secondary mt-3">Lo sentimos, por el momento no tenemos registros! 🙁</h3>
                </div>';
}

echo $data;
