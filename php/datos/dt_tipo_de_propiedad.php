<?php
class dt_tipo_de_propiedad extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_tipo_propiedad, nombre_tipopropiedad FROM tipo_de_propiedad ORDER BY nombre_tipopropiedad";
		return toba::db('SIAN_sg')->consultar($sql);
	}


}
?>