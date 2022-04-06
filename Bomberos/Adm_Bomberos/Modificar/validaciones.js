//VALIDACIONES DEL FORMULARIO PARA MODIFICAR INSPECCION
	$("#inspeccion-general").validate({	

		rules:{	//REGLAS DE VALIDACION PARA CADA INPUT
			//DATOS DE INSPECCION
				estado_i: "required",
				fecha_i: "required",
				observacion_i:{
		          required:true,
		          minlength:5
		        },
		},

		messages:{	//MENSAJES DE VALIDACION CONFORME A CADA VALIDACION ECHA
			//DATOS DE INSPECCION
				estado_i:"Porfavor ingrese el estado de la Inspección",
				fecha_i:"Porfavor ingrese la fecha de la Inspección",
				observacion_i:{
		          required:"Porfavor Ingrese una observación.",
		          minlength:"La observación debe contener al menos 5 caracteres."
		        },
		},

		errorPlacement:function(error,element){ //Para reposicionar los elementos de error que son level
			error.insertAfter(element);
		}

	});
//FIN VALIDACIONES DEL FORMULARIO PARA MODIFICAR INSPECCION

//VALIDACIONES DEL FORMULARIO PARA REGISTRO DE INSPECCION
	$("#registro-inspeccion").validate({	

		rules:{	//REGLAS DE VALIDACION PARA CADA INPUT
			//DATOS DE INSPECCION
				estado: "required",
				observacion_i:{
		          required:true,
		          minlength:5
		        },
		},

		messages:{	//MENSAJES DE VALIDACION CONFORME A CADA VALIDACION ECHA
			//DATOS DE INSPECCION
				estado:"Porfavor ingrese el estado de la Inspección",
				observacion_i:{
		          required:"Porfavor Ingrese una observación.",
		          minlength:"La observación debe contener al menos 5 caracteres."
		        },
		},

		errorPlacement:function(error,element){ //Para reposicionar los elementos de error que son level
			error.insertAfter(element);
		}

	});
//FIN VALIDACIONES DEL FORMULARIO PARA REGISTRAR INSPECCION
