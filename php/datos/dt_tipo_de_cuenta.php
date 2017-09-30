<?php
class dt_tipo_de_cuenta extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_tipo_cuenta, nombre_cuenta FROM tipo_de_cuenta ORDER BY nombre_cuenta";
		return toba::db('SIAN_sg')->consultar($sql);
	}

}

?>
