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
                                    <h1 class="h4 text-gray-900 mb-4">Crear Producto!</h1>
                                </div>
                                <form class="user" method="GET" action="../Controlador.php" id="formRegistroProducto">
                                    <div>
                                        <input placeholder="Nombre" name="nombre" type="text" required="required" autofocus
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['nombre']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['nombre'] . "\"";
                                               if (isset($_SESSION['nombre']))
                                                   echo "\"" . $_SESSION['nombre'] . "\"";
                                               unset($_SESSION['nombre']);
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
                                        <input placeholder="Descripcion" name="descripcion" type="text"   required="required"
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['descripcion']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['descripcion'] . "\"";
                                               if (isset($_SESSION['descripcion'])) {
                                                   echo "\"" . $_SESSION['descripcion'] . "\"";
                                                   unset($_SESSION['descripcion']);
                                               }
                                               ?>
                                               >
                                        <div>
                                            <?php
                                            if (isset($erroresValidacion['marcaCampo']['descripcion']))
                                                echo "<font color='red'>" . $erroresValidacion['marcaCampo']['descripcion'] . "</font>";
                                            ?>                                        
                                            <?php
                                            if (isset($erroresValidacion['mensajesError']['descripcion']))
                                                echo "<font color='red'>" . $erroresValidacion['mensajesError']['descripcion'] . "</font>";
                                            ?>
                                        </div>
                                    </div>
                                    <div>
                                        <input placeholder="Cantidad" name="cantidad" type="number"  required="required"
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['cantidad']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['cantidad'] . "\"";
                                               if (isset($_SESSION['cantidad'])) {
                                                   echo "\"" . $_SESSION['cantidad'] . "\"";
                                                   unset($_SESSION['cantidad']);
                                               }
                                               ?>
                                               >
                                        <div>
                                            <?php
                                            if (isset($erroresValidacion['marcaCampo']['cantidad']))
                                                echo "<font color='red'>" . $erroresValidacion['marcaCampo']['cantidad'] . "</font>";
                                            ?>
                                            <?php
                                            if (isset($erroresValidacion['mensajesError']['cantidad']))
                                                echo "<font color='red'>" . $erroresValidacion['mensajesError']['cantidad'] . "</font>";
                                            ?>
                                        </div>
                                    </div>
                                    <div>
                                        <input placeholder="Precio Neto" name="precioNeto" type="number"  required="required"
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['precioNeto']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['precioNeto'] . "\"";
                                               if (isset($_SESSION['precioNeto'])) {
                                                   echo "\"" . $_SESSION['precioNeto'] . "\"";
                                                   unset($_SESSION['precioNeto']);
                                               }
                                               ?>
                                               >
                                        <div>
                                            <?php
                                            if (isset($erroresValidacion['marcaCampo']['precioNeto']))
                                                echo "<font color='red'>" . $erroresValidacion['marcaCampo']['precioNeto'] . "</font>";
                                            ?>
                                            <?php
                                            if (isset($erroresValidacion['mensajesError']['precioNeto']))
                                                echo "<font color='red'>" . $erroresValidacion['mensajesError']['precioNeto'] . "</font>";
                                            ?>
                                        </div>
                                       
                                    </div>
                                    <div>
                                        <input placeholder="Precio Producto" name="precioProducto" type="number"   required="required"
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['precioProducto']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['precioProducto'] . "\"";
                                               if (isset($_SESSION['precioProducto'])) {
                                                   echo "\"" . $_SESSION['precioProducto'] . "\"";
                                                   unset($_SESSION['precioProducto']);
                                               }
                                               ?>
                                               >
                                        <div>
                                            <?php
                                            if (isset($erroresValidacion['marcaCampo']['precioProducto']))
                                                echo "<font color='red'>" . $erroresValidacion['marcaCampo']['precioProducto'] . "</font>";
                                            ?>                                        
                                            <?php
                                            if (isset($erroresValidacion['mensajesError']['precioProducto']))
                                                echo "<font color='red'>" . $erroresValidacion['mensajesError']['telefonoprecioProducto'] . "</font>";
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="rutaSena" value="gestionarRegistroProducto">
                                    <button onclick="valida_registroProducto()" class="btn btn-primary btn-user btn-block">Registrar Producto</button>
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


