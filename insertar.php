<?php
  $conexion=mysqli_connect('localhost','root','','inventario');

	$nombre=$_POST['nombre'];
	$categoria=$_POST['categoria'];
	$cantidad=$_POST['cantidad'];
	$precio=$_POST['precio'];
	$descripcion=$_POST['descripcion'];
	$fecha=$_POST['fecha'];
	$estado=$_POST['estado'];
	$persona=$_POST['persona-registra'];
	$ubicacion=$_POST['ubicacion'];
	$sql="INSERT INTO TBL_ARTICULOS(ID_ESTADO_ARTICULO,
		ID_PERSONA_USUARIO_REGISTRA,
		ID_CATEGORIA_ARTICULOS,
		ID_UBICACION_ARTOCULO,
		NOMBRE_ARTICULO,
		PRECIO_ARTICULO,
		CANTIDAD,
		FECHA_REGISTRO_ART,
		FECHA_SALIDA_aRT,
		DESCRIPCION_ARTICULO,
		OBSERVACION)
		values('$estado',
			'$persona',
			'$categoria',
			'$ubicacion',
			'$nombre',
			'$precio',
			'$cantidad',
			'$fecha',
			NULL,
			'$descripcion',
			NULL)";
		echo mysqli_query($conexion,$sql);
?>