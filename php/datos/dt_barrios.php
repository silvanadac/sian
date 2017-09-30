<?php
class dt_barrios extends toba_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_b.id_barrio,
			t_c.nombre_ciudad as id_ciudad_nombre,
			t_b.nombre_barrio
		FROM
			barrios as t_b,
			ciudades as t_c
		WHERE
				t_b.id_ciudad = t_c.id_ciudad
		ORDER BY nombre_barrio";
		return toba::db('SIAN_sg')->consultar($sql);
	}



	function get_descripciones()
	{
		$sql = "SELECT id_barrio, nombre_barrio FROM barrios ORDER BY nombre_barrio";
		return toba::db('SIAN_sg')->consultar($sql);
	}

}
?>