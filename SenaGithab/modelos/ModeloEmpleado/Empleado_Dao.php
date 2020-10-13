<?php

include_once PATH . 'modelos/ConBdMySql.php';

class Empleado_Dao extends ConBdMySql {

    function __construct($servidor, $base, $loginBD, $passwordBD) {
        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarId($Id) {
        try {
            if (!isset($Id[2])) {
                $planConsulta = "SELECT * FROM `empleado` WHERE empDocumentoEmpleado = $Id[0] or empCorreo = '$Id[1]' and emp_Estado = '1' ";
                $listar = $this->conexion->prepare($planConsulta);
                $listar->execute();
            }
            $registroEncontrado = array();
            while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            if (count($registroEncontrado) == 0) {

                $planConsulta2 = "SELECT * FROM `empleado` WHERE empDocumentoEmpleado = $Id[0] or empCorreo = '$Id[1]' and emp_Estado = '2' ";
                $listar2 = $this->conexion->prepare($planConsulta2);
                $listar2->execute();
                $registroEncontrado2 = array();
                while ($registro2 = $listar2->fetch(PDO::FETCH_OBJ)) {
                    $registroEncontrado2[] = $registro2;
                }
                if (count($registroEncontrado2) == 0) {
                    return ['exitoSeleccionId' => 1, 'registroEncontrado' => $registroEncontrado]; /* 1 exitoso registrar */
                } else {
                    return ['exitoSeleccionId' => 3, 'registroEncontrado' => $registroEncontrado];  // existe desactivado
                }
            } else {
                return ['exitoSeleccionId' => 0, 'registroEncontrado' => $registroEncontrado]; /* 0 existe ACTIVO */
            }
        } catch (Exception $exc) {
            return ['exitoSeleccionId' => 2, 'registroEncontrado' => $exc->getTraceAsString()];
        }
    }

    public function seleccionarrId($Id) {
        try {
            $planConsulta = "SELECT * FROM empleado WHERE empIdEmpleado = $Id[0]";
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

            $planConsulta = "SELECT * FROM empleado where emp_Estado = '1'";
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
            $apellido = $registro['apellidos'];
            $telefono = $registro['telefono'];
            $clave = $registro['password'];
            $email = $registro['email'];
            $documento = $registro['documento'];
            $nombre = $registro['nombre'];
            $tipoEmpleado = $registro['tipoEmpleado'];
            $inserta = $this->conexion->prepare("INSERT INTO `empleado`(empDocumentoEmpleado, empNombreEmpleado, empApellidoEmpleado, empPassword, empCorreo, empTelefonoEmpleado, empCargoEmpleado, emp_Estado) VALUES ('$documento','$nombre','$apellido', ':$clave','$email', '$telefono', '$tipoEmpleado','1')");
            $inserta->execute();
            $clavePrimariaConQueInserto = $this->ultimoInsertId();
            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function actualizar($registro) {
        try {
            $Id = $registro[0]['idEmpleado'];
            $email = $registro[0]['email'];
            $clave = $registro[0]['password'];
            $documento = $registro[0]['documento'];
            $nombre = $registro[0]['nombre'];
            $apellido = $registro[0]['apellidos'];
            $telefono = $registro[0]['telefono'];
            $tipoEmpleado = $registro[0]['tipoEmpleado'];
            if (isset($Id)) {
                $inserta = $this->conexion->prepare("UPDATE `empleado` SET `empDocumentoEmpleado`=$documento,`empNombreEmpleado`='$nombre',`empApellidoEmpleado`='$apellido',`empTelefonoEmpleado`=$telefono,`empCargoEmpleado`='$tipoEmpleado',`empCorreo`='$email' WHERE  empIdEmpleado = $Id ");
                $inserta->execute();
                return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
            }
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function listarTipoEmpleado() {
        try {
            $planConsulta = "SELECT * FROM tipoempleado ";
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

    public function ultimoInsertId() {
        try {
            $planConsulta = "SELECT * FROM empleado ORDER BY empIdEmpleado DESC LIMIT 1";
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
            $inserta = $this->conexion->prepare("UPDATE empleado SET emp_Estado='2' where empIdEmpleado = '$Id[0]'");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function Eliminadobd($registro) {
        try {
            $Id = $registro[0]['idEmpleado'];
            $inserta = $this->conexion->prepare("DELETE FROM `empleado` WHERE empIdEmpleado = $Id");
            $inserta->execute();
            return ['inserta' => 1, 'resultado' => 'Borro correctamente'];
        } catch (Exception $exc) {
            return ['inserta' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function selectTablasTipodeEmpleado() {
        try {
            $consulta = $this->conexion->prepare("SELECT * FROM `tipoempleado` ");
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

//        echo "<pre>";
//        print_r($clavePrimariaConQueInserto);
//        echo "</pre>";
//        exit();