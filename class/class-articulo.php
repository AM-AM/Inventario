<?php 

  class Articulo{
    private $idArticulos;
    private $idEstadoArticulo;
    private $idPersonaUsuarioRegistra;
<<<<<<< HEAD
    private $idUbicacionArticulo;
=======
>>>>>>> origin/master
    private $idCategoriaArticulos;
    private $nombreArticulo;
    private $descripcion;
    private $precioArticulo;
    private $cantidad;
    private $fechaRegistro;
    private $fechaSalida;
       
    public function __construct(
      $idArticulos = null,
      $idEstadoArticulo = null,
      $idPersonaUsuarioRegistra = null,
      $idCategoriaArticulos = null,
<<<<<<< HEAD
      $idUbicacionArticulo = null,
=======
>>>>>>> origin/master
      $nombreArticulo = null,
      $descripcion = null,
      $precioArticulo = null,
      $cantidad = null,
      $fechaRegistroArt = null,
      $fechaSalidaArt = null
         
      ){
        $this->idArticulos = $idArticulos;
        $this->idEstadoArticulo = $idEstadoArticulo;
        $this->idPersonaUsuarioRegistra = $idPersonaUsuarioRegistra;
        $this->idCategoriaArticulos = $idCategoriaArticulos;
<<<<<<< HEAD
        $this->idUbicacionArticulo = $idUbicacionArticulo;
=======
>>>>>>> origin/master
        $this->nombreArticulo = $nombreArticulo;
        $this->descripcion = $descripcion;
        $this->precioArticulo = $precioArticulo;
        $this->cantidad = $cantidad;
        $this->fechaRegistroArt = $fechaRegistroArt;
        $this->fechaSalidaArt = $fechaSalidaArt;
        
      
    }
    public function __toString(){
      $var = "Articulo{"
      ."idArticulos: ".$this->idArticulos." , "
      ."idEstadoArticulo: ".$this->idEstadoArticulo." , "
      ."idPersonaUsuarioRegistra: ".$this->idPersonaUsuarioRegistra." , "
      ."idCategoriaArticulos:".$this->idCategoriaArticulos." , "
<<<<<<< HEAD
      ."$idUbicacionArticulo:".$this->idUbicacionArticulo.","
=======
>>>>>>> origin/master
      ."nombreArticulo: ".$this->nombreArticulo." , "
      ."descripcion: ".$this->descripcion.","
      ."precioArticulo: ".$this->precioArticulo." , "
      ."cantidad: ".$this->cantidad." , "
      ."fechaRegistroArt: ".$this->fechaRegistroArt." , "
      ."fechaSalidaArt: ".$this->fechaSalidaArt;         
      return $var."}";
    }
    public function getIdArticulos(){
      return $this->idArticulos;
    }
    public function setIdArticulos($idArticulos){
      $this->idArticulos = $idArticulos;
    }

    public function getIdEstadoArticulo(){
      return $this->idEstadoArticulo;
    }
    public function setIdEstadoArticulo($idEstadoArticulo){
      $this->idEstadoArticulo = $idEstadoArticulo;
    }

    public function getIdPersonaUsuarioRegistra(){
      return $this->idPersonaUsuarioRegistra;
    }
    public function setIdPersonaUsuarioRegistra($idPersonaUsuarioRegistra){
      $this->idPersonaUsuarioRegistra = $idPersonaUsuarioRegistra;
    }

    public function getIdCategoriaArticulos(){
      $this->idCategoriaArticulo;
    }
    public function setIdCategoriaArticulos($idCategoriaArticulo){
      $this->idCategoriaArticulo = $idCategoriaArticulo;
    }

<<<<<<< HEAD
    public function getIdUbicacioArticulo(){
      $this->idUbicacionArticulo;
    }
    public function setIdUbicacionArticulo($idUbicacionArticulo){
      $this->idUbicacionArticulo = $idUbicacionArticulo;
    }

=======
>>>>>>> origin/master
    public function getNombreArticulo(){
      return $this->nombreArticulo;
    }
    public function setNombreArticulo($nombreArticulo){
      $this->nombreArticulo = $nombreArticulo;
    }

    public function getPrecioArticulo(){
      return $this->precioArticulo;
    }
    public function setPrecioArticulo($precioArticulo){
      $this->precioArticulo = $precioArticulo;
    }

    public function getCantidad(){
      return $this->cantidad;
    }
    public function setCantidad($cantidad){
      $this->cantidad = $cantidad;
    }

    public function getFechaRegistroArt(){
      return $this->fechaRegistroArt;
    }
    public function setFechaRegistroArt($fechaRegistroArt){
      $this->fechaRegistroArt = $fechaRegistroArt;
    }

    public function getFechaSalidaArt(){
      return $this->fechaSalidaArt;
    }
    public function setFechaSalidaArt($fechaSalidaArt){
      $this->fechaSalidaArt = $fechaSalidaArt;
    }

    public function getDescripcion(){
      return $this->descripcion;
    }
    public function setDescripcion($descripcion){
      $this->descripcion = $descripcion;
    }
  

    public static function leer($conexion){
      $sql = 
      ' SELECT A.ID_ARTICULOS,
               B.ESTADO_ARTICULO,
               A.NOMBRE_ARTICULO,
               A.PRECIO_ARTICULO,
               A.CANTIDAD,
               C.NOMBRE_USUARIO 
        FROM TBL_ARTICULOS A
        INNER JOIN TBL_ESTADO_ARTICULOS B
        ON (A.ID_ESTADO_ARTICULO = B.ID_ESTADO_ARTICULO)
        INNER JOIN TBL_USUARIOS C
        ON (A.ID_PERSONA_USUARIO_REGISTRA = C.ID_PERSONA_USUARIO)
        WHERE A.ID_ESTADO_ARTICULO = 2';
      $rows = $conexion->query($sql);
      return $rows;
    }

    public static function leerEstadoArticulo($conexion){
      $sql = 
      ' SELECT *
        FROM TBL_ESTADO_ARTICULOS';
      $rows = $conexion->query($sql);
      return $rows;
    }

    //leer las personas tipo usuario que hara el registro en inventario
    public static function leerPersonaUsuarioRegistra($conexion){
      $sql = 
      ' SELECT *
        FROM TBL_USUARIOS';
      $rows = $conexion->query($sql);
      return $rows;
    }

    //leer las categorias de los articulos 
    public static function leerCategoriaArticulos($conexion){
      $sql=
      'SELECT *
      FROM TBL_CATEGORIA_ARTICULOS';
      $rows = $conexion->query($sql);
      return $rows;
    }

<<<<<<< HEAD
    //leer ubicacion de los articulos
     public static function leerUbicacionArticulos($conexion){
      $sql=
      'SELECT *
      FROM TBL_UBICACION_ARTICULOS';
      $rows = $conexion->query($sql);
      return $rows;
    }

=======
>>>>>>> origin/master
    //MUESTRA SOLO LOS ARTICULOS QUE ESTAN DISPONIBLES PARA PRESTAMO
    public function leerMenorCantidad($conexion){
      $sql = 
      ' SELECT A.ID_ARTICULOS,
               B.ESTADO_ARTICULO,
               A.NOMBRE_ARTICULO,
               A.PRECIO_ARTICULO,
               A.CANTIDAD,
               C.NOMBRE_USUARIO 
        FROM TBL_ARTICULOS A
        INNER JOIN TBL_ESTADO_ARTICULOS B
        ON (A.ID_ESTADO_ARTICULO = B.ID_ESTADO_ARTICULO)
        INNER JOIN TBL_USUARIOS C
        ON (A.ID_PERSONA_USUARIO_REGISTRA = C.ID_PERSONA_USUARIO)
        WHERE A.ID_ESTADO_ARTICULO = 1';
      $valores = [$this->getCantidad()];
      $rows = $conexion->query($sql, $valores);
      return $rows;
    }

    //lee los articulos por su Id
    public function leerPorId($conexion){
      $sql = 
      ' SELECT A.ID_ARTICULOS,
               B.ID_ESTADO_ARTICULO,
               B.ESTADO_ARTICULO,
               C.ID_CATEGORIA_ARTICULOS,
               C.NOMBRE_CATEGORIA,
               A.NOMBRE_ARTICULO,
               A.DESCRIPCION_ARTICULO,
               A.CANTIDAD,
               A.PRECIO_ARTICULO,
               A.FECHA_REGISTRO_ART,
               A.FECHA_SALIDA_ART,
               D.ID_PERSONA_USUARIO,
               D.NOMBRE_USUARIO            
        FROM TBL_ARTICULOS A
        INNER JOIN TBL_ESTADO_ARTICULOS B
        ON (A.ID_ESTADO_ARTICULO = B.ID_ESTADO_ARTICULO)
        INNER JOIN TBL_CATEGORIA_ARTICULOS C
        ON(A.ID_CATEGORIA_ARTICULOS = C.ID_CATEGORIA_ARTICULOS)
        INNER JOIN TBL_USUARIOS D
        ON (A.ID_PERSONA_USUARIO_REGISTRA = D.ID_PERSONA_USUARIO)
        WHERE ID_ARTICULOS = %s';

      $valores = [$this->getIdArticulos()];
      $rows = $conexion->query($sql, $valores);
      if (count($rows)) return $rows[0];
      else return null;
    }

    //funcion para crear o insertar un articulo nuevo, esta manda llamar un procedimiento almacenado para realizar la accion 
<<<<<<< HEAD
    public function crear($conexion){
      $sql = "
        CALL SP_Insertar_Articulo(
          '%d','%d','%d','%d',%s','%s','%s',DATE('%s'),'%s'
=======
    /*public function crear($conexion){
      $sql = "
        CALL SP_Insertar_Articulo(
          '%d','%d','%d','%s','%s','%s','%s',DATE('%s'),DATE('%s'), @mensaje, @error
>>>>>>> origin/master
        );
      ";
      $valores = [
        $this->getIdEstadoArticulo(),
        $this->getIdPersonaUsuarioRegistra(),
        $this->getIdCategoriaArticulos(),
<<<<<<< HEAD
        $this->getIdUbicacioArticulo(),
=======
>>>>>>> origin/master
        $this->getNombreArticulo(),
        $this->getPrecioArticulo(),
        $this->getCantidad(),     
        $this->getFechaRegistroArt(),
        $this->getDescripcion()
      ];
      $rows = $conexion->query($sql, $valores);
      return $rows[0];
    }*/
//funcion para insertar o crear un nuevo articulo
    public function crear($conexion){
      $sql=sprintf("INSERT INTO TBL_ARTICULOS (ID_ESTADO_ARTICULO, 
                            ID_PERSONA_USUARIO,
                            ID_CATEGORIA_ARTICULOS, 
                            NOMBRE_ARTICULO, 
                            DESCRIPCION,
                            PRECIO_ARTICULO,
                            CANTIDAD,
                            FECHA_REGISTRO_ART

    VALUES('%d','%d''%d','%s''%s','%s','%s','%s')",
    $conexion->getLink()->real_escape_string(stripslashes($this->getIdEstadoArticulo())),
    $conexion->getLink()->real_escape_string(stripslashes($this->getIdPersonaUsuarioRegistra())),
    $conexion->getLink()->real_escape_string(stripslashes($this->getIdCategoriaArticulos())),
    $conexion->getLink()->real_escape_string(stripslashes($this->getNombreArticulo())),
    $conexion->getLink()->real_escape_string(stripslashes($this->getDescripcion())),
    $conexion->getLink()->real_escape_string(stripslashes($this->getPrecioArticulo())),
    $conexion->getLink()->real_escape_string(stripslashes($this->getCantidad())),
    $conexion->getLink()->real_escape_string(stripslashes($this->getFechaRegistroArt()))

  );
  $resultadoInsert = $conexion->ejecutarInstrucciones($sql);
  if($resultadoInsert === TRUE){
    $resultado=1;
    $resultado["mensaje"] = "se ha insertado correctamente";

<<<<<<< HEAD
=======
  }
  else{
    $resultado["codigo"]=0;
    $resultado["mensaje"]=" ha ocurrido un error";

  }
  echo json_encode($resultado);
  $conexion->cerrarConexion();
     /*$conexion                   
     VALUES ($thiscgetIdEstadoArticulo(),
         $this-getIdPersonaUsuarioRegistra(),
         $this->getIdCategoriaArticulos(),
         $this->getNombreArticulo(),
         $this->getDescripcion(),
         $this->getPrecioArticulo(),
         $this->getCantidad(),     
         $this->getFechaRegistroArt())';*/    
      $rows = $conexion->query($sql);
    
     }


>>>>>>> origin/master
    //funcion para cuando se realicen los prestamos, aun no esta completa...
    public function disminuir($conexion){
      $sql = "CALL SP_Disminuir_Articulo('%d','%d', @mensaje, @error);";
      $valores = [
        $this->getIdArticulos(),
        $this->getCantidad()
      ];
      $rows = $conexion->query($sql, $valores);
      return $rows[0];
    }


    //esta es la funcion para actualizar los datos de un articulo, esta manda llamar un procedimiento almacenado para realizar la accion 
    public function actualizar($conexion){
      $sql = "
        CALL SP_Actualizar_Articulo(
<<<<<<< HEAD
          '%d','%d','%d','%d','%d','%s','%s','%s','%s',DATE('%s'),DATE('%s'), @mensaje, @error
=======
          '%d','%d','%d','%d','%s','%s','%s','%s',DATE('%s'),DATE('%s'), @mensaje, @error
>>>>>>> origin/master
        );
      ";
      $valores = [
        $this->getIdArticulos(),
        $this->getIdEstadoArticulo(),
        $this->getIdPersonaUsuarioRegistra(),
        $this->getIdCategoriaArticulo(),
<<<<<<< HEAD
        $this->getIdUbicacioArticulo(),
=======
>>>>>>> origin/master
        $this->getNombreArticulo(),
        $this->getDescripcion(),
        $this->getPrecioArticulo(),
        $this->getCantidad(),     
        $this->getFechaRegistroArt(),
        $this->getFechaSalidaArt()
        
      ];
      $rows = $conexion->query($sql, $valores);
      return $rows[0];
    }
  }

?>