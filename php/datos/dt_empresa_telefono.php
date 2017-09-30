<?php
class dt_empresa_telefono extends toba_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_emp_tel, nombre_linea FROM empresa_telefono ORDER BY nombre_linea";
		return toba::db('SIAN_sg')->consultar($sql);
  }
}
?>
