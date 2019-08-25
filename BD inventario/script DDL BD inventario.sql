-- MySQL Script generated by MySQL Workbench
<<<<<<< HEAD
-- 08/22/19 12:36:34
=======
-- 07/15/19 03:05:35
>>>>>>> origin/master
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema inventario
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema inventario
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `inventario` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `inventario` ;

-- -----------------------------------------------------
-- Table `inventario`.`tbl_generos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_generos` (
  `id_genero` INT NOT NULL AUTO_INCREMENT,
  `genero` VARCHAR(45) NOT NULL,
  `abreviatura` VARCHAR(45) NULL,
  PRIMARY KEY (`id_genero`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_tipo_lugares`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_tipo_lugares` (
  `id_tipo_lugar` INT NOT NULL AUTO_INCREMENT,
  `tipo_lugar` VARCHAR(65) NOT NULL,
  PRIMARY KEY (`id_tipo_lugar`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_lugares`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_lugares` (
  `id_lugar` INT NOT NULL AUTO_INCREMENT,
  `id_tipo_lugar` INT NOT NULL,
  `id_lugar_padre` INT NULL,
  `nombre_lugar` VARCHAR(100) NULL,
  PRIMARY KEY (`id_lugar`),
  INDEX `fk_tbl_lugares_tbl_tipo_lugares_idx` (`id_tipo_lugar` ASC),
  INDEX `fk_tbl_lugares_tbl_lugares1_idx` (`id_lugar_padre` ASC),
  CONSTRAINT `fk_tbl_lugares_tbl_tipo_lugares`
    FOREIGN KEY (`id_tipo_lugar`)
    REFERENCES `inventario`.`tbl_tipo_lugares` (`id_tipo_lugar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_lugares_tbl_lugares1`
    FOREIGN KEY (`id_lugar_padre`)
    REFERENCES `inventario`.`tbl_lugares` (`id_lugar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_Personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_Personas` (
  `id_persona` INT NOT NULL AUTO_INCREMENT,
  `id_lugar_nacimiento` INT NOT NULL,
  `id_lugar_residencia` INT NOT NULL,
  `id_genero` INT NOT NULL,
  `primer_nombre` VARCHAR(50) NOT NULL,
  `segundo_nombre` VARCHAR(50) NULL,
  `primer_apellido` VARCHAR(50) NOT NULL,
  `segundo_apellido` VARCHAR(45) NULL,
  `identidad` VARCHAR(13) NOT NULL,
  `telefono` DECIMAL(10,0) NULL,
  `email` VARCHAR(55) NULL,
  `fecha_nacimiento` DATE NULL,
  `numero_cuenta` VARCHAR(15) NULL,
  PRIMARY KEY (`id_persona`),
  INDEX `fk_tbl_Personas_tbl_generos1_idx` (`id_genero` ASC),
  INDEX `fk_tbl_Personas_tbl_lugares1_idx` (`id_lugar_nacimiento` ASC),
  INDEX `fk_tbl_Personas_tbl_lugares2_idx` (`id_lugar_residencia` ASC),
  CONSTRAINT `fk_tbl_Personas_tbl_generos1`
    FOREIGN KEY (`id_genero`)
    REFERENCES `inventario`.`tbl_generos` (`id_genero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_Personas_tbl_lugares1`
    FOREIGN KEY (`id_lugar_nacimiento`)
    REFERENCES `inventario`.`tbl_lugares` (`id_lugar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_Personas_tbl_lugares2`
    FOREIGN KEY (`id_lugar_residencia`)
    REFERENCES `inventario`.`tbl_lugares` (`id_lugar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_tipo_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_tipo_usuarios` (
  `id_tipo_usuario` INT NOT NULL AUTO_INCREMENT,
  `tipo_usuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_usuarios` (
  `id_persona_usuario` INT NOT NULL,
  `id_tipo_usuario` INT NOT NULL,
  `nombre_usuario` VARCHAR(12) NOT NULL,
  `clave_usuario` VARBINARY(12) NOT NULL,
  `fotografia` BLOB NULL,
  `fecha_registro` DATE NOT NULL,
  INDEX `fk_tbl_usuarios_tbl_Personas1_idx` (`id_persona_usuario` ASC),
  INDEX `fk_tbl_usuarios_tbl_tipo_usuarios1_idx` (`id_tipo_usuario` ASC),
  PRIMARY KEY (`id_persona_usuario`),
  CONSTRAINT `fk_tbl_usuarios_tbl_Personas1`
    FOREIGN KEY (`id_persona_usuario`)
    REFERENCES `inventario`.`tbl_Personas` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_usuarios_tbl_tipo_usuarios1`
    FOREIGN KEY (`id_tipo_usuario`)
    REFERENCES `inventario`.`tbl_tipo_usuarios` (`id_tipo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_estado_articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_estado_articulos` (
  `id_estado_articulo` INT NOT NULL AUTO_INCREMENT,
  `estado_articulo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_estado_articulo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_categoria_articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_categoria_articulos` (
  `id_categoria_articulos` INT NOT NULL AUTO_INCREMENT,
  `nombre_categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_categoria_articulos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
<<<<<<< HEAD
-- Table `inventario`.`tbl_ubicacion_articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_ubicacion_articulos` (
  `id_ubicacion_articulo` INT NOT NULL AUTO_INCREMENT,
  `ubicacion_articulo` VARCHAR(100) NOT NULL,
  `Abreviatura` VARCHAR(45) NULL,
  PRIMARY KEY (`id_ubicacion_articulo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
=======
>>>>>>> origin/master
-- Table `inventario`.`tbl_articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_articulos` (
  `id_articulos` INT NOT NULL AUTO_INCREMENT,
  `id_estado_articulo` INT NOT NULL,
  `id_persona_usuario_registra` INT NOT NULL,
  `id_categoria_articulos` INT NOT NULL,
<<<<<<< HEAD
  `id_ubicacion_articulo` INT NOT NULL,
=======
>>>>>>> origin/master
  `nombre_articulo` VARCHAR(45) NOT NULL,
  `precio_articulo` FLOAT NULL,
  `cantidad` INT NULL,
  `fecha_registro_art` DATE NOT NULL,
  `fecha_salida_art` DATE NULL,
  `descripcion_articulo` VARCHAR(500) NULL,
  PRIMARY KEY (`id_articulos`),
  INDEX `fk_tbl_articulos_tbl_estado_articulos1_idx` (`id_estado_articulo` ASC),
  INDEX `fk_tbl_articulos_tbl_usuarios1_idx` (`id_persona_usuario_registra` ASC),
  INDEX `fk_tbl_articulos_tbl_categoria_articulos1_idx` (`id_categoria_articulos` ASC),
<<<<<<< HEAD
  INDEX `fk_tbl_articulos_tbl_ubicacion_articulos1_idx` (`id_ubicacion_articulo` ASC),
=======
>>>>>>> origin/master
  CONSTRAINT `fk_tbl_articulos_tbl_estado_articulos1`
    FOREIGN KEY (`id_estado_articulo`)
    REFERENCES `inventario`.`tbl_estado_articulos` (`id_estado_articulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_articulos_tbl_usuarios1`
    FOREIGN KEY (`id_persona_usuario_registra`)
    REFERENCES `inventario`.`tbl_usuarios` (`id_persona_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_articulos_tbl_categoria_articulos1`
    FOREIGN KEY (`id_categoria_articulos`)
    REFERENCES `inventario`.`tbl_categoria_articulos` (`id_categoria_articulos`)
    ON DELETE NO ACTION
<<<<<<< HEAD
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_articulos_tbl_ubicacion_articulos1`
    FOREIGN KEY (`id_ubicacion_articulo`)
    REFERENCES `inventario`.`tbl_ubicacion_articulos` (`id_ubicacion_articulo`)
    ON DELETE NO ACTION
=======
>>>>>>> origin/master
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_tipo_solicitudes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_tipo_solicitudes` (
  `id_tipo_solicitud` INT NOT NULL AUTO_INCREMENT,
  `nombre_solicitud` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_tipo_solicitud`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_estado_solicitudes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_estado_solicitudes` (
  `id_estado_solicitud` INT NOT NULL AUTO_INCREMENT,
  `estado_solicitud` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_estado_solicitud`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_solicitudes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_solicitudes` (
  `id_solicitud` INT NOT NULL AUTO_INCREMENT,
  `id_persona_usuario` INT NOT NULL,
  `id_estado_solicitud` INT NOT NULL,
  `id_tipo_solicitud` INT NOT NULL,
  `id_articulo_solicitado` INT NOT NULL,
  `fecha_solicitud` DATE NULL,
  PRIMARY KEY (`id_solicitud`),
  INDEX `fk_tbl_solicitudes_tbl_estado_solicitudes1_idx` (`id_estado_solicitud` ASC),
  INDEX `fk_tbl_solicitudes_tbl_tipo_solicitudes1_idx` (`id_tipo_solicitud` ASC),
  INDEX `fk_tbl_solicitudes_tbl_usuarios1_idx` (`id_persona_usuario` ASC),
  INDEX `fk_tbl_solicitudes_tbl_articulos1_idx` (`id_articulo_solicitado` ASC),
  CONSTRAINT `fk_tbl_solicitudes_tbl_estado_solicitudes1`
    FOREIGN KEY (`id_estado_solicitud`)
    REFERENCES `inventario`.`tbl_estado_solicitudes` (`id_estado_solicitud`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_solicitudes_tbl_tipo_solicitudes1`
    FOREIGN KEY (`id_tipo_solicitud`)
    REFERENCES `inventario`.`tbl_tipo_solicitudes` (`id_tipo_solicitud`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_solicitudes_tbl_usuarios1`
    FOREIGN KEY (`id_persona_usuario`)
    REFERENCES `inventario`.`tbl_usuarios` (`id_persona_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_solicitudes_tbl_articulos1`
    FOREIGN KEY (`id_articulo_solicitado`)
    REFERENCES `inventario`.`tbl_articulos` (`id_articulos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_tipo_reportes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_tipo_reportes` (
  `id_tipo_reporte` INT NOT NULL AUTO_INCREMENT,
  `tipo_reporte` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_tipo_reporte`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_estado_reporte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_estado_reporte` (
  `id_estado_reporte` INT NOT NULL AUTO_INCREMENT,
  `estado_reporte` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_estado_reporte`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_reportes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_reportes` (
  `id_reportes` INT NOT NULL AUTO_INCREMENT,
  `id_persona_usuario` INT NOT NULL,
  `id_tipo_reporte` INT NOT NULL,
  `id_estado_reporte` INT NOT NULL,
  `fecha_reporte` DATE NULL,
  `contenido_reporte` VARCHAR(4000) NULL,
  PRIMARY KEY (`id_reportes`),
  INDEX `fk_tbl_reportes_tbl_usuarios1_idx` (`id_persona_usuario` ASC),
  INDEX `fk_tbl_reportes_tbl_tipo_reportes1_idx` (`id_tipo_reporte` ASC),
  INDEX `fk_tbl_reportes_tbl_estado_reporte1_idx` (`id_estado_reporte` ASC),
  CONSTRAINT `fk_tbl_reportes_tbl_usuarios1`
    FOREIGN KEY (`id_persona_usuario`)
    REFERENCES `inventario`.`tbl_usuarios` (`id_persona_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_reportes_tbl_tipo_reportes1`
    FOREIGN KEY (`id_tipo_reporte`)
    REFERENCES `inventario`.`tbl_tipo_reportes` (`id_tipo_reporte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_reportes_tbl_estado_reporte1`
    FOREIGN KEY (`id_estado_reporte`)
    REFERENCES `inventario`.`tbl_estado_reporte` (`id_estado_reporte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_estado_mensajes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_estado_mensajes` (
  `id_estado_mensaje` INT NOT NULL AUTO_INCREMENT,
  `estado_mensaje` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_estado_mensaje`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_mensajes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_mensajes` (
  `id_mensaje` INT NOT NULL AUTO_INCREMENT,
  `id_estado_mensaje` INT NOT NULL,
  `id_persona_usuario_envia` INT NOT NULL,
  `id_persona_usuario_recibe` INT NOT NULL,
  `contenido_mensaje` VARCHAR(45) NOT NULL,
  `asunto_mensaje` VARCHAR(45) NULL,
  `fecha_mensaje` DATE NOT NULL,
  PRIMARY KEY (`id_mensaje`),
  INDEX `fk_tbl_mensajes_tbl_estado_mensajes1_idx` (`id_estado_mensaje` ASC),
  INDEX `fk_tbl_mensajes_tbl_usuarios1_idx` (`id_persona_usuario_envia` ASC),
  INDEX `fk_tbl_mensajes_tbl_usuarios2_idx` (`id_persona_usuario_recibe` ASC),
  CONSTRAINT `fk_tbl_mensajes_tbl_estado_mensajes1`
    FOREIGN KEY (`id_estado_mensaje`)
    REFERENCES `inventario`.`tbl_estado_mensajes` (`id_estado_mensaje`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_mensajes_tbl_usuarios1`
    FOREIGN KEY (`id_persona_usuario_envia`)
    REFERENCES `inventario`.`tbl_usuarios` (`id_persona_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_mensajes_tbl_usuarios2`
    FOREIGN KEY (`id_persona_usuario_recibe`)
    REFERENCES `inventario`.`tbl_usuarios` (`id_persona_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_bitacora_reportes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_bitacora_reportes` (
  `id_bitacora_reporte` INT NOT NULL AUTO_INCREMENT,
  `id_reportes` INT NOT NULL,
  `id_persona_usuario_creo_reporte` INT NOT NULL,
  `fecha_reporte` VARCHAR(45) NULL,
  `contenido_reporte` VARCHAR(45) NULL,
  PRIMARY KEY (`id_bitacora_reporte`),
  INDEX `fk_tbl_bitacora_reportes_tbl_reportes1_idx` (`id_reportes` ASC),
  INDEX `fk_tbl_bitacora_reportes_tbl_usuarios1_idx` (`id_persona_usuario_creo_reporte` ASC),
  CONSTRAINT `fk_tbl_bitacora_reportes_tbl_reportes1`
    FOREIGN KEY (`id_reportes`)
    REFERENCES `inventario`.`tbl_reportes` (`id_reportes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_bitacora_reportes_tbl_usuarios1`
    FOREIGN KEY (`id_persona_usuario_creo_reporte`)
    REFERENCES `inventario`.`tbl_usuarios` (`id_persona_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`.`tbl_bitacora_actualizacion_articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tbl_bitacora_actualizacion_articulos` (
  `id_bitacora_articulo` INT NOT NULL AUTO_INCREMENT,
  `id_articulos` INT NOT NULL,
  `id_persona_usuario_anterior` INT NOT NULL,
  `id_persona_usuario_actual` INT NOT NULL,
  `id_ubicacion_articulo_anterior` INT NOT NULL,
  `id_ubicacion_articulo_actual` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `fecha_actualizacion` DATE NOT NULL,
  PRIMARY KEY (`id_bitacora_articulo`),
  INDEX `fk_tbl_bitacora_actualizacion_articulos_tbl_articulos1_idx` (`id_articulos` ASC),
  INDEX `fk_tbl_bitacora_actualizacion_articulos_tbl_usuarios1_idx` (`id_persona_usuario_anterior` ASC),
  INDEX `fk_tbl_bitacora_articulos_tbl_usuarios1_idx` (`id_persona_usuario_actual` ASC),
  INDEX `fk_tbl_bitacora_articulos_tbl_ubicacion_articulos1_idx` (`id_ubicacion_articulo_anterior` ASC),
  INDEX `fk_tbl_bitacora_articulos_tbl_ubicacion_articulos2_idx` (`id_ubicacion_articulo_actual` ASC),
  CONSTRAINT `fk_tbl_bitacora_actualizacion_articulos_tbl_articulos1`
    FOREIGN KEY (`id_articulos`)
    REFERENCES `inventario`.`tbl_articulos` (`id_articulos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_bitacora_actualizacion_articulos_tbl_usuarios1`
    FOREIGN KEY (`id_persona_usuario_anterior`)
    REFERENCES `inventario`.`tbl_usuarios` (`id_persona_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_bitacora_articulos_tbl_usuarios1`
    FOREIGN KEY (`id_persona_usuario_actual`)
    REFERENCES `inventario`.`tbl_usuarios` (`id_persona_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_bitacora_articulos_tbl_ubicacion_articulos1`
    FOREIGN KEY (`id_ubicacion_articulo_anterior`)
    REFERENCES `inventario`.`tbl_ubicacion_articulos` (`id_ubicacion_articulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_bitacora_articulos_tbl_ubicacion_articulos2`
    FOREIGN KEY (`id_ubicacion_articulo_actual`)
    REFERENCES `inventario`.`tbl_ubicacion_articulos` (`id_ubicacion_articulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
