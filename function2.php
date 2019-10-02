<head>
  
  <script src="js/controladores/popup.js"></script>

</head>


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

       /* $sqll= "UPDATE tbl_solicitudes SET estado_entrega = 'Pendiente de Entrega'
                     WHERE id_solicitud = $id";
        $resultados = $conec->ejecutarConsulta($sqll);*/

        header("Status: 301 Moved Permanently");
        header("Location: adminReservas.php"); 

 
    }
    if ($_POST['borrar']) {
      $id = $_POST['idd'];
      $sql = "DELETE FROM tbl_solicitudes 
      WHERE id_solicitud = $id";
      $resultado = $conec -> ejecutarConsulta($sql);

      header("Status: 301 Moved Permanently");
      header("Location: adminReservas.php");
    }

     if ($_POST['entrega']) {
      $id = $_POST['idd'];
      if($_POST['tipo']==1){
         $sql = "UPDATE tbl_solicitudes SET ESTADO_ENTREGA='ENTREGADO'
          WHERE id_solicitud = $id";
      $resultado = $conec -> ejecutarConsulta($sql);
      }
    

      header("Status: 301 Moved Permanently");
      header("Location: adminReservas.php");
    }



    
}


function pagina_actual(){
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

// function estado_reporte(){
//   return  isset ($_POST['submit']) ? $_POST['submit'] : 1;
   
// }



function obtener_post($post_por_pagina,$conec){
    
    // $estado_reporte = estado_reporte();
    // echo 'Hola mundo' . $estado_reporte . ' si';
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina:0;
    $sql = "SELECT A.ID_SOLICITUD,
                              A.ID_PERSONA_USUARIO,
                              A.FECHA_SOLICITUD,
                              A.NUMERO_CUENTA,
                              A.DETALLE,
                              B.ID_ESTADO_SOLICITUD,
                              B.ESTADO_SOLICITUD,
                              A.ID_LAB_SOLICITADO,
                              C.ID_UBICACION_ARTICULO,
                              C.UBICACION_ARTICULO
                          FROM TBL_SOLICITUDES A
                          INNER JOIN TBL_ESTADO_SOLICITUDES B
                          ON(A.ID_ESTADO_SOLICITUD=B.ID_ESTADO_SOLICITUD)
                          INNER JOIN TBL_UBICACION_ARTICULOS C
                          ON(A.ID_LAB_SOLICITADO=C.ID_UBICACION_ARTICULO)
                          WHERE A.ID_TIPO_SOLICITUD=2";
    $resultado = $conec->ejecutarConsulta($sql);
    foreach ($resultado as $res) {
        // echo print_r($res);
        // '<hr class="sidebar-divider">
        // <article>
        //     <h4>'. $res['tipo_reporte'].'</h4>
        //     <p> '. $res['fecha_reporte'] .' </p> 
        //     <p> '. $res['contenido_reporte'] .' </p> 
        //     <p> '. $res['estado_reporte'] .' </p> 
        //     <p> Editado por: '. $res['Editor'] .' </p>
        // </article>
        // <hr class="sidebar-divider">';

        echo  '
        
        <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col-lg-1">Id</th>
            <th scope="col-lg-1">Id_Usuario</th>
            <th scope="col">Fecha Solicitud</th>
            <th scope="col">Cuenta Solicitante</th>
            <th scope="col">Id_Lab</th>
            <th scope="col">Laboratorio Solicitado</th>
            <th scope="col">Detalle</th>
            <th scope="col">Estado Solicitud</th>

            <th scope="col">Respuesta Solicitud</th>
            
            <th scope="col-lg-1"> <i class="material-icons">
            Acciones
            </i></th>
            
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <form class="form" action="function2.php" method="post">
            <th scope="row"> <input type="text"  readonly  size="2" id="idd" name="idd" value="'.$res['ID_SOLICITUD'].'"></th>
            <td> '. $res['ID_PERSONA_USUARIO']. '</td>
            <td> '. $res['FECHA_SOLICITUD']. '</td>
            <td> '. $res['NUMERO_CUENTA']. '</td>
            <td> '. $res['ID_LAB_SOLICITADO'].'</td>
            <td> '. $res['UBICACION_ARTICULO']. '</td>
            <td> '. $res['DETALLE']. '</td>
            <td> 
           
            <select class="custom-select" name="tipo">
              <option value="1" '; 
                if($res['ID_ESTADO_SOLICITUD']==1){ echo "selected"; }  echo  '> Aceptada </option>  
              <option value="2"';
                if($res['ID_ESTADO_SOLICITUD']==2){ echo "selected"; } echo  ' > En espera </option>    
              <option value="3"';
                if($res['ID_ESTADO_SOLICITUD']==3){ echo "selected"; } echo  ' > Rechazada </option>          
            </select>
                    
            </td>
            <td> <input type="submit" class="btn btn-primary mb-2" value="Actualizar" name="actualizar" onclick  = "probando()"></td>

            <td> <input type="submit" class="btn btn-danger mb-2" value="Borrar" name="borrar" onclick  = "probando2()"> </td>
             
        </form>
          </tr>
          
        </tbody>
      </table>';
 
        
        //print_r($res);
        # code...
    }

    function numero_pagina($post_por_pagina,$conec){
        $sql = "SELECT A.ID_SOLICITUD,
                              A.ID_PERSONA_USUARIO,
                              A.FECHA_SOLICITUD,
                              A.NUMERO_CUENTA,
                              A.DETALLE,
                              B.ID_ESTADO_SOLICITUD,
                              B.ESTADO_SOLICITUD,
                              A.ID_LAB_SOLICITADO,
                              C.ID_UBICACION_ARTICULO,
                              C.UBICACION_ARTICULO
                          FROM TBL_SOLICITUDES A
                          INNER JOIN TBL_ESTADO_SOLICITUDES B
                          ON(A.ID_ESTADO_SOLICITUD=B.ID_ESTADO_SOLICITUD)
                          INNER JOIN TBL_UBICACION_ARTICULOS C
                          ON(A.ID_LAB_SOLICITADO=C.ID_UBICACION_ARTICULO)
                          WHERE A.ID_TIPO_SOLICITUD=2";

        $resultado = $conec->ejecutarConsulta($sql);
        $totalRegistros = $conec -> cantidadRegistros($resultado);
        
        
         $numero_pagina = ceil($totalRegistros / $post_por_pagina);
         return  $numero_pagina;

    }



echo "
  <script>
    let popUp = new Popup();
    
    function probando(){
      //var solicitud = document.getElementById('cuentaSolicitud').value; 
        popUp.setTextoAlerta('La solicitud ha sido actualizada corectamente');
        popUp.correcto();
        popUp.mostrarAlerta();
      
    }

    function probando1(){
      //var solicitud = document.getElementById('cuentaSolicitud').value; 
        popUp.setTextoAlerta('Estado de entrega actualizado');
        popUp.correcto();
        popUp.mostrarAlerta();
      
    }

      function probando2(){
      //var solicitud = document.getElementById('cuentaSolicitud').value; 
        popUp.setTextoAlerta('La solicitud ha sido borrada');
        popUp.correcto();
        popUp.mostrarAlerta();
      
    }
  </script>";



    
}


?>



