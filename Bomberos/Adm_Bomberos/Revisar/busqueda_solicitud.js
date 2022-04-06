//EVENTO DE BUSCADOR POR CODIGO DE SOLICITUD
  $("#busqueda_codigo").change(function(event){
    $("#busqueda_cedula").val("");
    $("#busqueda_rif").val("");

    $.ajax({
        url: 'paginacion.php',
        type: 'get',
        data: {
            'ajax': '',
            'codigo': '',
            'busqueda': $(this).val()
        },
    })
    .done(function(busqueda) {
        var grupos=JSON.parse(busqueda);

        //acomodo el numero de registros
        $("#n-registros").fadeOut('500', function() {
            $("#n-registros").text(grupos[grupos.length-4]);
        });
        $("#n-registros").fadeIn(500);

        //acomoda la paginacion superior
        $("#paginacion_t").hide('500', function() {
            $(this).empty();

            $(this).append(grupos[grupos.length-2]+"-"+grupos[grupos.length-1]+" / Página: ");
			for (var i = 0; i<grupos[grupos.length-1]; i++) {
				if (i+1==grupos[grupos.length-2]) {
					$(this).append("<a class='text-dark' href='chequear.php?pagina="+(i+1)+"&codigo=&busqueda="+grupos[grupos.length-3]+"'><strong>"+(i+1)+" </strong></a>");
				}else{
					$(this).append("<a class='text-dark' href='chequear.php?pagina="+(i+1)+"&codigo=&busqueda="+grupos[grupos.length-3]+"'>"+(i+1)+" </a>");
				}
			}
        });
        $("#paginacion_t").show(500);

        //acomoda la paginacion inferior
        $("#paginacion_b").hide('500', function() {
            $(this).empty();

           	$(this).append(grupos[grupos.length-2]+"-"+grupos[grupos.length-1]+" / Página: ");
			for (var i = 0; i<grupos[grupos.length-1]; i++) {
				if (i+1==grupos[grupos.length-2]) {
                    $(this).append("<a class='text-dark' href='chequear.php?pagina="+(i+1)+"&codigo=&busqueda="+grupos[grupos.length-3]+"'><strong>"+(i+1)+" </strong></a>");
                }else{
                    $(this).append("<a class='text-dark' href='chequear.php?pagina="+(i+1)+"&codigo=&busqueda="+grupos[grupos.length-3]+"'>"+(i+1)+" </a>");
                }
			}
        });
        $("#paginacion_b").show(500);

        //agrega los valores en la tabla
        $("#tbody").hide('500', function() {
            $(this).empty();
            for (var i = 0; i<grupos.length-4; i++) {
                $(this).append('<tr><td><b>'+grupos[i]["cod_solicitud"]+'</b></td><td>'+grupos[i]["nombre"]+' '+grupos[i]["apellido"]+'</td><td>'+grupos[i]["cedula"]+'</td><td>'+grupos[i]["nombre_inm"]+'</td><td>'+grupos[i]["rif"]+'</td><td>'+grupos[i]["inspector"]+'</td><td>'+grupos[i]["fecha"]+'</td><td>'+grupos[i]["estado"]+'</td></tr>');
            }
        });
        $("#tbody").show(500);

    })
    .fail(function() {
        alert("Error, Intente de Nuevo");
    });
    
  });
//FIN EVENTO DE BUSCADOR

