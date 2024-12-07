<?php
include('header.php');
include "../clases/Eventos.php";
$Eventos = new Eventos();
$id_evento = $_GET['id_evento'];
$items = $Eventos->mostrarInvitadosEvento($id_evento);

$recursosUnicos = [];
$invitadosUnicos = [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte del Evento</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      background-color: #f4f6f9;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 1100px;
      margin: 0 auto;
      padding: 30px;
      background-color: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    .card {
      border-radius: 8px;
      margin-bottom: 30px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .card-header {
      background-color: #007bff;
      color: white;
      font-size: 1.2rem;
      font-weight: bold;
      text-align: center;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
    }
    .card-body {
      padding: 20px;
      background-color: #ffffff;
    }
    h1 {
      color: #007bff;
      font-size: 2.5rem;
      font-weight: bold;
    }
    h2.card-title {
      color: #343a40;
    }
    .section-title {
      font-size: 1.25rem;
      color: #343a40;
      font-weight: bold;
      margin-bottom: 20px;
    }
    table th, table td {
      padding: 12px;
      text-align: center;
    }
    table th {
      background-color: #007bff;
      color: white;
    }
    table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #f9f9f9;
    }
    .table-hover tbody tr:hover {
      background-color: #f1f1f1;
    }
    .list-group-item {
      font-size: 1rem;
      padding: 12px;
    }
    .text-muted {
      color: #6c757d;
    }
    .text-center {
      text-align: center;
    }
    .section-header {
      border-bottom: 2px solid #007bff;
      padding-bottom: 8px;
      margin-bottom: 20px;
    }
    .footer {
      font-size: 0.875rem;
      color: #6c757d;
      text-align: center;
      margin-top: 40px;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Título del reporte -->
    <div class="text-center">
      <h1>Reporte del Evento</h1>
      <p class="text-muted">Detalles completos sobre el evento y sus participantes</p>
    </div>

    <!-- Información del Evento -->
    <div class="card">
      <div class="card-header">
        Información del Evento
      </div>
      <div class="card-body">
        <h2 class="card-title"><?php echo htmlspecialchars($items[0]['nombre_evento'] ?? 'Evento no encontrado'); ?></h2>
        <p><strong>Fecha:</strong> <?php echo htmlspecialchars($items[0]['fecha'] ?? 'No disponible'); ?></p>
        <p><strong>Horario:</strong> <?php echo htmlspecialchars($items[0]['hora_inicio'] ?? 'No disponible') . " - " . htmlspecialchars($items[0]['hora_fin'] ?? 'No disponible'); ?></p>
        <p><strong>Lugar:</strong> <?php echo htmlspecialchars($items[0]['lugar'] ?? 'Sin lugar especificado'); ?></p>
      </div>
    </div>

    <!-- Recursos del Evento -->
    <div class="card">
      <div class="card-header">
        Recursos Utilizados
      </div>
      <div class="card-body">
        <div class="section-title">Lista de recursos utilizados en el evento:</div>
        <ul class="list-group">
          <?php
            foreach ($items as $item) {
                if (!in_array($item['idRecurso'], $recursosUnicos)) {
                    $recursosUnicos[] = $item['idRecurso'];
                    echo '<li class="list-group-item">' . htmlspecialchars($item['nombreRecurso']) . '</li>';
                }
            }
            if (empty($recursosUnicos)) {
                echo '<li class="list-group-item text-muted">No se especificaron recursos.</li>';
            }
          ?>
        </ul>
      </div>
    </div>

    <!-- Lista de Invitados -->
    <div class="card">
      <div class="card-header">
        Invitados al Evento
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($items as $item) {
                  if (!in_array($item['id_invitado'], $invitadosUnicos)) {
                      $invitadosUnicos[] = $item['id_invitado'];
                      echo '<tr>';
                      echo '<td>' . htmlspecialchars($item['nombre_invitado']) . '</td>';
                      echo '<td>' . htmlspecialchars($item['email']) . '</td>';
                      echo '</tr>';
                  }
              }
              if (empty($invitadosUnicos)): ?>
                  <tr>
                      <td colspan="2" class="text-center text-muted">No hay invitados registrados para este evento.</td>
                  </tr>
              <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

</body>
</html>
