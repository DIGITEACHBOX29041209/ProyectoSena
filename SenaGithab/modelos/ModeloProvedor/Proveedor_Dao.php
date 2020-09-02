<?php

include_once PATH . 'modelos/ConBdMysql.php';

class Proveedor_Dao extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarTodos() {


        $planConsulta = "SELECT P.provIdProvedores, P.provNombreProvedor, P.provDireccionProvedor, P.provTelefonoProvedor, P.prov_Estado, P.prov_created_at, P.prov_updated_at 
                  FROM provedores P " ;
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
    
        public function borrar($provIdProvedores) {

        $planborrar = "DELETE FROM `provedores` WHERE `provedores`.`provIdProvedores`=" .$provIdProvedores." ";

        $registrosLibros = $this->conexion->prepare($planborrar);
        $registrosLibros->execute(); //Ejecución de la consulta 
        $this->cierreBd();
        }
}
