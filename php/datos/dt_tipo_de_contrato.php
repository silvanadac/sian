<?php
class dt_tipo_de_contrato extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_tipo_de_contrato, nombre_contrato FROM tipo_de_contrato ORDER BY nombre_contrato";
		return toba::db('SIAN_sg')->consultar($sql);
	}

}

?>
