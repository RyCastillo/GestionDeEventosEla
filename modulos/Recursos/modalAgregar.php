
<form id="frmAgregarRecurso" onsubmit="return agregarRecurso()">
  <div class="modal fade" id="modalAgregarRecurso" tabindex="-1" aria-labelledby="modalAgregarRecursoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAgregarRecursoLabel">Agregar Recursos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="nombreRecurso"> Nombre de Recurso </label>
            <input type="text" class="form-control" id="nombreRecurso" name="nombreRecurso" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</form>