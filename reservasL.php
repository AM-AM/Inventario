<?php
if ($_POST){
    include("class/class-conexion.php");
    $conec = new Conexion();


    if($_POST['cuenta']){
        $cuenta = $_POST['cuenta'];
       $detalle = $_POST['detalle'];
       $articulos = (int)$_POST['articulos'];
       $fecha=$_POST['fecha'];
       $estado_Solicitud = 2;
       $tipo = 2;
       
        
       $sql = "INSERT INTO tbl_solicitudes
          VALUES (null,NULL,'$estado_Solicitud',$tipo, NULL,'$articulos','$fecha','$cuenta','$detalle','PENDIENTE')";
        $resultado = $conec->ejecutarConsulta($sql);
        



        header("Status: 301 Moved Permanently");
        header("Location: index.php");
        // PONER LA DIRECCION REAL, QUITARL EL INVENTARIO 02 A SOLO INVENTARIO 

 
    }
}

    ?>