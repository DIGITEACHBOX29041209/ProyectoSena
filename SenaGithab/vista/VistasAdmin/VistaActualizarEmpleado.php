<?php
if (isset($_SESSION['datos'])) {
    $actualizarDatosEmpleado = $_SESSION['datos'];
    unset($_SESSION['datos']);
}
if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
if (isset($_SESSION['arrayEmpleado'])) {
    $tablaTipoEmpleado = $_SESSION['arrayEmpleado'];
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Empleado</title>
        <style>
            .textRed{
                color: #d40a18;
            }
        </style>
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
                                    <h3 class="mb-4 textRed">Actualizar empleado!</h3>
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
                                    <br>
                                    <input class="form-control" placeholder="Documento" name="documento" type="number"  required="required"  autofocus readonly="readonly"
                                           value="<?php
                                           if (isset($actualizarDatosEmpleado[0]->empDocumentoEmpleado))
                                               echo $actualizarDatosEmpleado[0]->empDocumentoEmpleado;
                                           if (isset($erroresValidacion['datosViejos']['empDocumentoEmpleado']))
                                               echo $erroresValidacion['datosViejos']['empDocumentoEmpleado'];
                                           if (isset($_SESSION['empDocumentoEmpleado']))
                                               echo $_SESSION['empDocumentoEmpleado'];
                                           unset($_SESSION['empDocumentoEmpleado']);
                                           ?>">  
                                    <br>
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
                                    <br>
                                    <input class="form-control" placeholder="Apellido" name="apellidos" type="text"  required="required" 
                                           value="<?php
                                           if (isset($actualizarDatosEmpleado[0]->empApellidoEmpleado))
                                               echo $actualizarDatosEmpleado[0]->empApellidoEmpleado;
                                           if (isset($erroresValidacion['datosViejos']['empApellidoEmpleado']))
                                               echo $erroresValidacion['datosViejos']['empApellidoEmpleado'];
                                           if (isset($_SESSION['empApellidoEmpleado']))
                                               echo $_SESSION['empApellidoEmpleado'];
                                           unset($_SESSION['empApellidoEmpleado']);
                                           ?>">                                
                                    <br>
                                    <input class="form-control" placeholder="Correo" name="email" type="text"  required="required" autofocus readonly="readonly"
                                           value="<?php
                                           if (isset($actualizarDatosEmpleado[0]->empCorreo))
                                               echo $actualizarDatosEmpleado[0]->empCorreo;
                                           if (isset($erroresValidacion['datosViejos']['empCorreo']))
                                               echo $erroresValidacion['datosViejos']['empCorreo'];
                                           if (isset($_SESSION['empCorreo']))
                                               echo $_SESSION['empCorreo'];
                                           unset($_SESSION['empCorreo']);
                                           ?>">  
                                    <br>
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
                                    <br>
                                    <select class="form-control" name="tipoEmpleado" required="required">
                                        <option value="">Tipo de Empleado</option>
                                        <<?php
                                        $i = 0;
                                        foreach ($tablaTipoEmpleado as $key => $value) {
                                            ?>
                                            <option value="<?php echo $tablaTipoEmpleado[$i]->tipValorEmpleado; ?>"> <?php echo $tablaTipoEmpleado[$i]->tipDescripcion; ?></option><?php
                                            $i++;
                                        }
                                        ?>
                                    </select>
                                    <br>
                                    <a class="btn btn-primary btn-block" style="color:white;" href="../Controlador.php?rutaSena=gestionDeTablasEmpeladoo">Cancelar </a>
                                    <br>
                                    <input type="hidden" name="rutaSena" value="confirmaActualizarEmpleado">
                                    <button type="submit" class="btn btn-primary btn-block"> Actualizar Empleado</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>