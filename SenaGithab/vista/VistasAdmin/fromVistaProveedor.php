<?php
if (isset($_SESSION['datos'])) {
    $listaDeProvedores = $_SESSION['datos'];
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
        <style>
            .coloTextRed{
                color:#d40a18;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="coloTextRed">Proveedor</h2>
            <a href="VistaPrincipalAdmin.php?contenido=FormResgistroProvedor.php">Agregar Nuevo Proveedor</a><br/><br/>
            <table id="example" class="table-responsive-lg table-hover table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th> 
                        <th>Nombre</th> 
                        <th>Direccion</th> 
                        <th>Telefono</th> 
                        <th>Creacion</th>
                        <th>Edit</th> 
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($listaDeProvedores as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $listaDeProvedores[$i]->provIdProvedores; ?></td>  
                            <td><?php echo $listaDeProvedores[$i]->provNombreProvedor; ?></td>  
                            <td><?php echo $listaDeProvedores[$i]->provDireccionProvedor; ?></td>  
                            <td><?php echo $listaDeProvedores[$i]->provTelefonoProvedor; ?></td>  
                            <td><?php echo $listaDeProvedores[$i]->prov_created_at; ?></td>  
                            <td><a href="../Controlador.php?rutaSena=actualizarProvedor&idAct=<?php echo $listaDeProvedores[$i]->provIdProvedores; ?>">Actualizar</a></td>  
                            <td><a href="../Controlador.php?rutaSena=eliminarProvedor&idAct=<?php echo $listaDeProvedores[$i]->provIdProvedores; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                        </tr>   
                        <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </table>
    </div>
</body>
</html>