<?php
class dt_composicion_ambiental extends toba_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_ca.id_comp_amb,
			t_ca.nombre_comp_amb
		FROM
			composicion_ambiental as t_ca
		ORDER BY nombre_comp_amb";
		return toba::db('SIAN_sg')->consultar($sql);
	}


}
?>