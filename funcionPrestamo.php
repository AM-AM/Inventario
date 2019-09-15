<?php
if ($_POST){
    include("class/class-conexion.php");
    $conec = new Conexion();


    if($_POST['actualizar']){
        $id = $_POST['idd'];
       $tipo = (int)$_POST['tipo'];
        

        $sql = "UPDATE tbl_solicitudes SET id_estado_solicitud = $tipo
                     WHERE id_solicitud = $id";

        $resultado = $conec->ejecutarConsulta($sql);

        IF($tipo==1){
          $sql1= "UPDATE tbl_articulos SET id_estado_articulo = 2, observacion='Este articulo actualmente esta solicitado para prestamo'
                     WHERE id_articulos = $id";

          $resultado1= $conec->ejecutarConsulta($sql1);

        }
        

            header("Status: 301 Moved Permanently");
            header("Location: administrador.php"); 
    }

    if ($_POST['borrar']) {
      $id = $_POST['idd'];
      $sql = "DELETE FROM tbl_solicitudes 
      WHERE id_solicitud = $id";
      $resultado = $conec -> ejecutarConsulta($sql);

      header("Status: 301 Moved Permanently");
      header("Location: administrador.php");
    }

  
    
}
?>

