<?php
class dt_comodidades extends toba_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_c.id_comodidad,
			t_c.nombre_comodidad
		FROM
			comodidades as t_c
		ORDER BY nombre_comodidad";
		return toba::db('SIAN_sg')->consultar($sql);
	}


}
?>