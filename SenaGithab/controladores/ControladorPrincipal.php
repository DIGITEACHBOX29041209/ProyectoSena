<?php

include_once '../modelos/ModeloEmpleado/ValidadorEmpleado.php';
include_once 'EmpleadoControlador.php';

class ControladorPrincipal {

    private $datos = array();

    public function __construct() {
        if (!empty($_POST) && isset($_POST["rutaSena"])) {
            $this->datos = $_POST;
        }
        if (!empty($_GET) && isset($_GET["rutaSena"])) {
            $this->datos = $_GET;
        }
        $this->control();
    }

    public function control() {
        switch ($this->datos['rutaSena']) {
            /* Registro del empleado tabla empleado*/
            case "gestionDeRegistro": 
                if ($this->datos['rutaSena'] === "gestionDeRegistro") {
                    $validarRegistro = new ValidadorEmpleado();
                    $erroresValidacion = $validarRegistro->ValidadorFormualrioEmpleado($this->datos);
                }
                if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                    session_start();
                    $_SESSION['erroresValidacion'] = $erroresValidacion;
                    if ($this->datos['rutaSena'] == "gestionDeRegistro") {
                        header("location:vista/VistasAdmin/FormRegistroEmpleado.php");
                    }
                } else {
                    $EmpleadoControlador = new EmpleadoControlador($this->datos);
                }
                break;
            default:
                break;
        }
    }

}

