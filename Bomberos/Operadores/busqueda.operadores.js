$("#busquedam_nombre").change(function(event){
	$("#info").fadeOut('500', function() {
		$("#info").text("");
		$("#info").removeClass('text-danger');	
	});
	
	$.ajax({
		url: 'buscador_operadores.php',
		type: 'post',
		data: {nombre: $(this).val()},
	})
	.done(function(datos) {
		var operador=JSON.parse(datos);
			if (operador[0]!=null) {
				$("#i_nombre").fadeOut('500', function() {
					$(this).val(operador[0]["nombre"]);	
				});
				$("#i_nombre").fadeIn(500);

				$("#i_contraseña").fadeOut('500', function() {
					$(this).val(operador[0]["password"]);	
				});
				$("#i_contraseña").fadeIn(500);

				$("#i_codigo").val(operador[0]["nombre"]);
			}else{
				$("#info").text("Operador no Encontrado");
				$("#info").addClass('text-danger');
				$("#info").fadeIn(500);

				$("#i_nombre").fadeOut('500', function() {
					$(this).val("");	
				});
				$("#i_nombre").fadeIn(500);

				$("#i_contraseña").fadeOut('500', function() {
					$(this).val("");	
				});
				$("#i_contraseña").fadeIn(500);

				$("#i_codigo").val("");
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
						$(this).append("<a class='text-dark' href='r_operadores.php?pagina="+(i+1)+"&busqueda="+operadores[operadores.length-3]+"'><strong>"+(i+1)+" </strong></a>");
					}else{
						$(this).append("<a class='text-dark' href='r_operadores.php?pagina="+(i+1)+"&busqueda="+operadores[operadores.length-3]+"'>"+(i+1)+" </a>");
					}
				}
			});
        	$("#paginacion_t").show(500);

        	$("#paginacion_b").hide('500', function() {
				$(this).empty();
				$(this).append(operadores[operadores.length-2]+"-"+operadores[operadores.length-1]+" / Página: ");
				for (var i = 0; i<operadores[operadores.length-1]; i++) {
					if (i+1==operadores[operadores.length-2]) {
						$(this).append("<a class='text-dark' href='r_operadores.php?pagina="+(i+1)+"&busqueda="+operadores[operadores.length-3]+"'><strong>"+(i+1)+" </strong></a>");
					}else{
						$(this).append("<a class='text-dark' href='r_operadores.php?pagina="+(i+1)+"&busqueda="+operadores[operadores.length-3]+"'>"+(i+1)+" </a>");
					}
				}
			});
        	$("#paginacion_b").show(500);

			//agrega los valores en la tabla
			$("#tbody").hide('500', function() {
				$(this).empty();
				for (var i = 0; i<operadores.length-4; i++) {
					var change = '"'+operadores[i]["nombre"]+'"';
					$(this).append("<tr><th scope='row'><button id='"+operadores[i]["nombre"]+"' onclick='eliminar("+change+")' type='button' class='eliminar' aria-label='Close'><span aria-hidden='true'>&times;</span></button></th><td>"+operadores[i]["nombre"]+"</td><td>"+operadores[i]["password"]+"</td><td><span id='"+operadores[i]["nombre"]+"' onclick='modificar("+change+")' class='text-primary e_mod' style='cursor: pointer'>Enviar</span></td><tr>");
				}
			});
        	$("#tbody").show(500);
		}
	});
});
