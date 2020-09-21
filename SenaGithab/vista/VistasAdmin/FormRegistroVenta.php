<?php
session_start();

$datosproducto = NULL;

if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
if (isset($_SESSION['msmAux'])) {
    if (($_SESSION['msmAux']) == 0) {
        if (isset($_SESSION['datosProducto'])) {
            $datosproducto = ($_SESSION['datosProducto']);
            print_r($datosproducto);
        }
    } else {
        if (isset($_SESSION['mensaje'])) {
            
        }
    }
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
                        <div class="col-lg-5 d-none d-lg-block "></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Crear Venta!</h1>
                                </div>
                                <form class="user" method="GET" action="../Controlador.php" id="formSeleccionarProducto">
                                    <div>
                                        <input placeholder="ID Producto" name="prodidProducto" type="number"   required="required"
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['prodidProducto']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['prodidProducto'] . "\"";
                                               if ($datosproducto != null) {
                                                   echo "\"" . $datosproducto->prodidProducto . "\"";
                                               }
                                               ?> >
                                    </div><br>
                                    <input type="hidden" name="rutaSena" value="selectProductoInfo">
                                    <button type="submit" class="btn btn-primary btn-user btn- w-25">Traer Producto</button>
                                </form>
                                <form class="user" method="GET" action="../Controlador.php" id="formRegistroVenta">
                                    <div>                        
                                        <label>
                                            Nombre Producto: <?php
                                            if ($datosproducto != null) {
                                                echo "\"" . $datosproducto->prodNombreProducto . "\"";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div>                        
                                        <label>
                                            Descripción Producto: <?php
                                            if ($datosproducto != null) {
                                                echo "\"" . $datosproducto->prodDescripcionProducto . "\"";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div>                        
                                        <label id="PrecioProd">
                                            Precio Producto: <?php
                                            if ($datosproducto != null) {
                                                echo "\"" . $datosproducto->prodPrecioProducto . "\"";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div>
                                        <input id="descuento" placeholder="Descuento Realizado" name="venDescuentoRealizado" type="number"  required="required"
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['venDescuentoRealizado']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['venDescuentoRealizado'] . "\"";
                                               if (isset($_SESSION['venDescuentoRealizado'])) {
                                                   echo "\"" . $_SESSION['venDescuentoRealizado'] . "\"";
                                                   unset($_SESSION['venDescuentoRealizado']);
                                               }
                                               ?>
                                               >
                                    </div> <br>
                                    <input type="hidden" name="rutaSena" value="gestionDeRegistroVenta">
                                    <button onclick="validar_registroventa()" class="btn btn-primary btn-user btn-block">Registrar Venta</button>
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