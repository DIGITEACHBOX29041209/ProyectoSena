<?php

require_once '../modelos/ModeloProducto/Producto_Dao.php';

class ProductoControlador {

    private $datos = array();

    public function __construct($datos) {
        $this->datos = $datos;
        $this->ProductoControlador();
    }

    public function ProductoControlador() {

        switch ($this->datos["rutaSena"]) {
            case "gestionarRegistroProducto":
                $gestarProducto_s = new Producto_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

                $insertoProducto_s = $gestarProducto_s->insertar($this->datos);
                session_start();
                $_SESSION['mensaje'] = "Registrado con èxito para ingreso al sistema";
                header("location:Login.php");
                
               
                
                break;
                
            case "gestionActualizar":
                 $gestarActProducto_s = new Producto_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD); //Se puede llamar de la misma manera gestar?

                $ActualizoProducto_s = $gestarActProducto_s->actualizar($registro);
                $exitoActualizarProducto_s = $ActualizoProducto_s['inserto'];

                if ($exitoActualizarProducto_s == 1) {
                    session_start();
                    $_SESSION['mensaje'] = "Actualizado con èxito";
                    if ($this->datos['rutaSena'] == 'gestionActualizar') {  //si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                        header("location:Login.php");
                    }
                } else {
                    session_start();
                    $_SESSION['prodidProducto'] = $this->datos['prodidProducto'];
                    $_SESSION['prodNombreProducto'] = $this->datos['prodNombreProducto'];
                    $_SESSION['prodDescripcionProducto'] = $this->datos['prodDescripcionProducto'];
                    $_SESSION['prodCantidadProducto'] = $this->datos['prodCantidadProducto'];
                    $_SESSION['prodPrecioNeto'] = $this->datos['prodPrecioNeto'];
                    $_SESSION['prodPrecioProducto'] = $this->datos['prodPrecioProducto'];
                    $_SESSION['mensaje'] = "La Atualizacion del producto no se pudo ingresar";
                    if ($this->datos['rutaSena'] == 'gestionActualizar') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                        header("location:Login.php");
                    }
                }
                break;
                
            case "gestionDeEliminadoBd":
                $gestarElimBdProducto_s = new Venta_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

                $EliminarBdProducto_s = $gestarElimBdProducto_s->Eliminadobd($id);
                $exitoEliminarBdProducto_s = $EliminarBdProducto_s['inserto'];

                if ($exitoEliminarBdProducto_s == 1) {
                    session_start();
                    $_SESSION['mensaje'] = "Eliminado con èxito de la base de datos del sistema";
                    if ($this->datos['rutaSena'] == 'gestionDeEliminadoBd') {  //si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                        header("location:Login.php");
                    }
                } else {
                    session_start();
                    $_SESSION['prodidProducto'] = $this->datos['prodidProducto'];
                    $_SESSION['prodNombreProducto'] = $this->datos['prodNombreProducto'];
                    $_SESSION['prodDescripcionProducto'] = $this->datos['prodDescripcionProducto'];
                    $_SESSION['prodCantidadProducto'] = $this->datos['prodCantidadProducto'];
                    $_SESSION['prodPrecioNeto'] = $this->datos['prodPrecioNeto'];
                    $_SESSION['prodPrecioProducto'] = $this->datos['prodPrecioProducto'];
                    $_SESSION['mensaje'] = "La eliminacion del provedor en base de datos no se pudo realizar";
                    if ($this->datos['rutaSena'] == 'gestionDeEliminadoBd') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                        header("location:Login.php");
                    }
                }
                break;

            case "gestionDeEliminadoLogico":
                $gestarElimProvedor_s = new Venta_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

                $EliminarPorvedor_s = $gestarElimProvedor_s->EliminadoLogico();
                $exitoEliminarProvedor_s = $EliminarPorvedor_s['inserto'];

                if ($exitoEliminarProvedor_s == 1) {
                    session_start();
                    $_SESSION['mensaje'] = "Eliminado con èxito del sistema";
                    if ($this->datos['rutaSena'] == 'gestionDeEliminadoLogico') {  //si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                        header("location:Login.php");
                    }
                } else {
                    session_start();
                    $_SESSION['prodidProducto'] = $this->datos['prodidProducto'];
                    $_SESSION['prodNombreProducto'] = $this->datos['prodNombreProducto'];
                    $_SESSION['prodDescripcionProducto'] = $this->datos['prodDescripcionProducto'];
                    $_SESSION['prodCantidadProducto'] = $this->datos['prodCantidadProducto'];
                    $_SESSION['prodPrecioNeto'] = $this->datos['prodPrecioNeto'];
                    $_SESSION['prodPrecioProducto'] = $this->datos['prodPrecioProducto'];
                    $_SESSION['mensaje'] = "La eliminacion del provedor no se pudo realizar";
                    if ($this->datos['rutaSena'] == 'gestionDeEliminadoLogico') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                        header("location:Login.php");
                    }
                }
                break;
                
            default :
                break;
        }
    }

}
