<?php
class dt_personas extends toba_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_p.id_persona,
			t_p.nombre,
			t_p.apellidos,
			t_p.apoderado,
			t_p.razon_social,
			t_p.cuit_cuil,
			t_p.nro_doc,
			t_p.fecha_nacimiento,
			t_p.nacionalidad,
			t_p.hijos,
			t_p.cantidad_hijos,
			t_p.mascotas,
			t_p.vehiculos,
			t_tdi.nombre_iva as id_iva_nombre,
			t_tdp.descripcion as id_tipo_persona_nombre,
			t_ec.nombre_estadocivil as id_estado_civil_nombre,
			t_tdd.descripcion as id_tipodoc_nombre
		FROM
			personas as t_p	LEFT OUTER JOIN estado_civil as t_ec ON (t_p.id_estado_civil = t_ec.id_estado_civil),
			tipo_de_iva as t_tdi,
			tipo_de_persona as t_tdp,
			tipo_de_doc as t_tdd
		WHERE
				t_p.id_iva = t_tdi.id_iva
			AND  t_p.id_tipo_persona = t_tdp.id_tipo_persona
			AND  t_p.id_tipodoc = t_tdd.id_tipodoc
		ORDER BY nombre";
		return toba::db('SIAN_sg')->consultar($sql);
	}


}
?>