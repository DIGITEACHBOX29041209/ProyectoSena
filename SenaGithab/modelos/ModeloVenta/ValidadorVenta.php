<?php

class ValidadorVenta {

    public function ValidadorFormularioVenta($datos) {
        $mensajesError = NULL;
        $datosViejos = NULL;
        $marcaCampo = NULL;
        /*         * *Validar datos ingresados********* */
        foreach ($datos as $key => $value) {

            $datosViejos[$key] = $value;

            switch ($key) {
                case 'IdFactura':
                    $patronFactura = "/^[[:digit:]]+$/";
                    if (!preg_match($patronFactura, $value)) {
                        $mensajesError['IdFactura'] = "*1-Formato o valor del Dato incorrecto";
                        $marcaCampo['IdFactura'] = "*1";
                    }
                    break;
                case 'venCantidadProducto':
                    $patronCantidadPro = "/^[[:digit:]]+$/";
                    if (!preg_match($patronCantidadPro, $value)) {
                        $mensajesError['venCantidadProducto'] = "*2-Formato o valor del Dato incorrecto";
                        $marcaCampo['venCantidadProducto'] = "*2";
                    }
                    break;
                case 'venPrecioUnidad':
                    $patronPrecioUn = "/^[[:digit:]]+$/";
                    if (!preg_match($patronPrecioUn, $value)) {
                        $mensajesError['venPrecioUnidad'] = "*3-Formato o valor del Dato incorrecto";
                        $marcaCampo['venPrecioUnidad'] = "*3";
                    }
                    break;
                case 'venDescuentoRealizado':
                    $patronDesReal = "/^[[:digit:]]+$/";
                    if (!preg_match($patronDesReal, $value)) {
                        $mensajesError['venDescuentoRealizado'] = "*4-Formato o valor del Dato incorrecto";
                        $marcaCampo['venDescuentoRealizado'] = "*4";
                    }
                    break;
                case 'venPrecioFinal':
                    $patronPrecFinal = "/^[[:digit:]]+$/"; //si está vacío
                    if (preg_match($patronPrecFinal, $value)) {
                        $mensajesError['venPrecioFinal'] = "*7-Formato o valor del Dato incorrecto";
                        $marcaCampo['venPrecioFinal'] = "*8";
                    }
                    break;
                case 'prodidProducto':
                    $patronProducto = "/^[[:digit:]]+$/";
                    if (!preg_match($$patronProducto, $value)) {
                        $mensajesError['prodidProducto'] = "*1-Formato o valor del Dato incorrecto";
                        $marcaCampo['prodidProducto'] = "*1";
                    }
                    break;
            }
        }
        if (!is_null($mensajesError)) {
            $datosViejos['rutaSena'] = "";

            return array('datosViejos' => $datosViejos, 'mensajesError' => $mensajesError, 'marcaCampo' => $marcaCampo);
        } else {
            $datosViejos = NULL;
            return FALSE;
        }
    }

}