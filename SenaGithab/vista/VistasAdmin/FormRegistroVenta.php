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
        <title>Venta</title>
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
                            <button class="btn btn-primary btn-block w-75 m-auto" type="button" onclick="FinalizarCompra()">Finalizar venta</button>
                            <div class="m-auto text-center mt-4"> 
                                <small class="mt-2">Precio total: </small>
                                <small id="PrecioTotalComprar"></small><br>
                            </div>
                            <div class="mt-3" id="contenedorFactura">
                            </div>
                            <div id="respuesta" >
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                     <h3 class="mb-4 textRed">Crear Nueva Venta!</h3>
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
                                            <label id="nombreProd" >
                                            </label>
                                        </label>
                                    </div>
                                    <div>                        
                                        <label>
                                            <strong>Descripción Producto:  </strong>
                                            <label id="DesProducto">
                                            </label>
                                        </label>
                                    </div>
                                    <div>                        
                                        <label >
                                            <strong>Precio Producto:  </strong>
                                            <label id="PrecioProd">
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
        <script src="../../controladores/ManejoSesiones/ajax.php"></script>
        <script>
                                        var AuxArray = [];
                                        var Total = 0;
                                        // Cargar informacion de los productos vendidos
                                        function NuevaVenta() {
                                            var nombreProd = document.getElementById('nombreProd').innerHTML.trim();
                                            var DesProducto = document.getElementById('DesProducto').innerHTML.trim();
                                            var PrecioProd = document.getElementById('PrecioProd').innerHTML.trim();
                                            if (nombreProd !== 'undefined') {
                                                var descuento = $('#descuento').val().trim();
                                                if (descuento === '' || descuento === null) {
                                                    descuento = 0;
                                                }
                                                if (descuento !== 0) {
                                                    var aux1 = parseInt(descuento, 10);
                                                    var aux2 = parseInt(PrecioProd, 10);
                                                    var desMax = 30 * aux2 / 100;
                                                    if (desMax >= aux1) {
                                                        var Preciofinal = aux2 - aux1;
                                                        const ArrayVenta = [nombreProd, DesProducto, PrecioProd, descuento, Preciofinal];
                                                        var newLabel1 = document.createElement('label');
                                                        newLabel1.className += "col-md-12   control-label";
                                                        newLabel1.innerHTML = 'Nombre Producto: ' + nombreProd + '<br> PrecioProd: ' + PrecioProd + '<br> Descuento: ' + descuento + ' <br> Precio Final: ' + Preciofinal + ' <hr class="sidebar-divider my-0">';
                                                        var contenedor = document.getElementById('contenedorFactura');
                                                        contenedor.appendChild(newLabel1);
                                                        Total = Total + Preciofinal;
                                                        document.getElementById('PrecioTotalComprar').innerHTML = '';
                                                        document.getElementById('PrecioTotalComprar').innerHTML = Total;
                                                        AuxArray = AuxArray.concat(ArrayVenta);
                                                        alert(AuxArray);
                                                    } else {
                                                        alert('No se puede hacer este descuento por este producro / Descuento maximo: ' + desMax);
                                                    }
                                                }
                                            } else {
                                                alert('El codigo no existe en el sistema');
                                            }
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
                                                dataType: 'json',
                                                data: {action: action, producto: prodidProducto},
                                                success: function (e) {
                                                    document.getElementById('nombreProd').innerHTML = e.prodNombreProducto;
                                                    document.getElementById('DesProducto').innerHTML = e.prodDescripcionProducto;
                                                    document.getElementById('PrecioProd').innerHTML = e.prodPrecioProducto;
                                                    document.getElementById('descuento').value = '0';
                                                    if(e.prodNombreProducto === undefined){
                                                        alert('El codigo de este procuto no se encontro en los registros');
                                                    }
                                                },
                                                error: function (error) {

                                                }
                                            })
                                        });
                                        
                                        function FinalizarCompra(){
                                            
                                        }
        </script>
    </body>
</html>