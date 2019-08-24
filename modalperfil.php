
  <div class="col-lg-8">
    <div class="p-5">
      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Crear cuenta</h1>
      </div>
      <form class="user" action="ajax/acciones-administrador.php" method="POST">

          
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" class="form-control form-control-user" id="PrimerNombre" name="PrimerNombre" placeholder="Primer Nombre" >
            </div>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-user" id="SegundoNombre" name="SegundoNombre" placeholder="Segundo Nombre">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="PrimerApellido" name="PrimerApellido" placeholder="Primer Apellido">
            </div>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-user" id="SegundoApellido" name="SegundoApellido" placeholder="Segundo Apellido">
            </div>

        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="NombreUsuario" name="NombreUsuario" placeholder="Nombre de Usuario">
        
        </div>
          <div class="col-sm-6">
              <input type="text" class="form-control form-control-user" id="NumeroIdentidad"name="NumeroIdentidad" placeholder="Numero de Identidad">

          </div>

      </div>
        
        
        <div class="form-group">
            <input type="number" class="form-control form-control-user" id="NumeroCuenta" name="NumeroCuenta" placeholder="Numero de Cuenta">
        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-user" id="Email" name="Email" placeholder="Correo electrónico">
        </div>
        
        <div class="form-group row">
            <div class="col-sm-4 mb-2 mb-sm-0">
              <input type="number" class="form-control form-control-user" id="Telefono" name="Telefono" placeholder="Numero de Telefono">
            </div>
            <div class="col-sm-4">
              <input type="date" class="form-control form-control-user" id="FechaNacimiento" name="FechaNacimiento">
            </div>
            <div class="col-sm-4">
              <select name="TipoUsuario" id="TipoUsuario" class="form-control form-control-user" size="1" >
                
                <option value="" selected>Tipo de Usuario</option>
                <option value="2">Instructor</option>
                <option value="3" >Estudiante</option>
              </select>
          </div>
        </div>

        
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <select name="LugarNacimiento" id="LugarNacimiento"  class="form-control form-control-user" size="1">
                    <option value="" selected>Lugar de Nacimiento</option>
                    <option value="1">Tegucigalpa</option>
                    <option value="2" >Choluteca</option>
                    <option value="3">Colon</option>
                    <option value="4" >Comayagua</option>
                    <option value="5">Copán</option>
                    <option value="6" >Cortes</option>
                    <option value="7">El Paraíso</option>
                    <option value="8" >Atlántida</option>
                  </select>
                  </select>
            </div>
             
            
            <div class="col-sm-4">
                <select name="LugarResidencia" id="LugarResidencia" class="form-control form-control-user" size="1">
                    <option value="" selected>Lugar de Residencia</option>
                    <option value="1">Tegucigalpa</option>
                    <option value="2" >Choluteca</option>
                    <option value="3">Colon</option>
                    <option value="4" >Comayagua</option>
                    <option value="5">Copán</option>
                    <option value="6" >Cortes</option>
                    <option value="7">El Paraíso</option>
                    <option value="8" >Atlántida</option>
                  </select>
                  </select>
            </div>
            <div class="col-sm-4">
                <select name="Genero" id="Genero" class="form-control form-control-user" size="0">
                  <option value="" selected>Genero</option>
                  <option value="1" >Masculino</option>
                  <option value="2">Femenino</option>
                  
                </select>
            </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" id="Contrasenia" name="Contrasenia" placeholder="Contraseña">
          </div>
          <div class="col-sm-6">
            <input type="password" class="form-control form-control-user" id="Contrasenia2"name="Contrasenia2" placeholder="Repetir contraseña">
          </div>
        </div>
        <div class="form-group row">
          <input type="submit"   value="Guardar Usuario">
        </div>
        
        <hr>
      </form>
    </div>

  </div>  
