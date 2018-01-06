<?php
class dt_periodos extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_periodo, nombre_periodo FROM periodos ORDER BY nombre_periodo";
		return toba::db('SIAN_sg')->consultar($sql);
  }
}
?>
