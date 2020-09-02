<?php

class ValidarLogin {

    public function ValidarFormularioLogeo($datos) {
        $mensajesError = NULL;
        $datosViejos = NULL;
        $marcaCampo = NULL;
        /*         * *Validar datos ingresados********* */
        foreach ($datos as $key => $value) {

            $datosViejos[$key] = $value;

            switch ($key) {
           
                case 'email':
                    $patronEmail = "/^\w+([\.=]?\w+)@\w+([\.=]?\w+)(\.\w{2,3})+$/";
                    if (!preg_match($patronEmail, $value)) {
                        $mensajesError['email'] = "*4-Formato o valor del Dato incorrecto";
                        $marcaCampo['email'] = "*4";
                    }
                    break;
                case 'password':
                    $patronPassword = "/^\s*$/"; //si está vacío
                    if (preg_match($patronPassword, $value)) {
                        $mensajesError['password'] = "*7-Formato o valor del Dato incorrecto";
                        $marcaCampo['password'] = "*8";
                    }
                    break;
          
            }
        }
        if (!is_null($mensajesError)) {
            $datosViejos['password'] = "";
            $datosViejos['password2'] = "";
            $datosViejos['rutaSena'] = "";

            return array('datosViejos' => $datosViejos, 'mensajesError' => $mensajesError, 'marcaCampo' => $marcaCampo);
        } else {
            $datosViejos = NULL;
            return FALSE;
        }
    }

}
