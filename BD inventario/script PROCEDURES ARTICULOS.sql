USE INVENTARIO;
-- Procedimiento para Insertar ARTICULO
DROP PROCEDURE IF EXISTS `SP_INSERTAR_ARTICULO`;
CREATE PROCEDURE `SP_INSERTAR_ARTICULO`(
  IN P_ID_ESTADO_ARTICULO INT(11),
  IN P_ID_PERSONA_USUARIO_REGISTRA INT(11),
  IN P_ID_CATEGORIA_ARTICULOS INT(11),
  IN P_NOMBRE_ARTICULO VARCHAR(50),
  IN P_DESCRIPCION VARCHAR(300),
  IN P_PRECIO_ARTICULO FLOAT(20),
  IN P_CANTIDAD INT,
  IN P_FECHA_REGISTRO_ART DATE,
  OUT P_MENSAJE VARCHAR(1000),
  OUT P_ERROR BOOLEAN
)
SP:BEGIN

  -- Declaraciones
  DECLARE mensaje VARCHAR(1000);
  DECLARE error BOOLEAN;
  DECLARE contador INT;

  -- Inicializaciones
  SET AUTOCOMMIT=0;
  START TRANSACTION;
  SET mensaje = '';

  -- Validaciones
  IF P_ID_ESTADO_ARTICULO='' OR P_ID_ESTADO_ARTICULO NULL THEN 
    SET mensaje=CONCAT(mensaje, 'Tipo de articulo vacío, ');
  END IF;

  IF P_ID_PERSONA_USUARIO_REGISTRA ='' OR P_ID_PERSONA_USUARIO_REGISTRA IS NULL THEN 
    SET mensaje=CONCAT(mensaje, 'Identificador del usuario vacío, ');
  ELSE
    SELECT COUNT(*) INTO contador FROM TBL_USUARIOS
    WHERE P_ID_PERSONA_USUARIO_REGISTRA = TBL_USUARIOS.P_ID_PERSONA_USUARIO;

    IF contador=0 THEN
      SET mensaje = CONCAT(mensaje, 'El USUARIO no existe, ');
    END IF;
  END IF;

   IF P_ID_CATEGORIA_ARTICULOS='' OR P_ID_CATEGORIA_ARTICULOS NULL THEN 
    SET mensaje=CONCAT(mensaje, 'CATEGORIA vacío, ');
  END IF;

  IF P_DESCRIPCION='' OR P_DESCRIPCION IS NULL THEN 
    SET mensaje=CONCAT(mensaje, 'Descripcion vacía, ');
  END IF;

  IF P_PRECIO_ARTICULO='' OR P_PRECIO_ARTICULO IS NULL THEN 
    SET mensaje=CONCAT(mensaje, 'Precio vacío, ');
  END IF;

  IF P_CANTIDAD='' OR P_CANTIDAD IS NULL THEN 
    SET mensaje=CONCAT(mensaje, 'Cantidad vacía, ');
  END IF;

  IF P_FECHA_REGISTRO_ART ='' OR P_FECHA_REGISTRO_ART IS NULL THEN 
    SET mensaje=CONCAT(mensaje, 'Fecha de ingreso vacía, ');
  ELSE 
    IF P_FECHA_REGISTRO_ART > SYSDATE() THEN
      SET mensaje=CONCAT(mensaje, 'Fecha de ingreso es superior a la fecha actual, ');
    END IF;
  END IF;

 

  IF mensaje <> '' THEN
    SET mensaje=mensaje;
    SET error = TRUE;
    SET P_MENSAJE=mensaje;
    SET P_ERROR=error;
    SELECT mensaje,error;
    
    LEAVE SP;
  END IF;

  INSERT INTO TBL_ARTICULOS (ID_ESTADO_ARTICULO, 
                           ID_PERSONA_USUARIO,
                           ID_CATEGORIA_ARTICULOS, 
                           NOMBRE_ARTICULO, 
                           DESCRIPCION,
                           PRECIO_ARTICULO,
                           CANTIDAD,
                           FECHA_REGISTRO_ART
                          
    VALUES (P_ID_ESTADO_ARTICULO,
            P_ID_PERSONA_USUARIO_REGISTRA, 
            P_ID_CATEGORIA_ARTICULOS
            P_NOMBRE_ARTICULO,
            P_DESCRIPCION,
            P_PRECIO_ARTICULO,
            P_CANTIDAD,
            P_FECHA_REGISTRO_ART);
            

  COMMIT;
      
  SET mensaje='Creación exitosa';
  SET error=FALSE;
  SET P_MENSAJE=mensaje;
  SET P_ERROR=error;
  SELECT mensaje, error;

END;

