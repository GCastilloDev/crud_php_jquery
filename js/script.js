// Leer alumnos
function leerAlumnos() {
  $.get('ajax/leerAlumnos.php', {}, function (data, status) {
    $('#app').html(data);
  });
}

function agregarAlumno() {
  //Variables
  var matricula = $('#matricula').val();
  var nombre = $('#nombre').val();
  var apellidos = $('#apellidos').val();
  var edad = $('#edad').val();
  var sexo = $('#sexo').val();
  var grupo = $('#grupo').val();
  var carrera = $('#carrera').val();
  var calificacionParcial = $('#calificacionParcial').val();
  var notaFinal = $('#notaFinal').val();

  var suma = (parseFloat(calificacionParcial) + parseFloat(notaFinal)) / 2;
  var promedio = suma.toFixed(2);

  if (
    matricula == '' ||
    nombre == '' ||
    apellidos == '' ||
    edad == '' ||
    sexo == '' ||
    grupo == '' ||
    carrera == '' ||
    calificacionParcial == '' ||
    notaFinal == ''
  ) {
    alert('Tiene que llenar todos los campos');
    return true;
  }

  $.post(
    'ajax/agregarAlumno.php',
    {
      matricula: matricula,
      nombre: nombre,
      apellidos: apellidos,
      edad: edad,
      sexo: sexo,
      grupo: grupo,
      carrera: carrera,
      calificacionParcial: calificacionParcial,
      notaFinal: notaFinal,
      promedio: promedio,
    },
    function (data, status) {
      leerAlumnos();

      //Limpiar formulario
      reestablecer();
    }
  );
}

function eliminarAlumno(id) {
  var conf = confirm('¿Está seguro, realmente desea eliminar el registro?');
  if (conf == true) {
    $.post(
      'ajax/eliminarAlumno.php',
      {
        id: id,
      },
      function (data, status) {
        leerAlumnos();
      }
    );
  }
}

function obtenerDetalleAlumno(id) {
  $('#alumnoID').val(id);
  $.post(
    'ajax/obtenerDetalleAlumno.php',
    {
      id: id,
    },
    function (data, status) {
      // PARSE json data
      var alumno = JSON.parse(data);
      // Assing existing values to the modal popup fields
      $('#uMatricula').val(alumno.matricula);
      $('#uNombre').val(alumno.nombre);
      $('#uApellidos').val(alumno.apellidos);
      $('#uEdad').val(alumno.edad);
      $('#uSexo').val(alumno.sexo);
      $('#uGrupo').val(alumno.grupo);
      $('#uCarrera').val(alumno.carrera);
      $('#uCalificacionParcial').val(alumno.calificacion_parcial);
      $('#uNotaFinal').val(alumno.nota_final);
    }
  );

  $('#modalEditar').modal('show');
}

function actualizarAlumno() {
  var idAlumno = $('#alumnoID').val();
  var matricula = $('#uMatricula').val();
  var nombre = $('#uNombre').val();
  var apellidos = $('#uApellidos').val();
  var edad = $('#uEdad').val();
  var sexo = $('#uSexo').val();
  var grupo = $('#uGrupo').val();
  var carrera = $('#uCarrera').val();
  var calificacionParcial = $('#uCalificacionParcial').val();
  var notaFinal = $('#uNotaFinal').val();

  var suma = (parseFloat(calificacionParcial) + parseFloat(notaFinal)) / 2;
  var promedio = suma.toFixed(2);

  $.post(
    'ajax/actualizarAlumno.php',
    {
      id: idAlumno,
      matricula: matricula,
      nombre: nombre,
      apellidos: apellidos,
      edad: edad,
      sexo: sexo,
      grupo: grupo,
      carrera: carrera,
      calificacionParcial: calificacionParcial,
      notaFinal: notaFinal,
      promedio: promedio,
    },
    function (data, status) {
      console.log(data);
      // hide modal popup
      $('#modalEditar').modal('hide');
      // reload Users by using readRecords();
      leerAlumnos();
    }
  );
}

function reestablecer() {
  $('#matricula').val('');
  $('#nombre').val('');
  $('#apellidos').val('');
  $('#edad').val('');
  $('#sexo').val('');
  $('#grupo').val('');
  $('#carrera').val('');
  $('#calificacionParcial').val('');
  $('#notaFinal').val('');
}

$(document).ready(function () {
  leerAlumnos();
});
