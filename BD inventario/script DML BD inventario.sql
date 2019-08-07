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
                            `fecha_registro`) 
			       VALUES (	  '1', 
                    	  '1', 
                		  'pedro1', 
                    	  '123456',
                    	   NULL,
                        '2019-07-25');

-- ----------------------------------------------------------------------------------------------------------
-- ACTUALIZACION 1 DE SCRIPT DML

-- insertando en tbl_categoria_articulos
INSERT INTO `tbl_categoria_articulos` (`id_categoria_articulos`,     
                            `nombre_categoria`) 
             VALUES (   NULL, 
                        'Computadoras');

INSERT INTO `tbl_categoria_articulos` (`id_categoria_articulos`,     
                            `nombre_categoria`) 
             VALUES (   NULL, 
                        'Proyectores');

INSERT INTO `tbl_categoria_articulos` (`id_categoria_articulos`,     
                            `nombre_categoria`) 
             VALUES (   NULL, 
                        'Cables');

-- insertando en tbl_articulos
INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`, 
                            `nombre_articulo`, `precio_articulo`, 
                            `cantidad`, `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`) 
            VALUES (NULL, 
                    '2', 
                    '1', 
                    'Computadora de Escritorio', 
                    NULL, 
                    '2', 
                    '2019-08-05', 
                    NULL, 
                    'Computadora de escritorio marca DELL para uso exclusivo de laboratorios');
    

INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`, 
                            `nombre_articulo`, `precio_articulo`, 
                            `cantidad`, `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`) 
            VALUES(NULL, 
                  '1', 
                  '1', 
                  'Proyector', 
                  NULL, 
                  '2', 
                  '2019-08-05', 
                  NULL, 
                  'proyector grande con todos sus componentes incluidos'); 

-- insertando en tbl_categorias_x_articulo
INSERT INTO `tbl_categorias_x_articulo` (`id_categoria_articulos`, `id_articulos`) VALUES ('1', '1'), 

INSERT INTO `tbl_categorias_x_articulo` (`id_categoria_articulos`, 
                                        `id_articulos`) 
          VALUES('2', '2');

-- insertando en tbl_estado_reporte
INSERT INTO `tbl_estado_reporte` (`id_estado_reporte`, 
                                  `estado_reporte`) 
          VALUES (NULL, 'En revision');

INSERT INTO `tbl_estado_reporte` (`id_estado_reporte`, 
                                  `estado_reporte`) 
          VALUES(NULL, 'Aceptado');

INSERT INTO `tbl_estado_reporte` (`id_estado_reporte`, 
                                  `estado_reporte`) 
          VALUES (NULL, 'Rechazado');

--insertando en tbl_tipo_reportes
INSERT INTO `tbl_tipo_reportes` (`id_tipo_reporte`, `tipo_reporte`) 
          VALUES (NULL, 'Estado de Equipos');

INSERT INTO `tbl_tipo_reportes` (`id_tipo_reporte`, 
                                `tipo_reporte`) 
          VALUES (NULL, 'Solicitudes de Equipo');

-- ---------------------------------------------------------------------------------------------------------
-- ACTUALIZACION 2 DE SCRIPT DML
--insertando en tbl_articulos
INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`, 
                            `nombre_articulo`, 
                            `precio_articulo`, 
                            `cantidad`, 
                            `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`) 
          VALUES (NULL, 
                  '1', 
                  '1', 
                  'Pantalla para proyectar', 
                  '2000.00', 
                  '2', 
                  '2019-08-02', 
                  NULL, 
                  'pantalla para proyeccion con todos sus accesorios, 
                  disponible para el prestamo')

INSERT INTO `tbl_articulos` (`id_articulos`, 
                            `id_estado_articulo`, 
                            `id_persona_usuario_registra`, 
                            `nombre_articulo`, 
                            `precio_articulo`, 
                            `cantidad`, 
                            `fecha_registro_art`, 
                            `fecha_salida_art`, 
                            `descripcion_articulo`)
          VALUES(NULL, 
                '2', 
                '1', 
                'Computadora Portátil', 
                NULL, 
                '1', 
                '2019-08-03',
                 NULL, 
                 'laptop marca hp para uso de instructores');

-- insertando en tbl_categorias_x_articulo
INSERT INTO `tbl_categorias_x_articulo` (`id_categoria_articulos`, 
                                        `id_articulos`) 
          VALUES ('2', '3');

INSERT INTO `tbl_categorias_x_articulo` (`id_categoria_articulos`, 
                                        `id_articulos`) 
          VALUES('1', '4');

