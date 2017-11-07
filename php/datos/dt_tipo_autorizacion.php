<?php
class dt_tipo_autorizacion extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_tipo_autorizacion, nombre_tipo_aut FROM tipo_autorizacion ORDER BY nombre_tipo_aut";
		return toba::db('SIAN_sg')->consultar($sql);
  }
}
?>
