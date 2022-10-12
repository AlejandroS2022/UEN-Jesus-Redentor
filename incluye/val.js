$(document).ready(function(){
	var boton_i = $('#boton-form-i');
	var boton_u = $('#boton-form-u');
	var form    = $('#formulario');

	boton_i.on('click',function(){
		if (form.valid()) {
			if (confirm("Está seguro que desea agregar estos datos?")) {
		        form.submit();
		    } else {
		        event.preventDefault();
		    }
		} else {
			alert("Debe completar todos los campos.");
		}
	});

	boton_u.on('click',function(){
		if (form.valid()) {
			if (confirm("Está seguro que desea modificar estos datos?")) {
		        form.submit();
		    } else {
		        event.preventDefault();
		    }
		} else {
			alert("Debe completar todos los campos.");
		}
	});
});

function enviarForm(evento, form) {
	if (evento == "d") {
	    if (confirm("Está seguro que desea eliminar estos datos?")) {
		    document.getElementById(form).submit();
		} else {
		    event.preventDefault();
		}
	} else if (evento == "r") {
		if (confirm("Está seguro que desea restaurar estos datos?")) {
		    document.getElementById(form).submit();
		} else {
		    event.preventDefault();
		}
	}
}