$(document).ready(function(){
    $("#administradores").click(function(){
        $("#contenido").load('tablas/administradores.php');
    });
    $("#Instructores").click(function(){
    	$("#contenido").load('tablas/Instructores.php');
    });
    $("#crear_reporte").click(function(){
    	$("#contenido").load('tablas/crear_reporte.php');
    });

    $("#estadoArticulo").click(function(){
        $("#contenido").load('ajax/estadoArticulo/editarEstadoArticulo.html');
    });
  
    $("#registro").click(function(event){
    	$("#contenido").load('register.html');
	});
	$("#prestar").click(function(event){
    	$("#contenido").load('tablas/prestar.php');
	});
	$("#devolver").click(function(event){
    	$("#contenido").load('ajax/devolverArticulo/devolverArticulo.html');
	});
    $("#computadoras").click(function(event){
        $("#contenido").load('tablas/categorias/computadoras.php');
    });
    $("#cables").click(function(event){
        $("#contenido").load('tablas/categorias/cables.php');
    });
    $("#proyectores").click(function(event){
        $("#contenido").load('tablas/categorias/proyectores.php');
    });
    //acceso inventario
    $("#equiposDisponibles").click(function(event){
        $("#contenido").load('inventario.php');
    });

    $("#añadirEquipos").click(function(event){
        $("#contenido").load('agregarArt.php');
    });
    $("#historialMovimientos").click(function(event){
        $("#contenido").load('tablas/historialMovimientos.php');
    });

    

    $("#reservaLab").click(function(event){
        $("#contenido").load('tablas/reservaLab.php');
    });


    
    /*$("#verSolicitudes").click(function(event){
        $("#contenido").load('solicitudesPres.php');
    });

     $("#notiSolicitud").click(function(event){
        $("#contenido").load('solicitudesPres.php');
    });*/
     
        

    // Chat
    $("#id_envia").click(function(event){
        header("Status: 301 Moved Permanently");
        header("Location: tablas/chat.php");
    });

   

    
});



