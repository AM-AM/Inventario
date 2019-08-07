$('#guardar-usuario').click(function(){
 
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/acciones-administracion.php",
      "method": "POST",
      "dataType": "json",
      "headers": {
        "content-type": "application/x-www-form-urlencoded"
      },
      "data": {
        "accion": "insertar-empleado",
  
        "nombre": $('#PrimerNomobre').val(),
        "apellido": $('#apellido-fAgregar').val(),
        "genero": $('#slc-genero-fAgregar').val(),
        "direccion": $('#direccion-fAgregar').val(),
        "edad": $('#edad-fAgregar').val(),
        "email": $('#email-fAgregar').val(),
        "identidad": $('#numero-identidad-fAgregar').val(),
        "telefono": $('#telefono-fAgregar').val(),
        "fecha_nacimiento": $('#fecha-nacimiento-fAgregar').val(),
        "fecha_ingreso": $('#fecha-ingreso-fAgregar').val()
      }
    }
  
    $.ajax(settings).done(function (response) {
     
    });
  
});
