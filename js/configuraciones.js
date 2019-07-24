$(document).ready(function(){
    $("#administradores").click(function(){
        $("#contenido").load('tablas/administradores.php');
    });
    $("#estudiantes").click(function(){
    	$("#contenido").load('tablas/estudiantes.php');
    });
    $("#registro").click(function(event){
    	$("#contenido").load('register.html');
	});
	$("#prestar").click(function(event){
    	$("#contenido").load('tablas/prestar.php');
	});
	$("#devolver").click(function(event){
    	$("#contenido").load('tablas/devolver.php');
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
});



