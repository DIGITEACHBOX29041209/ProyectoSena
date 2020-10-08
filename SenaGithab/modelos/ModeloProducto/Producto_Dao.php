<?php

include_once PATH . 'modelos/ConBdMySql.php';

class Producto_Dao extends ConBdMySql {

    function __construct($servidor, $base, $loginBD, $passwordBD) {
        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarId($IdProducto) {
        try {
            $planConsulta = "SELECT * FROM producto WHERE prodidProducto = $IdProducto[0]";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute();

            $registroEncontrado = array();
            while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            return $registroEncontrado;
        } catch (Exception $exc) {
            return ['exitoSeleccionId' => 2, 'registroEncontrado' => $exc->getTraceAsString()];
        }
    }

    public function insertar($registro) {
        try {
            $clavePrimariaConQueInserto = $this->ultimoInsertId();
            $idProducto = $clavePrimariaConQueInserto[0]->prodidProducto;
            $idProducto2 = $idProducto + 1;
            $nombre = $registro['nombre'];
            $descripcion = $registro['descripcion'];
            $cantidad = $registro['cantidad'];
            $precioNeto = $registro['precioNeto'];
            $precioProducto = $registro['precioProducto'];
            $Proveedor = $registro['Proveedor'];
            $inserta = $this->conexion->prepare("INSERT INTO `producto`(prodidProducto, prodNombreProducto, prodDescripcionProducto, prodCantidadProducto, prodPrecioNeto, prodPrecioProducto, prod_Estado) VALUES ('$idProducto2', '$nombre', '$descripcion', '$cantidad', '$precioNeto', '$precioProducto','1')");
            $inserta->execute();
            $clavePrimariaConQueInserto = $this->ultimoInsertId();
            $inserta2 = $this->conexion->prepare("INSERT INTO `producto_proveedores`( `proEstado`, `provIdProvedores`, `prodidProducto`) VALUES ('1','$Proveedor','$idProducto2')");
            $inserta2->execute();
            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (Exception $exc) {

            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function listarProducto() {
        try {
            $planConsulta = "SELECT * FROM producto ";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute();
            $registroEncontrado = array();
            while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            return ['exitoListar' => 1, 'resultado' => $registroEncontrado];
        } catch (Exception $exc) {
            return ['exitoListar' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function eliminarId($Id) {
        try {
            $inserta = $this->conexion->prepare("DELETE FROM `producto` WHERE proidProducto = '$Id'");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Borro correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function actualizar($registro) {
        try {
            $Id = $registro[0]['idProducto'];
            $nombre = $registro[0]['nombre'];
            $descripcion = $registro[0]['descripcion'];
            $cantidad = $registro[0]['cantidad'];
            $precioNeto = $registro[0]['precioNeto'];
            $precioProducto = $registro[0]['precioProducto'];
            if (isset($Id)) {
                $actualizar = $this->conexion->prepare("UPDATE `producto` SET `prodNombreProducto`='$nombre',`prodDescripcionProducto`='$descripcion',`prodCantidadProducto`=$cantidad,`prodPrecioNeto`=$precioNeto,`prodPrecioProducto`=$precioProducto WHERE `prodidProducto`=$Id");
                $actualizar->execute();
                return ['actualizar' => 1, 'mensaje' => "Actualizo correctamente"];
            }
        } catch (Exception $exc) {
            return ['actualizar' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function ultimoInsertId() {
        try {
            $planConsulta = "SELECT * FROM producto ORDER BY prodidProducto DESC LIMIT 1";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute();
            $registroEncontrado = array();
            while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            return $registroEncontrado;
        } catch (Exception $exc) {
            return ['exitoSeleccionId' => 2, 'registroEncontrado' => $exc->getTraceAsString()];
        }
    }

    public function EliminadoLogico($Id) {
        try {
            $inserta = $this->conexion->prepare("UPDATE producto SET prod_Estado='3' WHERE prodidProducto = '$Id'");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function seleccionarTodos() {
        try {

            $planConsulta = "SELECT * FROM producto";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute();

            $registroEncontrado = array();
            while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            return $registroEncontrado;
        } catch (Exception $exc) {
            return ['exitoSeleccionId' => 2, 'registroEncontrado' => $exc->getTraceAsString()];
        }
    }

    public function Eliminadobd($registro) {
        try {
            $IdProducto = $registro[0]['prodidProducto'];
            $inserta = $this->conexion->prepare("DELETE FROM `producto` WHERE prodidProducto = '$IdProducto'");
            $inserta->execute();
            return ['inserta' => 1, 'resultado' => 'Borro correctamente'];
        } catch (Exception $exc) {
            return ['inserta' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function selectTablasProveedor() {
        try {
            $consulta = $this->conexion->prepare("SELECT * FROM `provedores` ");
            $consulta->execute();

            $registroEncontrado = array();

            while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            return $registroEncontrado;
        } catch (Exception $exc) {
            return ['inserta' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

}
