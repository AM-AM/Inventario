<?php
include("class/class-conexion.php");
session_start();
 if($_SESSION['status']==false) { // CUALQUIER USUARIO REGISTRADO PUEDE VER ESTA PAGINA
  
  session_destroy();
     header("Location: login.php");

     
 }
 

 
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  
  <title>Sistema de inventario</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


  <link href="tablas/mselect/chosen.min.css" rel="stylesheet">
  <script type="text/javascript" src="tablas/mselect/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="tablas/mselect/chosen.jquery.min.js"></script>
  <script src="js/push.min.js"></script>
</head>

<body id="page-top" style="overflow-y:visible">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="administrador.php">
        <div class="sidebar-brand-icon ">
          <img src="img/logo-is.png" width="100" height="100">
        </div>
        <div class="sidebar-brand-text mx-3">Inventario IS</div>
      </a>


      <!-- Divider -->
      <hr class="sidebar-divider my-0">

<!-- Heading -->
<div class="sidebar-heading">
  Interfaz
</div>
<!-- Divider -->
<hr class="sidebar-divider my-0">


<!-- Nav Item - Dashboard -->




      <li class="nav-item">
     
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTrwo" aria-expanded="true" aria-controls="collapseTrwo">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          
          <span>Reportes</span>
         
          
              <?php
              if ($_SESSION['tipo_usuario'] == 1){
                $conec = new Conexion();
                
                $sql = "SELECT COUNT(id_reportes)as reportes FROM `tbl_reportes` WHERE id_estado_reporte=1 ";

                $resultado = $conec->ejecutarConsulta($sql);

                foreach($resultado as $res){
                   $reportes = $res['reportes'];
                
                    echo '
                        
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter">';
                    
                    echo (int)$reportes . '</span>
                      


                    ';
                 }
                }
              ?>
            
        </a>
        
        <div id="collapseTrwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          
         
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            
            <?php   

                if ($_SESSION['tipo_usuario'] == 1){
                  echo '
                
                  <a class="collapse-item" href="adminReporte.php" >Ver Reportes
                  
              '; 
              if ($_SESSION['tipo_usuario'] == 1){
                $conec = new Conexion();
                
                $sql = "SELECT COUNT(id_reportes)as reportes FROM `tbl_reportes` WHERE id_estado_reporte=1 ";

                $resultado = $conec->ejecutarConsulta($sql);

                foreach($resultado as $res){
                   $reportes = $res['reportes'];
                
                    echo '
                        
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter">';
                    
                    echo (int)$reportes . '</span>';
                      


                    
                 }
                }
              echo '
                  
                  </a>';
                }

            ?>
            
            
            <a class="collapse-item" id="crear_reporte" ><i class="fas fa-plus"></i>Crear Reportes</a>
            
            
             </div>
          
        </div>
      </li>

       
     
      <!-- Nav Item - Usuarios Collapse Menu -->
      
