<?php
if (isset($_SESSION['datos'])) {
    $listaDeProducto = $_SESSION['datos'];
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Producto</title>
        <style>
            .coloTextRed{
                color:#d40a18;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="coloTextRed">Producto</h2>
            <br><br>
            <form class="user" method="GET" action="../Controlador.php">
                <input type="hidden" name="rutaSena" value="gestionderegistroPorducto">
                <button type="submit"class="btn btn-primary btn-block">Crear Nuevo Producto!! </button>
            </form>
            <table id="example" class="table-responsive-lg table-hover table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>  
                        <th>Nombre</th> 
                        <th>Descripcion</th> 
                        <th>Proveedor</th>
                        <th>Cantidad</th> 
                        <th>Precio Neto</th>
                        <th>Precio Producto</th>               
                        <th>Editar</th> 
                        <th>Eliminar</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($listaDeProducto as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $listaDeProducto[$i]->prodidProducto; ?></td>  
                            <td><?php echo $listaDeProducto[$i]->prodNombreProducto; ?></td>  
                            <td><?php echo $listaDeProducto[$i]->prodDescripcionProducto; ?></td>
                            <td><?php echo $listaDeProducto[$i]->prodProveedor; ?></td>
                            <td><?php echo $listaDeProducto[$i]->prodCantidadProducto; ?></td>  
                            <td><?php echo $listaDeProducto[$i]->prodPrecioNeto; ?></td> 
                            <td><?php echo $listaDeProducto[$i]->prodPrecioProducto; ?></td> 
                            <td><a href="../Controlador.php?rutaSena=actualizarProducto&idAct=<?php echo $listaDeProducto[$i]->prodidProducto; ?>">Actualizar</a></td>  
                            <td><a href="../Controlador.php?rutaSena=eliminarProducto&idAct=<?php echo $listaDeProducto[$i]->prodidProducto; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
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

