<?php session_start();
include('../../clases/invitados.php');
$Invitados = new Invitados();
$items = $Invitados->mostrarInvitados($_SESSION['id_usuario']); 
?>

<table class="table table-sm table-hover " id="tablaInvitadosLoad">
    <thead>
        <tr>
            <th> Invitado </th>
            <th> Email </th>
            <th> Evento </th>
            <th> Fecha </th>
            <th> Editar </th>
            <th> Eliminar </th>
        </tr>
       
    </thead>
    <tbody>
        <?php foreach  ($items as $key) :?>
        <tr>
            <td> <?php echo $key['nombre']?> </td>
            <td> <?php echo $key['email']?> </td>
            <td> <?php echo $key['nombreEvento']?> </td>
            <td> <?php echo $key['fechaEvento']?> </td>
            <td>
                <span class="btn btn-warning" data-bs-toggle="modal" 
                        data-bs-target="#modalEditarInvitado" 
                        onclick="editarInvitado('<?php echo $key['idInvitado']?>')"> 
                    <i class="fa-solid fa-pen-to-square"></i>     
                </span>
            </td>
            <td>
                <span class="btn btn-danger" onclick="eliminarInvitado('<?php echo $key['idInvitado'] ?>')">
                    <i class="fa-solid fa-trash"></i>
                </span>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tablaInvitadosLoad').DataTable({
            "language": {
                "url": "../public/librerias/datatables/Spanish.json"
            }
        });
    });
</script>