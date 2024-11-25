<?php 
  $selecte = $Invitados->selectEventosEditar($_SESSION['id_usuario']);
?>

<form id="frmEditarInvitado" onsubmit="return actualizarInvitado()">
  <div class="modal fade" id="modalEditarInvitado" tabindex="-1" aria-labelledby="modalEditarInvitadoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditarInvitadoLabel">Editar Invitado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" id="id_invitado" name="id_invitado" hidden>
          <?php echo $selecte; ?>
          <label for="nombre_invitadou"> Nombre de Invitado </label>
          <input type="text" class="form-control" id="nombre_invitadou" name="nombre_invitadou" required>
          <label for="emailu"> Email </label>
          <input type="email" class="form-control" id="emailu" name="emailu" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button  class="btn btn-warning">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
</form>