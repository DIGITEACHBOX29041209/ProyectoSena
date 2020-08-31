<?php

include_once PATH . 'modelos/ConBdMysql.php';

class Empleado_Dao extends ConBdMySql {

    function __construct($servidor, $base, $loginBD, $passwordBD) {
        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarId($sId) {//llega como parametro un array con datos a consultar
        if (!isset($sId[2])) { //si la consulta no viene con el password (PARA REGISTRARSE)
            $planConsulta = "SELECT * FROM `empleado` WHERE empDocumentoEmpleado = $sId[0] or empCorreo = '$sId[1]' ";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute();
        }
        $registroEncontrado = array();
        while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
            $registroEncontrado[] = $registro;
        }
        if (count($registroEncontrado) == 0) {
            return ['exitoSeleccionId' => 1, 'registroEncontrado' => $registroEncontrado];
        } else {
            return ['exitoSeleccionId' => 0, 'registroEncontrado' => $registroEncontrado];
        }
    }

    public function insertar($registro) {
        try {
            $email = $registro['email'];
            $clave = $registro['password'];
            $documento = $registro['documento'];
            $nombre = $registro['nombre'];
            $apellido = $registro['apellidos'];
            $telefono = $registro['telefono'];
            $tipoEmpleado = $registro['tipoEmpleado'];
            $inserta = $this->conexion->prepare("INSERT INTO `empleado`(empDocumentoEmpleado, empNombreEmpleado, empApellidoEmpleado, empPassword, empCorreo, empTelefonoEmpleado, empCargoEmpleado, emp_Estado) VALUES ($documento,'$nombre','$apellido', ':$clave','$email', '$telefono', '$tipoEmpleado','1')");
            $insercion = $inserta->execute();
            $clavePrimariaConQueInserto = $this->conexion->lastInsertId();
            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (Exception $exc) {
            return ['inserto' => $exc, 'resultado' => $exc->getTraceAsString()];
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

           return $registroEncontrado;
           
        } catch (Exception $ex) {
            
        }
    }

}
