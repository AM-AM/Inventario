<?php
$mysqli = new mysqli('localhost', 'root', '','inventario');
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}


$query="SELECT ar.nombre_articulo, sl.fecha_solicitud, es.estado_solicitud, us.nombre_usuario, NUMERO_CUENTA
        FROM tbl_solicitudes sl 
            INNER JOIN tbl_articulos ar ON sl.id_articulo_solicitado=ar.id_articulos 
            INNER JOIN tbl_usuarios us ON sl.id_persona_usuario=us.id_persona_usuario
            INNER JOIN tbl_estado_solicitudes es ON es.id_estado_solicitud=sl.id_estado_solicitud
        WHERE id_tipo_solicitud=1 AND (sl.id_estado_solicitud=1 OR sl.id_estado_solicitud=5)";

$result = $mysqli->query($query);
echo "<tr>
		<th>
           Artículo
        </th> 
        <th>
           Fecha
        </th>
        <th>
           Estado
        </th>
        <th>
           Usuario
        </th>
        <th>
           Numero de Cuenta
        </th>
	</tr>";
while ($fila = $result->fetch_array()) {
    echo '<tr>
            <td>
            '.$fila["nombre_articulo"].'
            </td>         
         
            <td>
            '.$fila["fecha_solicitud"].'
            </td>         
            <td>
            '.$fila["estado_solicitud"].'
            </td>
            <td>
            '.$fila["nombre_usuario"].'
            </td>
            <td>
            '.$fila["NUMERO_CUENTA"].'
            </td>         
          </tr>';
};
// Liberar resultados
$result->close();

// Cerrar la conexión
$mysqli->close();

?>
