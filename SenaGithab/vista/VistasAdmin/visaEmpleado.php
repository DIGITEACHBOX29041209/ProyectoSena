<?php
session_start();
if (isset($_SESSION['datos'])) {
    $listaDeEmpleado = $_SESSION['datos'];
//    echo "<pre>";
//    print_r($_SESSION['datos']);
//    echo "</pre>";
//    echo "Holitas6";
//    exit();
}
?>
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
    <body>
        <div class="container">
            <a href="FormRegistroEmpleado.php">Crear Cuenta</a><br/>

            <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th> 
                        <th>Documento</th> 
                        <th>Nombre</th> 
                        <th>Apellido</th> 
                        <th>Correo</th> 
                        <th>Edit</th> 
                        <th>Delete</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($listaDeEmpleado as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $listaDeEmpleado[$i]->empIdEmpleado ?></td>  
                            <td><?php echo $listaDeEmpleado[$i]->empDocumentoEmpleado; ?></td>  
                            <td><?php echo $listaDeEmpleado[$i]->empNombreEmpleado; ?></td>  
                            <td><?php echo $listaDeEmpleado[$i]->empApellidoEmpleado; ?></td>  
                             <td><?php echo $listaDeEmpleado[$i]->empCorreo; ?></td>  
                            <td><a href="Controlador.php?rutaSena=actualizarLibro&idAct=<?php echo $listaDeEmpleado[$i]->empIdEmpleado; ?>">Actualizar</a></td>  
                            <td><a href="Controlador.php?rutaSena=eliminarLibro&idAct=<?php echo $listaDeEmpleado[$i]->empIdEmpleados; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                        </tr>   
                        <?php $i++;
                    }
                    ?>
                </tbody>
            </table>
        </table>
    </div>
</body>
</html>