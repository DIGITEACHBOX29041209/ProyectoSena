/*Limpiar inputs de login */
function limpiar_logueo(){
    
    document.getElementById('InputCorreo').value = "";
    document.getElementById('InputPassword').value = "";
    document.getElementById('InputCorreo').focus();
}

/*Validacion para el login de cualquier usuario */
function validar_logueo() {
    
    if (((/^\s*$/.test(document.getElementById('InputCorreo').value))) || ((/^\s*$/.test(document.getElementById('InputPassword').value))))
    {
        alert("Ingrese sus credenciales");
        limpiar_logueo();
        return (false);
    }
    if (!/^\w+([\.=]?\w+)@\w+([\.=]?\w+)(\.\w{2,3})+$/.test(document.getElementById('InputCorreo').value)) {
        alert("Debe ingresar un correo válido");
        document.getElementById('InputCorreo').focus();
        return(false);
    }

    document.getElementById('InputPassword').value = calcMD5(document.getElementById('InputPassword').value);
    document.formLogin.submit();
}


/*Validaciones para el formulario de registro empleado */
function valida_registroEmpleado() {

    if (!/^\w+([\.=]?\w+)@\w+([\.=]?\w+)(\.\w{2,3})+$/.test(document.getElementById('InputCorreo').value)) {
        alert("Debe ingresar un correo válido");
        document.getElementById('InputCorreo').focus();
        return(false);
    }
    if (/^\s*$/.test(document.getElementById('InputPassword').value)) {
        alert("Debe ingresar password");
        document.getElementById('InputPassword').value = "";
        document.getElementById('InputPassword2').value = "";
        document.getElementById('InputPassword').focus();
        return(false);
    }
    if (/^\s*$/.test(document.getElementById('InputPassword2').value)) {
        alert("Debe ingresar confirmación de password");
        document.getElementById('InputPassword').value = "";
        document.getElementById('InputPassword2').value = "";
        document.getElementById('InputPassword').focus();
        return(false);
    }
    if ((document.getElementById('InputPassword').value) !== (document.getElementById('InputPassword2').value)) {
        alert("No hay coincidencia en el Password de Confirmacion. \n Ingreselo de nuevo");
        document.getElementById('InputPassword').value = "";
        document.getElementById('InputPassword2').value = "";
        document.getElementById('InputPassword').focus();
        return(false);
    }
    if ((document.getElementById('tipoEmpleado').value) !== "" && (document.getElementById('tipoEmpleado').value) !== null ) {
        alert("Debe seleccionar el tipo de empleado");
        return(false);
    }
    
    document.getElementById('InputPassword').value = calcMD5(document.getElementById('InputPassword').value);
    document.getElementById('InputPassword2').value = "";

    document.getElementById('formRegistro').submit();
}


