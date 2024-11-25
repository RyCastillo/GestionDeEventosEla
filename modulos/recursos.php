<?php
  include ('../clases/Recursos.php');
  $Recursos = new Recursos();
  include('header.php');
  include('menu.php');
?>



<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-3">
        <div class="card-body">
          <h2>Recursos</h2>
          <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarRecurso">
            Nuevo Recurso
          </span>
          <hr>
          <div id="tablaRecursos"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('footer.php');
include('Recursos/modalAgregar.php');
include('Recursos/modalEditar.php');
?>

<script src="../public/js/recursos.js"></script>