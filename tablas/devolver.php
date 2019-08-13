<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Devolución de artículos</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Seleccione el artículo a devolver.</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                 
                  <tbody>
                  <form>
                      
                    <tr>
                      <td>Solicitante</td>
                      <td><input type="text" class="form-control" placeholder="Ingrese numero de cuenta" name="descripcion"> </td>
                    </tr>
                    <tr>
                      <td>Artículo</td>
                      <td>
                        <select class="form-control" id="exampleFormControlSelect1">
                        <option>Artículo 1</option>
                        <option>Artículo 2</option>
                        <option>Artículo 3</option>
                        <option>Artículo 4</option>
                        <option>Artículo 5</option>
                      </select>
                    </tr>
                    <tr>
                      <td>Hora de devolución</td>
                      <td><input type="datetime-local" class="form-control" name="fecha-inicio" min="6:00"
                                 max="21:00" step="3600"> </td>
                    </tr>
                    <tr>
                      <td>Descripción</td>
                      <td><textarea class="form-control"></textarea> </td>
                    </tr>
                   
                      </td>
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