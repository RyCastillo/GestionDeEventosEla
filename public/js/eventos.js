$(document).ready(function(){
    $('#tablaEventos').load('eventos/tablaEventos.php');
});

function buscarPorFecha(){
    let fecha = $('#fechaBuscar').val();
    $('#tablaEventos').load('eventos/tablaEventos.php?fecha=' + fecha);

}

function agregarEvento(){
    $.ajax({
        type: "POST",
        data: $("#fmrAgregarEvento").serialize(),
        url: "../servidor/eventos/agregar.php",
        success: function(respuesta){
            if(respuesta == 1){
                $('#tablaEventos').load('eventos/tablaEventos.php');
                $('#fmrAgregarEvento')[0].reset();
                Swal.fire({
                    title: 'Exito!',
                    text: 'Agregado con exito',
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
    return false;
}

function eliminarEvento(id_evento){
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
                success: function(respuesta){
                    if(respuesta == 1){
                        $('#tablaEventos').load('eventos/tablaEventos.php');
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

function editarEvento(id_evento) {
    $.ajax({
        type: "POST",
        url: "../servidor/eventos/editar.php",
        data:  "id_evento=" + id_evento, // Enviar id_evento como un objeto
        success: function(respuesta) {
            respuesta = jQuery.parseJSON( respuesta );
            
            $('#nombre_eventou').val(respuesta[0].nombre_evento);
            $('#hora_iniciou').val(respuesta[0].hora_inicio);
            $('#hora_finu').val(respuesta[0].hora_fin);
            $('#fechau').val(respuesta[0].fecha);
            $('#lugaru').val(respuesta[0].lugar);
            $('#recursosu').val(respuesta[0].recursos);
            $('#numerosu').val(respuesta[0].numeros);
            $('#id_evento').val(respuesta[0].id_evento);

        }
    });
}

function actualizarEvento(){
    $.ajax({
        type: "POST",
        data: $('#frmEditarEvento').serialize(),
        url: "../servidor/eventos/actualizar.php",
        success: function(respuesta){
            if(respuesta == 1){
                $('#tablaEventos').load('eventos/tablaEventos.php');
                Swal.fire({
                    title: 'Exito!',
                    text: 'Actualizado',
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

    return false;
}