 var Base64 = {
                   
	// private property
	_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

	// public method for encoding
	encode : function (input) {
		var output = "";
		var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
		var i = 0;

		input = Base64._utf8_encode(input);

		while (i < input.length) {

			chr1 = input.charCodeAt(i++);
			chr2 = input.charCodeAt(i++);
			chr3 = input.charCodeAt(i++);

			enc1 = chr1 >> 2;
			enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
			enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
			enc4 = chr3 & 63;

			if (isNaN(chr2)) {
				enc3 = enc4 = 64;
			} else if (isNaN(chr3)) {
				enc4 = 64;
			}

			output = output +
			this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
			this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

		}

		return output;
	},

	// public method for decoding
	decode : function (input) {
		var output = "";
		var chr1, chr2, chr3;
		var enc1, enc2, enc3, enc4;
		var i = 0;

		input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

		while (i < input.length) {

			enc1 = this._keyStr.indexOf(input.charAt(i++));
			enc2 = this._keyStr.indexOf(input.charAt(i++));
			enc3 = this._keyStr.indexOf(input.charAt(i++));
			enc4 = this._keyStr.indexOf(input.charAt(i++));

			chr1 = (enc1 << 2) | (enc2 >> 4);
			chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
			chr3 = ((enc3 & 3) << 6) | enc4;

			output = output + String.fromCharCode(chr1);

			if (enc3 != 64) {
				output = output + String.fromCharCode(chr2);
			}
			if (enc4 != 64) {
				output = output + String.fromCharCode(chr3);
			}

		}

		output = Base64._utf8_decode(output);

		return output;

	},

	// private method for UTF-8 encoding
	_utf8_encode : function (string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";

		for (var n = 0; n < string.length; n++) {

			var c = string.charCodeAt(n);

			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}

		}

		return utftext;
	},

	// private method for UTF-8 decoding
	_utf8_decode : function (utftext) {
		var string = "";
		var i = 0;
		var c = c1 = c2 = 0;

		while ( i < utftext.length ) {

			c = utftext.charCodeAt(i);

			if (c < 128) {
				string += String.fromCharCode(c);
				i++;
			}
			else if((c > 191) && (c < 224)) {
				c2 = utftext.charCodeAt(i+1);
				string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
				i += 2;
			}
			else {
				c2 = utftext.charCodeAt(i+1);
				c3 = utftext.charCodeAt(i+2);
				string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
				i += 3;
			}

		}

		return string;
	}
    }
    
/*Limpiar inputs de login */
function limpiar_logueo() {

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

    document.getElementById('InputPassword').value =  Base64.encode(document.getElementById('InputPassword').value);
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
    if ((document.getElementById('tipoEmpleado').value) !== "" && (document.getElementById('tipoEmpleado').value) !== null) {
        alert("Debe seleccionar el tipo de empleado");
        return(false);
    }

    document.getElementById('InputPassword').value = calcMD5(document.getElementById('InputPassword').value);
    document.getElementById('InputPassword2').value = "";
    document.getElementById('formRegistro').submit();
}
function valida_registroProducto() {
    if (/^([0-9])*$/.test(document.getElementById('prodPrecioNeto').value)) {
        alert("Debe ser valores numericos");
        return(false);
    }
    if (/^([0-9])*$/.test(document.getElementById('prodPrecioProducto').value)) {
        alert("Debe ser valores numericos");
        return(false);
    }
    document.getElementById('formRegistroProducto').submit();
}

function valida_registroProveedor() {
    if (/^([0-9])*$/.test(document.getElementById('InputTelefono').value)) {
        alert("Debe ingresar telefono");
        return(false);
        document.getElementById('formRegistroProvedor').submit();
    }

}

function validar_registroventa() {
    if (/^([0-9])*$/.test(document.getElementById('InputPrecio').value)) {
        alert("Debe ingresar el precio del producto");
        return(false);
        document.getElementById('formRegistroVenta').submit();
    }

}
function valida_ActualizarProveedor() {
    if (/^([0-9])*$/.test(document.getElementById('InputTelefono').value)) {
        alert("Debe ingresar telefono");
        return(false);
        document.getElementById('vistaActualizarProveedor').submit();
    }
}
function valida_ActualizarEmpleado() {
    if (/^([0-9])*$/.test(document.getElementById('InputTelefono').value)) {
        alert("Debe ingresar telefono");
        return(false);
        document.getElementById('VistaActualizarEmpleado').submit();
    } 
   
}
    