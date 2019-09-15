<?php
  include_once("../class/class-conexion.php");
  $conec = new Conexion();

  if($_POST['guardar_mensaje']){
    $id = $_POST['id_recibe'];
    $id_recibe = (int)$_POST['id_envia'];
    $mensaje = $_POST['mensaje'];
    $fecha = date('Y').'-'.date('m').'-'.date('d');
    
 $sql = "INSERT INTO tbl_mensajes (id_mensaje, id_estado_mensaje, id_persona_usuario_envia, id_persona_usuario_recibe, contenido_mensaje, asunto_mensaje, fecha_mensaje ) 
         VALUES (null,2,$id,$id_recibe,'$mensaje', '', '$fecha')";
    

$resultado = $conec->ejecutarConsulta($sql);

    // PONER LA DIRECCION REAL, QUITARL EL INVENTARIO 02 A SOLO INVENTARIO 

    header("Status: 301 Moved Permanently");
    header("Location: ../tablas/chat.php?id=$id_recibe");
}

if($_GET['accion']=='eliminar'){

    $id_mensaje = $_GET['idM'];
    $id_usuario_envia = $_GET['id'];
    

    $sql1 = "DELETE FROM tbl_mensajes WHERE id_mensaje = $id_mensaje";
    $resultado = $conec->ejecutarConsulta($sql1);

    header("Status: 301 Moved Permanently");
    header("Location: ../tablas/chat.php?id=$id_usuario_envia");

  }




?>