
              <!-- Approach -->
              <div class="container-fluid">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h2 class="m-0 font-weight-bold text-primary">Reportes</h2>
                </div>
                <div class="card-body">

                  <form class="form" action="tablas/funciones-reporte/agregarReporte.php" method="post">
                      <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" placeholder="Asunto" id="titulo" name="titulo">
                       </div>
                        
                       <div class="form-group">
                        <select class="form-control" name="tipo">
                             <option value="" disabled="disabled"> Seleccione el tipo Reporte</option>
                             <option value="1">Estado de Equipos</option>
                             <option value="2">Solicitudes de Equipo</option>
                             
                         </select>
                       </div>

                       <div class="form-group">
                            <label for="reporte">Escribir Reporte</label>
                            <textarea class="form-control " required id="reporte" rows="3" name="reporte"></textarea>
                       </div>
                        
                       <label for='fecha'>fecha actual</label>
                       <input type="text" id='fecha' name="fecha" value=" <?php 
                             echo date('Y').'-'.date('m').'-'.date('d'); ?>" readonly>
                    
                    <div class="form-group">
                        <br>
                            <input type="submit" class="btn btn-primary mb-2" value="submit">
                       </div>
                       
                        


                    </form>
                </div>
                </div>
                </div>

         