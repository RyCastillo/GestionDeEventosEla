<?php
include('header.php');
include('menu.php');
?>



<!-- Page Content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card mt-3">
        <div class="card-body">
          <h2>Eventos</h2>
          
          <div class="row">
           
            <!-- Columna Vacía para Alineación (en pantallas grandes) -->
            <div class="col-12 col-md-4 mb-3 d-none d-md-block"></div>

            <!-- Input de búsqueda con fecha -->
            <div class="col-12 col-md-4 mb-3">
              <div class="input-group">
                <input type="date" class="form-control" id="fechaBuscar">
                <button class="btn btn-primary" onclick="buscarPorFecha()">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </div>
            </div>
          </div>

          <hr>
          <div id="tablaEventos"></div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php

include('eventos/modalEditar.php');
include('footer.php');
?>

<script src="../public/js/eventos.js"></script>