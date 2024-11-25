<?php 
session_start();
include('../../clases/Recursos.php');
$Recursos = new Recursos();

if (isset($_POST['idRecurso'])) {
    $idRecurso = $_POST['idRecurso'];
    $datos = $Recursos->editarRecurso($idRecurso);

    echo json_encode($datos); // Devuelve los datos en formato JSON
} else {
    echo json_encode([]); // Devuelve un array vacío si no hay ID
}
?>

