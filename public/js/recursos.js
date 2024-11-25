$(document).ready(function(){
    $('#tablaRecursos').load('Recursos/tablaRecursos.php');
});

function agregarRecurso() {
    $.ajax({
        type: "POST",
        data: $('#frmAgregarRecurso').serialize(),
        url: "../servidor/recursos/agregar.php",
        success: function(respuesta) {
            if (respuesta == 1) {
                // Recarga la tabla después de agregar el recurso
                $('#tablaRecursos').load('Recursos/tablaRecursos.php');
                $('#frmAgregarRecurso')[0].reset();  // Limpia el formulario
                Swal.fire({
                    title: 'Éxito!',
                    text: 'Recurso agregado con éxito',
                    icon: 'success'
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Hubo un problema: ' + respuesta,
                    icon: 'error'
                });
            }
        }
    });

    return false;
}


function editarRecurso(idRecurso) {
    $.ajax({
        type: "POST",
        url: "../servidor/recursos/editar.php", // Ruta hacia tu archivo `editar.php`
        data: { idRecurso: idRecurso }, // Envía el ID del recurso
        success: function(respuesta) {
            let datos = JSON.parse(respuesta); // Parsear la respuesta JSON
            if (datos.length > 0) {
                $('#idRecurso').val(datos[0].idRecurso); // Asigna el ID al campo oculto
                $('#nombreRecursou').val(datos[0].nombreRecurso); // Asigna el nombre al campo
            }
        },
        error: function(xhr, status, error) {
            console.error("Error al cargar el recurso: ", error);
        }
    });
}


function actualizarRecurso() {
    let datos = $('#frmEditarRecurso').serialize(); // Serializa los datos del formulario

    $.ajax({
        type: "POST",
        url: "../servidor/recursos/actualizar.php", // Asegúrate de que esta ruta es correcta
        data: datos, // Envía los datos serializados
        success: function(respuesta) {
            if (respuesta.trim() == '1') {
                $('#modalEditarRecurso').modal('hide');
                
                // Mostrar notificación de éxito
                Swal.fire({
                    title: 'Éxito',
                    text: 'Recurso actualizado correctamente.',
                    icon: 'success'
                }).then(() => {
                    // Refresca la página después de cerrar el cuadro de diálogo
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un problema: ' + respuesta.trim(),
                    icon: 'error'
                });
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText); // Muestra el error en la consola
            Swal.fire({
                title: 'Error',
                text: 'Ocurrió un problema con la petición AJAX: ' + error,
                icon: 'error'
            });
        }
    });

    return false; // Evita que el formulario se envíe de forma tradicional
}



function eliminarRecurso(idRecurso){
    Swal.fire({
        title: "Estas Seguro de Eliminar este Recurso?",
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
                data: 'idRecurso=' + idRecurso,
                url: "../servidor/recursos/eliminar.php",
                success: function(respuesta){
                    if(respuesta == 1){
                        $('#tablaRecursos').load('Recursos/tablaRecursos.php');
                        Swal.fire({
                            title: 'Exito!',
                            text: 'Eliminado',
                            icon: 'success',
                        })
                    }else{
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