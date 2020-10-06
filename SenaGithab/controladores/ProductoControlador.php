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
                header("location:Controlador.php?rutaSena=gestionDeTablasproducto");
                break;

            case "actualizarProducto":
                $gestarProducto = new Producto_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $consultaDeProducto = $gestarProducto->seleccionarId(array($this->datos['idAct'])); //Se consulta el libro para traer los datos.
                session_start();
                $_SESSION['datos'] = $consultaDeProducto;
                header("location: vistasAdmin/VistaPrincipalAdmin.php?contenido=VistaActualizarProducto.php");
                break;

            case "eliminarProducto":
                $gestarProducto = new Producto_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $gestarProducto->Eliminadobd(array($this->datos['idAct'])); // BORRADO FÍSICO
//                $gestarLibros->eliminarLogico(array($this->datos['idAct']));// BORRADO LÓGICO
                session_start();
                $_SESSION['mensaje'] = "Borrado exitoso!!! ";
                header("location:Controlador.php?rutaSena=gestionDeTablasproducto");
                break;

            case "gestionDeEliminadoLogico":
                $gestarElimProvedor_s = new Venta_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $EliminarPorvedor_s = $gestarElimProvedor_s->EliminadoLogico();
                $exitoEliminarProvedor_s = $EliminarPorvedor_s['inserto'];
                if ($exitoEliminarProvedor_s == 1) {
                    session_start();
                    $_SESSION['mensaje'] = "Eliminado con èxito del sistema";
                    if ($this->datos['rutaSena'] == 'gestionDeEliminadoLogico') {  //si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                        header("location:Controlador.php?rutaSena=gestionDeTablasproducto");
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
                        header("location:Controlador.php?rutaSena=gestionDeTablasproducto");
                    }
                }
                break;
                
            case "gestionDeTablasproducto":
                $gestarTablas_s = new Producto_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $insertoProducto_s = $gestarTablas_s->seleccionarTodos();
                session_start(); //se abre sesión para almacenar en ella el mensaje de inserción
                $_SESSION['datos'] = $insertoProducto_s;
                header("location: vistasAdmin/VistaPrincipalAdmin.php?contenido=VistaProducto.php");
                break;

            case "confirmaActualizarProducto":
                $gestarProducto = new Producto_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $actualizarProducto = $gestarProducto->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.               
                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                 header("location:Controlador.php?rutaSena=gestionDeTablasproducto");
                break;
            default :
                break;
        }
    }

}
