// Alerta
let popUp = new Popup();

$(document).ready(function() {

  //Carga los EQUIPOS con menor cantidad disponible
  $("#table-articulos-proximos").DataTable({
    pageLength: 10,
    ordering: true,
    paging: true,
    responsive: true,
    serverSide: true,
    ajax: {
      "url": "ajax/acciones-inventario.php",
      "method": "POST",
      "dataType": "json",
      "data": {
        "accion" : "leer-articulos-proximos",
        "cantidad" : function(){
            regex = /^[0-9]+$/;
            if(regex.exec($("#txt-limite").val())){
              $("#txt-limite").css('color', '');
              $("#txt-limite").css('border', '');
              $("#txt-limite").addClass("form-control");
              return parseInt($("#txt-limite").val())
            } else{
              popUp.setTextoAlerta("Error en la cantidad ingresada, debe ser un número válido");
              popUp.incorrecto();
              popUp.mostrarAlerta();
              $("#txt-limite").css('color', 'red');
              $("#txt-limite").css('border', 'solid 1px red');
            }
          }
      }
    },
    columns: [
      {data: "ID_ARTICULOS", title: "Código Articulo", 
      render: function ( data, type, row, meta ) {
        return `<b>${data}</b>`;
      }},
      {data: "NOMBRE_ARTICULO", title: "Articulo"},
      {data: "ESTADO_ARTICULO", title: "Estado Articulo"},
      {data: "CANTIDAD", title: "Cantidad"},
      {data: "PRECIO_ARTICULO", title: "Precio "},
      {data: "PERSONA_USUARIO_REGISTRA", title: "Usuario que Registro"},
      {data: null, title: "Acciones",
      render: function (data, type, row, meta) {
        return `<button class="form-control" data-toggle="modal" data-target="#modalVerInsumo" onclick="verInsumo(${row.ID_INSUMO});">Ver más</button>`;
      }}
    ]
  });
  
  //Carga los articulos
  $("#table-articulos").DataTable({
    pageLength: 10,
    ordering: true,
    paging: true,
    responsive: true,
    serverSide: true,
    ajax: {
      "url": "ajax/acciones-inventario.php",
      "method": "POST",
      "dataType": "json",
      "data": {
        "accion" : "leer-articulos"
      }
    },
    columns: [
      {data: "ID_ARTICULOS", title: "Código Articulo", 
      render: function ( data, type, row, meta ) {
        return `<b>${data}</b>`;
      }},
      {data: "NOMBRE_ARTICULO", title: "Nombre Articulo"},
      {data: "ESTADO_ARTICULO", title: "Estado Articulo"},
      {data: "CANTIDAD", title: "Cantidad"},
      {data: "PRECIO_ARTICULO", title: "Precio"},
      {data: "PERSONA_USUARIO_REGISTRA", title: "Persona que Registro"},
      {data: null, title: "Acciones",
      render: function (data, type, row, meta) {
        return `<button class="form-control" data-toggle="modal" data-target="#modalVerInsumo" onclick="verInsumo(${row.ID_INSUMO});">Ver más</button>`;
      }}
    ]
  });

  cargarFormulario();

});

$("#txt-limite").on("change", function() {
  $("#table-articulos-proximos").DataTable().ajax.reload();
});

function cargarFormulario() {
  
  var settings = {
    "async": true,
    "crossDomain": true,
    "url": "ajax/acciones-inventario.php",
    "method": "POST",
    "dataType": "json",
    "headers": {
      "content-type": "application/x-www-form-urlencoded"
    },
    "data": {
      "accion": "leer-estado-articulo"
    }
  }

  $.ajax(settings).done(function (response) {
    if(response.data.error == "1"){
      popUp.setTextoAlerta("Ocurrió un error en el servidor");
      popUp.incorrecto();
      popUp.mostrarAlerta();
    }
    else{
      for(var i in response.data){
        var option = document.createElement("option");
        option.value = response.data[i].ID_ESTADO_ARTICULO;
        option.innerText = response.data[i].ESTADO_ARTICULO;
        $('#slc-estado-articulo').append(option);
        $('#slc-tipo-articulo-actualizar').append(option);
      }
    }
  });

  var settings = {
    "async": true,
    "crossDomain": true,
    "url": "ajax/acciones-inventario.php",
    "method": "POST",
    "dataType": "json",
    "headers": {
      "content-type": "application/x-www-form-urlencoded"
    },
    "data": {
      "accion": "leer-persona-registra"
    }
  }

  $.ajax(settings).done(function (response) {
    if(response.data.error == "1"){
      popUp.setTextoAlerta("Ocurrió un error en el servidor");
      popUp.incorrecto();
      popUp.mostrarAlerta();
    }
    else{
      for(var i in response.data){
        var option = document.createElement("option");
        option.value = response.data[i].ID_PROVEEDOR;
        option.innerText = response.data[i].PROVEEDOR;
        $('#slc-persona-registra').append(option);
        $('#slc-persona-registra-actualizar').append(option);
      }
    }
  });
}

