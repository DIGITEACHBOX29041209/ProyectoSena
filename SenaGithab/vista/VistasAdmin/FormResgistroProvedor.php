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
                                    <h1 class="h4 text-gray-900 mb-4">Nuevo Provedor</h1>
                                </div>
                                <form class="user" method="GET" action="../Controlador.php" id="formRegistroProvedor">
                                    <div>
                                        <input placeholder="Nombre" name="NombreProvedor" type="int" required="required" autofocus
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['NombreProvedor']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['NombreProvedor'] . "\"";
                                               if (isset($_SESSION['NombreProvedor']))
                                                   echo "\"" . $_SESSION['NombreProvedor'] . "\"";
                                               unset($_SESSION['NombreProvedor']);
                                               ?>
                                               >
                                        <div>
                                            <?php
                                            if (isset($erroresValidacion['marcaCampo']['NombreProvedor']))
                                                echo "<font color='red'>" . $erroresValidacion['marcaCampo']['NombreProvedor'] . "</font>";
                                            ?>
                                            <?php
                                            if (isset($erroresValidacion['mensajesError']['NombreProvedor']))
                                                echo "<font color='red'>" . $erroresValidacion['mensajesError']['NombreProvedor'] . "</font>";
                                            ?>  
                                        </div>
                                    </div>
                                    <div>
                                        <input placeholder="Direccion" name="DireccionProvedor" type="int"   required="required"
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['DireccionProvedor']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['DireccionProvedor'] . "\"";
                                               if (isset($_SESSION['DireccionProvedor'])) {
                                                   echo "\"" . $_SESSION['DireccionProvedor'] . "\"";
                                                   unset($_SESSION['DireccionProvedor']);
                                               }
                                               ?>
                                               >
                                        <div>
                                            <?php
                                            if (isset($erroresValidacion['marcaCampo']['DireccionProvedor']))
                                                echo "<font color='red'>" . $erroresValidacion['marcaCampo']['DireccionProvedor'] . "</font>";
                                            ?>                                        
                                            <?php
                                            if (isset($erroresValidacion['mensajesError']['DireccionProvedor']))
                                                echo "<font color='red'>" . $erroresValidacion['mensajesError']['DireccionProvedor'] . "</font>";
                                            ?>
                                        </div>
                                    </div>
                                    <div>
                                        <input placeholder="Telefono" name="TelefonoProvedor" type="number"  required="required"
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['TelefonoProvedor']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['TelefonoProvedor'] . "\"";
                                               if (isset($_SESSION['TelefonoProvedor'])) {
                                                   echo "\"" . $_SESSION['TelefonoProvedor'] . "\"";
                                                   unset($_SESSION['TelefonoProvedor']);
                                               }
                                               ?>
                                               >
                                    <input type="hidden" name="rutaSena" value="gestionDeRegistroProvedor">
                                    <button onclick="valida_registroProveedor()" class="btn btn-primary btn-user btn-block">Registrar Provedor</button>
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
