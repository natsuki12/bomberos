$("#l_operadores").change(function(event){
	$.ajax({
		data : {
			'ajax' : '',
			'busqueda' : $(this).val()
		},
		url : 'paginacion.php',
		type : 'get',
		success : function(busqueda){
			var actividades=JSON.parse(busqueda);
			console.log(actividades);

			$("#n_paginas").fadeOut('500', function() {
				$(this).text(actividades[actividades.length-4]);
			});
	        $("#n_paginas").fadeIn(500);

			//acomoda la paginacion dependiendo de la busqueda
			$("#paginacion_t").hide('500', function() {
				$(this).empty();
				$(this).append(actividades[actividades.length-2]+"-"+actividades[actividades.length-1]+" / Página: ");
				for (var i = 0; i<actividades[actividades.length-1]; i++) {
					if (i+1==actividades[actividades.length-2]) {
						$(this).append("<a class='text-dark' href='registro.php?pagina="+(i+1)+"&busqueda="+actividades[actividades.length-3]+"'><strong>"+(i+1)+" </strong></a>");
					}else{
						$(this).append("<a class='text-dark' href='registro.php?pagina="+(i+1)+"&busqueda="+actividades[actividades.length-3]+"'>"+(i+1)+" </a>");
					}
				}
			});
        	$("#paginacion_t").show(500);

        	$("#paginacion_b").hide('500', function() {
				$(this).empty();
				$(this).append(actividades[actividades.length-2]+"-"+actividades[actividades.length-1]+" / Página: ");
				for (var i = 0; i<actividades[actividades.length-1]; i++) {
					if (i+1==actividades[actividades.length-2]) {
						$(this).append("<a class='text-dark' href='registro.php?pagina="+(i+1)+"&busqueda="+actividades[actividades.length-3]+"'><strong>"+(i+1)+" </strong></a>");
					}else{
						$(this).append("<a class='text-dark' href='registro.php?pagina="+(i+1)+"&busqueda="+actividades[actividades.length-3]+"'>"+(i+1)+" </a>");
					}
				}
			});
        	$("#paginacion_b").show(500);

			//agrega los valores en la tabla
			$("#tbody").hide('500', function() {
				$(this).empty();
				for (var i = 0; i<actividades.length-4; i++) {
					$(this).append("<tr><td><b>"+actividades[i]["registro_id"]+"</b></td><td>"+actividades[i]["usuario_name"]+"</td><td>"+actividades[i]["actividad"]+"</td><td>"+actividades[i]["codigo_registrado"]+"</td><td>"+actividades[i]["fechat"]+"</td><td>"+actividades[i]["hora"]+"</td><tr>");
				}
			});
        	$("#tbody").show(500);
		}
	});
});
