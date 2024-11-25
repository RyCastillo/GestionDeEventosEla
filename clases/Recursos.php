<?php
    include ('Conexion.php');

    class Recursos extends Conexion {
        public function mostrarRecursos($idRecurso = null) {
            $conexion = Conexion::conectar();
            // Si $idRecurso es null, obtener todos los recursos
            $sql = "SELECT * FROM t_recursos" . ($idRecurso ? " WHERE idRecurso = '$idRecurso'" : "");
            $respuesta = mysqli_query($conexion, $sql);
            return $respuesta ? mysqli_fetch_all($respuesta, MYSQLI_ASSOC) : [];
        }
        
        public function agregarRecurso($data) {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_recursos (nombreRecurso) VALUES (?)"; // No se usa idRecurso
            $query = $conexion->prepare($sql);
            $query->bind_param('s', $data['nombreRecurso']); // Solo enlaza nombreRecurso
        
            return $query->execute();
        }
        

        public function editarRecurso($idRecurso) {
            $conexion = Conexion::conectar();
            $sql = "SELECT idRecurso, nombreRecurso FROM t_recursos WHERE idRecurso = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param("i", $idRecurso); // Vincula el ID del recurso como entero
            $query->execute();
            $resultado = $query->get_result();
        
            return $resultado->fetch_all(MYSQLI_ASSOC); // Devuelve los datos como array asociativo
        }
        
        
        

        public function eliminarRecurso($idRecurso){
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM t_recursos WHERE idRecurso = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idRecurso);
            return $query->execute();
        }

        
        public function actualizarRecurso($data) {
            $conexion = Conexion::conectar();
            $sql = "UPDATE t_recursos SET nombreRecurso = ? WHERE idRecurso = ?";
            $query = $conexion->prepare($sql);
        
            if (!$query) {
                return false; // Error al preparar la consulta
            }
        
            $query->bind_param('si', $data['nombreRecurso'], $data['idRecurso']);
        
            if ($query->execute()) {
                return true; // Operación exitosa
            } else {
                return false; // Error al ejecutar la consulta
            }
        }
        
        
        
        
    }
?>