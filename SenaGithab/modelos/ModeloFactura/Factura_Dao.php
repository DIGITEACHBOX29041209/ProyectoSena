<?php

include_once PATH . 'modelos/ConBdMysql.php';

class Factura_Dao extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarId($Id) {
        try {
            $planConsulta = "SELECT * FROM `factura` WHERE FacIdFactura = $Id' ";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute();

            $registroEncontrado = array();
            while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            $this->cierreBd();
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

            $planConsulta = "SELECT * FROM factura";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute();

            $registroEncontrado = array();
            while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            $this->cierreBd();

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
            $empIdEmpleado = $registro['empIdEmpleado'];
            $facTotalFactura = $registro['facTotalFactura'];
            $inserta = $this->conexion->prepare("INSERT INTO factura ( empIdEmpleado, facTotalFactura, fac_Estado) VALUES ('$empIdEmpleado','$facTotalFactura','1')");
            $insercion = $inserta->execute();
            $clavePrimariaConQueInserto = $this->ultimoInsertId();
            $this->cierreBd();
            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function actualizar($registro) {
        try {
            $empIdEmpleado = $registro['empIdEmpleado'];
            $facTotalFactura = $registro['facTotalFactura'];
            $facIdFactura = $registro['facIdFactura'];
            $inserta = $this->conexion->prepare("UPDATE factura SET `empIdEmpleado`='$empIdEmpleado',`facTotalFactura`='$facTotalFactura' WHERE  facIdFactura = '$facIdFactura' ");
            $inserta->execute();
            $this->cierreBd();
            return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function ultimoInsertId() {
        try {
            $planConsulta = "SELECT * FROM factura ORDER BY facIdFactura DESC LIMIT 1";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute();
            $registroEncontrado = array();
            while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            $this->cierreBd();
            if (count($registroEncontrado) == 0) {
                return ['exitoSeleccionId' => 0, 'registroEncontrado' => $registroEncontrado];
            } else {
                return ['exitoSeleccionId' => 1, 'registroEncontrado' => $registroEncontrado];
            }
        } catch (Exception $exc) {
            return ['exitoSeleccionId' => 2, 'registroEncontrado' => $exc->getTraceAsString()];
        }
    }

    public function EliminadoLogico($Id) {
        try {
            $inserta = $this->conexion->prepare("UPDATE factura SET fac_Estado='3' where facIdFactura = '$Id'");
            $inserta->execute();
            $this->cierreBd();
            return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function Eliminadobd($Id) {
        try {
            $inserta = $this->conexion->prepare("DELETE FROM `factura` WHERE facIdFactura = '$Id'");
            $inserta->execute();
            $this->cierreBd();
            return ['inserto' => 1, 'resultado' => 'Borro correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

}
