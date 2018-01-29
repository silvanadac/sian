<?php
class cn_gestion_autorizaciones extends SIAN_sg_cn
{
	//-----------------------------------------------------------------------------------
	//---- dr_gestion_autorizaciones-------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function resetear()
	{
		$this->dep('dr_gestion_autorizaciones')->resetear();
	}

	function sincronizar()
	{
		$this->dep('dr_gestion_autorizaciones')->sincronizar();
	}

	//-----------------------------------------------------------------------------------
	//---- dt_autorizaciones ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function set_autorizaciones($datos)
	{
		$this->dep('dr_gestion_autorizaciones')->tabla('dt_autorizaciones')->set($datos);
	}

	function cargar($seleccion)
	{
		$this->dep('dr_gestion_autorizaciones')->cargar($seleccion);
	}

	function get_autorizaciones()
	{
		$datos = $this->dep('dr_gestion_autorizaciones')->tabla('dt_autorizaciones')->get();
		return $datos;
	}
	function hay_cursor()
	{
		if ($this->dep('dr_gestion_autorizaciones')->tabla('dt_autorizaciones')->esta_cargada()) {
			return $this->dep('dr_gestion_autorizaciones')->tabla('dt_autorizaciones')->hay_cursor();
		}
	}

	function set_cursor($seleccion)
	{
		$id_fila = $this->dep('dr_gestion_autorizaciones')->tabla('dt_autorizaciones')->get_id_fila_condicion($seleccion)[0];
		$this->dep('dr_gestion_autorizaciones')->tabla('dt_autorizaciones')->set_cursor($id_fila);
	}

	function eliminar()
	{
		$this->dep('dr_gestion_autorizaciones')->tabla('dt_autorizaciones')->eliminar_todo();
	}
}
?>
