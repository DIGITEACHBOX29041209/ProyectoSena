<?php
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['datos'])) {
    $actualizarDatosProducto = $_SESSION['datos'];
    unset($_SESSION['datos']);
}
if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
if (isset($_SESSION['arrayProveedor'])) {
    $tablaProveedor = $_SESSION['arrayProveedor'];
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
        <title>Producto</title>
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
                                    <h1 class="h4 text-gray-900 mb-4">Actualizar Producto</h1>
                                </div>
                                <form class="user" method="GET" action="../Controlador.php" id="formRegistroProducto">

                                    <input class="form-control" placeholder="Id" name="idProducto" type="number" pattern="" required="required" autofocus readonly="readonly" 
                                           value="<?php
                                           if (isset($actualizarDatosProducto[0]->prodidProducto))
                                               echo $actualizarDatosProducto[0]->prodidProducto;
                                           if (isset($erroresValidacion['datosViejos']['prodidProducto']))
                                               echo $erroresValidacion['datosViejos']['prodidProducto'];
                                           if (isset($_SESSION['prodidProducto']))
                                               echo $_SESSION['prodidProducto'];
                                           unset($_SESSION['prodidProducto']);
                                           ?>"> 
                                    <br>

                                    <input class="form-control" placeholder="Nombre" name="nombre" type="text"  required="required" 
                                           value="<?php
                                           if (isset($actualizarDatosProducto[0]->prodNombreProducto))
                                               echo $actualizarDatosProducto[0]->prodNombreProducto;
                                           if (isset($erroresValidacion['datosViejos']['prodNombreProducto']))
                                               echo $erroresValidacion['datosViejos']['prodNombreProducto'];
                                           if (isset($_SESSION['prodNombreProducto']))
                                               echo $_SESSION['prodNombreProducto'];
                                           unset($_SESSION['prodNombreProducto']);
                                           ?>">  
                                    <br>

                                    <input class="form-control" placeholder="Descripcion" name="descripcion" type="text"  required="required" 
                                           value="<?php
                                           if (isset($actualizarDatosProducto[0]->prodDescripcionProducto))
                                               echo $actualizarDatosProducto[0]->prodDescripcionProducto;
                                           if (isset($erroresValidacion['datosViejos']['prodDescripcionProducto']))
                                               echo $erroresValidacion['datosViejos']['prodDescripcionProducto'];
                                           if (isset($_SESSION['prodDescripcionProducto']))
                                               echo $_SESSION['prodDescripcionProducto'];
                                           unset($_SESSION['prodDescripcionProducto']);
                                           ?>">  
                                    <br>

                                    <select class="form-control" name="Proveedor" required="required"> 
                                        <option value="">Seleccione Proveedor</option>
                                        <?php
                                        $i = 0;
                                        foreach ($tablaProveedor as $key => $value) {
                                            ?>
                                            <option value="<?php echo $tablaProveedor[$i]->provIdProvedores; ?>"> <?php echo $tablaProveedor[$i]->provNombreProvedor; ?></option><?php
                                            $i++;
                                        }
                                        ?>
                                    </select>   
                                    <br>

                                    <input class="form-control" placeholder="Cantidad" name="cantidad" type="number"  required="required" 
                                           value="<?php
                                           if (isset($actualizarDatosProducto[0]->prodCantidadProducto))
                                               echo $actualizarDatosProducto[0]->prodCantidadProducto;
                                           if (isset($erroresValidacion['datosViejos']['prodCantidadProducto']))
                                               echo $erroresValidacion['datosViejos']['prodCantidadProducto'];
                                           if (isset($_SESSION['prodCantidadProducto']))
                                               echo $_SESSION['prodCantidadProducto'];
                                           unset($_SESSION['prodCantidadProducto']);
                                           ?>">         
                                    <br>

                                    <input class="form-control" placeholder="Precio Neto" name="precioNeto" type="number"  required="required" 
                                           value="<?php
                                           if (isset($actualizarDatosProducto[0]->prodPrecioNeto))
                                               echo $actualizarDatosProducto[0]->prodPrecioNeto;
                                           if (isset($erroresValidacion['datosViejos']['prodPrecioNeto']))
                                               echo $erroresValidacion['datosViejos']['prodPrecioNeto'];
                                           if (isset($_SESSION['prodPrecioNeto']))
                                               echo $_SESSION['prodPrecioNeto'];
                                           unset($_SESSION['prodPrecioNeto']);
                                           ?>">  
                                    <br>

                                    <input class="form-control" placeholder="Precio Producto" name="precioProducto" type="number"  required="required" 
                                           value="<?php
                                           if (isset($actualizarDatosProducto[0]->prodPrecioProducto))
                                               echo $actualizarDatosProducto[0]->prodPrecioProducto;
                                           if (isset($erroresValidacion['datosViejos']['prodPrecioProducto']))
                                               echo $erroresValidacion['datosViejos']['prodPrecioProducto'];
                                           if (isset($_SESSION['prodPrecioProducto']))
                                               echo $_SESSION['prodPrecioProducto'];
                                           unset($_SESSION['prodPrecioProducto']);
                                           ?>">  
                                    <br>

                                    <a class="btn btn-primary btn-block" style="color:white;" href="../Controlador.php?rutaSena=gestionDeTablasproveedor">Cancelar </a>
                                    <br>
                                    <input type="hidden" name="rutaSena" value="confirmaActualizarProducto">
                                    <button type="submit" class="btn btn-primary btn-block"> Actualizar Producto</button>

                                </form>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>