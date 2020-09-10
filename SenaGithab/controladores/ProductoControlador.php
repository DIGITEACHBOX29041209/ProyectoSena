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
            case "gestionDeRegistro":
                $gestarProducto_s = new Producto_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

                $insertoProducto_s = $gestarProducto_s->insertar($registro);
                $exitoInsercionProducto_s = $insertoProducto_s['inserto'];

                if ($exitoInsercionProducto_s == 1) {
                    session_start();
                    $_SESSION['mensaje'] = "Registrado con èxito para ingreso al sistema";
                    if ($this->datos['rutaSena'] == 'gestionDeRegistro') {//si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                        header("location:Login.php");
                    }
                } else {
                    session_start();
                    $_SESSION['nombre'] = $this->datos['documento'];
                    $_SESSION['descripcion'] = $this->datos['nombre'];
                    $_SESSION['cantidad'] = $this->datos['apellidos'];
                    $_SESSION['precioNeto'] = $this->datos['email'];
                    $_SESSION['precioProducto'] = $this->datos['telefono'];
                    $_SESSION['mensaje'] = "El registro no se pudo insertar";
                    if ($this->datos['rutaSena'] == 'gestionDeRegistro') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                        header("location:Login.php");
                    }
                }
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
                
            default :
                break;
        }
    }

}
