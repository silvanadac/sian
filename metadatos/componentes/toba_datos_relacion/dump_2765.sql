------------------------------------------------------------
--[2765]--  - dr_personas 
------------------------------------------------------------

------------------------------------------------------------
-- apex_objeto
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_objeto (proyecto, objeto, anterior, identificador, reflexivo, clase_proyecto, clase, punto_montaje, subclase, subclase_archivo, objeto_categoria_proyecto, objeto_categoria, nombre, titulo, colapsable, descripcion, fuente_datos_proyecto, fuente_datos, solicitud_registrar, solicitud_obj_obs_tipo, solicitud_obj_observacion, parametro_a, parametro_b, parametro_c, parametro_d, parametro_e, parametro_f, usuario, creacion, posicion_botonera) VALUES (
	'SIAN_sg', --proyecto
	'2765', --objeto
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
	'- dr_personas', --nombre
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
	'2017-06-01 18:34:11', --creacion
	NULL  --posicion_botonera
);
--- FIN Grupo de desarrollo 0

------------------------------------------------------------
-- apex_objeto_datos_rel
------------------------------------------------------------
INSERT INTO apex_objeto_datos_rel (proyecto, objeto, debug, clave, ap, punto_montaje, ap_clase, ap_archivo, sinc_susp_constraints, sinc_orden_automatico, sinc_lock_optimista) VALUES (
	'SIAN_sg', --proyecto
	'2765', --objeto
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
	'1563', --dep_id
	'2765', --objeto_consumidor
	'2769', --objeto_proveedor
	'dt_correos', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'1'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1593', --dep_id
	'2765', --objeto_consumidor
	'2798', --objeto_proveedor
	'dt_cuenta', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	NULL  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1591', --dep_id
	'2765', --objeto_consumidor
	'2779', --objeto_proveedor
	'dt_domicilio', --identificador
	NULL, --parametros_a
	NULL, --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'6'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1564', --dep_id
	'2765', --objeto_consumidor
	'2770', --objeto_proveedor
	'dt_domicilio_x_persona', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'2'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1561', --dep_id
	'2765', --objeto_consumidor
	'2766', --objeto_proveedor
	'dt_personas', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'3'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1592', --dep_id
	'2765', --objeto_consumidor
	'2786', --objeto_proveedor
	'dt_requisito', --identificador
	NULL, --parametros_a
	NULL, --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'7'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1589', --dep_id
	'2765', --objeto_consumidor
	'2796', --objeto_proveedor
	'dt_requisitos_x_persona', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'5'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1562', --dep_id
	'2765', --objeto_consumidor
	'2767', --objeto_proveedor
	'dt_telefonos', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'4'  --orden
);
--- FIN Grupo de desarrollo 0

------------------------------------------------------------
-- apex_objeto_datos_rel_asoc
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2765', --objeto
	'56', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2766', --padre_objeto
	'dt_personas', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2767', --hijo_objeto
	'dt_telefonos', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'1'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2765', --objeto
	'57', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2766', --padre_objeto
	'dt_personas', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2769', --hijo_objeto
	'dt_correos', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'2'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2765', --objeto
	'58', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2766', --padre_objeto
	'dt_personas', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2770', --hijo_objeto
	'dt_domicilio_x_persona', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'3'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2765', --objeto
	'60', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2766', --padre_objeto
	'dt_personas', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2796', --hijo_objeto
	'dt_requisitos_x_persona', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'4'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2765', --objeto
	'61', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2766', --padre_objeto
	'dt_personas', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2798', --hijo_objeto
	'dt_cuenta', --hijo_id
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
	'2765', --objeto
	'56', --asoc_id
	'2766', --padre_objeto
	'1183', --padre_clave
	'2767', --hijo_objeto
	'1201'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2765', --objeto
	'57', --asoc_id
	'2766', --padre_objeto
	'1183', --padre_clave
	'2769', --hijo_objeto
	'1207'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2765', --objeto
	'58', --asoc_id
	'2766', --padre_objeto
	'1183', --padre_clave
	'2770', --hijo_objeto
	'1209'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2765', --objeto
	'60', --asoc_id
	'2766', --padre_objeto
	'1183', --padre_clave
	'2796', --hijo_objeto
	'1228'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2765', --objeto
	'61', --asoc_id
	'2766', --padre_objeto
	'1183', --padre_clave
	'2798', --hijo_objeto
	'1235'  --hijo_clave
);
