<?php
class dt_ciudades extends toba_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_c.id_ciudad,
			t_p.nombre_provincia as id_provincia_nombre,
			t_c.nombre_ciudad
		FROM
			ciudades as t_c,
			provincias as t_p
		WHERE
				t_c.id_provincia = t_p.id_provincia
		ORDER BY nombre_ciudad";
		return toba::db('SIAN_sg')->consultar($sql);
	}

	function get_descripciones()
	{
		$sql = "SELECT id_ciudad, nombre_ciUdad FROM ciudades ORDER BY nombre_ciudad";
		return toba::db('SIAN_sg')->consultar($sql);
	}

}
?>
