<?php
class dt_provincias extends toba_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_p.id_provincia,
			t_p1.nombre_pais as id_pais_nombre,
			t_p.nombre_provincia
		FROM
			provincias as t_p,
			pais as t_p1
		WHERE
				t_p.id_pais = t_p1.id_pais
		ORDER BY nombre_provincia";
		return toba::db('SIAN_sg')->consultar($sql);
	}


	function get_descripciones()
	{
		$sql = "SELECT id_provincia, nombre_provincia FROM provincias ORDER BY nombre_provincia";
		return toba::db('SIAN_sg')->consultar($sql);
	}


}
?>
