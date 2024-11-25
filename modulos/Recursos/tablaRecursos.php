<?php
session_start();
include('../../clases/Recursos.php');
$Recursos = new Recursos();

// Si no hay una sesión activa para idRecurso, se muestran todos los recursos
$items = $Recursos->mostrarRecursos($_SESSION['idRecurso'] ?? null);
?>

<table class="table table-sm table-hover " id="tablaRecursosLoad">
    <thead>
        <tr>
            <th>Recurso</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $key): ?>
            <tr>
                <td><?php echo $key['nombreRecurso']; ?></td>
                <td>
                    <span class="btn btn-warning"
                        data-bs-toggle="modal"
                        data-bs-target="#modalEditarRecurso"
                        onclick="editarRecurso('<?php echo $key['idRecurso'] ?>')">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </span>
                </td>

                <td>
                    <span class="btn btn-danger" onclick="eliminarRecurso('<?php echo $key['idRecurso']; ?>')">
                        <i class="fa-solid fa-trash"></i>
                    </span>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tablaRecursosLoad').DataTable({
            "language": {
                "url": "../public/librerias/datatables/Spanish.json"
            }
        });
    });
</script>