<script type="text/javascript">
	$("#m_estadistica").change(function(event){
		if ($(this).val()==1) {
			$.ajax({
				url: 'sql_charts.php',
				type: 'post',
				data: {busqueda_m: 'cultor'},
			})
			.done(function(lista) {
				var mes=JSON.parse(lista);
				mes_total(mes);
			})
			.fail(function() {
				alert("error");
			});
		}else if ($(this).val()==2) {
			$.ajax({
				url: 'sql_charts.php',
				type: 'post',
				data: {busqueda_m: 'agrupacion'},
			})
			.done(function(lista) {
				var mes=JSON.parse(lista);
				mes_total(mes);
			})
			.fail(function() {
				alert("error");
			});
		}else{

		}
	});

	$("#d_estadistica").change(function(event){
		if ($(this).val()==1) {
			$.ajax({
				url: 'sql_charts.php',
				type: 'post',
				data: {busqueda_d: 'cultor'},
			})
			.done(function(lista) {
				var dia=JSON.parse(lista);
				dia_total(dia);
			})
			.fail(function() {
				alert("error");
			});
		}else if ($(this).val()==2) {
			$.ajax({
				url: 'sql_charts.php',
				type: 'post',
				data: {busqueda_d: 'agrupacion'},
			})
			.done(function(lista) {
				var dia=JSON.parse(lista);
				dia_total(dia);
			})
			.fail(function() {
				alert("error");
			});
		}else{
			
		}
	});
	//GRAFICA DE TOTAL DE CENSADOS POR MES//
	/*function mes_total(consulta){
		var texto;
		texto+=
		for (var i = 0; i <= consulta.length-1; i++){
			switch (consulta[i]["mes"]) {
				case "1":
	                  alert("Enero"); 
	                  break;
	                case "2":
	                  alert("Febrero");
	                  break;
	                case "3":
	                  alert("Marzo");
	                  break;
	                case "4":
	                  alert("Abril");
	                  break;
	                case "5":
	                  alert("Mayo");
	                  break;
	                case "6":
	                  alert("Junio");
	                  break;
	                case "7":
	                  alert("Julio");
	                  break;
	                case "8":
	                  aler("Agosto");
	                  break;
	                default:
	                  
	                  break;
			}
		}
	}*/
</script>

<script type="text/javascript">
	function mes_total(consulta){
		$("#total_mes").remove(); //BORRO EL CANVA VIEJO PARA QUE NO SE QUEDE CON HOVER
		$("#canva_mes").append('<canvas id="total_mes"></canvas>'); //LO VUELVO A AGREGAR
	    var pro_mes = $("#total_mes");
	    var m1=0, m2=0, m3=0, m4=0, m5=0, m6=0, m7=0, m8=0, m9=0, m10=0, m11=0, m12=0; //LLEVA EL TOTAL POR MES
	    for (var i = 0; i <= consulta.length-1; i++) { //CAMBIO SI SALE ALGUN MES A SU CANTIDAD
		  switch(consulta[i]["mes"]){
			case "1":
              m1 = consulta[i]["total"]; 
              break;
            case "2":
              m2 = consulta[i]["total"];
              break;
            case "3":
              m3 = consulta[i]["total"];
              break;
            case "4":
              m4 = consulta[i]["total"];
              break;
            case "5":
              m5 = consulta[i]["total"];
              break;
            case "6":
              m6 = consulta[i]["total"];
              break;
            case "7":
              m7 = consulta[i]["total"];
              break;
            case "8":
              m8 = consulta[i]["total"];
              break;
            case "9":
              m9 = consulta[i]["total"];
              break;
            case "10":
              m10 = consulta[i]["total"];
              break;
            case "11":
              m11 = consulta[i]["total"];
              break;
            case "12":
              m12 = consulta[i]["total"];
              break;
            default:
              
              break;
			}
        }

	    var chartData = {
	      labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
	      datasets: [{
	        label: "Censados",
	        data: [m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12],
	        backgroundColor: '#2E3192',
	        borderColor: "#1B1464",
	        borderWidth: 4,
	        pointBackgroundColor: "#3FA637"
	      }]
	    };

	    if (pro_mes) {new Chart(pro_mes, {
	      type: 'bar',
	      data: chartData,
	      options: {
	        scales: {
	          yAxes: [{
	            ticks: {
	              beginAtZero: true
	            }
	          }]
	        },
	        legend: {
	          display: false,
	          labels:{
	            fontColor: 'red',
	            fontSize: 20
	          }
	        },
	        tooltip: {
	          xPadding: 6
	        }
	      }
	      });
	    }
	}
    //FIN GRAFICA DE TOTAL DE CENSADOS POR MES//

    //GRAFICA DE TOTAL DE CENSADOS POR DIA//
    function dia_total(consulta){
    	$("#total_dia").remove(); //BORRO EL CANVA VIEJO PARA QUE NO SE QUEDE CON HOVER
		$("#canva_dia").append('<canvas id="total_dia"></canvas>'); //LO VUELVO A AGREGAR
	    var pro_dia = $("#total_dia");
	    var d1=0, d2=0, d3=0, d4=0, d5=0, d6=0, d7=0; //LLEVA EL TOTAL POR DIA
	    for (var i = 0; i <= consulta.length-1; i++) { //CAMBIO SI SALE ALGUN DIA A SU CANTIDAD
		  switch(consulta[i]["dia"]){
			case "1":
              d1 = consulta[i]["total"]; 
              break;
            case "2":
              d2 = consulta[i]["total"];
              break;
            case "3":
              d3 = consulta[i]["total"];
              break;
            case "4":
              d4 = consulta[i]["total"];
              break;
            case "5":
              d5 = consulta[i]["total"];
              break;
            case "6":
              d6 = consulta[i]["total"];
              break;
            case "0":
              d7 = consulta[i]["total"];
              break;
            default:
              
              break;
			}
        }

	    var chartData = {
	      labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
	      datasets: [{
	        label: "Censados",
	        data: [d1,d2,d3,d4,d5,d6,d7],
	        backgroundColor: '#2E3192',
	        borderColor: "#1B1464",
	        borderWidth: 4,
	        pointBackgroundColor: "#3FA637"
	      }]
	    };

	    if (pro_dia) {new Chart(pro_dia, {
	      type: 'bar',
	      data: chartData,
	      options: {
	        scales: {
	          yAxes: [{
	            ticks: {
	              beginAtZero: true
	            }
	          }]
	        },
	        legend: {
	          display: false,
	          labels:{
	            fontColor: 'red',
	            fontSize: 20
	          }
	        },
	        tooltip: {
	          xPadding: 6
	        }
	      }
	      });
	    }
	}
    //FIN GRAFICA DE TOTAL DE CENSADOS POR DIA//
</script>