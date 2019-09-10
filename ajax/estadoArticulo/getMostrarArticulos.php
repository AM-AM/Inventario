<?php
$mysqli = new mysqli('localhost', 'root', '','inventario');
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}


$query="SELECT ar.nombre_articulo, ua.ubicacion_articulo, es.estado_articulo
FROM tbl_ubicacion_articulos ua 
	INNER JOIN tbl_articulos ar ON ua.id_ubicacion_articulo=ar.id_ubicacion_articulo
	INNER JOIN tbl_estado_articulos es ON es.id_estado_articulo= ar.id_estado_articulo";

$result = $mysqli->query($query);
echo "<tr>
		<td>
           Artículo
        </td> 
        <td>
           Ubicación
        </td>
        <td>
           Estado
        </td>
	</tr>";
while ($fila = $result->fetch_array()) {
    echo '<tr>
            <td>
            '.$fila["nombre_articulo"].'
            </td>         
         
            <td>
            '.$fila["ubicacion_articulo"].'
            </td>         
            <td>
            '.$fila["estado_articulo"].'
            </td>         
          </tr>';
};
// Liberar resultados
$result->close();

// Cerrar la conexión
$mysqli->close();

?>
