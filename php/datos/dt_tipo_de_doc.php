<?php
class dt_tipo_de_doc extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_tipodoc, siglas FROM tipo_de_doc ORDER BY siglas";
		return toba::db('SIAN_sg')->consultar($sql);
	}

}

?>
