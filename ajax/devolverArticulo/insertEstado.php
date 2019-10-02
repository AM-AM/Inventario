<?php
$mysqli = new mysqli('localhost', 'root', '','inventario');
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}


$articulo=$_REQUEST['articulo'];

echo $articulo;

$query="UPDATE tbl_solicitudes
SET id_estado_solicitud = 5
WHERE id_solicitud='$articulo'";

if ($mysqli->query($query) === TRUE) {
    echo "Articulo retornado exitosamente";
}
else 
{
    echo "Error al actualizar";
};



// Cerrar la conexión
$mysqli->close();

?>
