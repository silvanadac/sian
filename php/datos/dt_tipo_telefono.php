<?php
class dt_tipo_telefono extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_tipo_tel, nombre_tel FROM tipo_telefono ORDER BY nombre_tel";
		return toba::db('SIAN_sg')->consultar($sql);
	}

}

?>
