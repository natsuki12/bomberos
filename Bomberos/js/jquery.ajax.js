$("#municipio_i").change(function(event){
  $.ajax({
    data:{'municipio': $(this).val(),
        'proceso': 1},
    url:'/Prefectura/config/ajax_auto.php',
    type:'post',
    success: function(respuesta){
      console.log(respuesta);
      var datos=JSON.parse(respuesta),
      select=document.getElementById("parroquia_s");
      $("#parroquia_i").empty();
      $("#parroquia_i").append('<option selected="selected" value="">--Elegir Parroquia--</option>');
      for (var i = 0; i <= datos.length-1; i++) {
        var newoption=document.createElement("option");
        newoption.setAttribute("value",datos[i]["PARROQUIA_COD"]);
        newoption.setAttribute("label",datos[i]["PARROQUIA_NOMBRE"]);
        select.appendChild(newoption);
      }
      $("#parroquia_s").removeAttr("disabled");
    }
  });
});

$("#municipio_d").change(function(event){
  $.ajax({
    data:{'municipio': $(this).val(),
        'proceso': 1},
    url:'/Prefectura/config/ajax_auto.php',
    type:'post',
    success: function(respuesta){
      var datos=JSON.parse(respuesta),
      select=document.getElementById("parroquia_d");
      $("#parroquia_d").empty();
      $("#parroquia_d").append('<option selected="selected" value="0">--Elegir Parroquia--</option>');
      for (var i = 0; i <= datos.length-1; i++) {
        var newoption=document.createElement("option");
        newoption.setAttribute("value",datos[i]["PARROQUIA_COD"]);
        newoption.setAttribute("label",datos[i]["PARROQUIA_NOMBRE"]);
        select.appendChild(newoption);
      }
      $("#parroquia_d").removeAttr("disabled");
    }
  });
});