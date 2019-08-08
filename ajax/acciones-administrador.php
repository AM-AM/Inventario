<?php
  include_once("../class/class-conexion.php");
  include_once("../class/class-persona.php");
  include_once("../class/class-usuario.php");

  if(isset($_POST['accion'])){
    $conexion = new Conexion();
    switch ($_POST['accion']) {
      
      case 'insertar-usuario':

        $PrimerNombre = $_POST["primerNombre"];
        $SegundoNombre =  $_POST["segundoNombre"];
        $PrimerApellido = $_POST["primerApellido"];
        $SegundoApellido = $_POST["segundoApellido"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];
        $fechaNacimiento = $_POST["fechaNacimiento"];
        $NumeroCuenta = $_POST["NumeroCuenta"];
        $numeroIdentidad = $_POST["numeroIdentidad"];
        $idGenero =$_POST["idGenero"];
        $idLugarResidencia =$_POST["idLugarResidencia"];
        $idLugarNacimiento =$_POST["idLugarNacimiento"];

      
        $persona = new Persona();
        $persona->setPrimerNombre($PrimerNombre);
        $persona->setSegundoNombre($SegundoNombre);
        $persona->setPrimerApellido($PrimerApellido);
        $persona->setSegundoApellido($SegundoApellido);
        $persona->setTelefono($telefono);
        $persona->setEmail($email);
        $persona->setFechaNacimiento($fechaNacimiento);
        $persona->setNumeroCuenta($NumeroCuenta);
        $persona->setNumeroIdentidad($numeroIdentidad);
        $res['data'] = $persona->crearUsuario($conexion);

        
        /*
        $tipoUsuario = ValidarPost::int('tipoUsuario');
        $usuario = ValidarPost::varchar('usuario');
        $contrasenia = ValidarPost::varbinary('contrasenia');
        $fecha_ingreso = ValidarPost::date('fecha_ingreso');
*/


        echo json_encode($res);
      break;
      

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