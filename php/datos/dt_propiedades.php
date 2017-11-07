<?php
class dt_propiedades extends toba_datos_tabla
{
	function get_desPropiedades()
	{
		$sql = "SELECT id_propiedad, nombre_propiedad FROM propiedades ORDER BY nombre_propiedad";
		return toba::db('SIAN_sg')->consultar($sql);
	}

	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['nombre_propiedad'])) {
			$where[] = "nombre_propiedad ILIKE ".quote("%{$filtro['nombre_propiedad']}%");
		}
		$sql = "SELECT
			t_p.id_propiedad,
			t_p.nombre_propiedad,
			t_p.departamentos,
			t_tdp.nombre_tipopropiedad as id_tipo_propiedad_nombre,
			t_p.parent_id_propiedad,
			t_p.imagen
		FROM
			propiedades as t_p,
			tipo_de_propiedad as t_tdp
		WHERE
				t_p.id_tipo_propiedad = t_tdp.id_tipo_propiedad
		ORDER BY nombre_propiedad";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('SIAN_sg')->consultar($sql);
	}


}
?>