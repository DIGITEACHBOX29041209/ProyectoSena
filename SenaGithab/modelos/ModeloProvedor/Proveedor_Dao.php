<?php

include_once PATH . 'modelos/ConBdMySql.php';

class Proveedor_Dao extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarId($IdProvedores) {
        try {
            $planConsulta = "SELECT * FROM provedores WHERE provIdProvedores = $IdProvedores[0]";
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

    public function seleccionarTodos() {
        try {

            $planConsulta = "SELECT * FROM provedores";
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
            $IdProvedores = $registro['IdProvedores'];
            $NombreEmpresa = $registro['NombreEmpresa'];
            $NombreProvedor = $registro['NombreProvedor'];
            $DireccionProvedor = $registro['DireccionProvedor'];
            $TelefonoProvedor = $registro['TelefonoProvedor'];
            $inserta = $this->conexion->prepare("INSERT INTO `provedores` ( `provIdProvedores`, `provEmpresa`, `provNombreProvedor`, `provDireccionProvedor`, `provTelefonoProvedor`, `prov_Estado`) "
                    . "VALUES ('$IdProvedores','$NombreEmpresa','$NombreProvedor', '$DireccionProvedor', $TelefonoProvedor,'1')");
            $inserta->execute();
            $clavePrimariaConQueInserto = $this->ultimoInsertId();
            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function actualizar($registro) {
        try {    
            $NombreEmpresa = $registro[0]['NombreEmpresa'];
            $NombreProvedor = $registro[0]['NombreProvedor'];
            $DireccionProvedor = $registro[0]['DireccionProvedor'];
            $TelefonoProvedor = $registro[0]['TelefonoProvedor'];
            $IdProvedores = $registro[0]['provIdProvedores'];
            if (isset($IdProvedores)) {
                $actualizacion = $this->conexion->prepare("UPDATE `provedores` SET `provEmpresa`='$NombreEmpresa', `provNombreProvedor`='$NombreProvedor',`provDireccionProvedor`='$DireccionProvedor',`provTelefonoProvedor`=$TelefonoProvedor WHERE provIdProvedores = $IdProvedores ");
                $actualizacion->execute();
                return ['actualizacion' => 1, 'mensaje' => "Actualización realizada."];
            }
        } catch (Exception $exc) {
            return ['actualizacion' => 2, 'resultado' => $exc->getTraceAsString()];
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
                return ['exitoSeleccionId' => 0, 'registroEncontrado' => $registroEncontrado]; /* Pailas */
            } else {
                return ['exitoSeleccionId' => 1, 'registroEncontrado' => $registroEncontrado]; /* todo bien */
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

    public function Eliminadobd($registro) {
        try {
            $IdProvedores = $registro[0]['IdProvedores'];
            $inserta = $this->conexion->prepare("DELETE FROM `provedores` WHERE provIdProvedores = '$IdProvedores'");
            $inserta->execute();
            return ['inserta' => 1, 'resultado' => 'Borro correctamente'];
        } catch (Exception $exc) {
            return ['inserta' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

}
