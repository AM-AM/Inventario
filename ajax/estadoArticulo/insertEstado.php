<?php
include ('../../class/class-conexion.php');

$mysqli = new Conexion();


$articulo=$_REQUEST['articulo'];
$estado=$_REQUEST['estado'];

$query="UPDATE tbl_articulos
SET id_estado_articulo = '$estado'
WHERE id_articulos='$articulo'";

if ($mysqli->ejecutarConsulta($query) === TRUE) {
    echo "Registro actualizado";
}
else 
{
    echo "Error al actualizar";
};




// Cerrar la conexión
$mysqli->cerrar();

?>
