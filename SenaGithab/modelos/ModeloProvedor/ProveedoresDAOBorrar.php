<?php

include_once PATH . 'modelos/ConBdMysql.php';

class ProveedoresBorrar extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }
    public function borrar($provIdProvedores) {

        $planborrar = "DELETE FROM `provedores` WHERE `provedores`.`provIdProvedores`=" .$provIdProvedores." ";

        $registrosLibros = $this->conexion->prepare($planborrar);
        $registrosLibros->execute(); //Ejecución de la consulta 

//        $listadoRegistrosLibro = array();
//
//        while ($registro = $registrosLibros->fetch(PDO::FETCH_OBJ)) {
//            $listadoRegistrosLibro[] = $registro;
        }

//        $this->cierreBd();
//        return $listadoRegistrosLibro;
    }
//    }
