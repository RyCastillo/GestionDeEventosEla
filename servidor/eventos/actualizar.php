<?php
session_start();
include ('../../clases/Eventos.php');
$Eventos = new Eventos();

$data = array(
    'id_evento' => intval($_POST['id_evento']),
    'nombre_evento' => $_POST['nombre_eventou'],
    'hora_inicio' => $_POST['fechau'] . " " . $_POST['hora_iniciou'],
    'hora_fin' => $_POST['fechau'] . " " . $_POST['hora_finu'],
    'fecha' => $_POST['fechau'],
    'lugar' => $_POST['lugaru'],
    'recursos' => isset($_POST['recursosu']) ? implode(',', $_POST['recursosu']) : '', // Validación
    'numeros' => $_POST['numerosu'],
    'id_usuario' => intval($_SESSION['id_usuario'])
);

// Depuración
// file_put_contents('debug_actualizar.log', print_r($data, true));

// var_dump($data);

echo $Eventos->actualizarEvento($data);
?>
