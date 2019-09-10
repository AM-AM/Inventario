<?php
$mysqli = new mysqli('localhost', 'root', '','inventario');
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

$articulo=$_REQUEST['articulo'];
$estado=$_REQUEST['estado'];

$query="UPDATE tbl_articulos
SET id_estado_articulo = '$estado'
WHERE id_articulos='$articulo'";

if ($mysqli->query($query) === TRUE) {
    echo "Registro actualizado";
}
else 
{
    echo "Error al actualizar";
};




// Cerrar la conexión
$mysqli->close();

?>
