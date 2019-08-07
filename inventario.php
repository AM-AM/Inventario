
<body onload="init()">
				<!--Contenido Del Inventario-->
				<div class="col-xl-10 col-lg-10 col-md-6 col-sm-6 well" style="border: black 1px solid;width: 80%" onload="init()">
					<nav>
						<!--Pestañas-->
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<ul class="nav nav-tabs" id="myTab">

								<!--Pestaña Equipos LabIS-->
								<li class="nav-item pestaña" id="nav-inv-main-li">
									<a class="nav-item nav-link active" id="nav-inv-main-tab" data-toggle="tab" href="#nav-inv-main" role="tab" aria-controls="nav-inv-main" aria-selected="true">Equipo en existencia</a>
								</li>
								<!--Pestaña Agregar Equipos-->
								<li class="nav-item pestaña" id="nav-inv-add-li">
									<a class="nav-item nav-link active" id="nav-inv-add-tab" data-toggle="tab" href="#nav-inv-add" role="tab" aria-controls="nav-inv-add" aria-selected="true">Agregar Equipos</a>
								</li>

							</ul>
						</div>
					</nav>
					<div class="tab-content" id="nav-tabContent">

						<!--Seccion Equipos-->
						<div class="tab-pane fade show active" id="nav-inv-main" role="tabpanel" aria-labelledby="nav-inv-main-tab">
							<!--Equipos en menor cantidad-->
							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<table class="table table-striped table-bordered" id="table-articulos-proximos" style="width: 100%;">
										<h3>Disponibles Para Prestamo</h3>
										<label for="txt-limite">Cantidad menor a: </label>
										<input style="width: 50px" class="form-control" type="text" id="txt-limite" value="5"> 
									</table>
								</div>
							</div>
							<hr>

							<!--Equipos sin problemas-->
							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<table class="table table-striped table-bordered" id="table-articulos" style="width: 100%;">
										<h3>Uso en Laboratorios</h3>
									</table>
								</div>
							</div>

							<!-- Modal Ver/Actualizar Equipo -->
							<div class="modal fade" id="modalVerInsumo" tabindex="-1" role="dialog" aria-labelledby="modalVerInsumoLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h3 class="modal-title" id="modalVerInsumoLabel" style="text-align: center;font-weight: bold;">DATOS DEL EQUIPO</h3>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="row modal-body">
											<!-- Formulario Actualizar-->
											<div class="hide" id="datos-insumodatos-insumo">
												<div class="row modal-body" style="padding:0;">
													<div class="row">	
														<div class="form-group col-12 col-sm-6 col-md-6">
															<label class="palido" for="nombre-articulo-actualizar">Nombre del Articulo</label>
															<input type="text" id="nombre-articulo-actualizar" class="form-control" placeholder="Ingrese un nombre para el insumo">
														</div>

														<div class="form-group col-12 col-sm-6 col-md-6">
															<label class="palido" for="slc-estado-articulo-actualizar">Categoria de articulo</label>
															<select id="slc-estado-articulo-actualizar" class="form-control" data-style="btn-primary" style="margin-left: 4%;margin-top: 10px;">
																<option>--Seleccione una categoria--</option>
															</select>
														</div>
													</div>

													<div class="row">
														<div class="form-group col-12 col-sm-6 col-md-6">
															<label class="palido" for="cantidad-insumo-actualizar">Cantidad</label>
															<input type="text" id="cantidad-insumo-actualizar" class="form-control" placeholder="Ingrese una cantidad">	
														</div>

														<div class="form-group col-12 col-sm-6 col-md-6">
															<label class="palido" for="precio-costo">Precio</label>
															<input type="text" id="precio-costo" class="form-control" placeholder="Ingrese un precio en el formato 999.99">
														</div>
													</div>

													<div class="row">
														<div class="form-group col-12 col-sm-6 col-md-6">	
															<label class="palido" for="descripcion-insumo-actualizar">Descripcion</label>
															<input type="text" id="descripcion-insumo-actualizar" class="form-control" placeholder="Ingrese una descripcion">
														</div>

														
													</div>

													<div class="row">
														<div class="form-group col-12 col-sm-6 col-md-6">
															<label class="palido" for="spn-fecha-registro-art-actualizar">Fecha de Ingreso</label>
															<input type="date" id="spn-fecha-registro-art-actualizar" class="form-control" style="padding-top: 0;">	
														</div>

													</div>
												</div>
											</div>

											<div id="datos-articulo">
												<div class="row">
													<div class="form-group col-sm-12 col-md-6">
														<h4 class="palido">Nombre del articulo</h4>
														<span id="spn-nombre-articulo"></span>
													</div>
													<div class="form-group col-sm-12 col-md-6">
														<h4 class="palido">Tipo de articulo</h4>
														<span id="spn-slc-estado-articulo"></span>
													</div>												
												</div>
												<div class="row">
													<div class="form-group col-sm-12 col-md-6">
														<h4 class="palido">Cantidad</h4>
														<span id="spn-cantidad-articulo"></span>
													</div>	

													<div class="form-group col-sm-12 col-md-6">
														<h4 class="palido">Precio</h4>
														<span id="spn-precio"></span>
													</div>	
												</div>
												<div class="row">
													<div class="form-group col-sm-12 col-md-6">
														<h4 class="palido">Descripcion</h4>
														<span id="spn-descripcion-articulo"></span>
													</div>	

													
												</div>
												<div class="row">
													<div class="form-group col-sm-12 col-md-6">
														<h4 class="palido">Fecha de Ingreso</h4>
														<span id="spn-fecha-registro-art" style="padding-top: 0;"></span>
													</div>	
														
													
												</div>
											</div>

											<div class="hide" id="formulario-disminuir-articulo">
												<div class="row">
													<div class="form-group col-sm-12 col-md-6">
														<h4 class="palido">articulo</h4>
														<span id="spn-nombre-articulo-disminuir"></span>
													</div>

													<div class="form-group col-sm-12 col-md-6">
														<h4 class="palido">Cantidad</h4>
														<span id="spn-cantidad-articulo-disminuir"></span>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-sm-12 col-md-6">
														<h4 class="palido">Disminuir en</h4>
														<input type="text" class="form-control" id="cantidad-disminuir" placeholder="Cantidad a disminuir" style="width: 250px;margin-left: 0;">
													</div>

													<div class="form-group col-sm-12 col-md-6">
														<h4 class="palido">Nueva Cantidad</h4>
														<span id="spn-nueva-cantidad-insumo"></span>
													</div>
												</div>

												<div class="row">
													<button class="btn btn-primary" onclick="disminuirInsumo();">Disminuir</button>
												</div>
												
											</div>
										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-secondary hide" id="atras">Atrás</button>
											<button type="button" class="btn btn-primary" id="editar-articulo">Editar Insumo</button>
											<button type="button" class="btn btn-primary" id="disminuir-articulo">Disminuir Insumo</button>
											<button type="button" class="btn btn-success hide" id="actualizar-articulo">Actualizar Articulo</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--Formulario agregar Equipo-->
						<div class="tab-pane fade show active" id="nav-inv-add" role="tabpanel" aria-labelledby="nav-inv-add-tab">
							<!--Insumos en menor cantidad-->
							<label for="formulario-agregar-articulo"><h2>Agregar equipo</h2></label>
							<div id="fomulario-agregar-articulo" class="row" style="padding: 20px;">
								<label for="nombre-articulo">Nombre del Articulo</label>
								<input type="text" id="nombre-articulo" class="form-control" placeholder="Ingrese un nombre para el articulo">

								<label for="slc-categoria-articulo">Categoria del Articulo</label>
								<select id="slc-categoria-articulo" class="form-control" style="margin-left: 10px;margin-bottom: 10px;">
									<option>--Seleccione una Categoria--</option>
								</select>

								<label for="cantidad-articulo">Cantidad de articulos</label>
								<input type="text" id="cantidad-articulo" class="form-control" placeholder="Ingrese una cantidad">
								
								<label for="precio-articulo">Precio del articulo</label>
								<input type="text" id="precio-articulo" class="form-control" placeholder="Ingrese el precio en el formato 999.99">
								
								<label for="descripcion-articulo">Descripcion del Articulo</label>
								<input type="text" id="descripcion-articulo" class="form-control" placeholder="Ingrese una descripcion">								
								
								<label for="spn-fecha-registro-art">Fecha de Ingreso del articulo</label>
								<input type="date" id="spn-fecha-registro-art" class="form-control" style="padding-top: 0;">	

								<label for="slc-estado-articulo">Estado del Articulo</label>
								<select id="slc-estado-articulo" class="form-control" style="margin-left: 10px;margin-bottom: 10px;">
									<option>--Seleccione un Estado--</option>
								</select>	

								<label for="slc-persona-registra">Persona que registra</label>
								<select id="slc-persona-registra" class="form-control" style="margin-left: 10px;margin-bottom: 10px;">
									<option>--Seleccione--</option>
								</select>					
								
							</div>
							<button id="guardar-articulo" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Registrar articulo</button>
						</div>
					</div>
				</div>

</body>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/pestañas.js"></script>
	<script src="js/menu.js"></script>

	<script src="extensiones/datatables.min.js"></script>

	<!--Controladores-->
	<script src="js/controladores/validaciones.js"></script>
	<script src="js/controladores/popup.js"></script>
	<script src="js/controladores/inventario.js"></script>