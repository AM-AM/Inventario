<h1> bbb</h1>


<table class="table table-dark">
            <thead>
              <tr>
                <th scope="col-lg-1">Id</th>
                <th scope="col-lg-1">Id_Usuario</th>
                <th scope="col">Fecha Solicitud</th>
                <th scope="col">Cuenta Solicitante</th>
                <th scope="col">Id_Art</th>
                <th scope="col">Articulo Solicitado</th>
                <th scope="col">Detalle</th>
                <th scope="col">Estado</th>

                <th scope="col">Respuesta Solicitud</th>

                <th scope="col-lg-1"> <i class="material-icons">
                Acciones
                </i></th>
                
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>

            <tr>
                <form class="form" action="funcionPrestamo.php" method="post">
                  <th scope="row"> <input type="text"  readonly  size="2" id="idd" name="idd" value="'.$res['ID_SOLICITUD'].'"></th>
                  <td> '. $res['ID_PERSONA_USUARIO']. '</td>
                  <td> '. $res['FECHA_SOLICITUD']. '</td>
                  <td> '. $res['NUMERO_CUENTA']. '</td>
                  <td> '. $res['ID_ARTICULOS'].'</td>
                  <td> '. $res['NOMBRE_ARTICULO']. '</td>
                  <td> '. $res['DETALLE']. '</td>
                  <td> 
                    <select class="custom-select" name="tipo">
                      <option value="1" '; 
                        if($res['ID_ESTADO_SOLICITUD']==1){ echo "selected"; }  echo  '> Aceptada </option>  
                      <option value="2"';
                        if($res['ID_ESTADO_SOLICITUD']==2){ echo "selected"; } echo  ' > En Espera </option>    
                      <option value="3"';
                        if($res['ID_ESTADO_SOLICITUD']==3){ echo "selected"; } echo  ' > Rechazada </option>          
                    </select>
                            
                  </td>
                  <td> <input type="submit" class="btn btn-primary mb-2" id="actualizar" value="Actualizar" name="actualizar"></td>
                  <td> <input type="submit" class="btn btn-danger mb-2" value="Borrar" name="borrar" id="borrar"> </td>
                  <td></td>
                                  
                 
            </tr>
              </form>
                </tr>