<?php

class ValidadorProvedor {

    public function ValidadorFormularioProvedor($datos) {
        $mensajesError = NULL;
        $datosViejos = NULL;
        $marcaCampo = NULL;
        /*         * *Validar datos ingresados********* */
        foreach ($datos as $key => $value) {

            $datosViejos[$key] = $value;

            switch ($key) {
               case 'TelefonoProvedor':
                    $patronTelefono = "/^[[:digit:]]+$/";
                    if (!preg_match($patronTelefono , $value)) {
                        $mensajesError['TelefonoProvedor'] = "*1-Formato o valor del Dato incorrecto";
                        $marcaCampo['TelefonoProvedor'] = "*1";
                    }
                    break;
            }
        }
    }

}
