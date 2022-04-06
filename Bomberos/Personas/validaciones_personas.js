//VALIDACIONES DEL FORMULARIO PARA INGRESAR ALGUN CENSADO
	$("#censo").validate({	

		rules:{	//REGLAS DE VALIDACION PARA CADA INPUT
			//DATOS SOLICITANTE
				nombre1_s: "required",
				apellido1_s: "required",
				cedula_s:{
					number:true,
					required:true,
					minlength: 7
				},
				nacionalidad_p: "required",
				//DATOS DE CONTACTO Y REDES
				telefono1_s:{
					number:true,
					minlength:11,
					required:true
				},
				telefono2_s:{
					number:true,
					minlength:11
				},
				correo_s:{
					email:true,
					required:true
				},
			//FIN DATOS SOLICITANTE
		},

		messages:{	//MENSAJES DE VALIDACION CONFORME A CADA VALIDACION ECHA
			//DATOS SOLICITANTE
				nombre1_s:"Ingrese el Nombre",
				apellido1_s:"Ingrese el Apellido",
				cedula_s:{
					number:"Ingrese solamente valores númericos",
					required:"Ingrese la Cédula de Identidad",
					minlength: "La Cédula debe tener al menos 7 cifras"
				},
				nacionalidad_p: "Ingrese el Género de la Persona",
				//DATOS DE CONTACTO Y REDES
				telefono1_s:{
					number:"Ingrese solamente valores númericos",
					minlength:"Complete el tamaño del Teléfono",
					required:"Ingrese el Teléfono"
				},
				telefono2_s:{
					number:"Ingrese solamente valores númericos",
					minlength:"Complete el tamaño del Teléfono"
				},
				correo_s:{
					email:"Ingrese formato correcto (eg: persona@gmail.com)",
					required:"Ingrese su Correo Correspondiente"
				},
			//FIN DATOS SOLICITANTE
		},

		errorPlacement:function(error,element){ //Para reposicionar los elementos de error que son level
			error.insertAfter(element);
		}

	});
//FIN VALIDACIONES DEL FORMULARIO PARA INGRESAR ALGUN CENSADO
