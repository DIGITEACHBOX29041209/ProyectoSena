<?php
session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['datos'])) {
    $actualizarDatosEmpleado = $_SESSION['datos'];
    unset($_SESSION['datos']);
}
if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
?>
<<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>SB Admin 2 - Register</title>
        <!-- Custom fonts for this template-->
        <link href="../../Recursos/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="../../Recursos/css/sb-admin-2.min.css" rel="stylesheet">
    </head>

    <body class="bg-gradient-primary">
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Actualizar Provedor</h1>
                                </div>
                                <form class="user" method="GET" action="../Controlador.php" id="formRegistro">

                                    <input class="form-control" placeholder="Id" name="idEmpleado" type="number" pattern="" required="required" autofocus readonly="readonly" 
                                           value="<?php
                                           if (isset($actualizarDatosEmpleado[0]->empIdEmpleado))
                                               echo $actualizarDatosEmpleado[0]->empIdEmpleado;
                                           if (isset($erroresValidacion['datosViejos']['empIdEmpleado']))
                                               echo $erroresValidacion['datosViejos']['empIdEmpleado'];
                                           if (isset($_SESSION['empIdEmpleado']))
                                               echo $_SESSION['empIdEmpleado'];
                                           unset($_SESSION['empIdEmpleado']);
                                           ?>">                         
                                <!--<p class="help-block">Example block-level help text here.</p>-->
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>                  
                                            <input class="form-control" placeholder="Documento" name="documento" type="number"  required="required" 
                                                   value="<?php
                                                   if (isset($actualizarDatosEmpleado[0]->empDocumentoEmpleado))
                                                       echo $actualizarDatosEmpleado[0]->empDocumentoEmpleado;
                                                   if (isset($erroresValidacion['datosViejos']['empDocumentoEmpleado']))
                                                       echo $erroresValidacion['datosViejos']['empDocumentoEmpleado'];
                                                   if (isset($_SESSION['empDocumentoEmpleado']))
                                                       echo $_SESSION['empDocumentoEmpleado'];
                                                   unset($_SESSION['empDocumentoEmpleado']);
                                                   ?>">  
                                                    <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>                  
                                            <input class="form-control" placeholder="Nombre" name="nombre" type="text"  required="required" 
                                                   value="<?php
                                                   if (isset($actualizarDatosEmpleado[0]->empNombreEmpleado))
                                                       echo $actualizarDatosEmpleado[0]->empNombreEmpleado;
                                                   if (isset($erroresValidacion['datosViejos']['empNombreEmpleado']))
                                                       echo $erroresValidacion['datosViejos']['empNombreEmpleado'];
                                                   if (isset($_SESSION['empNombreEmpleado']))
                                                       echo $_SESSION['empNombreEmpleado'];
                                                   unset($_SESSION['empNombreEmpleado']);
                                                   ?>">  
                                                    <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                                        </td>
                                    </tr>                  
                                    <tr>
                                        <td>                  
                                            <input class="form-control" placeholder="apellido" name="apellidos" type="text"  required="required" 
                                                   value="<?php
                                                   if (isset($actualizarDatosEmpleado[0]->empApellidoEmpleado))
                                                       echo $actualizarDatosEmpleado[0]->empApellidoEmpleado;
                                                   if (isset($erroresValidacion['datosViejos']['empApellidoEmpleado']))
                                                       echo $erroresValidacion['datosViejos']['empApellidoEmpleado'];
                                                   if (isset($_SESSION['empApellidoEmpleado']))
                                                       echo $_SESSION['empApellidoEmpleado'];
                                                   unset($_SESSION['empApellidoEmpleado']);
                                                   ?>">                                

<!--<p class="help-block">Example block-level help text here.</p>-->                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>                  
                                            <input class="form-control" placeholder="Correo" name="email" type="text"  required="required" 
                                                   value="<?php
                                                   if (isset($actualizarDatosEmpleado[0]->empCorreo))
                                                       echo $actualizarDatosEmpleado[0]->empCorreo;
                                                   if (isset($erroresValidacion['datosViejos']['empCorreo']))
                                                       echo $erroresValidacion['datosViejos']['empCorreo'];
                                                   if (isset($_SESSION['empCorreo']))
                                                       echo $_SESSION['empCorreo'];
                                                   unset($_SESSION['empCorreo']);
                                                   ?>">  
                                                    <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                                        </td>
                                    </tr>  
                                    <tr>
                                        <td>                  
                                            <input class="form-control" placeholder="Telefono" name="telefono" type="number"  required="required" 
                                                   value="<?php
                                                   if (isset($actualizarDatosEmpleado[0]->empTelefonoEmpleado))
                                                       echo $actualizarDatosEmpleado[0]->empTelefonoEmpleado;
                                                   if (isset($erroresValidacion['datosViejos']['empTelefonoEmpleado']))
                                                       echo $erroresValidacion['datosViejos']['empTelefonoEmpleado'];
                                                   if (isset($_SESSION['empTelefonoEmpleado']))
                                                       echo $_SESSION['empTelefonoEmpleado'];
                                                   unset($_SESSION['empTelefonoEmpleado']);
                                                   ?>">  
                                                    <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                                        </td>
                                    </tr>  
                                    <br>
                                    <tr>            
                                        <td>            
                                            <button type="reset" name="rutaSena" value="cancelarActualizarProvedor" class="btn btn-primary btn-user btn-block">Cancelar</button>
                                            <br>
                                            <input type="hidden" name="rutaSena" value="confirmaActualizarEmpleado">
                                            <button type="submit" class="btn btn-primary btn-user btn-block"> Actualizar Empleado</button>
                                        </td>
                                    </tr>             
                                    </table>
                                </form>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../../Recursos/vendor/jquery/jquery.min.js"></script>
        <script src="../../Recursos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../../Recursos/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../../Recursos/js/sb-admin-2.min.js"></script>

    </body>

</html>