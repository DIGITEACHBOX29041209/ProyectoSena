<?php

include_once PATH . 'modelos/ConBdMysql.php';

class Proveedor_Dao extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarTodos() {


        $planConsulta = "SELECT P.provIdProvedores, P.provNombreProvedor, P.provDireccionProvedor, P.provTelefonoProvedor, P.prov_Estado, P.prov_created_at, P.prov_updated_at 
                  FROM provedores P ";
        $registrosLibros = $this->conexion->prepare($planConsulta);
        $registrosLibros->execute(); //Ejecución de la consulta 

        $listadoProveedores = array();

        while ($registro = $registrosLibros->fetch(PDO::FETCH_OBJ)) {
            $listadoProveedores[] = $registro;
        }

        $this->cierreBd();
//        echo "<pre>";
//        print_r("holaaaaaaa");
//        echo "</pre>";
    }

    public function Insertarproveedor($IdProvedores, $NombreProvedor, $DireccionProvedor, $TelefonoProvedor) {

        $planinsertar = "INSERT INTO `provedores` (`provIdProvedores`, `provNombreProvedor`, `provDireccionProvedor`, `provTelefonoProvedor`, `prov_Estado`, `prov_created_at`, `prov_updated_at`)";

        $registrosLibros = $this->conexion->prepare($planinsertar);
        $registrosLibros->execute(); //Ejecución de la consulta 
        $listadoRegistrosLibro = array();

        while ($registro = $registrosLibros->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosLibro[] = $registro;
        }

        $this->cierreBd();
        return $listadoRegistrosLibro;
    }


    public function seleccionarId($sId) {//llega como parametro un array con datos a consultar
        if (!isset($sId)) { //si la consulta no viene con el password (PARA REGISTRARSE)
            $planConsulta = "SELECT * FROM `provedores` WHERE provIdProvedores = $sId";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute();
        }
        $registroEncontrado = array();
        while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
            $registroEncontrado[] = $registro;
        }
        return $registroEncontrado;
    }

    public function actualizarId($registro) {
        try {
            $NombreProvedor = $registro['nombre'];
            $DireccionProvedor = $registro['descripcion'];
            $TelefonoProvedor = $registro['cantidad'];
            $inserta = $this->conexion->prepare("UPDATE `provedores` SET `provNombreProvedor`='$NombreProvedor',`provDireccionProvedor`='$DireccionProvedor',`provTelefonoProvedor`='$TelefonoProvedor' WHERE provIdProvedores = '$provIdProvedores' ");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }
        public function ultimoInsertId() {
        try {
            $planConsulta = "SELECT * FROM `provedores` ORDER BY provIdProvedores DESC LIMIT 1";
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

    public function EliminadoLogico($Id) {
        try {
            $inserta = $this->conexion->prepare("UPDATE `provedores` SET emp_Estado='3' where provIdProvedores = '$Id'");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }
    
    public function Eliminadobd($Id) {
        try {
            $inserta = $this->conexion->prepare("DELETE FROM `provedores` WHERE provIdProvedores = '$Id'");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Borro correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

}
