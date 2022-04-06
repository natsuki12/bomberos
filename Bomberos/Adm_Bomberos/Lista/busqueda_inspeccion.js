//EVENTO DE BUSCADOR POR FORMA EXPRESS
  $("#busqueda_express").change(function(event){
  	var cedula = $("#cedula-ins").val();
  	var forma = $("#forma-solicitud").val();
  	var pagina2 = $("#n_pag2").val();

    $.ajax({
        url: 'paginacion.php',
        type: 'get',
        data: {
            'ajax': '',
            'solicitud': forma,
            'cedula': cedula,
            'busqueda': $(this).val()
        },
    })
    .done(function(busqueda) {
        var grupos=JSON.parse(busqueda);

        //acomodo el numero de registros
        $("#n-registros1").fadeOut('500', function() {
            $("#n-registros1").text(grupos[grupos.length-4]);
        });
        $("#n-registros1").fadeIn(500);

        //acomoda la paginacion superior
        $("#paginacion_t1").hide('500', function() {
            $(this).empty();

            $(this).append(grupos[grupos.length-2]+"-"+grupos[grupos.length-1]+" / Página: ");
			for (var i = 0; i<grupos[grupos.length-1]; i++) {
				if (i+1==grupos[grupos.length-2]) {
					$(this).append("<a class='text-dark' href='l_inspecciones.php?pagina="+(i+1)+"&busqueda="+grupos[grupos.length-3]+"&forma="+forma+"&pagina2="+pagina2+"&cedula="+cedula+"'><strong>"+(i+1)+" </strong></a>");
				}else{
					$(this).append("<a class='text-dark' href='l_inspecciones.php?pagina="+(i+1)+"&busqueda="+grupos[grupos.length-3]+"&forma="+forma+"&pagina2="+pagina2+"&cedula="+cedula+"'>"+(i+1)+" </a>");
				}
			}
        });
        $("#paginacion_t1").show(500);

        //acomoda la paginacion inferior
        $("#paginacion_b1").hide('500', function() {
            $(this).empty();

           	$(this).append(grupos[grupos.length-2]+"-"+grupos[grupos.length-1]+" / Página: ");
			for (var i = 0; i<grupos[grupos.length-1]; i++) {
				if (i+1==grupos[grupos.length-2]) {
					$(this).append("<a class='text-dark' href='l_inspecciones.php?pagina="+(i+1)+"&busqueda="+grupos[grupos.length-3]+"&forma="+forma+"&pagina2="+pagina2+"&cedula="+cedula+"'><strong>"+(i+1)+" </strong></a>");
				}else{
					$(this).append("<a class='text-dark' href='l_inspecciones.php?pagina="+(i+1)+"&busqueda="+grupos[grupos.length-3]+"&forma="+forma+"&pagina2="+pagina2+"&cedula="+cedula+"'>"+(i+1)+" </a>");
				}
			}
        });
        $("#paginacion_b1").show(500);

        //agrega los valores en la tabla
        $("#tbody1").hide('500', function() {
            $(this).empty();
            for (var i = 0; i<grupos.length-4; i++) {
            	if (forma==1)
            		$(this).append('<tr><td><b>'+grupos[i]["cod_solicitud"]+'</b></td><td>'+grupos[i]["rif"]+'</td><td>'+grupos[i]["nombre_inm"]+'</td><td>'+grupos[i]["metros_sqr"]+'</td><td>'+grupos[i]["piso"]+'</td><td>'+grupos[i]["inspector"]+'</td><td>'+grupos[i]["estado"]+'</td><td>'+grupos[i]["fecha"]+'</td><td><a class="text-primary" onclick="direccion('+grupos[i]["croquis_cod"]+')" style="cursor: pointer">Croquis</a></button></td><td><button class="btn btn-primary registrar" value="Ver" onclick="registrar('+grupos[i]["cod_solicitud"]+')">Enviar</button></td></tr>');
            	else
            		$(this).append('<tr><td><img src="../../Imagenes/pdf.png" class="img-fluid pdf" height="50%" width="40%" onclick="pdf('+grupos[i]["cod_inspeccion"]+')"></td><td><b>'+grupos[i]["cod_inspeccion"]+'</b></td><td>'+grupos[i]["rif"]+'</td><td>'+grupos[i]["nombre_inm"]+'</td><td>'+grupos[i]["metros_sqr"]+'</td><td>'+grupos[i]["piso"]+'</td><td>'+grupos[i]["inspector"]+'</td><td>'+grupos[i]["estado"]+'</td><td>'+grupos[i]["fecha"]+'</td><td><a class="text-primary" onclick="direccion('+grupos[i]["croquis_cod"]+')" style="cursor: pointer">Croquis</a></button></td><td><button class="btn btn-primary reinspeccionar" value="Ver" onclick="registrar('+grupos[i]["cod_solicitud"]+')">Enviar</button></td><td><button class="btn btn-primary modificar" value="Ver" onclick="modificar('+grupos[i]["cod_inspeccion"]+')">Enviar</button></td></tr>');
            }
        });
        $("#tbody1").show(500);

    })
    .fail(function() {
        alert("Error, Intente de Nuevo");
    });
    
  });
