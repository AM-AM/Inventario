<?php
include("class/class-conexion.php");
 session_start();
 if($_SESSION['status']==false) { // CUALQUIER USUARIO REGISTRADO PUEDE VER ESTA PAGINA
      session_destroy();
     header("Location: login.php");
 }

?>
<head>
  <script src="js/controladores/popup.js"></script>
</head>



    <div>
       <!-- Approach -->
            <div class="container-fluid">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h2 class="m-0 font-weight-bold text-primary">Agregar Equipos</h2>
                </div>
                <div class="card-body">

                  <form class="form" action="registrarArticulo.php" method="post">
                       <div class="form-group">
                          <label for="nombre-articulo">Nombre del Articulo</label>
                          <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Ingrese un nombre para el articulo">
                           
                        </div>
  
                       <div class="form-group">     
                          <label for="slc-categoria-articulo">Categoria del Articulo</label>
                          <select id="categoria" class="form-control" name="categoria">
                            <option value="">--Seleccione una Categoria--</option>
                            <option value="1">Computadoras</option>
                            <option value="2">Proyectores</option>
                            <option value="3">Cables</option>
                            <option value="4">Mobiliario y Equipo</option>
                          </select>
                       </div>
                  
                       
                       <div class="form-group">
                           <label for="cantidad-articulo">Cantidad de articulos</label>
                           <input type="text" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese una cantidad">
                       </div>

                       <div class="form-group">
                         <label for="precio-articulo">Precio del articulo</label>
                         <input type="text" id="precio" name="precio" class="form-control" placeholder="Ingrese el precio en el formato 999.99">
                       </div>

                       <div class="form-group">
                        <label for="descripcion-articulo">Descripcion del Articulo</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Ingrese una descripcion">
                       </div>

                       <div class="form-group">
                        <label for="slc-estado-articulo">Estado del Articulo</label>
                        <select id="estado" name="estado" class="form-control">
                          <option value="">--Seleccione un Estado--</option>
                          <option value="1">Disponible</option>
                          <option value="2">No Disponible</option>  
                        </select>       
                       </div>

                       <div class="form-group">
                        <label for="persona-registra">Persona que registra</label>
                        <input type="text" id="id_persona_usuario" name="id_persona_usuario" class="form-control"  value="<?php echo $_SESSION['id_persona_usuario']?>" disabled="disabled">
                        <br>
                        <input type="text" id="persona-registra-nombre" class="form-control"  value="<?php echo $_SESSION['nombre']?>" disabled="disabled">  
                       </div>

                       <div class="form-group">
                        <label for="slc-ubicacion-articulo">Ubicación Articulo</label>
                        <select id="ubicacion" name="ubicacion" class="form-control">
                          <option value="">--Seleccione una ubicación--</option>
                          <option value="1">Laboratorio 1</option>
                          <option value="2">Laboratorio 2</option>
                          <option value="3">Laboratorio 3</option>
                          <option value="4">Laboratorio 4</option>
                          <option value="5">Laboratorio de Investigación</option>
                        </select>
                         
                       </div>
                    
                        
                       <label for='fecha'>fecha actual</label>
                       <input type="text" id='fecha' name="fecha" value=" <?php 
                             echo date('Y').'-'.date('m').'-'.date('d'); ?>" readonly>

              
                   
                      <div class="form-group">
                        <center>
                          <button id="guardar" name="guardar" class="btn btn-primary" onclick  = "probando()"><span class="glyphicon glyphicon-plus"></span>Registrar articulo</button>
                      </div>






                    </form>
                </div>
                </div>
          </div>

              
           
    </div>

<script>
      let popUp = new Popup();
    
    function probando(){
      //var solicitud = document.getElementById("cuentaSolicitud").value;
      if(document.getElementById("nombre").value == ""){
        popUp.setTextoAlerta("Campos vacios o Datos incorrectos, Intente de Nuevo");
        popUp.incorrecto();
        popUp.mostrarAlerta();
      }
      else{
        popUp.setTextoAlerta("El articulo ha sido registrado corectamente");
        popUp.correcto();
        popUp.mostrarAlerta();
      }
    }
</script>



