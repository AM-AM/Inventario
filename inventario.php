<?php
include("class/class-conexion.php");
 session_start();
 if($_SESSION['status']==false) { // CUALQUIER USUARIO REGISTRADO PUEDE VER ESTA PAGINA
      session_destroy();
     header("Location: login.php");
 }

?>

	<head>	
		<link rel="stylesheet" type="text/css" href="css/pestañas.css">
		
		<link rel="stylesheet" type="text/css" href="css/inventario.css">

		<!--Extension-->
		<link rel="stylesheet" type="text/css" href="extensiones/datatables.min.css">
		
		
	</head>
	<!--Contenedor-->
		<div class="container-fluid">
			<div class="row">	
				<!--Contenido Del Inventario-->
				<div class="col-xl-10 col-lg-10 col-md-6 col-sm-6 well" style="border: black 1px solid">
					<nav>
						<!--Pestañas-->
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<ul class="nav nav-tabs" id="myTab">

								<!--Pestaña Equipos LabIS-->
								<li class="nav-item pestaña" id="nav-inv-main-li" >
									<a class="nav-item nav-link active" id="nav-inv-main-tab" data-toggle="tab" href="#nav-inv-main" role="tab" aria-controls="nav-inv-main" aria-selected="true">Equipo en existencia</a>
								</li>
								<!--Pestaña Agregar Equipos-->

							</ul>
						</div>
					</nav>
					<div class="tab-content" id="nav-tabContent">

						<!--Seccion Equipos-->
						<div class="tab-pane fade show active" id="nav-inv-main" role="tabpanel" aria-labelledby="nav-inv-main-tab">
							<!--Equipos disponibles para prestarse-->
							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<table class="table table-striped table-bordered" id="table-articulos-proximos" style="width: 100%;">
										<h3>Disponibles Para Prestamo</h3>
										
									</table>
								</div>
							</div>
							<hr>

							<!--Equipos Totales-->
							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<table class="table table-striped table-bordered" id="table-articulos" style="width: 100%;">
										<h3>Todos los equipos</h3>
									</table>
								</div>
							</div>

							<!-- Modal Ver/Actualizar Equipo -->
							<div class="modal fade" id="modalVerArticulo" tabindex="-1" role="dialog" aria-labelledby="modalVerArticuloLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
									<form class="form" action="actualizarArt.php" method="post">
										<div class="modal-header">
											<h3 class="modal-title" id="modalVerArticuloLabel" style="text-align: center;font-weight: bold;">DATOS DEL ARTICULO</h3>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="row modal-body">
											<!-- Formulario Actualizar-->
											<div class="hide" id="formulario-actualizar-articulo" style="padding-left: 15px; padding-right: 5px;">
												<div class="row modal-body" style="padding:10;">
													<div class="row">	
														<div class="form-group col-12 col-sm-6 col-md-6" style="padding: 0;">
															<label class="palido" for="nombre-articulo-actualizar">Nombre del Articulo</label>
															<input type="text" id="nombre-articulo-actualizar" name="nombre" class="form-control" placeholder="Ingrese un nombre para el articulo" style="width: 190px;">
														</div>

														<div class="form-group col-12 col-sm-6 col-md-6">
															<label class="palido" for="slc-categoria-articulo-actualizar">Categoria de articulo</label>
															<select id="slc-categoria-articulo-actualizar" name="categoria" class="form-control" data-style="btn-primary" style="width: 190px;">
																<option value="">--Seleccione--</option>
																<option value="1">Computadoras</option>
																<option value="2">Proyectores</option>
																<option value="3">Cables</option>
																<option value="4">Mobiliario y Equipo</option>

															</select>
														</div>
													</div>

													<div class="row">
														<div class="form-group col-12 col-sm-6 col-md-6" style="padding: 0;">
															<label class="palido" for="cantidad-articulo-actualizar">Cantidad</label>
															<input type="text" id="cantidad-articulo-actualizar" name="cantidad" class="form-control" placeholder="Ingrese cantidad" disabled="disabled" style="width: 190px;">	
														</div>

														<div class="form-group col-12 col-sm-6 col-md-6">
															<label class="palido" for="precio-costo">Precio</label>
															<input type="text" id="precio" name="precio" class="form-control" placeholder="Ingrese un precio en el formato 999.99" style="width: 190px;">
														</div>
													</div>

													<div class="row">
														<div class="form-group col-12 col-sm-6 col-md-6" style="padding: 0;">	
															<label class="palido" for="descripcion-articulo-actualizar">Descripcion</label>
															<input type="text" id="descripcion-articulo-actualizar" class="form-control" placeholder="Ingrese descripcion" style="width: 190px;">
														</div>

														<div class="form-group col-12 col-sm-6 col-md-6">	
															<label for="slc-estado-articulo">Estado del Articulo</label>
															<select id="slc-estado-articulo-actualizar" name="estado" class="form-control" style="width: 190px;">
																<option>--Seleccione--</option>
																<option value="1">Diponible</option>
																<option value="2">No disponible</option>
															</select>
														</div>
													</div>

													<div class="row">
														<div class="form-group col-12 col-sm-6 col-md-6" style="padding: 0;">	
															<label for="slc-ubicacion-articulo-actualizar">Ubicación articulo</label>
															<select id="slc-ubicacion-articulo-actualizar" class="form-control" name="ubicacion" style="width: 190px;">
																<option value="">--Seleccione--</option>
																<option value="1">Laboratorio 1</option>
																<option value="2">Laboratorio 2</option>
																<option value="3">Laboratorio 3</option>
																<option value="4">Laboratorio 4</option>
																<option value="5">Laboratorio de Investigación</option>
																
															</select>
														</div>
	

														<div class="form-group col-12 col-sm-6 col-md-6">
															<label class="palido" for="slc-persona-registra-articulo-actualizar">Persona registro</label>
															<input type="text" id="slc-persona-registra-articulo-actualizar" class="form-control" disabled="disabled"  style="width: 190px;" name="personaReg">	
														</div>


													</div>

													<div class="row">
														<div class="form-group col-12 col-sm-6 col-md-6" style="padding: 0;">
															<label class="palido" for="spn-fecha-registro-art-actualizar">Fecha de Ingreso</label>
															<input type="date" id="spn-fecha-registro-art-actualizar" class="form-control" style="padding-top: 0;" disabled="disabled" style="width: 190px;" name="fechaIng">	

														</div>

														<div class="form-group col-12 col-sm-6 col-md-6">	
															<label for="spn-fecha-registro-art">Fecha de Actualización</label>
                       										<input type="text" id="spn-fecha-registro-art-actualizar" name="fecha" value=" <?php echo date('Y-m-d'); ?>" readonly class="form-control" style="width: 190px;" name="fechaAct">

														</div>

													</div>

													<div class="row">
														<label class="palido" for="datos-persona-actualiza">Persona que va a actualizar</label>
													</div>

													<div class="row">
														<div class="form-group col-12 col-sm-6 col-md-6" style="padding: 0;">
															<label class="palido" for="id-persona-actualiza">Codigo</label>
															
															<input type="text" id="persona-actualiza-articulo-actualizar" class="form-control"  value="<?php echo $_SESSION['id_persona_usuario']?>" disabled="disabled" style="width: 190px;" name="id_persona_usuario">
														</div>

														<div class="form-group col-12 col-sm-6 col-md-6">
															<label class="palido" for="nombre-persona-actualiza">Nombre</label>
															<input type="text" id="persona-actualiza-articulo-nombre" class="form-control"  value="<?php echo $_SESSION['nombre']?>" disabled="disabled" style="width: 190px;" name="Persona">	
														</div>

													</div>
												</div>
											</div>

											<!-- Formulario ver datos articulo-->
											

											
										</div>

										<div class="modal-footer">
										<center>											
											<button type="button" class="btn btn-success hide" id="actualizarArt" name="actualizarArt" onclick  = "probando()">Actualizar Articulo</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

										</center>

										</div>
										</form>
									</div>
								</div>
							</div>
						</div>

						<!--Formulario agregar Equipo-->
						
					</div>
				</div>
			</div>
			</div>



	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script src="js/pestañas.js"></script>
	

	<script src="extensiones/datatables.min.js"></script>

	<!--Controladores-->
	<script src="js/controladores/validaciones.js"></script>
	<script src="js/controladores/popup.js"></script>
	<script src="js/controladores/inventario.js"></script>


<script >
      let popUp = new Popup();
    
    function probando(){
      //var solicitud = document.getElementById("cuentaSolicitud").value;
      if(document.getElementById("precio").value == " "){
        popUp.setTextoAlerta("Campos vacios o Datos incorrectos, Intente de Nuevo");
        popUp.incorrecto();
        popUp.mostrarAlerta();
      }
      else{
        popUp.setTextoAlerta("El articulo ha sido registrado corectamente");
        popUp.correcto();
        popUp.mostrarAlerta();
      }
    }
</script>


