<?php 
session_start();
include ('../../clases/Recursos.php');
$Recursos = new Recursos();

$data = array(
    "nombreRecurso" => $_POST['nombreRecurso']
);

echo $Recursos->agregarRecurso($data) ? 1 : 0;
?>
