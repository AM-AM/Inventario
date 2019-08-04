<?php 

  class Persona{
    private $idPersona;
    private $genero;
    private $nombre;
    private $apellido;
    private $edad;
    private $telefono;
    private $email;
    private $fechaNacimiento;
    private $direccion;
    private $numeroIdentidad;

    public function __construct(
      $idPersona = null,
      $genero = null,
      $nombre = null,
      $apellido = null,
      $edad = null,
      $telefono = null,
      $email = null,
      $fechaNacimiento = null,
      $direccion = null,
      $numeroIdentidad = null
    ){
      $this->idPersona = $idPersona;
      $this->genero = $genero;
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->edad = $edad;
      $this->telefono = $telefono;
      $this->email = $email;
      $this->fechaNacimiento = $fechaNacimiento;
      $this->direccion = $direccion;
      $this->numeroIdentidad = $numeroIdentidad;
    }
    public function __toString(){
      $var = "Persona{"
      ."idPersona: ".$this->idPersona." , "
      ."genero: ".$this->genero." , "
      ."nombre: ".$this->nombre." , "
      ."apellido: ".$this->apellido." , "
      ."edad: ".$this->edad." , "
      ."telefono: ".$this->telefono." , "
      ."email: ".$this->email." , "
      ."fechaNacimiento: ".$this->fechaNacimiento." , "
      ."direccion: ".$this->direccion." , "
      ."numeroIdentidad: ".$this->numeroIdentidad;
      return $var."}";
    }
    public function getIdPersona(){
      return $this->idPersona;
    }
    public function setIdPersona($idPersona){
      $this->idPersona = $idPersona;
    }
    public function getNombre(){
      return $this->nombre;
    }
    public function setNombre($nombre){
      $this->nombre = $nombre;
    }
    public function getApellido(){
      return $this->apellido;
    }
    public function setApellido($apellido){
      $this->apellido = $apellido;
    }
    public function getGenero(){
      return $this->genero;
    }
    public function setGenero($genero){
      $this->genero = $genero;
    }
    public function getEdad(){
      return $this->edad;
    }
    public function setEdad($edad){
      $this->edad = $edad;
    }
    public function getTelefono(){
      return $this->telefono;
    }
    public function setTelefono($telefono){
      $this->telefono = $telefono;
    }
    public function getDireccion(){
      return $this->direccion;
    }
    public function setDireccion($direccion){
      $this->direccion = $direccion;
    }
    public function getEmail(){
      return $this->email;
    }
    public function setEmail($email){
      $this->email = $email;
    }
    public function getNumeroIdentidad(){
      return $this->numeroIdentidad;
    }
    public function setNumeroIdentidad($numeroIdentidad){
      $this->numeroIdentidad = $numeroIdentidad;
    }
    public function getFechaNacimiento(){
      return $this->fechaNacimiento;
    }
    public function setFechaNacimiento($fechaNacimiento){
      $this->fechaNacimiento = $fechaNacimiento;
    }
    public function crear($conexion){
    }
    public function borrar($conexion){
    }
    public static function leer($conexion){
    }
    public function actualizar($conexion){
    }
    public function buscarPorIdentidad($conexion){
    }
    public function buscarPorNombre($conexion){
    }
    public function buscarPorApellido($conexion){
    }
  }

?>