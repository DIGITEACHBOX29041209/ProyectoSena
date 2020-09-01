<?php

include_once PATH . 'modelos/ConBdMysql.php';

class Proveedorinsertar extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }
    public function Insertarproveedor($IdProvedores,$NombreProvedor,$DireccionProvedor,$TelefonoProvedor) {

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
    }