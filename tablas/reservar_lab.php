<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Reserva de Laboratorio</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Seleccione el articulo a reservar.</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                 
                  <tbody>
                  <form>
                      
                    <tr>
                      <td>Hora inicio</td>
                      <td><input type="time" class="form-control" name="fecha-inicio"> </td>
                    </tr>
                    <tr>
                      <td>Hora final</td>
                      <td><input type="timr" class="form-control" name="fecha-fin"> </td>
                    </tr>
                    <tr>
                      <td>Laboratorio</td>
                      <td>
                        <select class="form-control" id="exampleFormControlSelect1">
                        <option>lab1</option>
                        <option>lab2</option>
                        <option>lab3</option>
                        <option>lab4</option>
                        <option>lab5</option>
                      </select>
                   
                      </td>
                    </tr>
                    <tr>
                      <td>Solicitante</td>
                      <td><input type="text" class="form-control" placeholder="Ingrese numero de cuenta" name="descripcion"> </td>
                    </tr>
                    <tr>
                      <td>Descripción</td>
                      <td><textarea class="form-control"></textarea> </td>
                    </tr>
                    <tr>
                      <td>
                      <div class="alert alert-success" role="alert">
                        Disponibilidad
                      </div></td>
                      <td><button class="btn btn-primary">Guardar</button> </td>
                    </tr>
                  </form>  
                   <tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->