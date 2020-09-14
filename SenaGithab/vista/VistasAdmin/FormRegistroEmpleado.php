<?php
session_start();
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
                                    <h1 class="h4 text-gray-900 mb-4">Crear cuenta empleado!</h1>
                                </div>
                                <form class="user" method="GET" action="../Controlador.php" id="formRegistro">
                                    <div>
                                        <input placeholder="Documento" name="documento" type="number" required="required" autofocus
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
                                    </div>
                                    <div>
                                        <input placeholder="Nombres" name="nombre" type="text"   required="required"
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
                                    </div>
                                    <div>
                                        <input placeholder="Apellidos" name="apellidos" type="text"  required="required"
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
                                    </div>
                                    <div>
                                        <input id="InputCorreo" placeholder="Correo Electrónico" name="email" type="email"  required="required"
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
                                        <div>
                                            <select id="tipoEmpleado"   name="tipoEmpleado" required="required">
                                                <option value="">Tipo Empleado</option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Gerente</option>
                                                <option value="3">Vendedor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <input placeholder="Telefono" name="telefono" type="number"   required="required"
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
                                    </div>
                                    <div>
                                        <input id="InputPassword" placeholder="Password" name="password" type="password" value=""  required="required">
                                    </div>
                                    <div>
                                        <input id="InputPassword2"  placeholder="Confirmar Password" name="password2" type="password" value="" required="required">
                                    </div>
                                    <input type="hidden" name="rutaSena" value="gestionDeTablasEmpleado">
                                    <button onclick="valida_registroEmpleado()" class="btn btn-primary btn-user btn-block">Registrar Empleado</button>
                                </form>
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

