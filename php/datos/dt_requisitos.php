<?php
class dt_requisitos extends toba_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_r.id_requisito,
			t_r.nombre_requisito
		FROM
			requisitos as t_r
		ORDER BY nombre_requisito";
		return toba::db('SIAN_sg')->consultar($sql);
	}


}
?>