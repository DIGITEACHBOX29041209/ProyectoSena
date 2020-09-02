<?php

include_once PATH . 'modelos/ConBdMysql.php';

class Factura_Dao extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarTodos() {

        $planConsulta = "SELECT * FROM venta ";
        $registrosLibros = $this->conexion->prepare($planConsulta);
        $registrosLibros->execute(); //Ejecución de la consulta 

        $listadoProveedores = array();

        while ($registro = $registrosLibros->fetch(PDO::FETCH_OBJ)) {
            $listadoProveedores[] = $registro;
        }

        $this->cierreBd();
    }

    public function insertar($registro) {
        try {
            $facIdFactura= $registro['facIdFactura'];
            $venCantidadProducto = $registro['venCantidadProducto'];
            $venPrecioUnidad= $registro['venPrecioUnidad'];
            $venDescuentoRealizado = $registro['venDescuentoRealizado'];
            $venPrecioFinal = $registro['venPrecioFinal'];
            $prodidProducto = $registro['prodidProducto'];
            $inserta = $this->conexion->prepare("INSERT INTO venta (facIdFactura, venCantidadProducto, venPrecioUnidad, venDescuentoRealizado, venPrecioFinal, ven_Estado ,prodidProducto) "
                    . "VALUES ('$facIdFactura', '$venCantidadProducto' , '$venPrecioUnidad' , '$venDescuentoRealizado' , $venPrecioFinal , '1' , '$prodidProducto')");
            $insercion = $inserta->execute();
            $clavePrimariaConQueInserto = "0";
            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (Exception $exc) {
            return ['inserto' => 0, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function borrar($Id) {

        $planborrar = "DELETE * FROM `venta` WHERE venIdVenta = $Id";
        $registrosLibros = $this->conexion->prepare($planborrar);
        $registrosLibros->execute(); //Ejecución de la consulta 
        $this->cierreBd();
    }
    
    public function actualizar($registro) {
        try {
            $empIdEmpleado = $registro['empIdEmpleado'];
            $facTotalFactura = $registro['facTotalFactura'];
            $inserta = $this->conexion->prepare("UPDATE factura ( empIdEmpleado, facFechaFactura, facTotalFactura, fac_Estado) VALUES ('$empIdEmpleado','$facTotalFactura','1') where venIdVenta = $empIdEmpleado");
            $insercion = $inserta->execute();
            $clavePrimariaConQueInserto = "0";
            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (Exception $exc) {
            return ['inserto' => 0, 'resultado' => $exc->getTraceAsString()];
        }
    }
}
