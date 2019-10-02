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
      $laboratorios= $_POST['laboratorios'];
      $idpersona = $_SESSION['id_persona_usuario'];
      $cuenta =$_POST['cuentaSolicitud'];
      $solicitud=$_POST['solicitud'];
      $estado = 2;
      $mensaje = '';
      
      //Convertimos el $tipo a Integer
      $tipo = (int)$tipo;
      //$articulos=(int)$articulos;
      if($cuenta != ""){
        $mensaje = 'Los articulos seleccionados son: <br>';
        foreach($laboratorios as $laboratorio){
          $mensaje =  $mensaje . ' ' . $laboratorio . ', ' ;
        }

        $conec = new Conexion();      
        $sql = "INSERT INTO tbl_solicitudes 
                values(null,'$idpersona','$estado','$tipo',NULL,'$laboratorio','$fecha','$cuenta','$solicitud','PENDIENTE')";
        
        $resultado = $conec->ejecutarConsulta($sql);
        
        header("Status: 301 Moved Permanently");
        header("Location: ../administrador.php");

     }
      
   header("Location: ../administrador.php");

?>

