<?php
$datosproducto = NULL;

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
        <!--Ajax -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body class="bg-gradient-primary">
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-lg-block p-5 ">
                            <input type="hidden" name="rutaSena" value="gestionDeRegistroVenta">
                            <button class="btn btn-primary btn-block w-75 m-auto">Finalizar venta</button>
                            <div class="mt-3" id="contenedorFactura">
                            </div>
                            <div id="respuesta" >
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Crear Venta!</h1>
                                </div>
                                <div class="row pr-5 pl-5">
                                    <input class="col-10" placeholder="ID Producto" name="prodidProducto" type="number" id="prodidProducto" required="required" >
                                    <div class="col-2">
                                        <button type="button" id="BuscarProducto" class="btn btn-primary "><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                                <br>
                                <form class="user" method="GET" action="../Controlador.php" id="formRegistroVenta">
                                    <div>                        
                                        <label>
                                            <strong>Nombre Producto:  </strong>
                                            <label id="nombreProd">
                                                <?php
                                                if ($datosproducto != null) {
                                                    echo "\"" . $datosproducto->prodNombreProducto . "\"";
                                                }
                                                ?>
                                            </label>
                                        </label>
                                    </div>
                                    <div>                        
                                        <label>
                                            <strong>Descripción Producto:  </strong>
                                            <label id="DesProducto">
                                                <?php
                                                if ($datosproducto != null) {
                                                    echo "\"" . $datosproducto->prodDescripcionProducto . "\"";
                                                }
                                                ?>
                                            </label>
                                        </label>
                                    </div>
                                    <div>                        
                                        <label >
                                            <strong>Precio Producto:  </strong>
                                            <label id="PrecioProd">
                                                <?php
                                                if ($datosproducto != null) {
                                                    echo "\"" . $datosproducto->prodPrecioProducto . "\"";
                                                }
                                                ?>
                                            </label>
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
                                    <button onclick="NuevaVenta()" type="button" class="btn btn-primary btn-block">Registrar Producto</button>
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

        <script>
                                        var AuxArray = [];

// Cargar informacion de los productos vendidos
                                        function NuevaVenta() {
                                            var nombreProd = document.getElementById('nombreProd').innerHTML.trim();
                                            var DesProducto = document.getElementById('DesProducto').innerHTML.trim();
                                            var PrecioProd = document.getElementById('PrecioProd').innerHTML.trim();
                                            var descuento = $('#descuento').val().trim();
                                            if (descuento === '' || descuento === null) {
                                                descuento = 0;
                                            }
                                            const ArrayVenta = [nombreProd, DesProducto, PrecioProd, descuento];

                                            var newLabel1 = document.createElement('label');
                                            newLabel1.className += "col-md-12   control-label";
                                            newLabel1.innerHTML = "Test";
                                            var contenedor = document.getElementById('contenedorFactura');
                                            contenedor.appendChild(newLabel1);

                                            AuxArray = AuxArray.concat(ArrayVenta);
                                            alert(AuxArray);
                                            return (false);
                                        }

// Cargar informacion de los productos vendidos
                                        $('#BuscarProducto').click(function (e) {
                                            var prodidProducto = document.getElementById('prodidProducto').value;
                                            var action = "buscarProducto";

                                            $.ajax({
                                                url: '../../controladores/ajax.php',
                                                type: 'POST',
                                                async: true,
                                                data: {action:action, producto:prodidProducto},
                                                
                                                success: function (response){
                                                		$('#respuesta').html(response);
                                                },
                                                error:function (error){
                                                    
                                                }
                                            })
                                        });
        </script>
    </body>
</html>