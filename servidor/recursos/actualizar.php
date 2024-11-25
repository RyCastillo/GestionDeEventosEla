<?php
session_start();
include('../../clases/Recursos.php');

// Evita cualquier salida no deseada
ob_clean();
header("Content-Type: text/plain");

if (isset($_POST['idRecurso']) && isset($_POST['nombreRecursou'])) {
    $Recursos = new Recursos();

    $data = array(
        "idRecurso" => $_POST['idRecurso'],
        "nombreRecurso" => $_POST['nombreRecursou']
    );

    $resultado = $Recursos->actualizarRecurso($data);

    if ($resultado) {
        echo 1; // Éxito
    } else {
        echo 0; // Error en la actualización
    }
} else {
    echo 0; // Faltan parámetros
}
?>


