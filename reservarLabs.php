<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title> IS | Inventario</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <link href="css/main.css" rel="stylesheet">

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 
  
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="js/controladores/popup.js"></script>



  <link href="tablas/mselect/chosen.min.css" rel="stylesheet">
  <script type="text/javascript" src="tablas/mselect/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="tablas/mselect/chosen.jquery.min.js"></script>
  <script src="js/push.min.js"></script>


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
                  <h2 class="m-0 font-weight-bold text-primary">Solicitud Reservas de Laboratorios</h2>
                </div>
                <div class="card-body">

                  <form class="form" action="reservasL.php" method="post">
                     

                       <div class="container-fluid">
                         

                       <label for="multiselect">Elija el Laboratorio Solicitado</label>
                     
                           
                            <?php
                           include ('class/class-conexion.php');

                            
                            $conec = new Conexion();
      
                             $sql = "SELECT id_ubicacion_articulo, ubicacion_articulo, dispo_lab FROM tbl_ubicacion_articulos where id_ubicacion_articulo !=5";
                             $resultado = $conec->ejecutarConsulta($sql);


                             echo'<select class="form-group" id="multiselect" required name="articulos">
                             <option value="" disabled selected>Elige Laboratorio </option>';
                             foreach ($resultado as $res) {
                                echo ' <option value="'. $res['id_ubicacion_articulo']. '">'. $res['ubicacion_articulo']. ' --- '.$res['dispo_lab']. '</option>';
                             }

                             echo '</select> ';
                           ?>

                           
                            </div>
                            <br>
    

                       <div class="form-group">
                            <label for="cuenta">Numero de Cuenta Solicitante</label>
                            <input type="number" class="form-control " placeholder="20151000000" required id="cuenta" rows="3" name="cuenta">
                       </div>

                       
                       <div class="form-group">
                            <label for="detalle">Escribir Solicitud</label>
                            <input type="text" class="form-control " placeholder="Asignatura-Catedratico-horasReserva" required id="detalle" rows="3" name="detalle">
                       </div>

                       
                     
                        
                       <label for='fecha'>fecha actual</label>
                       <input type="text" id='fecha' name="fecha" value=" <?php 
                             echo date('Y').'-'.date('m').'-'.date('d'); ?>" readonly>

              
                   



                      <div class="form-group">
                        <br>
                            <input type="submit" class="btn btn-primary mb-2" value="Enviar" onclick  = "probando()">
                       </div>



                    </form>
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



  <script type="text/javascript">
                    $(document).ready(function(){
                      $('#multiselect').chosen();
                    });
                </script>


    <script>
                      let popUp = new Popup();
                  
                  function probando(){
                    //var solicitud = document.getElementById("cuentaSolicitud").value;
                    if(document.getElementById("cuenta").value == ""){
                      popUp.setTextoAlerta("Campos vacios o Datos incorrectos, Intente de Nuevo");
                      popUp.incorrecto();
                      popUp.mostrarAlerta();
                    }
                    else{
                      popUp.setTextoAlerta("La solicitud ha sido ingresada corectamente");
                      popUp.correcto();
                      popUp.mostrarAlerta();
                    }
                  }
                    </script>


</body>

</html>