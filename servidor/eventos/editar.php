<?php
session_start();
include('../../clases/Eventos.php');

$Eventos = new Eventos();
$id_evento = $_POST['id_evento'];

$resultado = $Eventos->editarEventos($id_evento);

// Imprime la respuesta para depurar
echo json_encode($resultado);
?>

