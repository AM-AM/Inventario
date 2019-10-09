<?php
include ('class/class-conexion.php');

 session_start();
 if($_SESSION['status']==false) { // CUALQUIER USUARIO REGISTRADO PUEDE VER ESTA PAGINA
      session_destroy();
     header("Location:login.php");
 }

         $nombre = $_POST['nombre'];
         $categoria = $_POST['categoria'];
         $cantidad = $_POST['cantidad'];
         $precio = $_POST['precio'];
         $descripcion = $_POST['descripcion'];
         $estado = $_POST['estado'];
         $id_persona_usuario = $_SESSION['id_persona_usuario'];
         $ubicacion = $_POST['ubicacion'];
         $fecha=$_POST['fecha'];      

       $conec = new Conexion();
         
         $sql = "INSERT INTO TBL_ARTICULOS
                  VALUES(NULL,'$estado','$id_persona_usuario','$categoria','$ubicacion','$nombre','$precio','$cantidad','$fecha',NULL,'$descripcion',NULL)";
          
         $resultado=$conec->ejecutarConsulta($sql);

        header("Status: 301 Moved Permanently");
        header("Location: administrador.php");

      
   

?>

