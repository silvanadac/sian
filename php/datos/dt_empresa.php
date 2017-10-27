<?php
class dt_empresa extends toba_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_e.cuit_empresa,
			t_e.nombre_empresa,
			t_e.email,
			t_e.logo,
			t_e.direccion,
			t_e.tel_cel,
			t_e.tipo_iva
		FROM
			empresa as t_e
		ORDER BY nombre_empresa";
		return toba::db('SIAN_sg')->consultar($sql);
	}

}

?>