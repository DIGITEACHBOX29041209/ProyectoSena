<?php

include_once PATH . 'modelos/ConBdMysql.php';

class Factura_Dao extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarId($Id) {
        try {
            if (!isset($Id)) {
                $planConsulta = "SELECT * FROM `venta` WHERE venIdVenta = $Id";
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
                return ['exitoSeleccionId' => 0, 'registroEncontrado' => $registroEncontrado]; /* 0 pailas */
            }
        } catch (Exception $exc) {
            return ['exitoSeleccionId' => 2, 'registroEncontrado' => $exc->getTraceAsString()];
        }
    }

    public function seleccionarTodos() {
        try {

            $planConsulta = "SELECT * FROM venta ";
            $registrosLibros = $this->conexion->prepare($planConsulta);
            $registrosLibros->execute(); //Ejecución de la consulta 

            $listadoProveedores = array();

            while ($registro = $registrosLibros->fetch(PDO::FETCH_OBJ)) {
                $listadoProveedores[] = $registro;
            }
            $this->cierreBd(); //Que es esto???

            if (count($registroEncontrado) == 0) {
                return ['exitoSeleccionId' => 0, 'registroEncontrado' => $registroEncontrado]; /* 0 pailas */
            } else {
                return ['exitoSeleccionId' => 1, 'registroEncontrado' => $registroEncontrado]; /* todo bien */
            }
        } catch (Exception $exc) {
            return ['exitoSeleccionId' => 2, 'registroEncontrado' => $exc->getTraceAsString()];
        }
    }

    public function insertar($registro) {
        try {
            $facIdFactura = $registro['facIdFactura'];
            $venCantidadProducto = $registro['venCantidadProducto'];
            $venPrecioUnidad = $registro['venPrecioUnidad'];
            $venDescuentoRealizado = $registro['venDescuentoRealizado'];
            $venPrecioFinal = $registro['venPrecioFinal'];
            $prodidProducto = $registro['prodidProducto'];
            $inserta = $this->conexion->prepare("INSERT INTO venta (facIdFactura, venCantidadProducto, venPrecioUnidad, venDescuentoRealizado, venPrecioFinal, ven_Estado ,prodidProducto) "
                    . "VALUES ('$facIdFactura', '$venCantidadProducto' , '$venPrecioUnidad' , '$venDescuentoRealizado' , '$venPrecioFinal' , '1' , '$prodidProducto')");
            $inserta->execute();
            $clavePrimariaConQueInserto = $this->ultimoInsertId();
            exit();
            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function ultimoInsertId() {
        try {
            $planConsulta = "SELECT * FROM venta ORDER BY venIdVenta DESC LIMIT 1";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute();
            $registroEncontrado = array();
            while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            if (count($registroEncontrado) == 0) {
                return ['exitoSeleccionId' => 0, 'registroEncontrado' => $registroEncontrado]; /* Pailas */
            } else {
                return ['exitoSeleccionId' => 1, 'registroEncontrado' => $registroEncontrado]; /* todo bien */
            }
        } catch (Exception $exc) {
            return ['exitoSeleccionId' => 2, 'registroEncontrado' => $exc->getTraceAsString()];
        }
    }

    public function EliminadoLogico($Id) {
        try {
            $inserta = $this->conexion->prepare("UPDATE venta SET emp_Estado='3' WHERE venIdVenta = '$Id'");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function Eliminadobd($Id) {
        try {
            $inserta = $this->conexion->prepare("DELETE FROM `venta` WHERE venIdVenta = '$Id'");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Borro correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function actualizar($registro) {
        try {
            $Id = $registro['Venta'];
            $IdFactura = $registro['IdFactura'];
            $CantidadProd = $registro['CantidadProd'];
            $PrecioUn = $registro['PrecioUn'];
            $DescuentoReal = $registro['DescuentoReal'];
            $PrecioFinal = $registro['PrecioFinal'];
            $inserta = $this->conexion->prepare("UPDATE venta SET `facIdFactura`='$IdFactura',`venCantidadProducto`='$CantidadProd',`venPrecioUnidad`='$PrecioUn',`venDescuentoRealizado`='$DescuentoReal',`venPrecioFinal`='$$PrecioFinal', WHERE  venIdVenta = '$Id' ");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

}

//        print_r($clavePrimariaConQueInserto);
//        echo "</pre>";
//        exit();