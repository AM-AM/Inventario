<?php
$mysqli = new mysqli('localhost', 'root', '','inventario');
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}


$query="SELECT id_articulos,nombre_articulo FROM tbl_articulos WHERE id_ubicacion_articulo=".$_REQUEST["ubicacion"]." ORDER BY nombre_articulo";

$result = $mysqli->query($query);

echo '<option value="0">--Seleccione un artículo--</option>';

while ($fila = $result->fetch_array()) {
    echo '<option value="'.$fila["id_articulos"].'">'.$fila["nombre_articulo"].'</option>';
};
// Liberar resultados
$result->close();

// Cerrar la conexión
$mysqli->close();

?>
