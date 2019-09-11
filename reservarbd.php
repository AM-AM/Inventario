<?php
if ($_POST){
    include("class/class-conexion.php");
    $conec = new Conexion();


    if($_POST['cuenta']){
        $cuenta = $_POST['cuenta'];
       $detalle = $_POST['detalle'];
       $articulos = (int)$_POST['articulos'];
       $estado_Solicitud = 2;
       $tipo = 1;
       
        
       $sql = "INSERT INTO tbl_solicitudes( `id_estado_solicitud`, `id_tipo_solicitud`, `id_articulo_solicitado`, `fecha_solicitud`, `NUMERO_CUENTA`, `DETALLE`)
        VALUES ('$estado_Solicitud',' $tipo', '$articulos','2019-10-09','$cuenta','$detalle')";

        $resultado = $conec->ejecutarConsulta($sql);






        header("Status: 301 Moved Permanently");
        header("Location: index.php");
        // PONER LA DIRECCION REAL, QUITARL EL INVENTARIO 02 A SOLO INVENTARIO 

 
    }
}

    ?>