<?php
class dt_domicilio extends toba_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['barrio_id_barrio'])) {
			$where[] = "barrio_id_barrio = ".quote($filtro['barrio_id_barrio']);
		}
		if (isset($filtro['calle'])) {
			$where[] = "calle ILIKE ".quote("%{$filtro['calle']}%");
		}
		if (isset($filtro['id_pais'])) {
			$where[] = "id_pais = ".quote($filtro['id_pais']);
		}
		if (isset($filtro['id_provincia'])) {
			$where[] = "id_provincia = ".quote($filtro['id_provincia']);
		}
		if (isset($filtro['id_ciudad'])) {
			$where[] = "id_ciudad = ".quote($filtro['id_ciudad']);
		}
		$sql = "SELECT
			t_d.id_domicilio,
			t_b.nombre_barrio as barrio_id_barrio_nombre,
			t_d.calle,
			t_d.numero,
			t_d.edificio,
			t_d.piso,
			t_d.depto,
			t_d.id_pais,
			t_d.id_provincia,
			t_d.id_ciudad
		FROM
			domicilio as t_d,
			barrios as t_b
		WHERE
				t_d.barrio_id_barrio = t_b.id_barrio
		ORDER BY calle";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('SIAN_sg')->consultar($sql);
	}

}

?>