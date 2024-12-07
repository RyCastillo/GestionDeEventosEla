<?php
  include ('../clases/invitados.php');
  $Invitados = new Invitados();
  include('header.php');
  include('menu.php');
?>

<!-- Page Content -->
<div class="container-fluid">  <!-- Cambié a container-fluid para aprovechar el ancho completo -->
  <div class="row">
    <div class="col-12">
      <div class="card mt-3">
        <div class="card-body">
          <h2>Invitados</h2>
          <!-- Botón para agregar nuevo invitado, con clase 'btn-block' para hacerlo más grande en móviles -->
          <span class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAgregarInvitado">
            Nuevo Invitado
          </span>
          <hr>
          <!-- Contenedor para los invitados -->
          <div id="tablaInvitados" class="table-responsive">
            <!-- Aquí se cargará la tabla que se mostrará responsivamente -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('footer.php');
include('listados/modalAgregar.php');
include('listados/modalEditar.php');
?>

<script src="../public/js/invitados.js"></script>
