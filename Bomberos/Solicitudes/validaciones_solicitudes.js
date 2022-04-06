//VALIDACIONES DEL FORMULARIO PARA INGRESAR - EDITAR ALGUN OPERADOR
	$("#solicitud").validate({	

		rules:{	//REGLAS DE VALIDACION PARA CADA INPUT
			//DATOS INMUEBLE
				nombre_i: "required",
				uso_i: "required",
				rif_i: "required",
				firma_i: "required",
				metros_i: "required",
				pisos_i: "required",
				//DATOS DE DIRECCION DE HOGAR
				municipio_s: "required",
				parroquia_s: "required",
				direccion1_s: "required",
			//FIN DATOS INMUEBLE

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
			//DATOS INMUEBLE
				nombre_i:"Ingrese el Nombre del Inmueble",
				uso_i:"Ingrese la Finalidad del Inmueble",
				rif_i: "Ingrese el RIF del Inmueble",
				firma_i: "Ingrese la Firma del Inmueble",
				metros_i: "Ingrese los Metros del Inmueble",
				pisos_i: "Ingrese los Niveles del Inmueble",
				//DATOS DE LA DIRECCION DE HOGAR
				municipio_i:"Ingrese el Municipio",
				direccion1_i: "Ingrese la Dirección deñ Inmueble",
			//FIN DATOS INMUEBLE

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
//FIN VALIDACIONES DEL FORMULARIO PARA INGRESAR - EDITAR ALGUN OPERADOR
