<?php
class dt_empresa_com extends toba_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['nombre_emp'])) {
			$where[] = "nombre_emp ILIKE ".quote("%{$filtro['nombre_emp']}%");
		}
		$sql = "SELECT
			t_ec.id_empresa_com,
			t_ec.nombre_emp
		FROM
			empresa_com as t_ec
		ORDER BY nombre_emp";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('SIAN_sg')->consultar($sql);
	}

}

?>