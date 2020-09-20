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
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Proveedor</h2>
    <h3 class="panel-title">Actualización de Proveedor</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistroProvedor">
            <table>
                <tr>
                    <td>
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
                <tr>            
                    <td>            
                        <button type="reset" name="rutaSena" value="cancelarActualizarProvedor">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                         <input type="hidden" name="rutaSena" value="confirmaActualizarProvedor">
                                    <button onclick="valida_registroProveedor()" class="btn btn-primary btn-user btn-block">Actualizar Provedor</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>