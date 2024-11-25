<?php
include('../../clases/Recursos.php');
$Recursos = new Recursos();

$listaRecursos = $Recursos->obtenerRecursos(); // Suponiendo que tienes un método para obtenerlos

foreach ($listaRecursos as $recurso) {
    echo '<div class="form-check">';
    echo '<input class="form-check-input" type="checkbox" name="recursos[]" value="' . $recurso['idRecurso'] . '" id="recurso_' . $recurso['idRecurso'] . '">';
    echo '<label class="form-check-label" for="recurso_' . $recurso['idRecurso'] . '">' . $recurso['nombreRecurso'] . '</label>';
    echo '</div>';
}
?>
