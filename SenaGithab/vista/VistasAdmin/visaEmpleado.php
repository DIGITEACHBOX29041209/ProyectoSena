<?php
if (isset($_SESSION['datos'])) {
    $listaDeEmpleado = $_SESSION['datos'];
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content=""> 
        <title>Empleado</title>
        <style>
            .coloTextRed{
                color:#d40a18;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="coloTextRed">Empleado</h2>
            <a href="VistaPrincipalAdmin.php?contenido=FormRegistroEmpleado.php">Crear Nuevo Empleado</a><br/><br/>
            <table id="example" class="table-responsive-lg table-hover table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th> 
                        <th>Documento</th> 
                        <th>Nombre</th> 
                        <th>Apellido</th> 
                        <th>Correo</th> 
                        <th>Telefono</th> 
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
                            <td><?php echo $listaDeEmpleado[$i]->empIdEmpleado; ?></td>  
                            <td><?php echo $listaDeEmpleado[$i]->empDocumentoEmpleado; ?></td>  
                            <td><?php echo $listaDeEmpleado[$i]->empNombreEmpleado; ?></td>  
                            <td><?php echo $listaDeEmpleado[$i]->empApellidoEmpleado; ?></td>  
                            <td><?php echo $listaDeEmpleado[$i]->empCorreo; ?></td> 
                            <td><?php echo $listaDeEmpleado[$i]->empTelefonoEmpleado; ?></td> 
                            <td><a href="../Controlador.php?rutaSena=actualizarEmpleado&idAct=<?php echo $listaDeEmpleado[$i]->empIdEmpleado; ?>">Actualizar</a></td>  
                            <td><a href="../Controlador.php?rutaSena=eliminarEmpleado&idAct=<?php echo $listaDeEmpleado[$i]->empIdEmpleado; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                        </tr>   
                        <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>