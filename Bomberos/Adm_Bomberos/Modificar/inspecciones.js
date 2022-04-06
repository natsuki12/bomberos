//ACOMODAR LOS DATOS 
	function acomodar(codigo){
		var id = codigo;

		$.ajax({
			data : {
				'codigo': id,
				'modificar': '',
			},
			url : 'proceso_inspeccion.php',
			type : 'post',
			success: function(datos){
	      		var informacion=JSON.parse(datos);
				console.log(informacion);
				if (informacion[0]!=null) {
					//CODIGOS DE INSPECCION PARA MODIFICAR
					$("#cod_inspeccion1").val(id);
					$("#cod_inspeccion2").val(id);

					//SECCION DE DATOS DE LA INSPECCION
						$("#estado_i").fadeOut('500', function() {
							$(this).val(informacion[0]["estado"]);
						});
						$("#estado_i").fadeIn(500);

						$("#observacion_i").fadeOut('500', function() {
							$(this).val(informacion[0]["observaciones"]);
						});
						$("#observacion_i").fadeIn(500);
					//FIN SECCION DE DATOS DE LA INSPECCION

					//DATOS ESPECIFICOS DE LOS CHECKS
						for (var j = 1; j <= 12; j++) {	
							for (var i = 1; i <= 13; i++) {
								$("#c"+j+"_"+i).fadeOut(500);
								if(informacion[0]["check"+j+"_"+i]==1){
									$("#c"+j+"_"+i).empty();
									$("#c"+j+"_"+i).append('<input checked class="form-check-input" type="checkbox" value="" id="check'+j+'_'+i+'" name="check'+j+'_'+i+'">');
								}
								else{
									$("#c"+j+"_"+i).empty();
									$("#c"+j+"_"+i).append('<input class="form-check-input" type="checkbox" value="" id="check'+j+'_'+i+'" name="check'+j+'_'+i+'">');
								}
								$("#c"+j+"_"+i).fadeIn(500);
							}
						}
					//FIN ESPECIFICOS

					$("#check3_2").click(function(event) {
						if($(this).prop('checked')){
							$("#extincion-p2").fadeIn(500);
						}
						else{
							$("#extincion-p2").fadeOut(500);	
						}
					});

					if($("#check3_2").prop('checked')){
						$("#extincion-p2").fadeIn(500);
					}
					//ACOMODAR LAS LIBRAS
					$("#libras").val(informacion[0]["extintor_libras"]);

					//MOSTRAR LOS FORMS
					$("#inspeccion-general").fadeIn(500);
					$("#inspeccion-especifica").fadeIn(500);

				}else{

					$("#info").text("Inspección no Encontrada");
					$("#info").addClass('text-danger');
					
					//CODIGOS DE INSPECCION PARA MODIFICAR
					$("#cod_inspeccion1").val("");
					$("#cod_inspeccion2").val("");

					//SECCION DE DATOS DE LA INSPECCION
						$("#estado_i").fadeOut('500', function() {
							$(this).val("");
						});
						$("#estado_i").fadeIn(500);

						$("#observacion_i").fadeOut('500', function() {
							$(this).val("");
						});
						$("#observacion_i").fadeIn(500);
					//FIN SECCION DE DATOS DE LA INSPECCION

					//DATOS ESPECIFICOS DE LOS CHECKS
						for (var j = 1; j <= 12; j++) {	
							for (var i = 1; i <= 13; i++) {
								$("#c"+j+"_"+i).fadeOut(500);
								$("#c"+j+"_"+i).empty();
								$("#c"+j+"_"+i).append('<input class="form-check-input" type="checkbox" value="" id="check'+j+'_'+i+'" name="check'+j+'_'+i+'">');
								$("#c"+j+"_"+i).fadeIn(500);
							}
						}
					//FIN ESPECIFICOS

					$("#check3_2").click(function(event) {
						if($(this).prop('checked')){
							$("#extincion-p2").fadeIn(500);
						}
						else{
							$("#extincion-p2").fadeOut(500);	
						}
					});

					if($("#check3_2").prop('checked')){
						$("#extincion-p2").fadeIn(500);
					}
					//ACOMODAR LAS LIBRAS
					$("#libras").val("");

					//OCULTAR LOS FORMS
					$("#inspeccion-general").fadeOut(500);
					$("#inspeccion-especifica").fadeOut(500);
				}	
			}
		});
	}
//FIN ACOMODAR

//BUSCADOR DE INSPECCION
	$("#busqueda").change(function(event){
		$("#info").text("");
		$("#info").removeClass('text-danger')
		acomodar($(this).val());
	});
//FIN BUSCADOR