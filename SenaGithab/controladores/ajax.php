<?php

include '../modelos/ConBdMySql.php';
session_start();

$usuario = "root";
$contrasena = ""; 
$servidor = "localhost";
$basededatos = "digiteachbox2";
$conexion = mysqli_connect( $servidor, $usuario, "" );
$db = mysqli_select_db( $conexion, $basededatos );


if (!empty($_POST)) {
    if ($_POST['action'] == 'buscarProducto') {

        if (!empty($_POST['producto'])) {
            $CodProd = $_POST['producto'];

            $consulta = "SELECT * FROM `producto` WHERE prodidProducto = $CodProd ";
            $query = mysqli_query( $conexion, $consulta );
            mysqli_close($conexion);
            $result = mysqli_num_rows($query);
            
            if($result > 0){
                $data = mysqli_fetch_assoc($query);
            }else{
                $data = 0;
            }
            echo print_r($data);
        }
        exit;
    }
}
?>