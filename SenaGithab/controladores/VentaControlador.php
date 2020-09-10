<?php

require_once '../modelos/ModeloVenta/Venta_Dao.php';

class VentaControlador {

    private $datos = array();

    public function __construct($datos) {
        $this->datos = $datos;
        $this->VentaControlador();
    }

    public function VentaControlador() {

        switch ($this->datos["rutaSena"]) {

            case "gestionDeRegistro":
                $gestarVenta_s = new Venta_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

                $insertoVenta_s = $gestarVenta_s->insertar($registro);
                $exitoInsercionVenta_s = $insertoVenta_s['inserto'];

                if ($exitoInsercionVenta_s == 1) {
                    session_start();
                    $_SESSION['mensaje'] = "Registrado con èxito para ingreso al sistema";
                    if ($this->datos['rutaSena'] == 'gestionDeRegistro') {  //si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                        header("location:Login.php");
                    }
                } else {
                    session_start();
                    $_SESSION['facIdFactura'] = $this->datos['facIdFactura'];
                    $_SESSION['venCantidadProducto'] = $this->datos['venCantidadProducto'];
                    $_SESSION['venPrecioUnidad'] = $this->datos['venPrecioUnidad'];
                    $_SESSION['venDescuentoRealizado'] = $this->datos['venDescuentoRealizado'];
                    $_SESSION['venPrecioFinal'] = $this->datos['venPrecioFinal'];
                    $_SESSION['prodidProducto'] = $this->datos['prodidProducto'];
                    $_SESSION['mensaje'] = "El registro de la venta no se pudo insertar";
                    if ($this->datos['rutaSena'] == 'gestionDeRegistro') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                        header("location:Login.php");
                    }
                }
                break;

            case "gestionDeActualizar":
                $gestarActVenta_s = new Venta_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD); //Se puede llamar de la misma manera gestar?

                $ActualizoVenta_s = $gestarActVenta_s->actualizar($registro);
                $exitoActualizarVenta_s = $ActualizoVenta_s['inserto'];

                if ($exitoActualizarVenta_s == 1) {
                    session_start();
                    $_SESSION['mensaje'] = "Actualizado con èxito para ingreso al sistema";
                    if ($this->datos['rutaSena'] == 'gestionDeActualizar') {  //si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                        header("location:Login.php");
                    }
                } else {
                    session_start();
                    $_SESSION['facIdFactura'] = $this->datos['facIdFactura'];
                    $_SESSION['venCantidadProducto'] = $this->datos['venCantidadProducto'];
                    $_SESSION['venPrecioUnidad'] = $this->datos['venPrecioUnidad'];
                    $_SESSION['venDescuentoRealizado'] = $this->datos['venDescuentoRealizado'];
                    $_SESSION['venPrecioFinal'] = $this->datos['venPrecioFinal'];
                    $_SESSION['prodidProducto'] = $this->datos['prodidProducto'];
                    $_SESSION['mensaje'] = "La Atualizacion de la venta no se pudo insertar";
                    if ($this->datos['rutaSena'] == 'gestionDeActualizar') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                        header("location:Login.php");
                    }
                }
                break;

            case "gestionDeEliminadoBd":
                $gestarElimBdVenta_s = new Venta_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

                $EliminarBdVenta_s = $gestarElimBdVenta_s->Eliminadobd($id);
                $exitoEliminarBdVenta_s = $EliminarBdVenta_s['inserto'];

                if ($exitoEliminarBdVenta_s == 1) {
                    session_start();
                    $_SESSION['mensaje'] = "Eliminado con èxito de la base de datos del sistema";
                    if ($this->datos['rutaSena'] == 'gestionDeEliminadoBd') {  //si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                        header("location:Login.php");
                    }
                } else {
                    session_start();
                    $_SESSION['facIdFactura'] = $this->datos['facIdFactura'];
                    $_SESSION['venCantidadProducto'] = $this->datos['venCantidadProducto'];
                    $_SESSION['venPrecioUnidad'] = $this->datos['venPrecioUnidad'];
                    $_SESSION['venDescuentoRealizado'] = $this->datos['venDescuentoRealizado'];
                    $_SESSION['venPrecioFinal'] = $this->datos['venPrecioFinal'];
                    $_SESSION['prodidProducto'] = $this->datos['prodidProducto'];
                    $_SESSION['mensaje'] = "La eliminacion de venta en base de datos no se pudo realizar";
                    if ($this->datos['rutaSena'] == 'gestionDeEliminadoBd') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                        header("location:Login.php");
                    }
                }
                break;

            case "gestionDeEliminadoLogico":
                $gestarElimVenta_s = new Venta_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

                $EliminarVenta_s = $gestarElimVenta_s->EliminadoLogico();
                $exitoEliminarVenta_s = $EliminarVenta_s['inserto'];

                if ($exitoEliminarVenta_s == 1) {
                    session_start();
                    $_SESSION['mensaje'] = "Eliminado con èxito del sistema";
                    if ($this->datos['rutaSena'] == 'gestionDeEliminadoLogico') {  //si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                        header("location:Login.php");
                    }
                } else {
                    session_start();
                    $_SESSION['facIdFactura'] = $this->datos['facIdFactura'];
                    $_SESSION['venCantidadProducto'] = $this->datos['venCantidadProducto'];
                    $_SESSION['venPrecioUnidad'] = $this->datos['venPrecioUnidad'];
                    $_SESSION['venDescuentoRealizado'] = $this->datos['venDescuentoRealizado'];
                    $_SESSION['venPrecioFinal'] = $this->datos['venPrecioFinal'];
                    $_SESSION['prodidProducto'] = $this->datos['prodidProducto'];
                    $_SESSION['mensaje'] = "La eliminacion de la venta no se pudo realizar";
                    if ($this->datos['rutaSena'] == 'gestionDeEliminadoLogico') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                        header("location:Login.php");
                    }
                }
                break;

            default:
                break;
        }
    }

}