<?php   
      if ($_SESSION['tipo_usuario'] == 1){
        echo '
       
       
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-users"></i>
          <span>Usuarios</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Usuarios:</h6>
            <a class="collapse-item" id="administradores">Administradores</a>
            <a class="collapse-item" id="Instructores">Instructores</a>
            <a class="collapse-item" id="registro"><i class="fas fa-plus"></i>Nuevo usuario</a>
            
          </div>
        </div>
      </li>

      ';
    } ?>
      <!-- Nav Item - Inventario Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInv" aria-expanded="true" aria-controls="collapseInv">
          <i class="fas fa-fw fa-list"></i>
          <span>Inventario</span>
        </a>
        <div id="collapseInv" class="collapse" aria-labelledby="headingInv" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Equipos:</h6>
            
            <a class="collapse-item" id="equiposDisponibles">Equipos Disponibles</a>
            <a class="collapse-item" id="historialMovimientos" >Historial de Movimientos</a>
            <a class="collapse-item" id="estadoArticulo" >Estado de Artículo</a>
            <a class="collapse-item" id="añadirEquipos" ><i class="fas fa-plus"></i> Añadir Equipos</a>

          </div>
        </div>        
      </li>


      <!-- Nav Item - Categorias Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-list"></i>
          <span>Reservas Laboratorios</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Labs:</h6>
            
            <a class="collapse-item" id="reservaLab" >Reservar Laboratorio</a>
            <a class="collapse-item" id="soliReservas" href="adminReservas.php">Ver Solicitudes</a>
            
          </div>
        </div>
      </li>

      <!-- Nav Item - Prestamo Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePresta" aria-expanded="true" aria-controls="collapsePresta">
          <i class="fas fa-fw fa-box"></i>
          <span>Préstamos</span>
          <?php
              if ($_SESSION['tipo_usuario'] == 1){
                $conec = new Conexion();
                
                $sql = "SELECT count(id_solicitud) as reportes FROM tbl_solicitudes WHERE id_estado_solicitud = 2";

                $resultado = $conec->ejecutarConsulta($sql);

                foreach($resultado as $res){
                   $reportes = $res['reportes'];
                
                    echo '
                        
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter">';
                    
                    echo (int)$reportes . '</span>
                      


                    ';
                 }
                }
              ?>
        </a>
        <div id="collapsePresta" class="collapse" aria-labelledby="headingPresta" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Articulos:</h6>
            
            <a class="collapse-item" id="prestar">Prestar artículo</a>
            <a class="collapse-item" id="verSolicitudes" href="adminPrestamos.php">Ver Solicitudes
            
            <?php
              if ($_SESSION['tipo_usuario'] == 1){
                $conec = new Conexion();
                
                $sql = "SELECT count(id_solicitud) as reportes FROM tbl_solicitudes WHERE id_estado_solicitud = 2";

                $resultado = $conec->ejecutarConsulta($sql);

                foreach($resultado as $res){
                   $reportes = $res['reportes'];
                
                    echo '
                        
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter">';
                    
                    echo (int)$reportes . '</span>
                      


                    ';
                 }
                }
              ?>
            
            
            </a>
            <a class="collapse-item" id="devolver">Devolver artículo</a>


            
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>



            <?php   
      if ($_SESSION['tipo_usuario'] == 1){
        $conec = new Conexion();
      
        $sql = "SELECT COUNT(id_reportes)as reportes FROM `tbl_reportes` WHERE id_estado_reporte=1 ";

        $resultado = $conec->ejecutarConsulta($sql);

        foreach($resultado as $res){
          $reportes = $res['reportes'];
        
        echo '
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">';
                
                echo (int)$reportes . '</span>
              </a>

              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notificaciones
                </h6>';

                if ($reportes>=1){
                echo '
                <a class="dropdown-item d-flex align-items-center" href="adminReporte.php">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Agosto 28, 2019</div>
                    <span class="font-weight-bold" >Tienes Reportes sin Revisar</span>
                  </div>
                </a>';}

                echo '
                <a class="dropdown-item d-flex align-items-center" href="adminReporte.php">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Junio 7, 2019</div>
                    Computadora 5 reparada.
                  </div>
                </a>
                
                <a class="dropdown-item text-center small text-gray-500" href="adminReporte.php">Mostrar todas las notificaciones</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
            ';
            }
          }
?>
  


<?php   
      //mostrar notificaciones de solicitudes
      if ($_SESSION['tipo_usuario'] == 2){
        $conec = new Conexion();
      
        $sql = "SELECT COUNT(id_solicitud)as solicitudes FROM `tbl_solicitudes` WHERE id_estado_solicitud=2 and ID_TIPO_SOLICITUD=1";
        //$sql1="SELECT ID_TIPO_SOLICITUD FROM `tbl_solicitudes`";

         $sql1 = "SELECT COUNT(id_solicitud)as solicitudes1 FROM `tbl_solicitudes` WHERE id_estado_solicitud=2 and ID_TIPO_SOLICITUD=2";
        

        $resultado = $conec->ejecutarConsulta($sql);
        //$resultado1= $conec->ejecutarConsulta($sql1);
        $resultado1=$conec->ejecutarConsulta($sql1);


        foreach($resultado as $res){
          $solicitudes = $res['solicitudes'];
          
        echo '
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">';
                
                echo (int)$solicitudes . '</span>
              </a>

              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notificaciones Prestamos
                </h6>';

                if ($solicitudes>=1){
                echo '

                <a class="dropdown-item d-flex align-items-center" id="notiSolicitud" href="adminPrestamos.php">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">2019</div>
                    <span class="font-weight-bold" >Tienes Solicitudes de Prestamos sin Revisar</span>
                  </div>
                </a>';}



                echo '
                
                
                <a class="dropdown-item text-center small text-gray-500" href="adminPrestamos.php">Mostrar todas las notificaciones</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
            ';
            }


        foreach($resultado1 as $res1){
          $solicitudes1 = $res1['solicitudes1'];
          
        echo '
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">';
                
                echo (int)$solicitudes1 . '</span>
              </a>

              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notificaciones Reservas
                </h6>';

                if ($solicitudes1>=1){
                echo '
                <a class="dropdown-item d-flex align-items-center" id="notiSolicitud" href="adminReservas.php">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">2019</div>
                    <span class="font-weight-bold" >Tienes Solicitudes de Reservas de Laboratorios sin Revisar</span>
                  </div>
                </a>';}



                echo '
                
                
                <a class="dropdown-item text-center small text-gray-500" href="adminReservas.php">Mostrar todas las notificaciones</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
            ';
            }

          }
?>








 <?php   


  $conec = new Conexion();
      
  $id_recive = $_SESSION['id_persona_usuario'];

  $sql = "SELECT b.nombre_usuario as nombre, a.id_persona_usuario_envia as id_envia, a.contenido_mensaje as mensaje, a.asunto_mensaje as asunto, a.fecha_mensaje as fecha
  FROM tbl_mensajes a ,tbl_usuarios b 
  WHERE a.id_persona_usuario_envia = b.id_persona_usuario
  and a.id_estado_mensaje = 2
  and a.id_persona_usuario_recibe = $id_recive
  ";

  $sql1 = "SELECT count(a.contenido_mensaje) as c_mensajes
  FROM tbl_mensajes a ,tbl_usuarios b 
  WHERE a.id_persona_usuario_envia = b.id_persona_usuario
  and a.id_estado_mensaje = 2
  and a.id_persona_usuario_recibe = $id_recive";

$resultado = $conec->ejecutarConsulta($sql);
$resultado1 = $conec->ejecutarConsulta($sql1);

foreach($resultado1 as $res1){
       echo' <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
            <i class="fa fa-envelope"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">'.(int)$res1['c_mensajes'].'</span>
          </a>
          
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
              Mensajes
            </h6>';
        }
        foreach($resultado as $res){
          echo '
            <a class="dropdown-item d-flex align-items-center" href="tablas/chat.php?id='.$res['id_envia'].'" >
              <div>
                <div class="small text-gray-500">'.$res['nombre']."  /  ".$res['fecha'].'</div>
                <span class="font-weight-bold" >'.$res['mensaje'].'</span>
              </div>
            </a>
        ';
        }
         if ($_SESSION['tipo_usuario'] == 2){

        
           echo '
           <a class="dropdown-item text-center small text-gray-500" href="tablas/chat.php?id=1">Escribir Mensaje</a>
           ';         
        }
                    

?>
            

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nombre']; ?></span>
                <i class="fas fa-user fa-sm fa-fw mr-2 fa-1x text-gray-500"></i>
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown" >
                <a class="dropdown-item" class="modal-dialog modal-lg"  data-target="#logoutModal2" data-toggle="modal">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  
                  Perfil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Configuración de la cuenta
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Registro de actividad
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div id="contenido" class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <?php   
              if ($_SESSION['tipo_usuario'] == 1){
                $conec = new Conexion();
                echo '<h1 class="h3 mb-0 text-gray-800">Panel de Control Administradores</h1>';
              }
              else{
                echo'<h1 class="h3 mb-0 text-gray-800">Panel de Control Instructores</h1>';
              }
            ?>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Prestamos (Semanales)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Prestamos (Periodo)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">135</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar-plus fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tareas</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendientes a devolución</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Gráfica de prestamos</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Opciones:</div>
                      <a class="dropdown-item" href="#">Acción1</a>
                      <a class="dropdown-item" href="#">Opcion2</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Otra</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Disponibilidad de artículos</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Opciones:</div>
                      <a class="dropdown-item" href="#">Acción1</a>
                      <a class="dropdown-item" href="#">Opcion2</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Otra</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Prestados
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Disponibles
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> No disponibles
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

    

            <div class="col-lg-6 mb-4">

             

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Información</h6>
                </div>
                <div class="card-body">
                  <p>En esta sección podras encontrar toda la informacion sobre los equipos con los que cuenta la carrera de ingenieria en sitemas; como administrador podras gestionar el ingreso o salida de los articulos aqui inventariados.</p>
                  <p class="mb-0">Tu decides quienes pueden gestionar acciones en este portal asi como definir privilegios para cada cuenta creada.</p>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Derechos reservados &copy; Inventario IS UNAH 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<div class="modal fade" id="logoutModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">  <!-- cambiar id a la ventana modal-->
    <div class="modal-dialog modal-lg" role="document">
    <style type="text/css">
 .modal-lg {
    max-width: 70%;
}
  </style>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Perfil</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
     <?php
include('modalperfil.php');
?>
        
        </div>
      </div>
    </div>
  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Desea cerrar su sesion?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary"  href="ajax/acciones-sesion.php?accion=cerrar-sesion">Cerrar sesión</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


  <script src="js/configuraciones.js"></script>

 

</body>

</html>
