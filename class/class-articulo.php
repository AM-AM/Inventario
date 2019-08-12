<?php 

  class Articulo{
    private $idArticulos;
    private $idEstadoArticulo;
    private $idPersonaUsuarioRegistra;
    private $nombreArticulo;
    private $descripcion;
    private $precioArticulo;
    private $cantidad;
    private $fechaRegistro;
    private $fechaSalida;
    private $idCategoriaArticulo;    
    public function __construct(
      $idArticulos = null,
      $idEstadoArticulo = null,
      $idPersonaUsuarioRegistra = null,
      $nombreArticulo = null,
      $descripcion = null,
      $precioArticulo = null,
      $cantidad = null,
      $fechaRegistroArt = null,
      $fechaSalidaArt = null,
      $idCategoriaArticulo=null;       
      ){
        $this->idArticulos = $idArticulos;
        $this->idEstadoArticulo = $idEstadoArticulo;
        $this->idPersonaUsuarioRegistra = $idPersonaUsuarioRegistra;
        $this->nombreArticulo = $nombreArticulo;
        $this->descripcion = $descripcion;
        $this->precioArticulo = $precioArticulo;
        $this->cantidad = $cantidad;
        $this->fechaRegistroArt = $fechaRegistroArt;
        $this->fechaSalidaArt = $fechaSalidaArt;
        $this->idCategoriaArticulo=$idCategoriaArticulo; 
      
    }
    public function __toString(){
      $var = "Articulo{"
      ."idArticulos: ".$this->idArticulos." , "
      ."idEstadoArticulo: ".$this->idEstadoArticulo." , "
      ."idPersonaUsuarioRegistra: ".$this->idPersonaUsuarioRegistra." , "
      ."nombreArticulo: ".$this->nombreArticulo." , "
      ."descripcion: ".$this->descripcion.","
      ."precioArticulo: ".$this->precioArticulo." , "
      ."cantidad: ".$this->cantidad." , "
      ."fechaRegistroArt: ".$this->fechaRegistroArt." , "
      ."fechaSalidaArt: ".$this->fechaSalidaArt." , "
      ."idCategoriaArticulo:".$this->idCategoriaArticulo." , "
      
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

    public function getIdCategoriaArticulo(){
      return $this->idCategoriaArticulo;
    }

    public function setIdCategoriaArticulo(){
      $this->idCategoriaArticulo=$idCategoriaArticulo;
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
        ON (A.ID_PERSONA_USUARIO_REGISTRA = C.ID_PERSONA_USUARIO)';
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

    public static function leerPersonaUsuarioRegistra($conexion){
      $sql = 
      ' SELECT *
        FROM TBL_USUARIOS';
      $rows = $conexion->query($sql);
      return $rows;
    }

    public function leerMenorCantidad($conexion){
      $sql = 
      ' SELECT A.ID_ARTICULOS,
               B.ID_ESTADO_ARTICULO,
               A.NOMBRE_ARTICULO,
               A.PRECIO_ARTICULO,
               A.CANTIDAD,
               C.NOMBRE_USUARIO 
        FROM TBL_ARTICULOS A
        INNER JOIN TBL_ESTADO_ARTICULOS B
        ON (A.ID_ESTADO_ARTICULO = B.ID_ESTADO_ARTICULO)
        INNER JOIN TBL_USUARIOS C
        ON (A.ID_PERSONA_USUARIO_REGISTRA = C.ID_PERSONA_USUARIO)
        WHERE A.CANTIDAD <= %d';
      $valores = [$this->getCantidad()];
      $rows = $conexion->query($sql, $valores);
      return $rows;
    }

    public function leerPorId($conexion){
      $sql = 
      ' SELECT A.ID_ARTICULOS,
               B.ID_ESTADO_ARTICULO,
               B.ESTADO_ARTICULO,
               A.NOMBRE_ARTICULO,
               A.DESCRIPCION_ARTICULO,
               A.CANTIDAD,
               A.PRECIO_ARTICULO,
               A.FECHA_REGISTRO_ART,
               A.FECHA_SALIDA_ART,
               C.ID_PERSONA_USUARIO,
               C.NOMBRE_USUARIO
        FROM TBL_ARTICULOS A
        INNER JOIN TBL_ESTADO_ARTICULOS B
        ON (A.ID_ESTADO_ARTICULO = B.ID_ESTADO_ARTICULO)
        INNER JOIN TBL_USUARIOS C
        ON (A.ID_PERSONA_USUARIO_REGISTRA = C.ID_PERSONA_USUARIO)
        WHERE ID_ARTICULOS = %s';

      $valores = [$this->getIdArticulos()];
      $rows = $conexion->query($sql, $valores);
      if (count($rows)) return $rows[0];
      else return null;
    }

    public function crear($conexion){
      $sql = "
        CALL SP_Insertar_Articulo(
          '%d','%d','%s','%s','%s','%s',DATE('%s'),DATE('%s'), @mensaje, @error
        );
      ";
      $valores = [
        $this->getIdEstadoArticulo(),
        $this->getIdPersonaUsuarioRegistra(),
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

    public function disminuir($conexion){
      $sql = "CALL SP_Disminuir_Articulo('%d','%d', @mensaje, @error);";
      $valores = [
        $this->getIdArticulos(),
        $this->getCantidad()
      ];
      $rows = $conexion->query($sql, $valores);
      return $rows[0];
    }

    public function actualizar($conexion){
      $sql = "
        CALL SP_Actualizar_Articulo(
          '%d','%d','%d','%s','%s','%s','%s',DATE('%s'),DATE('%s'), @mensaje, @error
        );
      ";
      $valores = [
        $this->getIdArticulos(),
        $this->getIdEstadoArticulo(),
        $this->getIdPersonaUsuarioRegistra(),
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