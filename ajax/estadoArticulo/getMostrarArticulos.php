<?php
include ('../../class/class-conexion.php');

$mysqli = new Conexion();


$query="SELECT ar.nombre_articulo, ua.ubicacion_articulo, es.estado_articulo
FROM tbl_ubicacion_articulos ua 
	INNER JOIN tbl_articulos ar ON ua.id_ubicacion_articulo=ar.id_ubicacion_articulo
	INNER JOIN tbl_estado_articulos es ON es.id_estado_articulo= ar.id_estado_articulo";

$result = $mysqli->ejecutarConsulta($query);
echo "<tr>
		<th>
           Artículo
        </th> 
        <th>
           Ubicación
        </th>
        <th>
           Estado
        </th>
	</tr>";
foreach ($result as $fila) {
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
$result->liberarResultado();

// Cerrar la conexión
$mysqli->cerrar();

?>
