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
        <title>Proveedor</title>
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
                                    <h3 class="mb-4 textRed">Crear Nuevo Proveedor!</h3>
                                </div>
                                <form class="user" method="GET" action="../Controlador.php" id="formRegistroProvedor">
                                    <div>
                                        <input class="form-control" placeholder="Nit" name="IdProvedores" type="int" required="required" autofocus
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['IdProvedores']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['IdProvedores'] . "\"";
                                               if (isset($_SESSION['IdProvedores'])){
                                                   echo "\"" . $_SESSION['IdProvedores'] . "\"";
                                               unset($_SESSION['IdProvedores']);
                                               }
                                               ?>
                                               >
                                        <div>
                                            <?php
                                            if (isset($erroresValidacion['marcaCampo']['IdProvedores']))
                                                echo "<font color='red'>" . $erroresValidacion['marcaCampo']['IdProvedores'] . "</font>";
                                            ?>
                                            <?php
                                            if (isset($erroresValidacion['mensajesError']['IdProvedores']))
                                                echo "<font color='red'>" . $erroresValidacion['mensajesError']['IdProvedores'] . "</font>";
                                            ?>  
                                        </div>
                                    </div><br/>
                                    <div>
                                        <input class="form-control" placeholder="Empresa" name="NombreEmpresa" type="int" required="required" autofocus
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['NombreEmpresa']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['NombreEmpresa'] . "\"";
                                               if (isset($_SESSION['NombreEmpresa'])){
                                                   echo "\"" . $_SESSION['NombreEmpresa'] . "\"";
                                               unset($_SESSION['NombreEmpresa']);
                                               }
                                               ?>
                                               >
                                        <div>
                                            <?php
                                            if (isset($erroresValidacion['marcaCampo']['NombreEmpresa']))
                                                echo "<font color='red'>" . $erroresValidacion['marcaCampo']['NombreEmpresa'] . "</font>";
                                            ?>
                                            <?php
                                            if (isset($erroresValidacion['mensajesError']['NombreEmpresa']))
                                                echo "<font color='red'>" . $erroresValidacion['mensajesError']['NombreEmpresa'] . "</font>";
                                            ?>  
                                        </div>
                                    </div><br/>
                                    <div>
                                        <input class="form-control" placeholder="Nombre" name="NombreProvedor" type="int" required="required" autofocus
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['NombreProvedor']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['NombreProvedor'] . "\"";
                                               if (isset($_SESSION['NombreProvedor'])) {
                                                   echo "\"" . $_SESSION['NombreProvedor'] . "\"";
                                               unset($_SESSION['NombreProvedor']);
                                               }
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
                                    </div><br/>
                                    <div>
                                        <input class="form-control" placeholder="Direccion" name="DireccionProvedor" type="int"   required="required"
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
                                    </div><br/>
                                    <div>
                                        <input class="form-control" placeholder="Telefono" name="TelefonoProvedor" type="number"  required="required"
                                               value=<?php
                                               if (isset($erroresValidacion['datosViejos']['TelefonoProvedor']))
                                                   echo "\"" . $erroresValidacion['datosViejos']['TelefonoProvedor'] . "\"";
                                               if (isset($_SESSION['TelefonoProvedor'])) {
                                                   echo "\"" . $_SESSION['TelefonoProvedor'] . "\"";
                                                   unset($_SESSION['TelefonoProvedor']);
                                               }
                                               ?>
                                               ><br/>
                                        <a class="btn btn-primary btn-block" style="color:white;" href="../Controlador.php?rutaSena=gestionDeTablasproveedor">Cancelar </a>
                                        <br>
                                        <input type="hidden" name="rutaSena" value="gestionDeRegistroProvedor">
                                        <button onclick="valida_registroProveedor()" class="btn btn-primary btn-block">Registrar Provedor</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
