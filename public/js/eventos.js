$(document).ready(function () {
    $('#tablaEventos').load('eventos/tablaEventos.php');
});

$(document).on('show.bs.modal', '#modalAgregarEvento', function () {
    $('#recursosSeleccionables').load('../servidor/recursos/cargarRecursos.php');
});


function buscarPorFecha() {
    let fecha = $('#fechaBuscar').val();
    $('#tablaEventos').load('eventos/tablaEventos.php?fecha=' + fecha);

}

function agregarEvento() {
    $.ajax({
        type: "POST",
        data: $("#fmrAgregarEvento").serialize(),
        url: "../servidor/eventos/agregar.php",
        success: function (respuesta) {
            if (respuesta == 1) {
                $('#tablaEventos').load('eventos/tablaEventos.php');
                $('#fmrAgregarEvento')[0].reset();
                Swal.fire({
                    title: 'Exito!',
                    text: 'Agregado con exito',
                    icon: 'success',
                })
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Fallo con ' + respuesta,
                    icon: 'error',
                })
            }
        }
    });
    return false;
}

function eliminarEvento(id_evento) {
    Swal.fire({
        title: "Estas Seguro de Eliminar este Evento?",
        text: "Una vez eliminado, no se podra recuperar!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Eliminar!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data: 'id_evento=' + id_evento,
                url: "../servidor/eventos/eliminar.php",
                success: function (respuesta) {
                    if (respuesta == 1) {
                        $('#tablaEventos').load('eventos/tablaEventos.php');
                        Swal.fire({
                            title: 'Exito!',
                            text: 'Eliminado',
                            icon: 'success',
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Fallo con ' + respuesta,
                            icon: 'error',
                        })
                    }
                }
            });
        }
    });

}

function editarEvento(id_evento) {
    $.ajax({
        type: "POST",
        url: "../servidor/eventos/editar.php",
        data: { id_evento: id_evento },
        success: function (respuesta) {
            respuesta = jQuery.parseJSON(respuesta);

            if (respuesta.error) {
                alert(respuesta.error);
                return;
            }

            $('#nombre_eventou').val(respuesta.nombre_evento);
            $('#hora_iniciou').val(respuesta.hora_inicio);
            $('#hora_finu').val(respuesta.hora_fin);
            $('#fechau').val(respuesta.fecha);
            $('#lugaru').val(respuesta.lugar);
            $('#numerosu').val(respuesta.numeros);
            $('#id_evento').val(respuesta.id_evento);

            console.log(respuesta);
            $('#recursosu').empty();
            respuesta.recursos_disponibles.forEach(recurso => {
                let checked = recurso.asignado ? 'checked' : '';
                $('#recursosu').append(`
                    <div>
                        <input type="checkbox" name="recursosu[]" value="${recurso.idRecurso}" ${checked}>
                        ${recurso.nombreRecurso}
                    </div>
                `);
            });

            $('#modalEditarEvento').modal('show');
        }
    });
}


function actualizarEvento() {
    let formData = $('#frmEditarEvento').serialize();

    console.log("Datos enviados al servidor:", formData); // Para depuración

    $.ajax({
        type: "POST",
        data: formData,
        url: "../servidor/eventos/actualizar.php",
        success: function (respuesta) {
            if (respuesta == 1) {
                $('#tablaEventos').load('eventos/tablaEventos.php');
                Swal.fire({
                    title: '¡Éxito!',
                    text: 'El evento ha sido actualizado.',
                    icon: 'success',
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Ocurrió un problema: ' + respuesta,
                    icon: 'error',
                });
            }
        },
        error: function (xhr, status, error) {
            console.error("Error en la solicitud:", xhr.responseText);
        }
    });

    return false;
}
