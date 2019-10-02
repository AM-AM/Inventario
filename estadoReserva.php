


<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title> IS | Estudiante</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <link href="css/main.css" rel="stylesheet">

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 
  
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


  <link href="tablas/mselect/chosen.min.css" rel="stylesheet">
  <script type="text/javascript" src="tablas/mselect/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="tablas/mselect/chosen.jquery.min.js"></script>

   <style>
	   * {
	   font-size: 14px;
	   }
   </style>
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
				  <li><a href="index.php"><i class="fa fa-user"></i> Estudiante</a></li> 
				  <li><a href="login.php"><i class="fa fa-user"></i> Instructor</a></li>
				  <li><a href="login.php"><i class="fa fa-user"></i> Administrador</a></li>
				</ul>
			</nav>
		</div>
    </header>
    
    <div>
    

            <!-- Approach -->
            <div class="container-fluid">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h2 class="m-0 font-weight-bold text-primary">Estado de Solicitud Reserva</h2>
                </div>
                <div class="card-body">

					   
				
				<form class="form" action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF'])
				
				?>
				
				" method="post">
                     

					 <div class="container-fluid">

						 <div class="form-group">
                   	        <label for="cuenta">Numero de Cuenta para la solicitud</label>
                   	        <input type="number" class="form-control " placeholder="20151000000" required id="cuenta" rows="3" name="cuenta">
						</div>


						<div class="form-group">
                            <input type="submit" class="btn btn-primary mb-2" value="Revisar" name='revisar' onclick  = "getData()">
                       </div>


					</div>
				</form>


					   

				<?php


if(isset($_POST['revisar'])){
$cuenta = $_POST['cuenta'];
echo $cuenta;


include("class/class-conexion.php");
	$conec = new Conexion();

	
	$sql = "SELECT a.id_solicitud,b.ubicacion_articulo,c.estado_solicitud 
				from tbl_solicitudes as a
				inner join tbl_ubicacion_articulos as b
				on(a.id_lab_solicitado=b.id_ubicacion_articulo)
				inner join tbl_estado_solicitudes as c
				on(c.id_estado_solicitud=a.id_estado_solicitud)
				where NUMERO_CUENTA = $cuenta";

	$resultado = $conec->ejecutarConsulta($sql);

	foreach($resultado as $articulo){
		$color = '';
		$prueba = $articulo['estado_solicitud'];

		

		if($prueba== 'En espera'){
			$color = 'panel panel-warning';
		}else if($prueba == 'Aceptada'){
			$color = 'panel panel-success';
		}else if($prueba== 'Rechazada'){
			$color = 'panel panel-danger';
		} else {
			$color = 'panel panel-primary';
		}


		echo "<div class = '$color'>
		<div class = 'panel-heading'>
			<h3 class = 'panel-title'>Solicitud</h3>
		</div>
		
		<div class = 'panel-body'>
			Su solicitud para reserva del: <b> "; echo $articulo['ubicacion_articulo']; echo "</b> está: "; echo $articulo['estado_solicitud']; echo "
		</div>
		</div>";


				// echo($articulo['id_solicitud']);
				// echo($articulo['nombre_articulo']);
				// echo($articulo['estado_solicitud']);
	}

}

?>

                </div>
                </div>
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





</body>

</html>