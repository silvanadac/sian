------------------------------------------------------------
--[2899]--  - dr_propiedades 
------------------------------------------------------------

------------------------------------------------------------
-- apex_objeto
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_objeto (proyecto, objeto, anterior, identificador, reflexivo, clase_proyecto, clase, punto_montaje, subclase, subclase_archivo, objeto_categoria_proyecto, objeto_categoria, nombre, titulo, colapsable, descripcion, fuente_datos_proyecto, fuente_datos, solicitud_registrar, solicitud_obj_obs_tipo, solicitud_obj_observacion, parametro_a, parametro_b, parametro_c, parametro_d, parametro_e, parametro_f, usuario, creacion, posicion_botonera) VALUES (
	'SIAN_sg', --proyecto
	'2899', --objeto
	NULL, --anterior
	NULL, --identificador
	NULL, --reflexivo
	'toba', --clase_proyecto
	'toba_datos_relacion', --clase
	'23', --punto_montaje
	NULL, --subclase
	NULL, --subclase_archivo
	NULL, --objeto_categoria_proyecto
	NULL, --objeto_categoria
	'- dr_propiedades', --nombre
	NULL, --titulo
	NULL, --colapsable
	NULL, --descripcion
	'SIAN_sg', --fuente_datos_proyecto
	'SIAN_sg', --fuente_datos
	NULL, --solicitud_registrar
	NULL, --solicitud_obj_obs_tipo
	NULL, --solicitud_obj_observacion
	NULL, --parametro_a
	NULL, --parametro_b
	NULL, --parametro_c
	NULL, --parametro_d
	NULL, --parametro_e
	NULL, --parametro_f
	NULL, --usuario
	'2017-10-28 14:41:02', --creacion
	NULL  --posicion_botonera
);
--- FIN Grupo de desarrollo 0

------------------------------------------------------------
-- apex_objeto_datos_rel
------------------------------------------------------------
INSERT INTO apex_objeto_datos_rel (proyecto, objeto, debug, clave, ap, punto_montaje, ap_clase, ap_archivo, sinc_susp_constraints, sinc_orden_automatico, sinc_lock_optimista) VALUES (
	'SIAN_sg', --proyecto
	'2899', --objeto
	'0', --debug
	NULL, --clave
	'2', --ap
	'23', --punto_montaje
	NULL, --ap_clase
	NULL, --ap_archivo
	'0', --sinc_susp_constraints
	'1', --sinc_orden_automatico
	'1'  --sinc_lock_optimista
);

------------------------------------------------------------
-- apex_objeto_dependencias
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1694', --dep_id
	'2899', --objeto_consumidor
	'2904', --objeto_proveedor
	'dt_domicilio_x_propiedad', --identificador
	'1', --parametros_a
	NULL, --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'4'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1699', --dep_id
	'2899', --objeto_consumidor
	'2895', --objeto_proveedor
	'dt_imagenes', --identificador
	NULL, --parametros_a
	NULL, --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'6'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1692', --dep_id
	'2899', --objeto_consumidor
	'2901', --objeto_proveedor
	'dt_propiedad_x_comodidad', --identificador
	NULL, --parametros_a
	NULL, --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'2'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1693', --dep_id
	'2899', --objeto_consumidor
	'2902', --objeto_proveedor
	'dt_propiedad_x_composicion', --identificador
	NULL, --parametros_a
	NULL, --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'3'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1696', --dep_id
	'2899', --objeto_consumidor
	'2913', --objeto_proveedor
	'dt_propiedad_x_restriccion', --identificador
	NULL, --parametros_a
	NULL, --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'5'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1687', --dep_id
	'2899', --objeto_consumidor
	'2900', --objeto_proveedor
	'dt_propiedades', --identificador
	NULL, --parametros_a
	NULL, --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'1'  --orden
);
--- FIN Grupo de desarrollo 0

------------------------------------------------------------
-- apex_objeto_datos_rel_asoc
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2899', --objeto
	'72', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2900', --padre_objeto
	'dt_propiedades', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2901', --hijo_objeto
	'dt_propiedad_x_comodidad', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'1'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2899', --objeto
	'73', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2900', --padre_objeto
	'dt_propiedades', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2902', --hijo_objeto
	'dt_propiedad_x_composicion', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'2'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2899', --objeto
	'74', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2900', --padre_objeto
	'dt_propiedades', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2904', --hijo_objeto
	'dt_domicilio_x_propiedad', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'3'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2899', --objeto
	'75', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2900', --padre_objeto
	'dt_propiedades', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2913', --hijo_objeto
	'dt_propiedad_x_restriccion', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'4'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2899', --objeto
	'76', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2900', --padre_objeto
	'dt_propiedades', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2895', --hijo_objeto
	'dt_imagenes', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'5'  --orden
);
--- FIN Grupo de desarrollo 0

------------------------------------------------------------
-- apex_objeto_rel_columnas_asoc
------------------------------------------------------------
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2899', --objeto
	'72', --asoc_id
	'2900', --padre_objeto
	'1314', --padre_clave
	'2901', --hijo_objeto
	'1321'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2899', --objeto
	'73', --asoc_id
	'2900', --padre_objeto
	'1314', --padre_clave
	'2902', --hijo_objeto
	'1322'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2899', --objeto
	'74', --asoc_id
	'2900', --padre_objeto
	'1314', --padre_clave
	'2904', --hijo_objeto
	'1330'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2899', --objeto
	'75', --asoc_id
	'2900', --padre_objeto
	'1314', --padre_clave
	'2913', --hijo_objeto
	'1341'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2899', --objeto
	'76', --asoc_id
	'2900', --padre_objeto
	'1314', --padre_clave
	'2895', --hijo_objeto
	'1313'  --hijo_clave
);
