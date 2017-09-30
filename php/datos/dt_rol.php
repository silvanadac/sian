<?php
class dt_rol extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_rol, nombre_rol FROM rol ORDER BY nombre_rol";
		return toba::db('SIAN_sg')->consultar($sql);
	}

}

?>
