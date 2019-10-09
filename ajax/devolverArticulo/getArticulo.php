<meta charset="UTF-8"/>
<?php
include ('../../class/class-conexion.php');

$mysqli = new Conexion();

$query="SELECT sl.id_solicitud, ar.nombre_articulo, sl.fecha_solicitud, es.estado_solicitud, us.nombre_usuario, NUMERO_CUENTA
		FROM tbl_solicitudes sl 
			INNER JOIN tbl_articulos ar ON sl.id_articulo_solicitado=ar.id_articulos 
		    INNER JOIN tbl_usuarios us ON sl.id_persona_usuario=us.id_persona_usuario
		    INNER JOIN tbl_estado_solicitudes es ON es.id_estado_solicitud=sl.id_estado_solicitud
		WHERE id_tipo_solicitud=1 AND (sl.id_estado_solicitud=1)";

$result = $mysqli->ejecutarConsulta($query);

echo '<option value="0">--Seleccione el articulo a devolver--</option>';

foreach ($result as $fila) {
    echo '<option value="'.$fila["id_solicitud"].'">'.$fila["id_solicitud"].' '.$fila["nombre_articulo"].'</option>';
};
// Liberar resultados
$result->liberarResultado();

// Cerrar la conexión
$mysqli->cerrar();

?>
