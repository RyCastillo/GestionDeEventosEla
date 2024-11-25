<!-- Modal -->
<form id="fmrAgregarEvento" onsubmit="return agregarEvento()">
  <div class="modal fade" id="modalAgregarEvento" tabindex="-1" aria-labelledby="modalAgregarEventoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAgregarEventoLabel">Agregar Evento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="nombre_evento">Nombre del Evento</label>
          <input type="text" class="form-control" id="nombre_evento" name="nombre_evento" required>
          <label for="hora_inicio"> Hora Inicio </label>
          <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required>
          <label for="hora_fin"> Hora Fin</label>
          <input type="time" class="form-control" id="hora_fin" name="hora_fin" required>
          <label for="fecha"> Fecha </label>
          <input type="date" class="form-control" id="fecha" name="fecha" required>
          <label for="lugar"> Lugar </label>
          <input type="text" class="form-control" id="lugar" name="lugar" required>
          <label for="recursos">Recursos</label>
          <div id="recursosSeleccionables">
            <!-- Aquí se cargarán los recursos dinámicamente como checkboxes -->
          </div>
          <label for="numeros"> Numeros </label>
          <input type="text" class="form-control" id="numeros" name="numeros">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</form>