function validarArticulo(parametros) {
  var control = true
  var regexInsumo = {
                "nombreArticulo": /((^[A-Z]+[A-Za-záéíóúñ]+)((\s)(^[A-Z]+[A-Za-záéíóúñ]+)))*/,
                "id_estado_articulo": /^[1-9][0-9]*$/,
                "cantidad": /[0-9]+$/,
                "precio": /^([0-9]+)\.[0-9]+$/,
                "descripcion": /((^[A-Za-záéíóúñ0-9]+)((\s)(^[A-Z]+[A-Za-záéíóúñ0-9]+)))*$/,
                "id_persona_usuario_registra": /^[1-9][0-9]*$/,
                "fecha_registro_art": /^(19[6-9][0-9]|20[0-1][0-9])\-(0[0-9]|1[0-2])\-([0-2][0-9]|3[0-1])$/,
                "fecha_salida_art": /^([0-9]{4})\-(0[0-9]|1[0-2])\-([0-2][0-9]|3[0-1])$/
              };
  
  for(let i in parametros){
    if(!validarCampoVacio(parametros[i], regexInsumo[i])) 
      control = false;
  }

  return control;
}

var idArticuloVisible;
/* Funcion para ver los datos de un articulo */
function verArticulo(idArticulo) {
  var settings = {
    "async": true,
    "crossDomain": true,
    "url": "ajax/acciones-inventario.php",
    "method": "POST",
    "dataType": "json",
    "headers": {
      "content-type": "application/x-www-form-urlencoded"
    },
    "data": {
      "accion": "leer-articulos-id",

      "id_articulos": parseInt(idArticulo)
    }
  }

  $.ajax(settings).done(function (response) {
    datosArticulo = response.data;
    $(`#spn-nombre-articulo`).text(datosInsumo.INSUMO);
    $(`#spn-slc-estado-articulo`).text(datosInsumo.TIPO_INSUMO);
    $(`#spn-cantidad-articulo`).text(datosInsumo.CANTIDAD);
    $(`#spn-precio`).text(datosInsumo.PRECIO_COSTO);
    $(`#spn-descripcion-articulo`).text(datosInsumo.DESCRIPCION);
    $(`#spn-slc-persona-usuario`).text(datosInsumo.PROVEEDOR);
    $(`#spn-fecha-registro-art`).text(datosInsumo.FECHA_INGRESO);
    $(`#spn-fecha-salida-art`).text(datosInsumo.FECHA_VENC);
    
    $(`#nombre-articulo-actualizar`).val(datosInsumo.INSUMO);
    $(`#slc-estado-articulo-actualizar option[value="${datosInsumo.ID_TIPO_INSUMO}"]`).attr("selected",true);
    $(`#cantidad-articulo-actualizar`).val(datosInsumo.CANTIDAD);
    $(`#precio`).val(datosInsumo.PRECIO_COSTO);
    $(`#descripcion-articulo-actualizar`).val(datosInsumo.DESCRIPCION);
    $(`#slc-persona-registra-actualizar option[value="${datosInsumo.ID_PROVEEDOR}"]`).attr("selected",true);
    $(`#spn-fecha-registro-art-actualizar`).val(datosInsumo.FECHA_SALIDA_ART);
    $(`#spn-fecha-salida-art-actualizar`).val(datosInsumo.FECHA_SALIDA_ART);

    $("#spn-nombre-articulo-disminuir").text(datosInsumo.NOMBRE_ARTICULO);
    $("#spn-cantidad-articulo-disminuir").text(datosInsumo.CANTIDAD);
    
    idArticuloVisible = idArticulo;
  });
}

