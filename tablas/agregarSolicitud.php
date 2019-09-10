<?php
include ('../class/class-conexion.php');

 session_start();
 if($_SESSION['status']==false) { // CUALQUIER USUARIO REGISTRADO PUEDE VER ESTA PAGINA
      session_destroy();
     header("Location: ../../login.php");
 }

 


      $tipo = $_POST['tipo'];
      $solicitud = $_POST['solicitud'];
      $fecha= $_POST['fecha'];
      $articulos= $_POST['articulos'];
      $idpersona = $_SESSION['id_persona_usuario'];
      $cuenta =$_POST['cuentaSolicitud'];
      $estado = 2;
      $mensaje = '';
      
      //Convertimos el $tipo a Integer
      $tipo = (int)$tipo;
      //$articulos=(int)$articulos;
     
      $mensaje = 'Los articulos seleccionados son: <br>';
      foreach($articulos as $articulo){
      $mensaje =  $mensaje . ' ' . $articulo . ', ' ;

      }

        
      $conec = new Conexion();      
    $sql = "INSERT INTO tbl_solicitudes values
                             (null,'$idpersona','$estado','$tipo','$articulo','$fecha','$cuenta')";
   
  
    $resultado = $conec->ejecutarConsulta($sql);






 header("Status: 301 Moved Permanently");
 header("Location: ../administrador.php");

?>

