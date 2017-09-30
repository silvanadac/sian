<?php
class dt_tipo_de_iva extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_iva, nombre_iva FROM tipo_de_iva ORDER BY nombre_iva";
		return toba::db('SIAN_sg')->consultar($sql);
  }
}
