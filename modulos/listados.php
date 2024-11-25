<?php
  include ('../clases/invitados.php');
  $Invitados = new Invitados();
  include('header.php');
  include('menu.php');
?>



<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-3">
        <div class="card-body">
          <h2>Invitados</h2>
          <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarInvitado">
            Nuevo Invitado
          </span>
          <hr>
          <div id="tablaInvitados"></div>
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