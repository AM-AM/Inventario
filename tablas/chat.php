<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat </title>
<link type="text/css" rel="stylesheet" href="../css/styles.css" />

<?php 
    include("../class/class-conexion.php");
    session_start();
    if($_SESSION['status']==false) { // CUALQUIER USUARIO REGISTRADO PUEDE VER ESTA PAGINA
        session_destroy();
        header("Location: login.php");

        
    }
    $id = (int)$_GET['id'];

    $conec = new Conexion();

    $sql ="UPDATE tbl_mensajes a SET id_estado_mensaje =1 WHERE a.id_persona_usuario_envia = $id";
    $resultado = $conec->ejecutarConsulta($sql);
?>

<style>

.eliminar{
    background: linear-gradient(#FFDA63, #FFB940);
    background-image: -webkit-linear-gradient(top, #FFDA63, #FFB940);
    background-image: -moz-linear-gradient(top, #FFDA63, #FFB940);
    background-image: -ms-linear-gradient(top, #FFDA63, #FFB940);
    background-image: -o-linear-gradient(top, #FFDA63, #FFB940);
    background-image: linear-gradient(to bottom, #FFDA63, #FFB940);
    -webkit-border-radius: 28;
    font-family: Arial;
    color: brown;
    text-decoration: none;
    font-size: 20px;
    text-align: center;
    opacity: 0.8;
}


</style>
</head>
 


 <body>
     

<div id="wrapper">
  <div id="menu">
        <p class="welcome">Welcome, <?php echo $_SESSION['nombre'];?><b></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox">
            <?php 
                

                
                $id_recive = (int)$_SESSION['id_persona_usuario'];

                    $sql = "SELECT t1.id_persona_usuario_envia as id_envia,t1.id_persona_usuario_recibe as id_recibe, t1.id_mensaje,concat_ws(t2.primer_nombre, ' ' ,t2.primer_apellido ) as envia,(Select concat_ws(t2.primer_nombre , ' ' ,t2.primer_apellido) as nombre from tbl_personas as t2 
                    INNER JOIN tbl_mensajes as t1
                    on t1.id_persona_usuario_recibe = t2.id_persona
                    WHERE t1.id_persona_usuario_recibe = $id_recive
                    LIMIT 1
                   ) as recibe            
                    ,t1.contenido_mensaje as mensaje,t1.fecha_mensaje as fecha FROM tbl_mensajes as t1
                    inner join tbl_personas as t2 
                    on t2.id_persona = t1.id_persona_usuario_envia
                    WHERE (id_persona_usuario_envia = $id && id_persona_usuario_recibe =$id_recive) || (id_persona_usuario_envia=$id_recive && id_persona_usuario_recibe=$id)";

                    $resultado1 = $conec->ejecutarConsulta($sql);
echo ' <table>';
                    foreach($resultado1 as $res1){
                        
                    echo '
                        <tr>
                        <td>
                        <span class="dropdown-item d-flex align-items-center" >
                        
                                <div class="small text-gray-500">'.$res1['envia']." el ".$res1['fecha'].'</div>
                                <span class="font-weight-bold" >'.$res1['mensaje'].'</span><br><br>
                        </td>

                    '; 
                            if ($res1['id_envia']==$id_recive){
                            echo '
                                <td> 
                                <a  class="eliminar" id="eliminar_mensaje"  href="../ajax/acciones-mensajes.php?accion=eliminar&idM='.$res1['id_mensaje'].'&id='.$id.'">x</a>
                           
                            </td>';
                            }
                
                    echo '  
                         
                        </span>
                       </tr>
                    ';
                    }
 echo ' </table>';
            ?>
    
    
    </div>
     
    <form name="message" action="../ajax/acciones-mensajes.php" method = "POST">
        <input name="mensaje" type="text" id="mensaje" size="63" />
        <input name="guardar_mensaje" type="submit"  id="guardar_mensaje" value="Send" />
        <input type="hidden" name="id_envia" id="id_envia" value="<?php echo $id; ?>">
        <input type="hidden" name="id_recibe" id="id_recibe" value="<?php echo $id_recive; ?>">
    </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
	//If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Estas seguro de querer salir");
		if(exit==true){window.location = '../administrador.php';}		
	});
});

</script>

<script src="../js/configuraciones.js"></script>

<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>