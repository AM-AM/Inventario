<?php 

  class Persona{
    private $idPersona;
    private $PrimerNombre;
    private $SegundoNombre;
    private $PrimerApellido;
    private $SegundoApellido;
    private $telefono;
    private $email;
    private $fechaNacimiento;
    private $NumeroCuenta;
    private $numeroIdentidad;

    public function __construct(
      $idPersona = null,
      $PrimerNombre = null,
      $SegundoNombre = null,
      $PrimerApellido = null,
      $SegundoApellido = null,
      $telefono = null,
      $email = null,
      $fechaNacimiento = null,
      $NumeroCuenta = null,
      $numeroIdentidad = null
    ){
      $this->idPersona = $idPersona;
      $this->PrimerNombre = $PrimerNombre;
      $this->SegundoNombre = $SegundoNombre;;
      $this->PrimerApellido = $PrimerApellido;
      $this->SegundoApellido = $SegundoApellido;
      $this->telefono = $telefono;
      $this->email = $email;
      $this->fechaNacimiento = $fechaNacimiento;
      $this->NumeroCuenta = $NumeroCuenta;
      $this->numeroIdentidad = $numeroIdentidad;
    }
    public function __toString(){
      $var = "Persona{"
      ."idPersona: ".$this->idPersona." , "
      ."PrimerNombre: ".$this->PrimerNombre." , "
      ."SegundoNombre: ".$this->SegundoNombre." , "
      ."PrimerApellido: ".$this->PrimerApellido." , "
      ."SegundoApellido: ".$this->SegundoApellido." , "
      ."telefono: ".$this->telefono." , "
      ."email: ".$this->email." , "
      ."fechaNacimiento: ".$this->fechaNacimiento." , "
      ."NumeroCuenta: ".$this->NumeroCuenta." , "
      ."numeroIdentidad: ".$this->numeroIdentidad;
      return $var."}";
    }
    public function getIdPersona(){
      return $this->idPersona;
    }
    public function setIdPersona($idPersona){
      $this->idPersona = $idPersona;
    }
    public function getPrimerNombre(){
      return $this->PrimerNombre;
    }
    public function setPrimerNombre($PrimerNombre){
      $this->PrimerNombre = $PrimerNombre;
    }
    public function getSegundoNombre(){
      return $this->SegundoNombre;
    }
    public function setSegundoNombre($SegundoNombre){
      $this->SegundoNombre = $SegundoNombre;
    }
    public function getPrimerApellido(){
      return $this->PrimerApellido;
    }
    public function setPrimerApellido($PrimerApellido){
      $this->PrimerApellido = $PrimerApellido;
    }
    public function getSegundoApellido(){
      return $this->SegundoApellido;
    }
    public function setSegundoApellido($SegundoApellido){
      $this->SegundoApellido = $SegundoApellido;
    }
    
    public function getTelefono(){
      return $this->telefono;
    }
    public function setTelefono($telefono){
      $this->telefono = $telefono;
    }
    public function getNumeroCuenta(){
      return $this->NumeroCuenta;
    }
    public function setNumeroCuenta($NumeroCuenta){
      $this->NumeroCuenta = $NumeroCuenta;
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
   
?>