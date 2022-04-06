//VALIDACIONES DEL FORMULARIO PARA INGRESAR - EDITAR ALGUN OPERADOR
	$("#bombero").validate({	

		rules:{	//REGLAS DE VALIDACION PARA CADA INPUT
			//DATOS SOLICITANTE
				nombre_b: "required",
				apellido_b: "required",
				cedula_b:{
					number:true,
					required:true,
					minlength: 7
				},
				ci_b: "required",
				especialidad_b: "required",
				//DATOS DE CONTACTO Y REDES
				telefono_b:{
					number:true,
					minlength:11,
					required:true
				},
				correo_b:{
					email:true,
					required:true
				},
			//FIN DATOS SOLICITANTE
		},

		messages:{	//MENSAJES DE VALIDACION CONFORME A CADA VALIDACION ECHA
			//DATOS SOLICITANTE
				nombre_b:"Ingrese el Nombre del Inspector",
				apellido_b:"Ingrese el Apellido del Inspector",
				cedula_b:{
					number:"Ingrese solamente valores númericos",
					required:"Ingrese la Cédula de Identidad",
					minlength: "La Cédula debe tener al menos 7 cifras"
				},
				ci_b: "Ingrese el Código del Inspector",
				especialidad_b: "Ingrese la Especialidad del Inspector",
				//DATOS DE CONTACTO Y REDES
				telefono_b:{
					number:"Ingrese solamente valores númericos",
					minlength:"Complete el tamaño del Teléfono",
					required:"Ingrese el Teléfono"
				},
				correo_b:{
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
