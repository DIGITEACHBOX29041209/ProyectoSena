<?php
if (isset($_SESSION['datos'])) {
    $listaDeEmpleado = $_SESSION['datos'];
//    echo "<pre>";
//    print_r($_SESSION['datos']);
//    echo "</pre>";
//    exit();
} else {
    $listaDeEmpleado = array();
}
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Factura</title>
    </head>
    <body>
        <div class="container">
            <a href="VistaPrincipalAdmin.php?contenido=FormRegistroVenta.php">Nueva Venta</a><br/>

            <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th> 
                        <th>Documento</th> 
                        <th>Nombre</th> 
                        <th>Apellido</th> 
                        <th>Correo</th>
                        <th>VerDetalle</th>
                        <th>Editar</th> 
                        <th>Borrar</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($listaDeEmpleado) != NULL) {
                        $i = 0;
                        foreach ($listaDeEmpleado as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $listaDeEmpleado[$i]->empIdEmpleado ?></td>  
                                <td><?php echo $listaDeEmpleado[$i]->empDocumentoEmpleado; ?></td>  
                                <td><?php echo $listaDeEmpleado[$i]->empNombreEmpleado; ?></td>  
                                <td><?php echo $listaDeEmpleado[$i]->empApellidoEmpleado; ?></td>  
                                <td><?php echo $listaDeEmpleado[$i]->empCorreo; ?></td>  
                                <td><a href="Controlador.php?ruta=actualizarLibro&idAct=<?php echo $listaDeEmpleado[$i]->empIdEmpleado; ?>">Actualizar</a></td>  
                                <td><a href="Controlador.php?ruta=actualizarLibro&idAct=<?php echo $listaDeEmpleado[$i]->empIdEmpleado; ?>">Actualizar</a></td>  
                                <td><a href="Controlador.php?ruta=eliminarLibro&idAct=<?php echo $listaDeEmpleado[$i]->empIdEmpleados; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                            </tr>   
                            <?php
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </table>
    </div>
</body>
</html>