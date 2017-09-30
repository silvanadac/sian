<?php
class dt_estado_civil extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_estado_civil, nombre_estadocivil FROM estado_civil ORDER BY nombre_estadocivil";
		return toba::db('SIAN_sg')->consultar($sql);
  }
}
