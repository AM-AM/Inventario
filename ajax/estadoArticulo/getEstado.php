<?php
$mysqli = new mysqli('localhost', 'root', '','inventario');
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}


$query="SELECT id_estado_articulo, estado_articulo FROM tbl_estado_articulos ORDER BY estado_articulo";

$result = $mysqli->query($query);

echo '<option value="0">--Seleccione un estado--</option>';

while ($fila = $result->fetch_array()) {
    echo '<option value="'.$fila["id_estado_articulo"].'">'.$fila["estado_articulo"].'</option>';
};
// Liberar resultados
$result->close();

// Cerrar la conexión
$mysqli->close();

?>
