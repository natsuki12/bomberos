$("#busquedam_nombre").change(function(event){
	$("#info").fadeOut(500);
	$("#info").text("");
	$("#info").removeClass('text-danger');

	$.ajax({
		url: 'buscador_bomberos.php',
		type: 'post',
		data: {cedula: $(this).val()},
	})
	.done(function(datos) {
		var operador=JSON.parse(datos);
			if (operador[0]!=null) {
				$("#nombre_b").fadeOut('500', function() {
					$(this).val(operador[0]["nombre_ins"]);	
				});
				$("#nombre_b").fadeIn(500);

				$("#apellido_b").fadeOut('500', function() {
					$(this).val(operador[0]["apellido_ins"]);	
				});
				$("#apellido_b").fadeIn(500);

				$("#cedula_b").fadeOut('500', function() {
					$(this).val(operador[0]["cedula_ins"]);	
				});
				$("#cedula_b").fadeIn(500);

				$("#ci_b").fadeOut('500', function() {
					$(this).val(operador[0]["cod_ins"]);	
				});
				$("#ci_b").fadeIn(500);

				$("#especialidad_b").fadeOut('500', function() {
					$(this).val(operador[0]["especialidad"]);	
				});
				$("#especialidad_b").fadeIn(500);

				$("#telefono_b").fadeOut('500', function() {
					$(this).val(operador[0]["telefono"]);	
				});
				$("#telefono_b").fadeIn(500);

				$("#correo_b").fadeOut('500', function() {
					$(this).val(operador[0]["correo"]);	
				});
				$("#correo_b").fadeIn(500);

				$("#boton_inspector").append('<input type="text" name="bombero_cedula" id="bombero_cedula" value="'+operador[0]["cedula_ins"]+'" hidden="">')

			}else{
				$("#info").text("Inspector no Encontrado");
				$("#info").addClass('text-danger');
				$("#info").fadeIn(500);

				$("#nombre_b").fadeOut('500', function() {
					$(this).val("");	
				});
				$("#nombre_b").fadeIn(500);

				$("#apellido_b").fadeOut('500', function() {
					$(this).val("");	
				});
				$("#apellido_b").fadeIn(500);

				$("#cedula_b").fadeOut('500', function() {
					$(this).val("");	
				});
				$("#cedula_b").fadeIn(500);

				$("#ci_b").fadeOut('500', function() {
					$(this).val("");	
				});
				$("#ci_b").fadeIn(500);

				$("#especialidad_b").fadeOut('500', function() {
					$(this).val("");	
				});
				$("#especialidad_b").fadeIn(500);

				$("#telefono_b").fadeOut('500', function() {
					$(this).val("");	
				});
				$("#telefono_b").fadeIn(500);

				$("#correo_b").fadeOut('500', function() {
					$(this).val("");	
				});
				$("#correo_b").fadeIn(500);

				$("#bombero_cedula").remove();
			}	
	})
	.fail(function() {
		alert("error");
	});
});

$("#busquedal_nombre").change(function(event){
	$.ajax({
		data : {
			'ajax' : '',
			'busqueda' : $(this).val()
		},
		url : 'paginacion.php',
		type : 'get',
		success : function(busqueda){
			var operadores=JSON.parse(busqueda);
			console.log(operadores);

			//acomodo el numero de registros
	        $("#n_paginas").fadeOut('500', function() {
	            $(this).text(operadores[operadores.length-4]);
	        });
	        $("#n_paginas").fadeIn(500);

			//acomoda la paginacion dependiendo de la busqueda
			$("#paginacion_t").hide('500', function() {
				$(this).empty();
				$(this).append(operadores[operadores.length-2]+"-"+operadores[operadores.length-1]+" / Página: ");
				for (var i = 0; i<operadores[operadores.length-1]; i++) {
					if (i+1==operadores[operadores.length-2]) {
						$(this).append("<a class='text-dark' href='l_bomberos.php?pagina="+(i+1)+"&busqueda="+operadores[operadores.length-3]+"'><strong>"+(i+1)+" </strong></a>");
					}else{
						$(this).append("<a class='text-dark' href='l_bomberos.php?pagina="+(i+1)+"&busqueda="+operadores[operadores.length-3]+"'>"+(i+1)+" </a>");
					}
				}
			});
        	$("#paginacion_t").show(500);

        	$("#paginacion_b").hide('500', function() {
				$(this).empty();
				$(this).append(operadores[operadores.length-2]+"-"+operadores[operadores.length-1]+" / Página: ");
				for (var i = 0; i<operadores[operadores.length-1]; i++) {
					if (i+1==operadores[operadores.length-2]) {
						$(this).append("<a class='text-dark' href='l_bomberos.php?pagina="+(i+1)+"&busqueda="+operadores[operadores.length-3]+"'><strong>"+(i+1)+" </strong></a>");
					}else{
						$(this).append("<a class='text-dark' href='l_bomberos.php?pagina="+(i+1)+"&busqueda="+operadores[operadores.length-3]+"'>"+(i+1)+" </a>");
					}
				}
			});
        	$("#paginacion_b").show(500);

			//agrega los valores en la tabla
			$("#tbody").hide('500', function() {
				$(this).empty();
				for (var i = 0; i<operadores.length-4; i++) {
					var change = "'"+operadores[i]["cedula_ins"]+"'";
					$(this).append('<tr><td scope="row"><button onclick="eliminar('+change+')" type="button" class="eliminar" aria-label="Close" id="'+operadores[i]["cedula_ins"]+'"><span aria-hidden="true">&times;</span></button></td><td><b>'+operadores[i]["cedula_ins"]+'</b></td><td>'+operadores[i]["nombre_ins"]+'</td><td>'+operadores[i]["apellido_ins"]+'</td><td>'+operadores[i]["cod_ins"]+'</td><td>'+operadores[i]["especialidad"]+'</td><td>'+operadores[i]["telefono"]+'</td><td>'+operadores[i]["correo"]+'</td></tr>');				}
			});
        	$("#tbody").show(500);		}
	});
});
