<?php
class dt_restricciones extends toba_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_r.id_restriccion,
			t_r.nombre_restriccion
		FROM
			restricciones as t_r
		ORDER BY nombre_restriccion";
		return toba::db('SIAN_sg')->consultar($sql);
	}

}

?>