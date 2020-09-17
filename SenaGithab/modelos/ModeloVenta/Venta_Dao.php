 <?php

include_once PATH . 'modelos/ConBdMySql.php';

class Venta_Dao extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

       public function seleccionarTodos() {
        try {

            $planConsulta = "SELECT * FROM venta";
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

     public function seleccionarIdProd($registro) {
        try {
            $IdProducto = $registro['prodidProducto'];
                
            $planConsulta = "SELECT * FROM `producto` WHERE prodidProducto = $IdProducto ";
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
            $IdFactura = $registro['IdFactura'];
            $venCantidadProducto = $registro['venCantidadProducto'];
            $venPrecioUnidad = $registro['venPrecioUnidad'];
            $venDescuentoRealizado = $registro['venDescuentoRealizado'];
            $venPrecioFinal = $registro['venPrecioFinal'];
            $prodidProducto = $registro['prodidProducto'];
            $inserta = $this->conexion->prepare("INSERT INTO `venta`( `facIdFactura`, `venCantidadProducto`, `venPrecioUnidad`, `venDescuentoRealizado`, `venPrecioFinal`, `ven_Estado`, `prodidProducto`) "
                    . "VALUES ($IdFactura,$venCantidadProducto,$venPrecioUnidad,$venDescuentoRealizado,$venPrecioFinal,'1',$prodidProducto)");
            $inserta->execute();
            $clavePrimariaConQueInserto = $this->ultimoInsertId();
            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function ultimoInsertId() {
        try {
            $planConsulta = "SELECT * FROM venta ORDER BY venIdVenta DESC LIMIT 1";
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
            $inserta = $this->conexion->prepare("UPDATE venta SET emp_Estado='3' WHERE venIdVenta = '$Id'");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function Eliminadobd($Id) {
        try {
            $inserta = $this->conexion->prepare("DELETE FROM `venta` WHERE venIdVenta = '$Id'");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Borro correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function actualizar($registro) {
        try {
            $Id = $registro['IdVenta'];
            $IdFactura = $registro['IdFactura'];
            $CantidadProd = $registro['CantidadProd'];
            $PrecioUn = $registro['PrecioUn'];
            $DescuentoReal = $registro['DescuentoReal'];
            $PrecioFinal = $registro['PrecioFinal'];
            $inserta = $this->conexion->prepare("UPDATE venta SET `venCantidadProducto`='$CantidadProd',`venPrecioUnidad`='$PrecioUn',`venDescuentoRealizado`='$DescuentoReal',`venPrecioFinal`='$$PrecioFinal', WHERE  venIdVenta = '$Id' ");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }

}

//        print_r($clavePrimariaConQueInserto);
//        echo "</pre>";
//        exit();