<?php
include('header.php');
include "../clases/Eventos.php";
$Eventos = new Eventos();
$id_evento = $_GET['id_evento'];
$items = $Eventos->mostrarInvitadosEvento($id_evento);
?>



<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-3">
        <div class="card-body">
          <h2>Evento: <?php echo @$items[0]['nombreEvento']; ?></h2>
          <h3>Fecha del Evento: <?php echo @$items[0]['fechaEvento']; ?></h3>
          <h4>Recursos del Evento:</h4>
          <p><?php echo @$items[0]['recursos']; ?></p>
          <h4>Números:</h4>
          <p><?php echo @$items[0]['numeros']; ?></p>
          <table class="table table-sm table-hover " id="tablaInvitadosLoad">
            <thead>
              <tr>
                <th> Invitado </th>
                <th> Email </th>
                <th> Evento </th>
              </tr>

            </thead>
            <tbody>
              <?php 
                if(count($items)>0 ):
                foreach ($items as $key) : 
              ?>
                <tr>
                  <td> <?php echo $key['nombre'] ?> </td>
                  <td> <?php echo $key['email'] ?> </td>
                  <td> <?php echo $key['nombreEvento'] ?> </td>
                  
                </tr>
              <?php 
                endforeach;
              endif; 
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

