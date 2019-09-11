<head>
	<script src="js/jquery-3.2.1.min.js"></script>
</head>

<form id="registroArt" method="POST">
	<label for="formulario-agregar"><h2>Agregar equipo</h2></label>
				<div class="row" style="padding: 20px;">
					<label for="nombre-articulo">Nombre del Articulo</label>
					<input type="text" name="nombre" id="nombre-articulo" class="form-control" placeholder="Ingrese un nombre para el articulo">

					<label for="slc-categoria-articulo">Categoria del Articulo</label>
					<select id="slc-categoria-articulo" name="categoria" class="form-control" style="margin-left: 10px;margin-bottom: 10px;">
						<option value="">--Seleccione una Categoria--</option>
						<option value="1">Computadoras</option>
						<option value="2">Proyectores</option>
						<option value="3">Cables</option>
						<option value="4">Mobiliario y Equipo</option>
					</select>


					<label for="cantidad-articulo">Cantidad de articulos</label>
					<input type="text" id="cantidad-articulo" name="cantidad" class="form-control" placeholder="Ingrese una cantidad">
					
					<label for="precio-articulo">Precio del articulo</label>
					<input type="text" id="precio-articulo" name="precio" class="form-control" placeholder="Ingrese el precio en el formato 999.99">
					
					<label for="descripcion-articulo">Descripcion del Articulo</label>
					<input type="text" id="descripcion-articulo" name="descripcion" class="form-control" placeholder="Ingrese una descripcion">								
					
					<label for="fecha-registro-art">Fecha de Ingreso del articulo</label>
           			<input type="date" id='fecha-registro-art' name="fecha"  class="form-control">

					<label for="slc-estado-articulo">Estado del Articulo</label>
					<select id="slc-estado-articulo" name="estado" class="form-control" style="margin-left: 10px;margin-bottom: 10px;">
						<option value="">--Seleccione un Estado--</option>
						<option value="1">Disponible</option>
						<option value="2">No Disponible</option>	
					</select>	

					<label for="persona-registra">Persona que registra</label>
					<input type="text" id="persona-registra" name="persona-registra" class="form-control"  value="<?php echo $_SESSION['id_persona_usuario']?>" disabled="disabled">
					<br>
					<input type="text" id="persona-registra-nombre" class="form-control"  value="<?php echo $_SESSION['nombre']?>" disabled="disabled">

					<label for="slc-ubicacion-articulo">Ubicación Articulo</label>
					<select id="slc-ubicacion-articulo" name="ubicacion" class="form-control" style="margin-left: 10px;margin-bottom: 10px;">
						<option value="">--Seleccione una ubicación--</option>
						<option value="1">Laboratorio 1</option>
						<option value="2">Laboratorio 2</option>
						<option value="3">Laboratorio 3</option>
						<option value="4">Laboratorio 4</option>
						<option value="5">Laboratorio de Investigación</option>
					</select>					
					
				</div>
				<button id="guardar-articulo" class="btn btn-primary"><span class="glyphicon glyphicon-plus "></span>Registrar articulo</button>
</form>

<script type="text/javascript">
	$(document).ready(function(){
		var datos= $('#guardar-articulo').click(function(){
			$('#registroArt').serialize();

			

			$.ajax({
				type: "POST",
				url:"insertar.php",
				data: datos,
				success:function(r){
					if (r==1){
						alert("agregado ee");
					}else{
						alert("fallo");
					}

				}
			});
			return false;
		});
	});
</script>