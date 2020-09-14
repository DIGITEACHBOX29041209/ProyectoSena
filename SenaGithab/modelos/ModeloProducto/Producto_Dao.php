<?php

include_once  PATH.'modelos/ModeloEmpleado/ConBdMySql.php';

class Producto_Dao extends ConBdMySql {

    function __construct($servidor, $base, $loginBD, $passwordBD) {
        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarId($Id) {
        try {
            if (!isset($Id[2])) {
                $planConsulta = "SELECT * FROM `producto` WHERE proidProducto = $Id[0] or empCorreo = '$Id[1]' ";
                $listar = $this->conexion->prepare($planConsulta);
                $listar->execute();
            }
            $registroEncontrado = array();
            while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            if (count($registroEncontrado) == 0) {
                
                return ['exitoSeleccionId' => 1, 'registroEncontrado' => $registroEncontrado]; /* 1 exitoso */
            } else {
                return ['exitoSeleccionId' => 0, 'registroEncontrado' => $registroEncontrado];/* 0 pailas */
            }
        } catch (Exception $exc) {
            return ['exitoSeleccionId' => 2, 'registroEncontrado' => $exc->getTraceAsString()];
        }
    }
    

    public function insertar($registro) {
        try {
            $clavePrimariaConQueInserto = $this->ultimoInsertId();
            
            $idProducto = $clavePrimariaConQueInserto[0]->prodidProducto;
            $idProducto2 = $idProducto+1;
            $nombre = $registro['nombre'];
            $descripcion = $registro['descripcion'];
            $cantidad = $registro['cantidad'];
            $precioNeto = $registro['precioNeto'];
            $precioProducto = $registro['precioProducto'];
            $inserta = $this->conexion->prepare("INSERT INTO `producto`(prodidProducto, prodNombreProducto, prodDescripcionProducto, prodCantidadProducto, prodPrecioNeto, prodPrecioProducto, prod_Estado) VALUES ('$idProducto2', '$nombre', '$descripcion', '$cantidad', '$precioNeto', '$precioProducto','1')");
            $inserta->execute();
            $clavePrimariaConQueInserto = $this->ultimoInsertId();
            
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



    public function actualizarId($registro) {
    try {
        $nombre = $registro['nombre'];
        $descripcion = $registro['descripcion'];
        $cantidad = $registro['cantidad'];
        $precioNeto = $registro['precioNeto'];
        $precioProducto = $registro['precioProducto'];
        $inserta = $this->conexion->prepare("UPDATE `producto` SET `prodNombreProducto`='$nombre',`prodDescripcionProducto`='$descripcion',`prodCantidadProducto`='$cantidad'`prodPrecioNeto`='$precioNeto',`prodPrecioProducto`='$precioProducto' WHERE prodidProducto = '$Id' ");
        $insercion = $inserta->execute();
        $clavePrimariaConQueInserto = "0";
        return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
    } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
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
            return $registroEncontrado;        } catch (Exception $exc) {
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
}

