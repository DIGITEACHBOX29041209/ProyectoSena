<?php
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
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
        <title>Registro Empleado</title>
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
                        <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        </div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h3 class="mb-4 textRed">Crear cuenta empleado!</h3>
                                </div>
                                <form class="user" method="GET" action="../Controlador.php" id="formRegistro">
                                    <div>
                                        <input placeholder="Documento" name="documento" maxlength="10" max="999999999999" type="number" required="required" class="form-control" autofocus
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['documento']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['documento'] . "\"";
                                               if (isset($_SESSION['documento']))
                                                   echo "\"" . $_SESSION['documento'] . "\"";
                                               unset($_SESSION['documento']);
                                               ?>
                                               >
                                        <div>
                                            <?php
                                            if (isset($erroresValidacion['marcaCampo']['documento']))
                                                echo "<font color='red'>" . $erroresValidacion['marcaCampo']['documento'] . "</font>";
                                            ?>
                                            <?php
                                            if (isset($erroresValidacion['mensajesError']['documento']))
                                                echo "<font color='red'>" . $erroresValidacion['mensajesError']['documento'] . "</font>";
                                            ?>  
                                        </div>
                                    </div> <br>
                                    <div>
                                        <input placeholder="Nombres" name="nombre" type="text"   required="required" class="form-control"
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['nombre']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['nombre'] . "\"";
                                               if (isset($_SESSION['nombre'])) {
                                                   echo "\"" . $_SESSION['nombre'] . "\"";
                                                   unset($_SESSION['nombre']);
                                               }
                                               ?>
                                               >
                                        <div>
                                            <?php
                                            if (isset($erroresValidacion['marcaCampo']['nombre']))
                                                echo "<font color='red'>" . $erroresValidacion['marcaCampo']['nombre'] . "</font>";
                                            ?>                                        
                                            <?php
                                            if (isset($erroresValidacion['mensajesError']['nombre']))
                                                echo "<font color='red'>" . $erroresValidacion['mensajesError']['nombre'] . "</font>";
                                            ?>
                                        </div>
                                    </div><br>
                                    <div>
                                        <input placeholder="Apellidos" name="apellidos" type="text"  required="required" class="form-control"
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['apellidos']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['apellidos'] . "\"";
                                               if (isset($_SESSION['apellidos'])) {
                                                   echo "\"" . $_SESSION['apellidos'] . "\"";
                                                   unset($_SESSION['apellidos']);
                                               }
                                               ?>
                                               >
                                        <div>
                                            <?php
                                            if (isset($erroresValidacion['marcaCampo']['apellidos']))
                                                echo "<font color='red'>" . $erroresValidacion['marcaCampo']['apellidos'] . "</font>";
                                            ?>
                                            <?php
                                            if (isset($erroresValidacion['mensajesError']['apellidos']))
                                                echo "<font color='red'>" . $erroresValidacion['mensajesError']['apellidos'] . "</font>";
                                            ?>
                                        </div>
                                    </div><br>
                                    <div>
                                        <input id="InputCorreo" placeholder="Correo Electrónico" name="email" type="email"  required="required" class="form-control"
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['email']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['email'] . "\"";
                                               if (isset($_SESSION['email'])) {
                                                   echo "\"" . $_SESSION['email'] . "\"";
                                                   unset($_SESSION['email']);
                                               }
                                               ?>
                                               >
                                        <div>
                                            <?php
                                            if (isset($erroresValidacion['marcaCampo']['email']))
                                                echo "<font color='red'>" . $erroresValidacion['marcaCampo']['email'] . "</font>";
                                            ?>
                                            <?php
                                            if (isset($erroresValidacion['mensajesError']['email']))
                                                echo "<font color='red'>" . $erroresValidacion['mensajesError']['email'] . "</font>";
                                            ?>
                                        </div>

                                    </div><br>
                                    <div>
                                        <input placeholder="Telefono" name="telefono" type="number"   required="required" class="form-control"
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['telefono']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['telefono'] . "\"";
                                               if (isset($_SESSION['telefono'])) {
                                                   echo "\"" . $_SESSION['telefono'] . "\"";
                                                   unset($_SESSION['telefono']);
                                               }
                                               ?>
                                               >
                                        <div>
                                            <?php
                                            if (isset($erroresValidacion['marcaCampo']['telefono']))
                                                echo "<font color='red'>" . $erroresValidacion['marcaCampo']['telefono'] . "</font>";
                                            ?>                                        
                                            <?php
                                            if (isset($erroresValidacion['mensajesError']['telefono']))
                                                echo "<font color='red'>" . $erroresValidacion['mensajesError']['telefono'] . "</font>";
                                            ?>
                                        </div>
                                    </div><br>
                                    <div>
                                        <input id="InputPassword" placeholder="Password" name="password" type="password" value=""  required="required" class="form-control"> 
                                    </div>
                                    <div><br>
                                        <input id="InputPassword2"  placeholder="Confirmar Password" name="password2" type="password" value="" required="required" class="form-control">
                                    </div><br>
                                    <a class="btn btn-primary btn-block" style="color:white;" href="../Controlador.php?rutaSena=gestionDeTablasEmpeladoo">Cancelar </a>
                                    <br>
                                    <input type="hidden" name="rutaSena" value="gestionDeRegistro">
                                    <button onclick="valida_registroEmpleado()" class="btn btn-primary btn-block">Registrar Empleado</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>