//EVENTO DE BUSCADOR POR CEDULA DE SOLICITANTE
  $("#busqueda_cedula").change(function(event){
    $("#busqueda_rif").val("");
    $("#busqueda_codigo").val("");

    $.ajax({
        url: 'paginacion.php',
        type: 'get',
        data: {
            'ajax': '',
            'cedula': '',
            'busqueda': $(this).val()
        },
    })
    .done(function(busqueda) {
        var grupos=JSON.parse(busqueda);

        //acomodo el numero de registros
        $("#n-registros").fadeOut('500', function() {
            $("#n-registros").text(grupos[grupos.length-4]);
        });
        $("#n-registros").fadeIn(500);

        //acomoda la paginacion superior
        $("#paginacion_t").hide('500', function() {
            $(this).empty();

            $(this).append(grupos[grupos.length-2]+"-"+grupos[grupos.length-1]+" / Página: ");
            for (var i = 0; i<grupos[grupos.length-1]; i++) {
                if (i+1==grupos[grupos.length-2]) {
                    $(this).append("<a class='text-dark' href='chequear.php?pagina="+(i+1)+"&cedula=&busqueda="+grupos[grupos.length-3]+"'><strong>"+(i+1)+" </strong></a>");
                }else{
                    $(this).append("<a class='text-dark' href='chequear.php?pagina="+(i+1)+"&cedula=&busqueda="+grupos[grupos.length-3]+"'>"+(i+1)+" </a>");
                }
            }
        });
        $("#paginacion_t").show(500);

        //acomoda la paginacion inferior
        $("#paginacion_b").hide('500', function() {
            $(this).empty();

            $(this).append(grupos[grupos.length-2]+"-"+grupos[grupos.length-1]+" / Página: ");
            for (var i = 0; i<grupos[grupos.length-1]; i++) {
                if (i+1==grupos[grupos.length-2]) {
                    $(this).append("<a class='text-dark' href='chequear.php?pagina="+(i+1)+"&cedula=&busqueda="+grupos[grupos.length-3]+"'><strong>"+(i+1)+" </strong></a>");
                }else{
                    $(this).append("<a class='text-dark' href='chequear.php?pagina="+(i+1)+"&cedula=&busqueda="+grupos[grupos.length-3]+"'>"+(i+1)+" </a>");
                }
            }
        });
        $("#paginacion_b").show(500);

        //agrega los valores en la tabla
        $("#tbody").hide('500', function() {
            $(this).empty();
            for (var i = 0; i<grupos.length-4; i++) {
                $(this).append('<tr><td><b>'+grupos[i]["cod_solicitud"]+'</b></td><td>'+grupos[i]["nombre"]+' '+grupos[i]["apellido"]+'</td><td>'+grupos[i]["cedula"]+'</td><td>'+grupos[i]["nombre_inm"]+'</td><td>'+grupos[i]["rif"]+'</td><td>'+grupos[i]["inspector"]+'</td><td>'+grupos[i]["fecha"]+'</td><td>'+grupos[i]["estado"]+'</td></tr>');
            }
        });
        $("#tbody").show(500);

    })
    .fail(function() {
        alert("Error, Intente de Nuevo");
    });
    
  });
//FIN EVENTO DE BUSCADOR

//EVENTO DE BUSCADOR POR RIF
  $("#busqueda_rif").change(function(event){
    $("#busqueda_cedula").val("");
    $("#busqueda_codigo").val("");
    
    $.ajax({
        url: 'paginacion.php',
        type: 'get',
        data: {
            'ajax': '',
            'rif': '',
            'busqueda': $(this).val()
        },
    })
    .done(function(busqueda) {
        var grupos=JSON.parse(busqueda);

        //acomodo el numero de registros
        $("#n-registros").fadeOut('500', function() {
            $("#n-registros").text(grupos[grupos.length-4]);
        });
        $("#n-registros").fadeIn(500);

        //acomoda la paginacion superior
        $("#paginacion_t").hide('500', function() {
            $(this).empty();

            $(this).append(grupos[grupos.length-2]+"-"+grupos[grupos.length-1]+" / Página: ");
            for (var i = 0; i<grupos[grupos.length-1]; i++) {
                if (i+1==grupos[grupos.length-2]) {
                    $(this).append("<a class='text-dark' href='chequear.php?pagina="+(i+1)+"&rif=&busqueda="+grupos[grupos.length-3]+"'><strong>"+(i+1)+" </strong></a>");
                }else{
                    $(this).append("<a class='text-dark' href='chequear.php?pagina="+(i+1)+"&rif=&busqueda="+grupos[grupos.length-3]+"'>"+(i+1)+" </a>");
                }
            }
        });
        $("#paginacion_t").show(500);

        //acomoda la paginacion inferior
        $("#paginacion_b").hide('500', function() {
            $(this).empty();

            $(this).append(grupos[grupos.length-2]+"-"+grupos[grupos.length-1]+" / Página: ");
            for (var i = 0; i<grupos[grupos.length-1]; i++) {
                if (i+1==grupos[grupos.length-2]) {
                    $(this).append("<a class='text-dark' href='chequear.php?pagina="+(i+1)+"&rif=&busqueda="+grupos[grupos.length-3]+"'><strong>"+(i+1)+" </strong></a>");
                }else{
                    $(this).append("<a class='text-dark' href='chequear.php?pagina="+(i+1)+"&rif=&busqueda="+grupos[grupos.length-3]+"'>"+(i+1)+" </a>");
                }
            }
        });
        $("#paginacion_b").show(500);

        //agrega los valores en la tabla
        $("#tbody").hide('500', function() {
            $(this).empty();
            for (var i = 0; i<grupos.length-4; i++) {
                $(this).append('<tr><td><b>'+grupos[i]["cod_solicitud"]+'</b></td><td>'+grupos[i]["nombre"]+' '+grupos[i]["apellido"]+'</td><td>'+grupos[i]["cedula"]+'</td><td>'+grupos[i]["nombre_inm"]+'</td><td>'+grupos[i]["rif"]+'</td><td>'+grupos[i]["inspector"]+'</td><td>'+grupos[i]["fecha"]+'</td><td>'+grupos[i]["estado"]+'</td></tr>');
            }
        });
        $("#tbody").show(500);

    })
    .fail(function() {
        alert("Error, Intente de Nuevo");
    });
    
  });
//FIN EVENTO DE BUSCADOR