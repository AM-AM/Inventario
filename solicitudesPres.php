

          <!-- Page Heading -->

         
          
          <?php

           echo "<h1>Solicitudes de Prestamos</h1>";
            include("class/class-conexion.php");
            $conec = new Conexion();

            $sql = "SELECT A.ID_SOLICITUD,
                        A.ID_PERSONA_USUARIO,
                        A.FECHA_SOLICITUD,
                        A.NUMERO_CUENTA,
                        A.DETALLE,
                        B.ID_ESTADO_SOLICITUD,
                        B.ESTADO_SOLICITUD,
                        C.ID_ARTICULOS,
                        C.NOMBRE_ARTICULO
                    FROM TBL_SOLICITUDES A
                    INNER JOIN TBL_ESTADO_SOLICITUDES B
                    ON(A.ID_ESTADO_SOLICITUD=B.ID_ESTADO_SOLICITUD)
                    INNER JOIN TBL_ARTICULOS C
                    ON(A.ID_ARTICULO_SOLICITADO=C.ID_ARTICULOS)
                    WHERE A.ID_TIPO_SOLICITUD=1";

            $resultado = $conec->ejecutarConsulta($sql);

            echo  '
        
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
            <tbody>';

            foreach ($resultado as $res) { 
            
             

            echo '
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
                                  
                  </form>
                </tr>';

              
            }

            echo '
            </tbody>
          </table>';

          ?>


          vg

          <!-- DataTales Example -->
          
         



<?php
if ($_POST){
    include("class/class-conexion.php");
    $conec = new Conexion();


    if($_POST['actualizar']){
        $id = $_POST['idd'];
       $tipo = (int)$_POST['tipo'];
        

        $sql = "UPDATE tbl_solicitudes SET id_estado_solicitud = $tipo
                     WHERE id_solicitud = $id";

        $resultado = $conec->ejecutarConsulta($sql);

        $sql1= "UPDATE tbl_articulos SET id_estado_articulo = 2, detalle='este articulo esta prestado actualmente'
                     WHERE id_articulos = $id";

        $resultado1= $conec->ejecutarConsulta($sql1);

            header("Status: 301 Moved Permanently");
            //header("Location: administrador.php"); 
    }
    if ($_POST['borrar']) {
      $id = $_POST['idd'];
      $sql = "DELETE FROM tbl_solicitudes 
      WHERE id_solicitud = $id";
      $resultado = $conec -> ejecutarConsulta($sql);

      header("Status: 301 Moved Permanently");
      header("Location: administrador.php");
    }

  
    
}
?> 

