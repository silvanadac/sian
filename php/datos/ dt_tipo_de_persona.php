<?php
class dt_tipo_de_persona extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_tipo_persona, descripcion FROM tipo_de_persona ORDER BY descripcion";
		return toba::db('SIAN_sg')->consultar($sql);
	}
}
