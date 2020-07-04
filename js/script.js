// Leer alumnos
function leerAlumnos() {
  $.get('ajax/leerAlumnos.php', {}, function (data, status) {
    $('#app').html(data);
  });
}

function agregarAlumno() {
  //Variables
  var apellidoPaterno = $('#apPaterno').val();
  var apellidoMaterno = $('#apMaterno').val();
  var nombre = $('#nombre').val();
  var primerParcial = $('#primerParcial').val();
  var segundoParcial = $('#segundoParcial').val();
  var tercerParcial = $('#tercerParcial').val();
  var final =
    (parseFloat(primerParcial) +
      parseFloat(primerParcial) +
      parseFloat(tercerParcial)) /
    3;
  var promedio = final.toFixed(2);

  if (
    apellidoPaterno == '' ||
    apellidoMaterno == '' ||
    nombre == '' ||
    primerParcial == '' ||
    segundoParcial == '' ||
    tercerParcial == ''
  ) {
    alert("Tiene que llenar todos los campos");
    return true;
  }

  $.post(
    'ajax/agregarAlumno.php',
    {
      apellidoPaterno: apellidoPaterno,
      apellidoMaterno: apellidoMaterno,
      nombre: nombre,
      primerParcial: primerParcial,
      segundoParcial: segundoParcial,
      tercerParcial: tercerParcial,
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
      $('#uApellidoPaterno').val(alumno.apellido_paterno);
      $('#uApellidoMaterno').val(alumno.apellido_materno);
      $('#uNombre').val(alumno.nombre);
      $('#uPrimerParcial').val(alumno.primer_parcial);
      $('#uSegundoParcial').val(alumno.segundo_parcial);
      $('#uTercerParcial').val(alumno.tercer_parcial);
    }
  );

  $('#modalEditar').modal('show');
}

function actualizarAlumno() {
  var apellidoPaterno = $('#uApellidoPaterno').val();
  var apellidoMaterno = $('#uApellidoMaterno').val();
  var nombre = $('#uNombre').val();
  var primerParcial = $('#uPrimerParcial').val();
  var segundoParcial = $('#uSegundoParcial').val();
  var tercerParcial = $('#uTercerParcial').val();
  var final =
    (parseFloat(primerParcial) +
      parseFloat(primerParcial) +
      parseFloat(tercerParcial)) /
    3;

  var promedio = final.toFixed(2);
  var idAlumno = $('#alumnoID').val();

  $.post(
    'ajax/actualizarAlumno.php',
    {
      id: idAlumno,
      apellidoPaterno: apellidoPaterno,
      apellidoMaterno: apellidoMaterno,
      nombre: nombre,
      primerParcial: primerParcial,
      segundoParcial: segundoParcial,
      tercerParcial: tercerParcial,
      promedio: promedio,
    },
    function (data, status) {
      // hide modal popup
      $('#modalEditar').modal('hide');
      // reload Users by using readRecords();
      leerAlumnos();
    }
  );
}

function reestablecer() {
  $('#apPaterno').val('');
  $('#apMaterno').val('');
  $('#nombre').val('');
  $('#primerParcial').val('');
  $('#segundoParcial').val('');
  $('#tercerParcial').val('');
}

$(document).ready(function () {
  leerAlumnos();
});
