<!DOCTYPE html>
<html >
<head>
	<meta charset="utf-8">
	<!--Autores: Alexander
			     Hector
				 Tania
				 Dixon
				 Ikser
				 Abigail
				...
			
			-->

    <title> IS | Inventario</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	
</head><!--/head-->

<body>
	
	<header>
		<div class="nav-container">
			<nav class="nav-checkbox">
				<a href="#" class="logo">
					<img src="images/iss.png" width="200">
				</a>
				<input id="tab-nav" type="checkbox" class="tab-nav" name="tabs">
				<label for="tab-nav" class="tab-nav-label">Menu</label>
				<ul class="tab-content">
				  <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
				  <li><a href="estudiante.php"><i class="fa fa-user"></i> Estudiante</a></li> 
				  <li><a href="login.php"><i class="fa fa-user"></i> Instructor</a></li>
				  <li><a href="login.php"><i class="fa fa-user"></i> Administrador</a></li>
				</ul>
			</nav>
		</div>
	</header>

	
	<section id="slider" style="align-content: center;"><!--slider-->
	
		<div class="container" style="background-color:#fff; align-content: center;">
			<div class="row" >
				<div class="col-sm-12" style="align-content: center;" >
					
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">

						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
					
						<div class="carousel-inner" >
						
							<div class="item active">
								<h1><span>Is</span>-Laboratorio 1</h1>
								<div class="col-sm-8">
									<img src="images/Lab1.jpg" class="lab img-responsive" alt="" />
								</div>
							</div>

							<div class="item">
									<h1><span>Is</span>-Laboratorio 2</h1>
								<div class="col-sm-8">
									<img src="images/Lab2.jpg" class="lab img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
									<h1><span>Is</span>-Laboratorio Investigacion</h1>
								<div class="col-sm-8">
									<img src="images/LabInvestigacion.jpg" class="lab img-responsive" alt="" />
								</div>
							</div>
							
						</div>

						
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>


					</div>
				</div>
			</div>
		</div>
		
	</section><!--/slider-->

	<div class="content" style="background-color:#fff;">
		<!-- <div class="main">
			<h1> Inventario UNAH</h1>
			<p>
				El invetantario de la Facultad de ingeneria en Sistemas se ha creado con el proposito de 
				llevar un orden y registro ordenado de los bienes acumulados por la facultad.
				Con un adecuado registro y control de inventario se podrán presentar estados financieros con mejores resultados, pues la disminución de inventarios redundantes genera mayores beneficios económicos.
				Cuando un material no rota corre el riesgo de dañarse y convertirse en pérdida para la empresa. Un adecuado control mantiene sano el stock y se pueden tomar decisiones a tiempo frente a elementos para los cuales hay baja demanda.
			</p>
			
			<div class="ft-2">  <img src="https://stockit.mx/wp-content/uploads/2017/09/Gestio%CC%81n-de-inventarios.png"  height="270px" > </div>

			<button class="btn btn-info">Proximamente</button>
				
		</div> -->

		<div class="main">
			<h1> Inventario UNAH</h1>
			<p>
				El invetantario de la Facultad de ingeneria en Sistemas se ha creado con el proposito de 
				llevar un orden y registro ordenado de los bienes acumulados por la facultad.
				Con un adecuado registro y control de inventario se podrán presentar estados financieros con mejores resultados, pues la disminución de inventarios redundantes genera mayores beneficios económicos.
				Cuando un material no rota corre el riesgo de dañarse y convertirse en pérdida para la empresa. Un adecuado control mantiene sano el stock y se pueden tomar decisiones a tiempo frente a elementos para los cuales hay baja demanda.
			</p>
			
			<div class="ft-2">  <img src="https://stockit.mx/wp-content/uploads/2017/09/Gestio%CC%81n-de-inventarios.png"  width="380px" height="240px"  > </div>
			<button class="btn btn-info">Proximamente</button>
		</div>

		<div class="main-2">
			<h1> Prestamos de Proyectores y otros</h1>
			<p>
				Este servicio es administrado por los instructores de la carrera. 
				Utiliza nuestro servicio para reservar Proyectores, regletas, cables y cualquier herramienta multimieda que esté en nuestras manos.
				Haz tu reservación de equipo para tu respectivas clases de la carrera.
			</p>
			
			<div class="ft-2">  <img src="images/proyector.png"height="300px" > </div>
			 <button class="btn btn-info" href='index.php' onclick = " location.href='reservar.php' ">Ir a préstamos </button>
			 <button class="btn btn-info" href='index.php' onclick = " location.href='reservarLabs.php' ">Ir a reservas Laboratorios </button>
			 <button class="btn btn-info" href='index.php' onclick = " location.href='estadoReserva.php' ">Consultar Estado de Reserva para Laboratorios </button>
		</div>


	</div>
	
	<footer class="footer">
        <div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-envelope"></i> Sistemas@unah.edu.hn</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://is.unah.edu.hn/"><i class="fa fa-url"> Is-Unah</i></a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

     </footer>

	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>