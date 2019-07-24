


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/estilos.css">
	<style >
		
		#div-formulario1{
			
			padding:80px; 
			

			border:1px #F0F8FF solid; 
		}

	</style>
	
</head>
<body style="background-image:url(img/background.jpg); background-size:cover; background-attachment: fixed;">
		<div class="container">
				<br>
				<br>
				<br>
				<center><h1> <strong><img src="img/logo.png" style="width:300px"></strong> </h1></center>
				
				<center><h4>Inicia sesion para acceder</h4></center>
		</div>

		<form class="container">   
						
				<center>
					<div class= "well" id = "div-formulario1"  style="width:400px" style="height: 500px">
						<td colspan="2"><label for="inputEmail" class="sr-only">Correo Electronico</label>
		        		<input type="Correo" id="inputCorreo" class="form-control" placeholder="correo Electronico" required autofocus></td>
						<br>
						<br>
						<label for="inputPassword" class="sr-only">Contraseña</label>
		        		<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
		        		<br>
		        		<br>
		        		<input type="submit" id="login"  value="Ingresar" class="btn btn-primary btn btn-lg" >
		        		<br>

		        		<br>
		        		<a href="">¿Olvidaste tu contraseña?</a><br>

					</div>
				</center>	
		
	</form>


	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/iniciarSesion.js"></script>	

</body>
</html>