<?php
    session_start();
    include "../../clases/Auth.php";

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $Auth = new Auth();

    if ($Auth->logear($usuario, $password)) {
        header("location:../../modulos/inicio.php");
    } else {
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Usuario o contraseña incorrectos.',
                confirmButtonText: 'Aceptar'
            }).then(function() {
                window.location = '../../index.php';
            });
        </script>
        </body>
        </html>
        ";
    }
?>

