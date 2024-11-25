<?php session_start();
    include('../../clases/Eventos.php');
    $Eventos = new Eventos();
    $id_evento = $_POST['id_evento'];
    $Eventos->editarEventos($id_evento);
    echo json_encode( $Eventos->editarEventos($id_evento));

?>    