//FIN EVENTO DE BUSCADOR

//EVENTO DE BUSCADOR POR FORMA NORMAL
  $("#busqueda_normal").change(function(event){
  	var cedula = $("#cedula-ins").val();
  	var forma = $("#forma-solicitud").val();
  	var pagina = $("#n_pag").val();

    $.ajax({
        url: 'paginacion2.php',
        type: 'get',
        data: {
            'ajax': '',
            'solicitud': forma,
            'cedula': cedula,
            'busqueda2': $(this).val()
        },
    })
    .done(function(busqueda) {
        var grupos=JSON.parse(busqueda);

        //acomodo el numero de registros
        $("#n-registros2").fadeOut('500', function() {
            $("#n-registros2").text(grupos[grupos.length-4]);
        });
        $("#n-registros2").fadeIn(500);

        //acomoda la paginacion superior
        $("#paginacion_t2").hide('500', function() {
            $(this).empty();

            $(this).append(grupos[grupos.length-2]+"-"+grupos[grupos.length-1]+" / Página: ");
			for (var i = 0; i<grupos[grupos.length-1]; i++) {
				if (i+1==grupos[grupos.length-2]) {
					$(this).append("<a class='text-dark' href='l_inspecciones.php?pagina2="+(i+1)+"&busqueda2="+grupos[grupos.length-3]+"&forma="+forma+"&pagina="+pagina+"&cedula="+cedula+"'><strong>"+(i+1)+" </strong></a>");
				}else{
					$(this).append("<a class='text-dark' href='l_inspecciones.php?pagina2="+(i+1)+"&busqueda2="+grupos[grupos.length-3]+"&forma="+forma+"&pagina="+pagina+"&cedula="+cedula+"'>"+(i+1)+" </a>");
				}
			}
        });
        $("#paginacion_t2").show(500);

        //acomoda la paginacion inferior
        $("#paginacion_b2").hide('500', function() {
            $(this).empty();

           	$(this).append(grupos[grupos.length-2]+"-"+grupos[grupos.length-1]+" / Página: ");
			for (var i = 0; i<grupos[grupos.length-1]; i++) {
				if (i+1==grupos[grupos.length-2]) {
					$(this).append("<a class='text-dark' href='l_inspecciones.php?pagina2="+(i+1)+"&busqueda2="+grupos[grupos.length-3]+"&forma="+forma+"&pagina="+pagina+"&cedula="+cedula+"'><strong>"+(i+1)+" </strong></a>");
				}else{
					$(this).append("<a class='text-dark' href='l_inspecciones.php?pagina2="+(i+1)+"&busqueda2="+grupos[grupos.length-3]+"&forma="+forma+"&pagina="+pagina+"&cedula="+cedula+"'>"+(i+1)+" </a>");
				}
			}
        });
        $("#paginacion_b2").show(500);

        //agrega los valores en la tabla
        $("#tbody2").hide('500', function() {
            $(this).empty();
            for (var i = 0; i<grupos.length-4; i++) {
            	if (forma==1)
            		$(this).append('<tr><td><b>'+grupos[i]["cod_solicitud"]+'</b></td><td>'+grupos[i]["rif"]+'</td><td>'+grupos[i]["nombre_inm"]+'</td><td>'+grupos[i]["metros_sqr"]+'</td><td>'+grupos[i]["piso"]+'</td><td>'+grupos[i]["inspector"]+'</td><td>'+grupos[i]["estado"]+'</td><td>'+grupos[i]["fecha"]+'</td><td><a class="text-primary" onclick="direccion('+grupos[i]["croquis_cod"]+')" style="cursor: pointer">Croquis</a></button></td><td><button class="btn btn-primary registrar" value="Ver" onclick="registrar('+grupos[i]["cod_solicitud"]+')">Enviar</button></td></tr>');
            	else
            		$(this).append('<tr><td><img src="../../Imagenes/pdf.png" class="img-fluid pdf" height="50%" width="40%" onclick="pdf('+grupos[i]["cod_inspeccion"]+')"></td><td><b>'+grupos[i]["cod_inspeccion"]+'</b></td><td>'+grupos[i]["rif"]+'</td><td>'+grupos[i]["nombre_inm"]+'</td><td>'+grupos[i]["metros_sqr"]+'</td><td>'+grupos[i]["piso"]+'</td><td>'+grupos[i]["inspector"]+'</td><td>'+grupos[i]["estado"]+'</td><td>'+grupos[i]["fecha"]+'</td><td><a class="text-primary" onclick="direccion('+grupos[i]["croquis_cod"]+')" style="cursor: pointer">Croquis</a></button></td><td><button class="btn btn-primary reinspeccionar" value="Ver" onclick="registrar('+grupos[i]["cod_solicitud"]+')">Enviar</button></td><td><button class="btn btn-primary modificar" value="Ver" onclick="modificar('+grupos[i]["cod_inspeccion"]+')">Enviar</button></td></tr>');
            }
        });
        $("#tbody2").show(500);

    })
    .fail(function() {
        alert("Error, Intente de Nuevo");
    });
    
  });
//FIN EVENTO DE BUSCADOR