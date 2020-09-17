<?php

require_once '../modelos/ModeloEmpleado/Empleado_Dao.php';

class EmpleadoControlador {

    private $datos = array();

    public function __construct($datos) {
        $this->datos = $datos;
        $this->EmpleadoControlador();
    }

    public function EmpleadoControlador() {

        switch ($this->datos["rutaSena"]) {
            case "gestionDeRegistro":
                $gestarUsuario_s = new Empleado_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                //Se revisa si existe la persona en la base  
                $existeUsuario_s = $gestarUsuario_s->seleccionarId(array($this->datos["documento"], $this->datos['email']));
                //Si no existe la persona en la base se procede a insertar
                if (1 == $existeUsuario_s['exitoSeleccionId']) {
                    //se encripta la contraseña que viene
                    //inserción de los campos en la tabla usuario_s
                    $insertoUsuario_s = $gestarUsuario_s->insertar($this->datos);
                    //indica si se logró inserción de los campos en la tabla usuario_s
                    $exitoInsercionUsuario_s = $insertoUsuario_s['inserto'];
                    if ($exitoInsercionUsuario_s == 1) {
                        session_start(); //se abre sesión para almacenar en ella el mensaje de inserción
                        $_SESSION['mensaje'] = "Registrado con èxito para ingreso al sistema"; //mensaje de inserción
                        if ($this->datos['rutaSena'] == 'gestionDeRegistro') {//si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                            header("location:vistasAdmin/FormRegistroEmpleado.php");
                        }
                    } else {
                        session_start();
                        $_SESSION['documento'] = $this->datos['documento'];
                        $_SESSION['nombre'] = $this->datos['nombre'];
                        $_SESSION['apellidos'] = $this->datos['apellidos'];
                        $_SESSION['email'] = $this->datos['email'];
                        $_SESSION['telefono'] = $this->datos['telefono'];
                        $_SESSION['tipoEmpleado'] = $this->datos['tipoEmpleado'];
                        $_SESSION['mensaje'] = $exitoInsercionUsuario_s;
                        if ($this->datos['rutaSena'] == 'gestionDeRegistro') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                            header("location:vistasAdmin/FormRegistroEmpleado.php");
                        }
                    }
                } else {//Si la persona ya existe se abre sesión para almacenar en ella el mensaje de NO inserción y devolver datos al formulario por medio de la sesión
                    session_start();
                    $_SESSION['documento'] = $this->datos['documento'];
                    $_SESSION['nombre'] = $this->datos['nombre'];
                    $_SESSION['apellidos'] = $this->datos['apellidos'];
                    $_SESSION['email'] = $this->datos['email'];
                    $_SESSION['telefono'] = $this->datos['telefono'];
                    $_SESSION['mensaje'] = "El usuario ya existe en el sistema.";
                    if ($this->datos['rutaSena'] == 'gestionDeRegistro') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                        header("location:vistasAdmin/FormRegistroEmpleado.php");
                    }
                }
                break;
            case "gestionDeTablasEmpeladoo":
                $gestarTablas_s = new Empleado_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $insertoUsuario_s = $gestarTablas_s->seleccionarTodos();
                session_start(); //se abre sesión para almacenar en ella el mensaje de inserción
                $_SESSION['mensaje'] = "Se entontraron datos para esta tabla";
                $_SESSION['datos'] = $insertoUsuario_s;
                header("location:vistasAdmin/visaEmpleado.php");

                break;
            default :
                break;
        }
    }

}
