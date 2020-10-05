<?php

class ValidadorProducto {

    public function ValidadorFormularioProducto($datos) {
        $mensajesError = NULL;
        $datosViejos = NULL;
        $marcaCampo = NULL;
        /*         * *Validar datos ingresados********* */
        foreach ($datos as $key => $value) {

            $datosViejos[$key] = $value;

            switch ($key) {
                case 'nombre':
                    $patronNombre = "/^[^ ][a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ ]*$/";
                    if (!preg_match($patronNombre, $value)) {
                        $mensajesError['nombre'] = "*2-Formato o valor del Dato incorrecto";
                        $marcaCampo['nombre'] = "*2";
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
