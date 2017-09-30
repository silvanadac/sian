<?php
class cn_gestion_contratos extends SIAN_sg_cn
{
  //-----------------------------------------------------------------------------------
	//---- dr_gestion_contratos-------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function resetear()
	{
		$this->dep('dr_gestion_contratos')->resetear();
	}

	function sincronizar()
	{
		$this->dep('dr_gestion_contratos')->sincronizar();
	}
  //-----------------------------------------------------------------------------------
  //---- dt_contratos ----------------------------------------------------------
  //-----------------------------------------------------------------------------------

  function set_contratos($datos)
  {
    $this->dep('dr_gestion_contratos')->tabla('dt_contratos')->set($datos);
  }

  function cargar($seleccion)
  {
    $this->dep('dr_gestion_contratos')->cargar($seleccion);
  }

  function get_contratos()
  {
    $datos = $this->dep('dr_gestion_contratos')->tabla('dt_contratos')->get();
    return $datos;
  }
  function hay_cursor()
  {
    if ($this->dep('dr_gestion_contratos')->tabla('dt_contratos')->esta_cargada()) {
      return $this->dep('dr_gestion_contratos')->tabla('dt_contratos')->hay_cursor();
    }
  }

  function set_cursor($seleccion)
  {
    $id_fila = $this->dep('dr_gestion_contratos')->tabla('dt_contratos')->get_id_fila_condicion($seleccion)[0];
    $this->dep('dr_gestion_contratos')->tabla('dt_contratos')->set_cursor($id_fila);
  }

  function eliminar()
  {
    $this->dep('dr_gestion_contratos')->tabla('dt_contratos')->eliminar_todo();
  }
  //-----------------------------------------------------------------------------------
  //---- dt_roles ----------------------------------------------------------
  //-----------------------------------------------------------------------------------

  function procesar_filas_roles($datos)
  {
    $this->dep('dr_gestion_contratos')->tabla('dt_roles')->procesar_filas($datos);
  }
  function get_roles()
  {
    $datos = $this->dep('dr_gestion_contratos')->tabla('dt_roles')->get_filas();
    return $datos;
  }
  //-----------------------------------------------------------------------------------
  //---- dt_detalle_contrato ----------------------------------------------------------
  //-----------------------------------------------------------------------------------

  function procesar_filas_detalle_contrato($datos)
  {
    $this->dep('dr_gestion_contratos')->tabla('dt_detalle_contrato')->procesar_filas($datos);
  }
  function get_detalle_contrato()
  {
    $datos = $this->dep('dr_gestion_contratos')->tabla('dt_detalle_contrato')->get_filas();
    return $datos;
  }
}
?>
