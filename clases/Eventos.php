<?php
include('Conexion.php');
class Eventos extends Conexion
{
    public function mostrarEventos($id_usuario, $fecha)
    {
        $conexion = Conexion::conectar();
        if($fecha != ""){
            $sql = "SELECT id_evento, nombre_evento, DATE_FORMAT(hora_inicio, '%H:%i:%s') AS hora_inicio,
                                              DATE_FORMAT(hora_fin, '%H:%i:%s') AS hora_fin,
                                              DATE_FORMAT (fecha, '%d-%m-%Y') AS fecha,
                                              lugar,
                                              recursos,
                                              numeros        
                    FROM t_eventos
                    WHERE id_usuario = '$id_usuario' AND fecha LIKE '%". $fecha ."%' ";
        }else {
            $sql = "SELECT id_evento, nombre_evento, DATE_FORMAT(hora_inicio, '%H:%i:%s') AS hora_inicio,
                                              DATE_FORMAT(hora_fin, '%H:%i:%s') AS hora_fin,
                                              DATE_FORMAT (fecha, '%d-%m-%Y') AS fecha,
                                              lugar,
                                              recursos,
                                              numeros        
                    FROM t_eventos
                    WHERE id_usuario = '$id_usuario'";
        }
        $respuesta = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
    }

    public function editarEventos($id_evento)
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT id_evento, nombre_evento, DATE_FORMAT(hora_inicio, '%H:%i:%s') AS hora_inicio,
                                              DATE_FORMAT(hora_fin, '%H:%i:%s') AS hora_fin,
                                              fecha,
                                              lugar,
                                              recursos,
                                              numeros        
                    FROM t_eventos 
                    WHERE id_evento = '$id_evento'";
        $respuesta = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
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
        $sql = "UPDATE t_eventos SET 
                        id_usuario = ?,
                        nombre_evento = ?,
                        hora_inicio = ?,
                        hora_fin = ?,
                        fecha = ?,
                        lugar = ?,
                        recursos = ?,
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
            $data['recursos'],
            $data['numeros'],
            $data['id_evento']
        );

        return $query->execute();
    }

    public function mostrarInvitadosEvento($id_evento)
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM v_invitados WHERE idEvento = '$id_evento' ";
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
