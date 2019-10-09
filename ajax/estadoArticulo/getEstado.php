<?php
include ('../../class/class-conexion.php');

$mysqli = new Conexion();



$query="SELECT id_estado_articulo, estado_articulo FROM tbl_estado_articulos ORDER BY estado_articulo";

$result = $mysqli->ejecutarConsulta($query);

echo '<option value="0">--Seleccione un estado--</option>';

foreach ($result as $fila) {
    echo '<option value="'.$fila["id_estado_articulo"].'">'.$fila["estado_articulo"].'</option>';
};
// Liberar resultados
$result->liberarResultado();

// Cerrar la conexión
$mysqli->cerrar();

?>
