<?php

include_once '../modelos/ModeloEmpleado/ValidadorEmpleado.php';
include_once 'EmpleadoControlador.php';
include_once 'ProvedorControlador.php';
include_once 'VentaControlador.php';
include_once '../modelos/ModeloProvedor/ValidadorProvedor.php';
include_once 'ProductoControlador.php';

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
            /* Registro del empleado tabla empleado */

            case "gestionDeRegistro":
                if ($this->datos['rutaSena'] === "gestionDeRegistro") {
                    $validarRegistro = new ValidadorEmpleado();
                    $erroresValidacion = $validarRegistro->ValidadorFormularioEmpleado($this->datos);
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

            case "gestionDeAcceso":
                if ($this->datos['rutaSena'] === "gestionDeAcceso") {
                    $validarRegistro = new ValidarLogin();
                    $erroresValidacion = $validarRegistro->ValidarFormularioLogeo($this->datos);
                }
                if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                    session_start();
                    $_SESSION['erroresValidacion'] = $erroresValidacion;
                    if ($this->datos['rutaSena'] == "gestionDeAcceso") {
                        header("location:vista/VistasAdmin/FormRegistroEmpleado.php");
                    }
                } else {
                    $ProvedorControlador = new ProvedorControlador($this->datos);
                }
                break;
            case "gestionDeRegistroProvedor":
                if ($this->datos['rutaSena'] === "gestionDeRegistroProvedor") {
                    $validarRegistroProvedor = new ValidadorProvedor();
                    $erroresValidacion = $validarRegistroProvedor->ValidadorFormularioProvedor($this->datos);
                }
                if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                    session_start();
                    $_SESSION['erroresValidacion'] = $erroresValidacion;
                    if ($this->datos['rutaSena'] == "gestionDeRegistroProvedor") {
                        header("location:vista/VistasAdmin/FormRegistroProvedor.php");
                    }
                } else {
                    $ProvedorControlador = new ProvedorControlador($this->datos);
                }
                break;

            case "gestionDeRegistroVenta":
                $VentaControlador = new VentaControlador($this->datos);
                break;

            case "gestionarRegistroProducto":
                $ProductoControlador = new ProductoControlador($this->datos);

                break;
            case "gestionDeTablasEmpeladoo":
                $EmpleadoControlador = new EmpleadoControlador($this->datos);
                break;

            case "gestionDeTablasFacturaVenta":
                $EmpleadoControlador = new VentaControlador($this->datos);
                break;

            case "selectProductoInfo":
                $VentaControlador = new VentaControlador($this->datos);
                break;
            
            case "gestionDeTablasproveedor":
                $ProvedorControlador = new ProvedorControlador($this->datos);
                break;
                
            case "gestionDeTablasproducto":
                $ProductoControlador = new ProductoControlador($this->datos);
                break;
            default:
                break;
        }
    }
}
