<?php
$mysqli = new mysqli('localhost', 'root', '','inventario');
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}


$query="SELECT id_ubicacion_articulo, ubicacion_articulo FROM tbl_ubicacion_articulos ORDER BY ubicacion_articulo";

$result = $mysqli->query($query);

echo '<option value="0">--Seleccione una ubicación--</option>';

while ($fila = $result->fetch_array()) {
    echo '<option value="'.$fila["id_ubicacion_articulo"].'">'.$fila["ubicacion_articulo"].'</option>';
};
// Liberar resultados
$result->close();

// Cerrar la conexión
$mysqli->close();

?>
