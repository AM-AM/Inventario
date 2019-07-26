

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>prueba de conexion</h1>


<?php
echo "paso1";

$serverName = "127.0.0.1"; //serverName\instanceName
$connectionInfo = array( "Database"=>"InventarioIS", "UID"=>"usuario", "PWD"=>"contrasena");
echo "paso 2";
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
echo "paso3";
?>
</body>
</html>