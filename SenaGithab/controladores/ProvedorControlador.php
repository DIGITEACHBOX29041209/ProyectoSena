<?php

require_once '../modelos/ModeloProvedor/Proveedor_Dao.php';

class ProvedorControlador {

    private $datos = array();

    public function __construct($datos) {
        $this->datos = $datos;
        $this->ProvedorControlador();
    }

    public function ProvedorControlador() {

        switch ($this->datos["rutaSena"]) {

            case "gestionDeRegistroProvedor":
                $gestarProvedor_s = new Proveedor_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

                $insertoProvedor_s = $gestarProvedor_s->insertar($this->datos);
                $exitoInsercionProvedor_s = $insertoProvedor_s['inserto'];

                if ($exitoInsercionProvedor_s == 1) {
                    session_start();
                    $_SESSION['mensaje'] = "Registrado con èxito para ingreso al sistema";
                    if ($this->datos['rutaSena'] == 'gestionDeRegistroProvedor') {  //si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                        header("location:Login.php");
                    }
                } else {
                    session_start();
                    $_SESSION['IdProvedores'] = $this->datos['IdProvedores'];
                    $_SESSION['NombreProvedor'] = $this->datos['NombreProvedor'];
                    $_SESSION['DireccionProvedor'] = $this->datos['DireccionProvedor'];
                    $_SESSION['TelefonoProvedor'] = $this->datos['TelefonoProvedor'];
                    $_SESSION['mensaje'] = "El registro de la venta no se pudo insertar";
                    if ($this->datos['rutaSena'] == 'gestionDeRegistroProvedor') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                        header("location:Login.php");
                    }
                }
                break;

            case "gestionDeActualizarProvedor":
                $gestarActProvedor_s = new Proveedor_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD); //Se puede llamar de la misma manera gestar?

                $ActualizoProvedor_s = $gestarActProvedor_s->actualizar($this->datos);
                $exitoActualizarProvedor_s = $ActualizoProvedor_s['inserto'];

                if ($exitoActualizarProvedor_s == 1) {
                    session_start();
                    $_SESSION['mensaje'] = "Actualizado con èxito para ingreso al sistema";
                    if ($this->datos['rutaSena'] == 'gestionDeActualizarProvedor') {  //si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                        header("location:Login.php");
                    }
                } else {
                    session_start();
                    $_SESSION['IdProvedores'] = $this->datos['IdProvedores'];
                    $_SESSION['NombreProvedor'] = $this->datos['NombreProvedor'];
                    $_SESSION['DireccionProvedor'] = $this->datos['DireccionProvedor'];
                    $_SESSION['TelefonoProvedor'] = $this->datos['TelefonoProvedor'];
                    $_SESSION['mensaje'] = "La Atualizacion del provedor no se pudo insertar";
                    if ($this->datos['rutaSena'] == 'gestionDeActualizarProvedor') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                        header("location:Login.php");
                    }
                }
                break;

            case "gestionDeEliminadoBdProvedor":
                $gestarElimBdProvedor_s = new Proveedor_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

                $EliminarBdProvedor_s = $gestarElimBdProvedor_s->Eliminadobd($id);
                $exitoEliminarBdProvedor_s = $EliminarBdProvedor_s['inserto'];

                if ($exitoEliminarBdProvedor_s == 1) {
                    session_start();
                    $_SESSION['mensaje'] = "Eliminado con èxito de la base de datos del sistema";
                    if ($this->datos['rutaSena'] == 'gestionDeEliminadoBdProvedor') {  //si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                        header("location:Login.php");
                    }
                } else {
                    session_start();
                    $_SESSION['IdProvedores'] = $this->datos['IdProvedores'];
                    $_SESSION['NombreProvedor'] = $this->datos['NombreProvedor'];
                    $_SESSION['DireccionProvedor'] = $this->datos['DireccionProvedor'];
                    $_SESSION['TelefonoProvedor'] = $this->datos['TelefonoProvedor'];
                    $_SESSION['mensaje'] = "La eliminacion del provedor en base de datos no se pudo realizar";
                    if ($this->datos['rutaSena'] == 'gestionDeEliminadoBdProvedor') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                        header("location:Login.php");
                    }
                }
                break;

            case "gestionDeEliminadoLogicoProvedor":
                $gestarElimProvedor_s = new Proveedor_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

                $EliminarPorvedor_s = $gestarElimProvedor_s->EliminadoLogico();
                $exitoEliminarProvedor_s = $EliminarPorvedor_s['inserto'];

                if ($exitoEliminarProvedor_s == 1) {
                    session_start();
                    $_SESSION['mensaje'] = "Eliminado con èxito del sistema";
                    if ($this->datos['rutaSena'] == 'gestionDeEliminadoLogicoProvedor') {  //si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                        header("location:Login.php");
                    }
                } else {
                    session_start();
                    $_SESSION['IdProvedores'] = $this->datos['IdProvedores'];
                    $_SESSION['NombreProvedor'] = $this->datos['NombreProvedor'];
                    $_SESSION['DireccionProvedor'] = $this->datos['DireccionProvedor'];
                    $_SESSION['TelefonoProvedor'] = $this->datos['TelefonoProvedor'];
                    $_SESSION['mensaje'] = "La eliminacion del provedor no se pudo realizar";
                    if ($this->datos['rutaSena'] == 'gestionDeEliminadoLogicoProvedor') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                        header("location:Login.php");
                    }
                }
                break;
            case "gestionDeTablasproveedor":
                $gestarTablas_s = new Proveedor_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $insertoUsuario_s = $gestarTablas_s->seleccionarTodos($this->datos);
                session_start(); //se abre sesión para almacenar en ella el mensaje de inserción
                $_SESSION['mensaje'] = "Se entontraron datos para esta tabla";
                $_SESSION['datosProveedorTabla'] = $insertoUsuario_s;
                header("location:vistasAdmin/FormRegistroVenta.php");
                break;

            default:
                break;
        }
    }

}
