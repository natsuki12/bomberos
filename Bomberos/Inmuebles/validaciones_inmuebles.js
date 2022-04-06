//VALIDACIONES DEL FORMULARIO PARA INGRESAR - EDITAR ALGUN OPERADOR
	$("#inmueble").validate({	

		rules:{	//REGLAS DE VALIDACION PARA CADA INPUT
			//DATOS SOLICITANTE
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
			//FIN DATOS SOLICITANTE
		},

		messages:{	//MENSAJES DE VALIDACION CONFORME A CADA VALIDACION ECHA
			//DATOS SOLICITANTE
				nombre_i:"Ingrese el Nombre del Inmueble",
				uso_i:"Ingrese la Finalidad del Inmueble",
				rif_i: "Ingrese el RIF del Inmueble",
				firma_i: "Ingrese la Firma del Inmueble",
				metros_i: "Ingrese los Metros del Inmueble",
				pisos_i: "Ingrese los Niveles del Inmueble",
				//DATOS DE LA DIRECCION DE HOGAR
				municipio_i:"Ingrese el Municipio",
				direccion1_i: "Ingrese la Dirección deñ Inmueble",
			//FIN DATOS SOLICITANTE
		},

		errorPlacement:function(error,element){ //Para reposicionar los elementos de error que son level
			error.insertAfter(element);
		}

	});
//FIN VALIDACIONES DEL FORMULARIO PARA INGRESAR - EDITAR ALGUN OPERADOR

//VALIDACIONES DEL FORMULARIO PARA INGRESAR - EDITAR ALGUN OPERADOR
	$("#inmueble_m").validate({	

		rules:{	//REGLAS DE VALIDACION PARA CADA INPUT
			//DATOS SOLICITANTE
				nombre_i: "required",
				uso_i: "required",
				rif_i: "required",
				metros_i: "required",
				pisos_i: "required",
				//DATOS DE DIRECCION DE HOGAR
				municipio_s: "required",
				parroquia_s: "required",
				direccion1_s: "required",
			//FIN DATOS SOLICITANTE
		},

		messages:{	//MENSAJES DE VALIDACION CONFORME A CADA VALIDACION ECHA
			//DATOS SOLICITANTE
				nombre_i:"Ingrese el Nombre del Inmueble",
				uso_i:"Ingrese la Finalidad del Inmueble",
				rif_i: "Ingrese el RIF del Inmueble",
				metros_i: "Ingrese los Metros del Inmueble",
				pisos_i: "Ingrese los Niveles del Inmueble",
				//DATOS DE LA DIRECCION DE HOGAR
				municipio_i:"Ingrese el Municipio",
				direccion1_i: "Ingrese la Dirección deñ Inmueble",
			//FIN DATOS SOLICITANTE
		},

		errorPlacement:function(error,element){ //Para reposicionar los elementos de error que son level
			error.insertAfter(element);
		}

	});
//FIN VALIDACIONES DEL FORMULARIO PARA INGRESAR - EDITAR ALGUN OPERADOR