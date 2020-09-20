<?php
session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['datos'])) {
    $actualizarDatosProvedor = $_SESSION['datos'];
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
                                <form class="user" method="GET" action="../Controlador.php" id="formRegistroProvedor">
                                    <div>
                                        <input class="form-control" placeholder="provIdProvedores" name="provIdProvedores" type="number" pattern="" required="required" autofocus readonly="readonly" 
                                               value="<?php
                                               if (isset($actualizarDatosProvedor[0]->provIdProvedores))
                                                   echo $actualizarDatosProvedor[0]->provIdProvedores;
                                               if (isset($erroresValidacion['datosViejos']['provIdProvedores']))
                                                   echo $erroresValidacion['datosViejos']['provIdProvedores'];
                                               if (isset($_SESSION['provIdProvedores']))
                                                   echo $_SESSION['provIdProvedores'];
                                               unset($_SESSION['provIdProvedores']);
                                               ?>">                         
                                    <!--<p class="help-block">Example block-level help text here.</p>-->
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>                
                                                <input class="form-control" placeholder="Nombre" name="NombreProvedor" type="text"   required="required" 
                                                       value="<?php
                                                       if (isset($actualizarDatosProvedor[0]->provNombreProvedor))
                                                           echo $actualizarDatosProvedor[0]->provNombreProvedor;
                                                       if (isset($erroresValidacion['datosViejos']['NombreProvedor']))
                                                           echo $erroresValidacion['datosViejos']['NombreProvedor'];
                                                       if (isset($_SESSION['NombreProvedor']))
                                                           echo $_SESSION['NombreProvedor'];
                                                       unset($_SESSION['NombreProvedor']);
                                                       ?>">                                     
                                            <!--<p class="help-block">Example block-level help text here.</p>-->                      
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>                  
                                                <input class="form-control" placeholder="Direccion" name="DireccionProvedor" type="text"  required="required" 
                                                       value="<?php
                                                       if (isset($actualizarDatosProvedor[0]->provDireccionProvedor))
                                                           echo $actualizarDatosProvedor[0]->provDireccionProvedor;
                                                       if (isset($erroresValidacion['datosViejos']['DireccionProvedor']))
                                                           echo $erroresValidacion['datosViejos']['DireccionProvedor'];
                                                       if (isset($_SESSION['DireccionProvedor']))
                                                           echo $_SESSION['DireccionProvedor'];
                                                       unset($_SESSION['DireccionProvedor']);
                                                       ?>">  
                                                        <!--<p class="help-block">Example block-level help text here.</p>-->                                               
                                            </td>
                                        </tr>                  
                                        <tr>
                                            <td>                  
                                                <input class="form-control" placeholder="Telefono" name="TelefonoProvedor" type="number"  required="required" 
                                                       value="<?php
                                                       if (isset($actualizarDatosProvedor[0]->provTelefonoProvedor))
                                                           echo $actualizarDatosProvedor[0]->provTelefonoProvedor;
                                                       if (isset($erroresValidacion['datosViejos']['TelefonoProvedor']))
                                                           echo $erroresValidacion['datosViejos']['TelefonoProvedor'];
                                                       if (isset($_SESSION['TelefonoProvedor']))
                                                           echo $_SESSION['TelefonoProvedor'];
                                                       unset($_SESSION['TelefonoProvedor']);
                                                       ?>">                                

<!--<p class="help-block">Example block-level help text here.</p>-->                          
                                            </td>
                                        </tr>
                                         <br>
                                        <tr>            
                                            <td>            
                                                <button type="reset" name="rutaSena" value="cancelarActualizarProvedor" class="btn btn-primary btn-user btn-block">Cancelar</button>
                                                <br>
                                                <input type="hidden" name="rutaSena" value="confirmaActualizarProvedor">
                                                <button type="submit" class="btn btn-primary btn-user btn-block"> Actualizar Provedor</button>
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