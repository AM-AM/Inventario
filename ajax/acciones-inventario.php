<?php
  include_once("../class/class-conexion.php");
  include_once("../class/class-utilidades.php");
  include_once("../class/class-articulo.php");
  
  if(isset($_POST['accion'])){
    $conexion = new Conexion();
    switch ($_POST['accion']) {
      //Acciones con los articulos
      case 'leer-articulos':
        $res['data'] = Articulo::leer($conexion);
        echo json_encode($res);
      break;
      case 'leer-articulos-proximos':
        $cantidad = ValidarPost::int('cantidad');
        $articulo = new Articulo();
        $articulo->setCantidad($cantidad);
        $res['data'] = $articulo->leerMenorCantidad($conexion);
        echo json_encode($res);
      break;
      case 'leer-articulos-id':
        $idArticulos = ValidarPost::unsigned('id_articulos');
        $articulo= new Articulo();
        $articulo->setIdArticulo($idArticulos);
        $res['data'] = $articulo->leerPorId($conexion);
        echo json_encode($res);
      break;
      case 'leer-estado-articulo':
        $res['data'] = Articulo::leerEstadoArticulo($conexion);
        echo json_encode($res);
      break;
      case 'leer-persona-registra':
        $res['data'] = Articulo::leerPersonaUsuario($conexion);
        echo json_encode($res);
      break;
      case 'insertar-articulo':
        $nombreArticulo = ValidarPost::varchar('nombre_articulo');
        $idEstadoArticulo = ValidarPost::int('id_estado_articulo');
        $idPersonaUsuarioRegistra = ValidarPost::int('id_persona_usuario_registra');
        $cantidad = ValidarPost::int('cantidad');
        $precioArticulo = ValidarPost::float('precio_articulo');
        $descripcion = ValidarPost::varchar('descripcion');
        $fechaRegistroArt = ValidarPost::date('fecha_registro_art');
        $fechaSalidaArt = ValidarPost::date('fecha_salida_art');
        
        $articulo = new Articulo();
        $articulo->setIdEstadoArticulo($idEstadoArticulo);
        $articulo->setIdPersonaUsuarioRegistra($idPersonaUsuarioRegistra);
        $articulo->setNombreArticulo($nombreArticulo);
        $articulo->setDescripcion($descripcion);
        $articulo->setPrecioArticulo($precioArticulo);
        $articulo->setCantidad($cantidad);
        $articulo->setFechaRegistroArt($fechaRegistroArt);
        $articulo->setFechaSalidaArt($fechaSalidaArt);
        $res['data'] = $articulo->crear($conexion);
        echo json_encode($res);
      break;
      case 'disminuir-articulos':
        $idArticulos = ValidarPost::unsigned('id_articulos');
        $cantidad = ValidarPost::int('cantidad');
        $articulo = new Articulo();
        $articulo->setIdArticulos($idArticulos);
        $articulo->setCantidad($cantidad);
        $res['data'] = $articulo->disminuir($conexion);
        echo json_encode($res);
      break;
      case 'actualizar-articulos':
        $idArticulos = ValidarPost::unsigned('id_articulos');
        $nombreArticulo = ValidarPost::varchar('nombre_articulo');
        $idEstadoArticulo = ValidarPost::int('id_estado_articulo');
        $idPersonaUsuarioRegistra = ValidarPost::int('id_persona_usuario_registra');
        $cantidad = ValidarPost::int('cantidad');
        $precio = ValidarPost::float('precio');
        $descripcion = ValidarPost::varchar('descripcion');
        $fechaRegistroArt = ValidarPost::date('fecha_registro_art');
        $fechaSalidaArt = ValidarPost::date('fecha_salida_art');
        
        $articulo = new Articulo();
        $articulo->setIdArticulos($idArticulos);
        $articulo->setIdEstadoArticulo($idEstadoArticulo);
        $articulo->setIdPersonaUsuarioRegistra($idPersonaUsuarioRegistra);
        $articulo->setNombreArticulo($nombreArticulo);
        $articulo->setDescripcion($descripcion);
        $articulo->setPrecioArticulo($precioArticulo);
        $articulo->setCantidad($cantidad);
        $articulo->setFechaRegistroArt($fechaRegistroArt);
        $articulo->setFechaSalidaArt($fechaSalidaArt);
        $res['data'] = $articulo->actualizar($conexion);
        echo json_encode($res);
      break;

      // DEFAULT
      default:
        $res['data']['mensaje']='Accion no reconocida';
        $res['data']['resultado']=false;
        echo json_encode($res);
      break;
    }
    $conexion->cerrar();
    $conexion = null;
  } else {
    $res['data']['mensaje']='Accion no especificada';
    $res['data']['resultado']=false;
    $res['data']['accion']=$_POST;
    echo json_encode($res);
  }
  
?>