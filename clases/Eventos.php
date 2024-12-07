<?php
include('Conexion.php');
class Eventos extends Conexion
{
    public function mostrarEventos($id_usuario, $fecha)
    {
        $conexion = Conexion::conectar();
        if ($fecha != "") {
            $sql = "SELECT 
                    e.id_evento,
                    e.nombre_evento,
                    DATE_FORMAT(e.hora_inicio, '%H:%i:%s') AS hora_inicio,
                    DATE_FORMAT(e.hora_fin, '%H:%i:%s') AS hora_fin,
                    DATE_FORMAT(e.fecha, '%d-%m-%Y') AS fecha,
                    e.lugar,
                    GROUP_CONCAT(r.nombreRecurso SEPARATOR ', ') AS recursos,
                    e.numeros
                FROM t_eventos AS e
                LEFT JOIN t_recursos AS r ON FIND_IN_SET(r.idRecurso, e.recursos)
                WHERE e.id_usuario = '$id_usuario' 
                AND e.fecha LIKE '%" . $fecha . "%'
                GROUP BY e.id_evento";
        } else {
            $sql = "SELECT 
                    e.id_evento,
                    e.nombre_evento,
                    DATE_FORMAT(e.hora_inicio, '%H:%i:%s') AS hora_inicio,
                    DATE_FORMAT(e.hora_fin, '%H:%i:%s') AS hora_fin,
                    DATE_FORMAT(e.fecha, '%d-%m-%Y') AS fecha,
                    e.lugar,
                    GROUP_CONCAT(r.nombreRecurso SEPARATOR ', ') AS recursos,
                    e.numeros
                FROM t_eventos AS e
                LEFT JOIN t_recursos AS r ON FIND_IN_SET(r.idRecurso, e.recursos)
                WHERE e.id_usuario = '$id_usuario'
                GROUP BY e.id_evento";
        }

        $respuesta = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
    }



    public function editarEventos($id_evento)
    {
        $conexion = Conexion::conectar();

        // Obtener los datos del evento
        $sql_evento = "SELECT 
                        e.id_evento, 
                        e.nombre_evento, 
                        DATE_FORMAT(e.hora_inicio, '%H:%i:%s') AS hora_inicio,
                        DATE_FORMAT(e.hora_fin, '%H:%i:%s') AS hora_fin,
                        e.fecha, 
                        e.lugar, 
                        e.numeros,
                        e.recursos 
                    FROM t_eventos AS e
                    WHERE e.id_evento = ?";
        $query_evento = $conexion->prepare($sql_evento);
        $query_evento->bind_param('i', $id_evento);
        $query_evento->execute();
        $resultado_evento = $query_evento->get_result();
        $evento = $resultado_evento->fetch_assoc();

        // Obtener todos los recursos disponibles
        $sql_recursos = "SELECT idRecurso, nombreRecurso FROM t_recursos";
        $resultado_recursos = mysqli_query($conexion, $sql_recursos);

        $recursos_disponibles = [];
        while ($row = mysqli_fetch_assoc($resultado_recursos)) {
            // Verificar si el recurso está asociado al evento actual
            $row['asignado'] = in_array($row['idRecurso'], explode(',', $evento['recursos']));
            $recursos_disponibles[] = $row;
        }

        // Agregar recursos disponibles al resultado del evento
        $evento['recursos_disponibles'] = $recursos_disponibles;

        return $evento;
    }



    public function agregar($data)
    {
        $conexion = Conexion::conectar();
        $sql = "INSERT INTO t_eventos ( id_usuario,
                                            nombre_evento,
                                            hora_inicio,
                                            hora_fin,
                                            fecha,
                                            lugar,
                                            recursos,
                                            numeros) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            'isssssss',
            $data['id_usuario'],
            $data['nombre_evento'],
            $data['hora_inicio'],
            $data['hora_fin'],
            $data['fecha'],
            $data['lugar'],
            $data['recursos'],
            $data['numeros']
        );
        return $query->execute();
    }

    public function eliminarEvento($id_evento)
    {
        $conexion = Conexion::conectar();
        $sql = "DELETE FROM t_eventos WHERE id_evento = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i', $id_evento);
        return $query->execute();
    }


    public function actualizarEvento($data)
    {
        $conexion = Conexion::conectar();

        // Convertir los recursos seleccionados en una cadena separada por comas
        // $recursos = implode(',', $data['recursos']); // `recursos` debería ser un array de IDs

        // var_dump($data);die();
        $sql = "UPDATE t_eventos SET 
                        id_usuario = ?,
                        nombre_evento = ?,
                        hora_inicio = ?,
                        hora_fin = ?,
                        fecha = ?,
                        lugar = ?,
                        recursos = ?, -- Aquí almacenamos la cadena
                        numeros = ?
                    WHERE id_evento = ?";

        $query = $conexion->prepare($sql);
        $query->bind_param(
            'isssssssi',
            $data['id_usuario'],
            $data['nombre_evento'],
            $data['hora_inicio'],
            $data['hora_fin'],
            $data['fecha'],
            $data['lugar'],
            $data['recursos'], // Pasamos la cadena de recursos
            $data['numeros'],
            $data['id_evento']
        );

        return $query->execute();
    }


    public function mostrarInvitadosEvento($id_evento)
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT e.id_evento, e.nombre_evento, e.id_usuario, e.hora_inicio, e.hora_fin, e.fecha, e.lugar, e.numeros, i.id_invitado, i.nombre_invitado, i.email, r.idRecurso, r.nombreRecurso FROM t_eventos e INNER JOIN t_invitados i ON i.id_evento = e.id_evento INNER JOIN t_recursos r ON FIND_IN_SET(r.idRecurso, e.recursos) WHERE e.id_evento = '$id_evento' ";
        $respuesta = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
    }

    public function hayInvitados($id_evento)
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT COUNT(*) as total
                    FROM t_invitados
                    WHERE id_evento = '$id_evento'";
        $respuesta = mysqli_query($conexion, $sql);
        return mysqli_fetch_array($respuesta)['total'];
    }

    public function fullCalendar($id_usuario)
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT 
                id_evento AS id,
                nombre_evento AS title,
                hora_inicio AS start,
                hora_fin AS end
            FROM
                t_eventos
            WHERE id_usuario = '$id_usuario'";

        $respuesta = mysqli_query($conexion, $sql);
        $eventos = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        return json_encode($eventos);
    }
}
