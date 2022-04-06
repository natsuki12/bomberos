//VALIDACIONES DEL FORMULARIO PARA INGRESAR - EDITAR ALGUN OPERADOR
	$("#operador").validate({	

		rules:{	//REGLAS DE VALIDACION PARA CADA INPUT
			//DATOS SOLICITANTE
				nombre_o: "required",
				cedula_o:{
					number:true,
					required:true,
					minlength: 7
				},
				contraseña: "required",
				//DATOS DE DIRECCION DE HOGAR
				municipio_s: "required",
				parroquia_s: "required",
				prefectura: "required",
			//FIN DATOS SOLICITANTE
		},

		messages:{	//MENSAJES DE VALIDACION CONFORME A CADA VALIDACION ECHA
			//DATOS SOLICITANTE
				nombre_o:"Ingrese el Nombre del Operador",
				cedula_o:{
					number:"Ingrese solamente valores númericos",
					required:"Ingrese la Cédula de Identidad",
					minlength: "La Cédula debe tener al menos 7 cifras"
				},
				contraseña:"Ingrese la Contraseña",
				//DATOS DE LA DIRECCION DE HOGAR
				municipio_s:"Ingrese el Municipio",
				parroquia_s:"Ingrese la Parroquia",
				prefectura:"Ingrese la Prefectura del Operador", 
			//FIN DATOS SOLICITANTE
		},

		errorPlacement:function(error,element){ //Para reposicionar los elementos de error que son level
			error.insertAfter(element);
		}

	});
//FIN VALIDACIONES DEL FORMULARIO PARA INGRESAR - EDITAR ALGUN OPERADOR
