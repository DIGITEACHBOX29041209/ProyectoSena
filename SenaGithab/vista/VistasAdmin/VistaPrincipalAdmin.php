
<?php
include_once '../../modelos/ConstantesConexion.php';
include_once PATH . 'Vista/VistasAdmin/VistaPrincipalAdmin.php';

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
        <meta name="description" content="">
        <meta name="author" content="">

        <title>DigiteachBox</title>

        <!-- Custom fonts for this template-->
        <link href="../../Recursos/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../../Recursos/css/sb-admin-2.min.css" rel="stylesheet">
        <style>
            .textRed{
                color: #d40a18;
            }
        </style>
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Diditeach Box</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Tables -->
                <li class="nav-item pt-2 pl-3 pr-3 mt-5">
                    <form class="user" method="GET" action="../Controlador.php" id="formVistaFacturaVenta">
                        <input type="hidden" name="rutaSena" value="gestionDeTablasEmpeladoo">
                        <button Type="submit" class="btn btn-primary w-100"><i class="fas fa-user-friends"></i><small class="ml-1"> Empleado</small></button>
                    </form>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item pt-2 pl-3 pr-3">
                    <form class="user" method="GET" action="../Controlador.php" id="formVistaFacturaVenta">
                        <input type="hidden" name="rutaSena" value="gestionDeTablasFacturaVenta">
                        <button Type="submit" class="btn btn-primary w-100"> <i class="fas fa-piggy-bank"></i><small> Ventas</small></button>
                    </form>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item pt-2 pl-3 pr-3">
                    <form class="user" method="GET" action="../Controlador.php" id="formVistaFacturaVenta">
                        <input type="hidden" name="rutaSena" value="gestionDeTablasproveedor">
                        <button Type="submit" class="btn btn-primary w-100"> <i class="fas fa-broom"></i><small class="ml-1"> Proveedor</small></button>
                    </form>
                </li>

                <li class="nav-item pt-2 pl-3 pr-3">
                    <form class="user" method="GET" action="../Controlador.php" id="formVistaFacturaVenta">
                        <input type="hidden" name="rutaSena" value="gestionDeTablasproducto">
                        <button Type="submit" class="btn btn-primary w-100"> <i class="fas fa-broom"></i><small class="ml-1"> Producto</small></button>
                    </form>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block mt-5 mb-5">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                                    <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>

                    <!-- CONTENDIO DE LA PAGINA-->
                    <div class="container-fluid">

                        <div class="row" >
                            <div class="col md-12">
                                <?php
                                if (isset($_GET['contenido'])) {
                                    include($_GET['contenido']);
                                }
                                ?>         
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; DIGITEACHBOX</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
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