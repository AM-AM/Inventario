
<head>
  <link href="mselect/chosen.min.css" rel="stylesheet">
  <script type="text/javascript" src="mselect/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="mselect/chosen.jquery.min.js"></script>
  <script src="js/push.min.js"></script>
  <script src="js/controladores/popup.js"></script>

</head>
             
             
             <!-- Approach -->
              <div class="container-fluid">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h2 class="m-0 font-weight-bold text-primary">Solicitudes De Prestamos</h2>
                </div>
                <div class="card-body">

                  <form class="form" action="tablas/agregarSolicitud.php" method="post">
                     

                       <div class="container-fluid">
                         
                          <label for='mselect'>Articulos Disponibles Para Prestamo</label>
                           
                            <?php
                           include ('../class/class-conexion.php');

                            
                            $conec = new Conexion();
      
                             $sql = "SELECT id_articulos, nombre_articulo FROM tbl_articulos where id_estado_articulo=1";
                             $resultado = $conec->ejecutarConsulta($sql);


                             echo'<select class="form-group" id="mselect" multiple="" name="articulos[]">
                             <option value="" disabled selected>Seleccione el artículo</option>';
                             foreach ($resultado as $res) {
                                echo ' <option id="articulos" value="'. $res['id_articulos']. '">'. $res['nombre_articulo']. '</option>';
                             }

                             echo '</select> ';
                           ?>

                           
                            </div>
                            <br>
                      

                      
                        
                       <div class="form-group">
                        <label for="solicitud">Acción: </label>
                        <select class="form-control" name="tipo" id="tipo"> 
                             <option value="" disabled="disabled"> Seleccione el tipo de solicitud</option>
                             <option value="1">Solicitud de Prestamo Articulo</option>
                             
                         </select>
                       </div>

                        <div class="form-group">
                            <label for="solicitud">Numero de Cuenta de Solicitante: </label>
                            <div>
                              <input type="text" name="cuentaSolicitud" id='cuentaSolicitud' placeholder="Numero de Cuenta" style="width: 500px"> 
                            </div>
                            
                       </div>

                       <div class="form-group">
                            <label for="reporte">Datos Solicitud:</label>
                            <div>
                              <input type="text" name="solicitud" id='solicitud' placeholder="Asignatura-Catedratico-hora de Uso" value=""  style="width: 500px"> 
                            </div>
                       </div>
                        
                       <label for='fecha'>Fecha Solicitud</label>
                       <input type="text" id='fecha' name="fecha" value=" <?php 
                             echo date('Y').'-'.date('m').'-'.date('d'); ?>">


                      <div class="form-group">
                        <br>
                            <input type="submit" class="btn btn-primary mb-2" value="Enviar Solicitud" onclick  = "probando()">
                       </div>



                    </form>
                </div>
                </div>
                </div>

                <script type="text/javascript">
                    $(document).ready(function(){
                      $('#mselect').chosen();
                    });
                </script>

                <script>
                  let popUp = new Popup();
                  
                  function probando(){
                    //var solicitud = document.getElementById("cuentaSolicitud").value;
                    if(document.getElementById("cuentaSolicitud").value == ""){
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

                


