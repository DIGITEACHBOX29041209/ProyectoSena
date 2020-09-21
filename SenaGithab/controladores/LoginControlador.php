<?php

require_once '../modelos/ModeloLogin/login_Dao.php';

class LoginControlador {

    private $datos = array();

    public function __construct($datos) {
        $this->datos = $datos;
        $this->LoginControlador();
    }

    public function LoginControlador() {

        switch ($this->datos["rutaSena"]) {
            case "gestionDeAccesoLogin":
                $gestarLogin_s = new login_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $datosUsuario_s = $gestarLogin_s->seleccionarId($this->datos);
                if ($datosUsuario_s['exitoSeleccionId'] == 0) {
                    session_start();
                    $_SESSION['datosUusario'] = $datosUsuario_s['registroEncontrado'];
                    header("location:vistasAdmin/VistaPrincipalAdmin.php");
                } else {
                    if ($datosUsuario_s['exitoSeleccionId'] == 1) {
                        session_start();
                        $_SESSION['datosUusario'] = $datosUsuario_s['registroEncontrado'];
                        header("location:vistasAdmin/VistaPrincipalEmpleado.php");
                    } else {
                        session_start();
                        $_SESSION['mensaje'] = 'No se pudo encontrar informacion de este usuario';
                        header("location:Login.php");
                    }
                }
                break;
            default :
                break;
        }
    }

}
