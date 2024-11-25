<?php session_start();
    include ('../../clases/Recursos.php');
    $Recursos = new Recursos();
    $idRecurso = $_POST['idRecurso'];
    echo $Recursos->eliminarRecurso($idRecurso);
?>