<?php

include_once PATH . 'modelos/ConBdMysql.php';

class ProveedorListar extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarTodos() {
        echo "<pre>";
        print_r("holaaaaaaa");
        echo "</pre>";

        $planConsulta = "SELECT P.provIdProvedores, P.provNombreProvedor, P.provDireccionProvedor, P.provTelefonoProvedor, P.prov_Estado, P.prov_created_at, P.prov_updated_at 
                  FROM provedores P " ;
        $registrosLibros = $this->conexion->prepare($planConsulta);
        $registrosLibros->execute(); //Ejecución de la consulta 

        $listadoProveedores = array();

        while ($registro = $registrosLibros->fetch(PDO::FETCH_OBJ)) {
            $listadoProveedores[] = $registro;
        }

        $this->cierreBd();
        echo "<pre>";
        print_r("holaaaaaaa");
        echo "</pre>";
//        return $listadoProveedores;
    }
}
