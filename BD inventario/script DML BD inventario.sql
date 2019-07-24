-- SCRIPT DML BASE DE DATOS INVENTARIO

-- insertando datos en tbl_generos
INSERT INTO `tbl_generos` (`id_genero`, `genero`, `abreviatura`) 
		VALUES (NULL, 'Femenino', 'F');

INSERT INTO `tbl_generos` (`id_genero`, `genero`, `abreviatura`) 
		VALUES (NULL, 'Masculino', 'M');

INSERT INTO `tbl_generos` (`id_genero`, `genero`, `abreviatura`) 
		VALUES (NULL, 'Otro', 'O');

-- insertando datos en tbl_tipo_lugares
INSERT INTO `tbl_tipo_lugares` (`id_tipo_lugar`, `tipo_lugar`) 
		VALUES (NULL, 'Pais');

INSERT INTO `tbl_tipo_lugares` (`id_tipo_lugar`, `tipo_lugar`) 
		VALUES (NULL, 'Departamento');

INSERT INTO `tbl_tipo_lugares` (`id_tipo_lugar`, `tipo_lugar`) 
		VALUES (NULL, 'Municipio');

-- insertando en tbl_lugares
INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
		VALUES (NULL, '1',NULL,'Honduras');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
		VALUES (NULL, '2','1','Francisco Morazan');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
		VALUES (NULL, '3','2','Tegucigalpa');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
		VALUES (NULL, '2','1','Cortes');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
		VALUES (NULL, '3','2','San Pedro Sula');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
		VALUES (NULL, '2','1','La Esperanza');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
		VALUES (NULL, '3','2','Intibuca');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
		VALUES (NULL, '1',NULL,'Guatemala');

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`,`id_lugar_padre`,`nombre_lugar`) 
		VALUES (NULL, '2','1','Esquipulas');

-- insertando en tbl_tipo_usuarios
INSERT INTO `tbl_tipo_usuarios` (`id_tipo_usuario`, `tipo_usuario`) 
		VALUES (NULL, 'Administrador');

INSERT INTO `tbl_tipo_usuarios` (`id_tipo_usuario`, `tipo_usuario`) 
		VALUES (NULL, 'Instructor');

-- insertando en tbl_estado_articulos
INSERT INTO `tbl_estado_articulos` (`id_estado_articulo`, `estado_articulo`) 
		VALUES (NULL, 'Disponible');

INSERT INTO `tbl_estado_articulos` (`id_estado_articulo`, `estado_articulo`) 
		VALUES (NULL, 'No Disponible');

-- insertando en tbl_estado_solicitudes
INSERT INTO `tbl_estado_solicitudes` (`id_estado_solicitud`, `estado_solicitud`) 
		VALUES (NULL, 'Aceptada');

INSERT INTO `tbl_estado_solicitudes` (`id_estado_solicitud`, `estado_solicitud`) 
		VALUES (NULL, 'En espera');

INSERT INTO `tbl_estado_solicitudes` (`id_estado_solicitud`, `estado_solicitud`) 
		VALUES (NULL, 'Rechazada');

-- Insertando en tbl_personas
INSERT INTO `tbl_personas` (`id_persona`, 		
                            `id_lugar_nacimiento`,
                            `id_lugar_residencia`,
                            `id_genero`,
                            `primer_nombre`,
                            `segundo_nombre`,
                           	`primer_apellido`,
                            `segundo_apellido`,
                           	`identidad`,
                           	`telefono`,
                           	`email`,
                           	`fecha_nacimiento`) 
			VALUES (	   NULL, 
                    	  '1', 
                		  '3', 
                    	  '2',
                    	  'Pedro',
                           NULL,
                    	  'Perez',
                           NULL,
                   		  '0801199500045',
                    	   NULL,
                   		  'pedrop@gmail.com',
                   		   NULL);

-- insertando en tbl_usuarios
INSERT INTO `tbl_usuarios` (`id_persona_usuario`, 		
                            `id_tipo_usuario`,
                            `nombre_usuario`,
                            `clave_usuario`,
                            `fotografia`,
                            `numero_cuenta`) 
			VALUES (	  '1', 
                    	  '1', 
                		  'pedroP', 
                    	  '123456',
                    	   NULL,
                           NULL);