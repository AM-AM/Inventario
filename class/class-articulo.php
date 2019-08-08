<?php 

  class Articulo{
    private $idArticulos;
    private $idEstadoArticulo;
    private $idPersonaUsuarioRegistra;
    private $nombreArticulo;
    private $precioArticulo;
    private $cantidad;
    private $fechaRegistro;
    private $fechaSalida;
    private $descripcion;
    public function __construct(
      $idArticulos = null,
      $idEstadoArticulo = null,
      $idPersonaRegistra = null,
      $nombreArticulo = null,
      $precioArticulo = null,
      $cantidad = null,
      $fechaRegistroArt = null,
      $fechaSalidaArt = null,
      $descripcion = null
      ){
        $this->idArticulos = $idArticulos;
        $this->idEstadoArticulo = $idEstadoArticulo;
        $this->idPersonaUsuarioRegistra = $idPersonaUsuarioRegistra;
        $this->nombreArticulo = $nombreArticulo;
        $this->precioArticulo = $precioArticulo;
        $this->cantidad = $cantidad;
        $this->fechaRegistroArt = $fechaRegistroArt;
        $this->fechaSalidaArt = $fechaSalidaArt;
        $this->descripcion = $descripcion;
    }
    public function __toString(){
      $var = "Articulo{"
      ."idArticulos: ".$this->idArticulos." , "
      ."idEstadoArticulo: ".$this->idEstadoArticulo." , "
      ."idPersonaUsuarioRegistra: ".$this->idPersonaUsuarioRegistra." , "
      ."nombreArticulo: ".$this->nombreArticulo." , "
      ."precioArticulo: ".$this->precioArticulo." , "
      ."cantidad: ".$this->cantidad." , "
      ."fechaRegistroArt: ".$this->fechaRegistroArt." , "
      ."fechaSalidaArt: ".$this->fechaSalidaArt." , "
      ."descripcion: ".$this->descripcion;
      return $var."}";
    }
    public function getIdArticulos(){
      return $this->idArticulo;
    }
    public function setIdArticulos($idArticulo){
      $this->idArticulo = $idArticulo;
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
    public function setIdPersonaUsuarioRegistra($idPersonaRegistra){
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
      return $this->fechaRegistro;
    }
    public function setFechaRegistroArt($fechaRegistroArt){
      $this->fechaRegistro = $fechaRegistro;
    }
    public function getFechaSalidaArt(){
      return $this->fechaSalida;
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

    public static function leerPersonaUsuario($conexion){
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
               A.PRECIO_ARTICULO
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
               A.DESCRIPCION,
               A.CANTIDAD,
               A.PRECIO,
               A.FECHA_REGISTRO,
               A.FECHA_SALIDA,
               C.ID_PERSONA_USUARIO,
               C.NOMBRE_USUARIO
        FROM TBL_ARTICULOS A
        INNER JOIN TBL_ESTADO_ARTICULOS B
        ON (A.ID_ESTADO_ARTICULO = B.ID_ESTADO_ARTICULO)
        INNER JOIN TBL_USUARIOS C
        ON (A.ID_PERSONA_USUARIO_REGISTRA = C.ID_PERSONA_USUARIO)
        WHERE ID_ARTICULOS = %s
      ';
      $valores = [$this->getIdArticulo()];
      $rows = $conexion->query($sql, $valores);
      if (count($rows)) return $rows[0];
      else return null;
    }

    public function crear($conexion){
      $sql = "
        CALL SP_Insertar_Articulo(
          '%d','%d','%d','%s','%s','%s',DATE('%s'),DATE('%s'),'%s', @mensaje, @erro
        );
      ";
      $valores = [
        $this->getIdArticulo(),
        $this->getIdEstadoArticulo(),
        $this->getIdPersonaRegistra(),
        $this->getNombreArticulo(),
        $this->getPrecioArticulo(),
        $this->getCantidad(),     
        $this->getFechaRegistroArt(),
        $this->getFechaSalidaArt()
        $this->getDescripcion()
      ];
      $rows = $conexion->query($sql, $valores);
      return $rows[0];
    }

    public function disminuir($conexion){
      $sql = "CALL SP_Disminuir_Articulo('%d','%d', @mensaje, @error);";
      $valores = [
        $this->getIdArticulo(),
        $this->getCantidad()
      ];
      $rows = $conexion->query($sql, $valores);
      return $rows[0];
    }

    public function actualizar($conexion){
      $sql = "
        CALL SP_Actualizar_Articulo(
          '%d','%d','%d','%s','%s','%s',DATE('%s'),DATE('%s'),'%s', @mensaje, @error
        );
      ";
      $valores = [
        $this->getIdArticulo(),
        $this->getIdEstadoArticulo(),
        $this->getIdPersonaRegistra(),
        $this->getNombreArticulo(),
        $this->getPrecioArticulo(),
        $this->getCantidad(),     
        $this->getFechaRegistroArt(),
        $this->getFechaSalidaArt()
        $this->getDescripcion()
      ];
      $rows = $conexion->query($sql, $valores);
      return $rows[0];
    }
  }

?>