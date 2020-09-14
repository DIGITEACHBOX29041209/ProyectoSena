<?php

include_once 'ConBdMysql.php';

class Proveedor_Dao extends ConBdMySql1 {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

        public function seleccionarId($IdProvedores) {
        try {
            if (!isset($IdProvedores[2])) {
                $planConsulta = "SELECT * FROM `provedores` WHERE empDocumentoEmpleado = $IdProvedores[0] ";
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

    public function seleccionarTodos() {
        try {

            $planConsulta = "SELECT * FROM provedores";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute();

            $registroEncontrado = array();
            while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            if (count($registroEncontrado) == 0) {
                return ['exitoSeleccionId' => 0, 'registroEncontrado' => $registroEncontrado]; /*0 pailas */
            } else {
                return ['exitoSeleccionId' => 1, 'registroEncontrado' => $registroEncontrado]; /* todo bien*/
            }
        } catch (Exception $exc) {
            return ['exitoSeleccionId' => 2, 'registroEncontrado' => $exc->getTraceAsString()];
        }
    }

    public function insertar($registro) {
        try {   
            $NombreProvedor = $registro['NombreProvedor'];
            $DireccionProvedor = $registro['DireccionProvedor'];
            $TelefonoProvedor = $registro['TelefonoProvedor'];
            $inserta = $this->conexion->prepare("INSERT INTO `provedores` ( `provNombreProvedor`, `provDireccionProvedor`, `provTelefonoProvedor`, `prov_Estado`) VALUES ($NombreProvedor, $DireccionProvedor, $TelefonoProvedor,'1')");
            $inserta->execute();
            $clavePrimariaConQueInserto = $this->ultimoInsertId();
        exit();
            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function actualizar($registro) {
        try {
            $IdProvedores = $registro['id'];
            $NombreProvedor = $registro['nombre'];
            $DireccionProvedor = $registro['direccion'];
            $TelefonoProvedor = $registro['telefono'];
            $inserta = $this->conexion->prepare("UPDATE provedores SET `provNombreProvedor`='$NombreProvedor',`provDireccionProvedor`='$DireccionProvedor',`empTelefonoEmpleado`='$TelefonoProvedor' WHERE  provIdProvedores = '$IdProvedores' ");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }


    public function ultimoInsertId() {
        try {
            $planConsulta = "SELECT * FROM provedores ORDER BY provIdProvedores DESC LIMIT 1";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute();
            $registroEncontrado = array();
            while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            if (count($registroEncontrado) == 0) {
                return ['exitoSeleccionId' => 0, 'registroEncontrado' => $registroEncontrado]; /*Pailas */
            } else {
                return ['exitoSeleccionId' => 1, 'registroEncontrado' => $registroEncontrado];/* todo bien */
            }
        } catch (Exception $exc) {
            return ['exitoSeleccionId' => 2, 'registroEncontrado' => $exc->getTraceAsString()];
        }
    }

    public function EliminadoLogico($IdProvedores) {
        try {
            $inserta = $this->conexion->prepare("UPDATE empleado SET emp_Estado='3' where provIdProvedores = '$IdProvedores'");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }
    
    public function Eliminadobd($IdProvedores) {
        try {
            $inserta = $this->conexion->prepare("DELETE FROM `provedores` WHERE provIdProvedores = '$IdProvedores'");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Borro correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }
    
}