$("#guardar-articulo").on("click", function(){
  parametros = {
                "nombre_articulo": 'nombre-articulo',
                "id_estado_articulo": 'slc-estado-articulo',
                "cantidad": 'cantidad-articulo',
                "precio": 'precio',
                "descripcion": 'descripcion-articulo',
                "id_persona_usuario_registra": 'slc-persona-registra',
                "fecha_registro_art": 'fecha-registro-art',
                "fecha_salida_art": 'fecha-salida-art'
              };

  validacion = validarArticulo(parametros);
  if(validacion){
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/acciones-inventario.php",
      "method": "POST",
      "dataType": "json",
      "headers": {
        "content-type": "application/x-www-form-urlencoded"
      },
      "data": {
        "accion": "insertar-articulo",
  
        "nombre": $('#nombre-articulo').val(),
        "id_estado_articulo": $('#slc-estado-articulo').val(),
        "id_persona_usuario_registra": $('#slc-persona-registra').val(),
        "cantidad": $('#cantidad-articulo').val(),
        "precio": $('#precio-articulo').val(),
        "descripcion": $('#descripcion-articulo').val(),
        "fecha_registro_art": $('#fecha-registro-art').val(),
        "fecha_salida_art": $('#fecha-salida-art').val()
      }
    }
  
    $.ajax(settings).done(function (response) {
      if(response.data.error == "1"){
        popUp.setTextoAlerta(response.data.mensaje);
        popUp.incorrecto();
        popUp.mostrarAlerta();
      }
      else{
        popUp.setTextoAlerta(response.data.mensaje);
        popUp.correcto();
        popUp.mostrarAlerta();
        $('#table-articulos').DataTable().ajax.reload();
      }
    });
  }else{
    popUp.setTextoAlerta("Datos vacios o formato incorrecto en un dato, verifique e intente nuevamente");
    popUp.incorrecto();
    popUp.mostrarAlerta();
  }
});

$("#atras").on("click", function(){
  verInsumo(idInsumoVisible);
  $("#formulario-actualizar-articulo").addClass("hide");
  $("#formulario-disminuir-articulo").addClass("hide");
  $("#datos-articulo").removeClass("hide");
  $("#actualizar-articulo").addClass("hide");
  $("#atras").addClass("hide");
  $("#editar-articulo").removeClass("hide");
  $("#disminuir-articulo").removeClass("hide");
});

/* Editar Insumo */
$("#editar-articulo").click(function(){
  $("#formulario-actualizar-articulo").removeClass("hide");
  $("#datos-articulo").addClass("hide");
  $("#actualizar-articulo").removeClass("hide");
  $("#atras").removeClass("hide");
  $("#editar-articulo").addClass("hide");
  $("#disminuir-articulo").addClass("hide");
});

/* Habilitar Formulario Disminuir Insumo */
$("#disminuir-articulo").click(function(){
  $("#formulario-disminuir-articulo").removeClass("hide");
  $("#datos-articulo").addClass("hide");
  $("#atras").removeClass("hide");
  $("#editar-articulo").addClass("hide");
  $("#disminuir-articulo").addClass("hide");
});

