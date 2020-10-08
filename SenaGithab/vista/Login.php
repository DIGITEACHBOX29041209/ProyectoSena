<?php
session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>
        <!-- Custom fonts for this template-->
        <link href="../Recursos/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="../Recursos/css/sb-admin-2.min.css" rel="stylesheet">
        <style>
            body{
                /*background-image: url("https://thumbs.dreamstime.com/b/tri%C3%A1ngulos-multicolores-en-el-fondo-blanco-81772186.jpg"); */
                background-color: white;
            }
            .imagenLateral{
                background-image: url("../Recursos/img/makroOfertas.PNG") ;
                background-size: cover;

            }
            .FondoLogin{
                   background-color: #192d36;
            }
            .FondoLateral{
                   background-color: #3a778a;
            }
            .ColorAmarillo{
                background-color: #9d1515;
                border: 0px;
                color: white;
            }
            .ImagenLogo{
                width: 100%;
            }
        </style>
    </head>

    <body class="FondoLogin">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block  bg-white">
                                    <image src="logo.jpeg" class="ImagenLogo" />
                                </div>
                                <div class="col-lg-6 FondoLateral">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Bienvenido a MacroOfertas!</h1>
                                        </div>
                                        <form role="form" method="POST" action="Controlador.php" name="formLogin" class="user">
                                            <input id="InputCorreo" class="form-control" placeholder="Correo Electrónico" name="email" type="email" autofocus required="required">
                                            <br>
                                            <input id="InputPassword" class="form-control" placeholder="Password" name="password" type="password" required="required">
                                            <br>
                                            <input type="hidden" name="rutaSena" value="gestionDeAccesoLogin">
                                            <input type="button" class="ColorAmarillo btn-lg btn-block" value="Ingresar" onclick="validar_logueo()">
                                        </form>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div
        <script src="../Recursos/vendor/jquery/jquery.min.js"></script>
        <script src="../Recursos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../Recursos/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../Recursos/js/sb-admin-2.min.js"></script>
        <script src="../javascript/funciones.js"></script>
    </body>
</html>