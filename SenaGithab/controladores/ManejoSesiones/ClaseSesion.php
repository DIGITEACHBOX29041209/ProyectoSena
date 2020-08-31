<?php

class ClaseSesion {

    function crearSesion($usuario_s) {

        $_SESSION['autenticado'] = "1";//https://www.it-swarm.dev/es/php/como-puedo-obtener-el-id-de-sesion-en-php-y-mostrarlo/1043905761/

        $estado_session = session_status();
        if ($estado_session == PHP_SESSION_DISABLED) {
            session_start();
        }
        //
    }

    function cerrarSesion() {

        session_start();
        session_destroy();

        header("Location: login.php");
    }

}
//https://code.tutsplus.com/es/tutorials/how-to-use-sessions-and-session-variables-in-php--cms-31839
?>