/* Actualizar articulo */
$("#actualizar-articulo").click(function(){
  parametros = {
                "nombre": 'nombre-articulo-actualizar',
                "id_estado_articulo": 'slc-tipo-articulo-actualizar',
                "cantidad": 'cantidad-articulo-actualizar',
                "precio": 'precio-costo',
                "descripcion": 'descripcion-articulo-actualizar',
                "id_persona_usuario_registra": 'slc-proveedor-articulo-actualizar',
                "fecha_registro_art": 'fecha-ingreso-articulo-actualizar',
                "fecha_salida_art": 'fecha-vencimiento-articulo-actualizar'
              };

  validacion = validarInsumo(parametros);
  if(validacion){
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/acciones-inventario.php",
      "method": "POST",
      "dataType": "json",
      "headers": {
        "content-type": "application/x-www-form-urlencoded"
      },
      "data": {
        "accion": "actualizar-articulo",

        "id_articulos": idInsumoVisible,
        "nombre": $('#nombre-articulo-actualizar').val(),
        "id_estado_articulo": $('#slc-tipo-articulo-actualizar').val(),
        "cantidad": $('#cantidad-articulo-actualizar').val(),
        "precio": $('#precio-costo').val(),
        "descripcion": $('#descripcion-articulo-actualizar').val(),
        "id_persona_usuario_registra": $('#slc-persona-registra-articulo-actualizar').val(),
        "fecha_registro_art": $('#fecha-ingreso-art-actualizar').val(),
        "fecha_salida_art": $('#fecha-salida-art-actualizar').val()
      }
    }

    $.ajax(settings).done(function (response) {
      if(response.data.error == "1"){
        popUp.setTextoAlerta(response.data.mensaje);
        popUp.incorrecto();
        popUp.mostrarAlerta();
      }
      else{
        popUp.setTextoAlerta(response.data.mensaje);
        popUp.correcto();
        popUp.mostrarAlerta();
        $("#formulario-actualizar-articulo").addClass("hide");
        $("#datos-articulo").removeClass("hide");
        $("#actualizar-articulo").addClass("hide");
        $("#atras").addClass("hide");
        $("#editar-articulo").removeClass("hide");
        $("#disminuir-articulo").removeClass("hide");
        $('#table-articulos').DataTable().ajax.reload();
        $('#table-articulos-proximos').DataTable().ajax.reload();

        verArticulo(idArticuloVisible);
      }
    });
  }else{
    popUp.setTextoAlerta("Formato incorrecto en un dato, verifique e intente nuevamente");
    popUp.incorrecto();
    popUp.mostrarAlerta();
  }

});

$("#cantidad-disminuir").on("change", function(){
  if(validarCampoVacio("cantidad-disminuir", /^[0-9]+$/)){
    $("#spn-nueva-cantidad-articulo").text(parseInt($("#spn-cantidad-articulo-disminuir").text()) - $("#cantidad-disminuir").val());
  }else{
    $("#cantidad-disminuir").css("color", "red");
    $("#cantidad-disminuir").css("border", "1px solid red");
    setTimeout(function(){    
      $("#cantidad-disminuir").css("color", "");
      $("#cantidad-disminuir").css("border", "");
    }, 2000);
  }
});

function disminuirInsumo() {
  if(validarCampoVacio("cantidad-disminuir", /^[0-9]+$/)){
    var cantidadVieja = parseInt($("#spn-cantidad-articulo-disminuir").text());
    var cantidadDisminuir = $("#cantidad-disminuir").val(); 
    var nuevaCantidad =  cantidadVieja - cantidadDisminuir;

    if(nuevaCantidad > 0){
      popUp.setTextoDecision('Desea disminuir?');
      Popup.mantenerDecision();
      $("#decision-no").on("click", function() { 
        Popup.ocultarDecision();
        $("#decision-no").off();
        $("#decision-si").off();
      });

      $("#decision-si").on("click", function() {
        Popup.ocultarDecision();
        
        var settings = {
          "async": true,
          "crossDomain": true,
          "url": "ajax/acciones-inventario.php",
          "method": "POST",
          "dataType": "json",
          "headers": {
            "content-type": "application/x-www-form-urlencoded"
          },
          "data": {
            "accion": "disminuir-articulos",

            "id_articulos": idArticuloVisible,
            "cantidad": cantidadDisminuir
          }
        }

        $.ajax(settings).done(function (response) {
          if(response.data.error == "1"){
            popUp.setTextoAlerta(response.data.mensaje);
            popUp.incorrecto();
            popUp.mostrarAlerta();
          }
          else{
            popUp.setTextoAlerta(response.data.mensaje);
            popUp.correcto();
            popUp.mostrarAlerta();
            $("#formulario-disminuir-articulo").addClass("hide");
            $("#datos-articulo").removeClass("hide");
            $("#actualizar-articulo").addClass("hide");
            $("#atras").addClass("hide");
            $("#editar-articulo").removeClass("hide");
            $("#disminuir-articulo").removeClass("hide");
            $('#table-articulos').DataTable().ajax.reload();
            $('#table-articulos-proximos').DataTable().ajax.reload();

            verInsumo(idInsumoVisible);
            $("#decision-no").off();
            $("#decision-si").off();
          }
        });
      });
    }else{
      popUp.setTextoAlerta("La cantidad a disminuir es mayor que la cantidad actual");
      popUp.incorrecto();
      popUp.mostrarAlerta();
    }
  }else{
    popUp.setTextoAlerta("Formato incorrecto en un dato, verifique e intente nuevamente");
    popUp.incorrecto();
    popUp.mostrarAlerta();
  }
}