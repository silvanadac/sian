------------------------------------------------------------
--[2716]--  - dr_propiedades 
------------------------------------------------------------

------------------------------------------------------------
-- apex_objeto
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_objeto (proyecto, objeto, anterior, identificador, reflexivo, clase_proyecto, clase, punto_montaje, subclase, subclase_archivo, objeto_categoria_proyecto, objeto_categoria, nombre, titulo, colapsable, descripcion, fuente_datos_proyecto, fuente_datos, solicitud_registrar, solicitud_obj_obs_tipo, solicitud_obj_observacion, parametro_a, parametro_b, parametro_c, parametro_d, parametro_e, parametro_f, usuario, creacion, posicion_botonera) VALUES (
	'SIAN_sg', --proyecto
	'2716', --objeto
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
	'2017-05-26 09:01:26', --creacion
	NULL  --posicion_botonera
);
--- FIN Grupo de desarrollo 0

------------------------------------------------------------
-- apex_objeto_datos_rel
------------------------------------------------------------
INSERT INTO apex_objeto_datos_rel (proyecto, objeto, debug, clave, ap, punto_montaje, ap_clase, ap_archivo, sinc_susp_constraints, sinc_orden_automatico, sinc_lock_optimista) VALUES (
	'SIAN_sg', --proyecto
	'2716', --objeto
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
	'1616', --dep_id
	'2716', --objeto_consumidor
	'2824', --objeto_proveedor
	'dt_datos_catastrales', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'1'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1615', --dep_id
	'2716', --objeto_consumidor
	'2823', --objeto_proveedor
	'dt_domicilio_x_propiedad', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'2'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1644', --dep_id
	'2716', --objeto_consumidor
	'2852', --objeto_proveedor
	'dt_novedades', --identificador
	NULL, --parametros_a
	NULL, --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'6'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1558', --dep_id
	'2716', --objeto_consumidor
	'2762', --objeto_proveedor
	'dt_propiedad_x_comodidad', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'4'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1557', --dep_id
	'2716', --objeto_consumidor
	'2761', --objeto_proveedor
	'dt_propiedad_x_composicion', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'5'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1654', --dep_id
	'2716', --objeto_consumidor
	'2862', --objeto_proveedor
	'dt_propiedad_x_restriccion', --identificador
	NULL, --parametros_a
	NULL, --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'7'  --orden
);
INSERT INTO apex_objeto_dependencias (proyecto, dep_id, objeto_consumidor, objeto_proveedor, identificador, parametros_a, parametros_b, parametros_c, inicializar, orden) VALUES (
	'SIAN_sg', --proyecto
	'1515', --dep_id
	'2716', --objeto_consumidor
	'2717', --objeto_proveedor
	'dt_propiedades', --identificador
	'', --parametros_a
	'', --parametros_b
	NULL, --parametros_c
	NULL, --inicializar
	'3'  --orden
);
--- FIN Grupo de desarrollo 0

------------------------------------------------------------
-- apex_objeto_datos_rel_asoc
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2716', --objeto
	'62', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2717', --padre_objeto
	'dt_propiedades', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2762', --hijo_objeto
	'dt_propiedad_x_comodidad', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'1'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2716', --objeto
	'63', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2717', --padre_objeto
	'dt_propiedades', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2761', --hijo_objeto
	'dt_propiedad_x_composicion', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'2'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2716', --objeto
	'64', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2717', --padre_objeto
	'dt_propiedades', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2823', --hijo_objeto
	'dt_domicilio_x_propiedad', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'3'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2716', --objeto
	'65', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2717', --padre_objeto
	'dt_propiedades', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2824', --hijo_objeto
	'dt_datos_catastrales', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'4'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2716', --objeto
	'69', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2717', --padre_objeto
	'dt_propiedades', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2852', --hijo_objeto
	'dt_novedades', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'5'  --orden
);
INSERT INTO apex_objeto_datos_rel_asoc (proyecto, objeto, asoc_id, identificador, padre_proyecto, padre_objeto, padre_id, padre_clave, hijo_proyecto, hijo_objeto, hijo_id, hijo_clave, cascada, orden) VALUES (
	'SIAN_sg', --proyecto
	'2716', --objeto
	'70', --asoc_id
	NULL, --identificador
	'SIAN_sg', --padre_proyecto
	'2717', --padre_objeto
	'dt_propiedades', --padre_id
	NULL, --padre_clave
	'SIAN_sg', --hijo_proyecto
	'2862', --hijo_objeto
	'dt_propiedad_x_restriccion', --hijo_id
	NULL, --hijo_clave
	NULL, --cascada
	'6'  --orden
);
--- FIN Grupo de desarrollo 0

------------------------------------------------------------
-- apex_objeto_rel_columnas_asoc
------------------------------------------------------------
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2716', --objeto
	'62', --asoc_id
	'2717', --padre_objeto
	'1146', --padre_clave
	'2762', --hijo_objeto
	'1182'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2716', --objeto
	'63', --asoc_id
	'2717', --padre_objeto
	'1146', --padre_clave
	'2761', --hijo_objeto
	'1179'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2716', --objeto
	'64', --asoc_id
	'2717', --padre_objeto
	'1146', --padre_clave
	'2823', --hijo_objeto
	'1246'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2716', --objeto
	'65', --asoc_id
	'2717', --padre_objeto
	'1146', --padre_clave
	'2824', --hijo_objeto
	'1256'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2716', --objeto
	'69', --asoc_id
	'2717', --padre_objeto
	'1146', --padre_clave
	'2852', --hijo_objeto
	'1284'  --hijo_clave
);
INSERT INTO apex_objeto_rel_columnas_asoc (proyecto, objeto, asoc_id, padre_objeto, padre_clave, hijo_objeto, hijo_clave) VALUES (
	'SIAN_sg', --proyecto
	'2716', --objeto
	'70', --asoc_id
	'2717', --padre_objeto
	'1146', --padre_clave
	'2862', --hijo_objeto
	'1286'  --hijo_clave
);
