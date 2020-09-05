<?php

include_once  'ConBdMySql.php';

class Producto_Dao extends ConBdMySql {

    function __construct($servidor, $base, $loginBD, $passwordBD) {
        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarId($sId) {//llega como parametro un array con datos a consultar
        if (!isset($sId)) { //si la consulta no viene con el password (PARA REGISTRARSE)
            $planConsulta = "SELECT * FROM `producto` WHERE prodidProducto = $sId";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute();
        }
        $registroEncontrado = array();
        while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
            $registroEncontrado[] = $registro;
        }
            return $registroEncontrado;
    }
    

    public function insertar($registro) {
        try {
            $nombre = $registro['nombre'];
            $descripcion = $registro['descripcion'];
            $cantidad = $registro['cantidad'];
            $precioNeto = $registro['precioNeto'];
            $precioProducto = $registro['precioProducto'];
            $inserta = $this->conexion->prepare("INSERT INTO `producto`(prodNombreProducto, prodDescripcionProducto, prodCantidadProducto, prodPrecioNeto, prodPrecioProducto, prod_Estado) VALUES ('$nombre', '$descripcion', '$cantidad', '$precioNeto', '$precioProducto','1')");
            $insercion = $inserta->execute();
            $clavePrimariaConQueInserto = "0";
            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (Exception $exc) {
            return ['inserto' => 0, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function listarProducto() {

        try {
            $planConsulta = "SELECT * FROM producto ";
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
    
    public function eliminarId($sId) {//llega como parametro un array con datos a consultar
        if (!isset($sId)) { //si la consulta no viene con el password (PARA REGISTRARSE)
            $planConsulta = "DELETE * FROM `producto` WHERE prodidProducto = $sId";
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
        $nombre = $registro['nombre'];
        $descripcion = $registro['descripcion'];
        $cantidad = $registro['cantidad'];
        $precioNeto = $registro['precioNeto'];
        $precioProducto = $registro['precioProducto'];
        $inserta = $this->conexion->prepare("UPDATE `producto` SET `prodNombreProducto`='$nombre',`prodDescripcionProducto`='$descripcion',`prodCantidadProducto`='$cantidad'`prodPrecioNeto`='$precioNeto',`prodPrecioProducto`='$precioProducto' WHERE prodidProducto = '$Id' ");
        $insercion = $inserta->execute();
        $clavePrimariaConQueInserto = "0";
        return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
    } catch (Exception $exc) {
        return ['inserto' => 0, 'resultado' => $exc->getTraceAsString()];
    }
}

    public function ultimoInsertId() {
        try {
            $planConsulta = "SELECT * FROM producto ORDER BY prodidProducto DESC LIMIT 1";
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
            $inserta = $this->conexion->prepare("UPDATE producto SET prod_Estado='3' WHERE prodidProducto = '$Id'");
            $inserta->execute();
            return ['inserto' => 1, 'resultado' => 'Actualizo correctamente'];
        } catch (Exception $exc) {
            return ['inserto' => 2, 'resultado' => $exc->getTraceAsString()];
        }
    }
}

