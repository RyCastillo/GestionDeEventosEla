<form id="frmEditarRecurso" onsubmit="return actualizarRecurso()">
  <div class="modal fade" id="modalEditarRecurso" tabindex="-1" aria-labelledby="modalEditarRecursoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditarRecursoLabel">Editar Recurso</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="idRecurso" name="idRecurso"> <!-- ID oculto -->
          <label for="nombreRecursou">Nombre de Recurso</label>
          <input type="text" class="form-control" id="nombreRecursou" name="nombreRecursou" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-warning">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
</form>
>
</form>
