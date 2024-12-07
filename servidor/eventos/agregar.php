<?php session_start();
    include ('../../clases/Eventos.php');
    $Eventos = new Eventos();
    $data = array(
      'id_usuario' => $_SESSION['id_usuario'],
      'nombre_evento' => $_POST['nombre_evento'], 
      'hora_inicio' => $_POST['fecha'] . " " . $_POST['hora_inicio'],
      'hora_fin' => $_POST['fecha'] . " " . $_POST['hora_fin'], 
      'fecha' => $_POST['fecha'], 
      'lugar' => $_POST['lugar'],  
      'recursos' => implode(',', $_POST['recursos']), // Convierte el array en una cadena separada por comas
      'numeros' => $_POST['numeros']
  );
  
    echo $Eventos->agregar($data);

?>