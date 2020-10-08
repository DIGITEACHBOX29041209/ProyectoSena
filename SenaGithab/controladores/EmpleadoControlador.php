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
                $existeUsuario_s = $gestarUsuario_s->seleccionarId(array($this->datos["documento"], $this->datos['email']));
                
                if (1 == $existeUsuario_s['exitoSeleccionId']) {
                    $insertoUsuario_s = $gestarUsuario_s->insertar($this->datos);
                    $exitoInsercionUsuario_s = $insertoUsuario_s['inserto'];
                    if ($exitoInsercionUsuario_s == 1) {
                        session_start(); //se abre sesión para almacenar en ella el mensaje de inserción
                        $_SESSION['mensaje'] = "Registrado con èxito para ingreso al sistema"; //mensaje de inserción
                        if ($this->datos['rutaSena'] == 'gestionDeRegistro') {//si el formulario de la inserción es el de registrarse y fue exitoso se devuelve a login.php
                            header("location:Controlador.php?rutaSena=gestionDeTablasEmpeladoo");
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
                            header("location: vistasAdmin/VistaPrincipalAdmin.php?contenido=FormRegistroEmpleado.php");
                        }
                    }
                } 
                if (0 == $existeUsuario_s['exitoSeleccionId']) {
                 session_start();
                        $_SESSION['documento'] = $this->datos['documento'];
                        $_SESSION['nombre'] = $this->datos['nombre'];
                        $_SESSION['apellidos'] = $this->datos['apellidos'];
                        $_SESSION['email'] = $this->datos['email'];
                        $_SESSION['telefono'] = $this->datos['telefono'];
                        $_SESSION['tipoEmpleado'] = $this->datos['tipoEmpleado'];
                        $_SESSION['mensaje'] = 'Usuario inactivo ';
                        if ($this->datos['rutaSena'] == 'gestionDeRegistro') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                            header("location: vistasAdmin/VistaPrincipalAdmin.php?contenido=FormRegistroEmpleado.php");
                        }
                }
                 if (3 == $existeUsuario_s['exitoSeleccionId']) {
                 session_start();
                        $_SESSION['documento'] = $this->datos['documento'];
                        $_SESSION['nombre'] = $this->datos['nombre'];
                        $_SESSION['apellidos'] = $this->datos['apellidos'];
                        $_SESSION['email'] = $this->datos['email'];
                        $_SESSION['telefono'] = $this->datos['telefono'];
                        $_SESSION['tipoEmpleado'] = $this->datos['tipoEmpleado'];
                        $_SESSION['mensaje'] = 'Usuario Activo en el sistema';
                        if ($this->datos['rutaSena'] == 'gestionDeRegistro') {//si al insertar un usuario en el formulario de registrarse y éste ya existe a registro.php
                            header("location: vistasAdmin/VistaPrincipalAdmin.php?contenido=FormRegistroEmpleado.php");
                        }
                }

                break;
            case "gestionDeTablasEmpeladoo":
                $gestarTablas_s = new Empleado_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $insertoUsuario_s = $gestarTablas_s->seleccionarTodos();
                session_start(); //se abre sesión para almacenar en ella el mensaje de inserción
                $_SESSION['datos'] = $insertoUsuario_s;
                header("location: vistasAdmin/VistaPrincipalAdmin.php?contenido=visaEmpleado.php");
                break;

            case "actualizarEmpleado":
                $gestarEmpleado = new Empleado_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $consultaDeEmpleado = $gestarEmpleado->seleccionarrId(array($this->datos['idAct'])); //Se consulta el libro para traer los datos.
                session_start();
                $_SESSION['datos'] = $consultaDeEmpleado;
                header("location: vistasAdmin/VistaPrincipalAdmin.php?contenido=VistaActualizarEmpleado.php");
                break;

            case "confirmaActualizarEmpleado":
                $gestarEmpleado = new Empleado_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $actualizarEmpleado = $gestarEmpleado->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.                

                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:Controlador.php?rutaSena=gestionDeTablasEmpeladoo");
                break;

            case "eliminarEmpleado":
                $gestarEmpleado = new Empleado_Dao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $gestarEmpleado->EliminadoLogico(array($this->datos['idAct'])); // BORRADO FÍSICO
//                $gestarLibros->eliminarLogico(array($this->datos['idAct']));// BORRADO LÓGICO

                session_start();
                $_SESSION['mensaje'] = "   Borrado exitoso!!! ";
                header("location:Controlador.php?rutaSena=gestionDeTablasEmpeladoo");
                break;

            default :
                break;
        }
    }

}
