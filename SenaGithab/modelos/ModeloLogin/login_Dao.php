<?php

include_once PATH . 'modelos/ConBdMySql.php';

class login_Dao extends ConBdMySql {

    function __construct($servidor, $base, $loginBD, $passwordBD) {
        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarId($Id) {

        try {
            $mail = $Id['email'];
            $clave = $Id['password'];
            $planConsulta = "SELECT * FROM `empleado` WHERE empCorreo = '$mail' AND empPassword = '$clave' ";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute();

            $registroEncontrado = array();
            while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }

            if (count($registroEncontrado) > 0) {

                $cargo = $registroEncontrado[0]->empCargoEmpleado;

                if ($cargo == '1') {
                    return ['exitoSeleccionId' => 0, 'registroEncontrado' => $registroEncontrado];
                } else {
                    return ['exitoSeleccionId' => 1, 'registroEncontrado' => $registroEncontrado];
                }
            } else {
                return ['exitoSeleccionId' => 2, 'registroEncontrado' => $registroEncontrado];
            }
        } catch (Exception $exc) {
            return ['exitoSeleccionId' => 2, 'registroEncontrado' => $exc->getTraceAsString()];
        }
    }

}
