<?php
class dt_pais extends toba_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_p.id_pais,
			t_p.nombre_pais
		FROM
			pais as t_p
		ORDER BY nombre_pais";
		return toba::db('SIAN_sg')->consultar($sql);
	}


	function get_descripciones()
	{
		$sql = "SELECT id_pais, nombre_pais FROM pais ORDER BY nombre_pais";
		return toba::db('SIAN_sg')->consultar($sql);
	}


}
?>