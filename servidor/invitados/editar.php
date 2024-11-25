<?php session_start();
    include ('../../clases/invitados.php');
    $Invitados = new Invitados();
    $id_invitado = $_POST['id_invitado'];
    echo json_encode( $Invitados->editarInvitado($id_invitado));
?>    