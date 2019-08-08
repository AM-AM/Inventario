

$('#insertarUsuario').click(function(){
 
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/acciones-administrador.php",
      "method": "POST",
      "dataType": "json",
      "headers": {
        "content-type": "application/x-www-form-urlencoded"
      },
      "data": {
        "accion": "insertar-usuario",
        "primerNombre":$("#PrimerNombre").val(),
        "segundoNombre":$("#SegundoNombre").val(),
        "primerApellido":$("#PrimerApellido").val(),
        "segundoApellido":$("#SegundoApellido").val(),
        "telefono":$("#Telefono").val(),
        "email":$("#Corre").val(),
        "fechaNacimiento":$("#FechaNacimiento").val(),
        "NumeroCuenta":$("#NumeroCuenta").val(),
        "numeroIdentidad":$("#NumerIdentidad").val(),
        "idGenero":$_POST['Genero'],
        "idLugarResidencia":$_POST['LugarResidencia'],
        "idLugarNacimiento":$_POST['LugarNacimiento'],
        "tipoUsuario":$_POST['TipoUsuario'],
        "usuario": $("#PrimerNombre").val()+"."+$("#PrimerApellido").val(),
        "contrasenia": $("#txt-Password").val(),
        "fechaRegistro ": getDate()
      }
    }
    $.ajax(settings).done(function (response) {
     console.log(response);
    });
  
});