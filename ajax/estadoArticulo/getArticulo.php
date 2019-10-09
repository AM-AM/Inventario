<?php

include ('../../class/class-conexion.php');

$mysqli = new Conexion();

$query="SELECT id_articulos,nombre_articulo FROM tbl_articulos WHERE id_ubicacion_articulo=".$_REQUEST["ubicacion"]." ORDER BY nombre_articulo";

$result = $mysqli->ejecutarConsulta($query);

echo '<option value="0">--Seleccione un artículo--</option>';

foreach ($result as $fila) 
 {
    echo '<option value="'.$fila["id_articulos"].'">'.$fila["nombre_articulo"].'</option>';
};
// Liberar resultados
$result->liberarResultado();
$result->cerrar();



?>
