<?php
include('header.php');
include('menu.php');
?>

<style>
        #calendario {
            width: 600px;
            height: 400px;
        }
</style>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-3">
        <div class="card-body">
           <!-- Botón para Agregar Evento -->
           <div class="col-12 col-md-4 mb-3">
              <span class="btn btn-primary w-30" data-bs-toggle="modal" data-bs-target="#modalAgregarEvento">
                + Agregar Evento
              </span>
            </div>
          <div id='calendar'></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('eventos/modalAgregar.php');
include('footer.php');
include('modalEventos.php');
?>
<script src="../public/js/fullCalendar.js"></script>
<script src="../public/js/eventos.js"></script>