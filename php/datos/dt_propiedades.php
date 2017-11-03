<?php
class dt_propiedades extends toba_datos_tabla
{
	function get_desPropiedades()
	{
		$sql = "SELECT id_propiedad, nombre_propiedad FROM propiedades ORDER BY nombre_propiedad";
		return toba::db('SIAN_sg')->consultar($sql);
	}

}
?>
