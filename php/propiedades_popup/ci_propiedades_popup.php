<?php
require_once('Propiedades/dao_propiedades.php');
class ci_propiedades_popup extends toba_ci
{
	protected $s__datos_filtro;
	protected $s__datos;
	protected $sql_state;
//-----------------------------------------------------------------------------------
//---- filtro -------------------------------------------------------------------
//-----------------------------------------------------------------------------------
	function conf__filtro(toba_ei_filtro $filtro)
	{
		if (isset($this->s__datos_filtro)) {
			$filtro->set_datos($this->s__datos_filtro);
			}
	}

	function evt__filtro__filtrar($datos)
	{
		$this->s__datos_filtro = $datos;
	}

	function evt__filtro__cancelar()
	{
		unset($this->s__datos_filtro);
	}

//---- Cuadro -----------------------------------------------------------------------

	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		$cuadro->desactivar_modo_clave_segura();
		if (isset($this->s__datos_filtro)) {
				$filtro = $this->dep('filtro');
				$filtro->set_datos($this->s__datos_filtro);
				$sql_where = $filtro->get_sql_where();
				$datos = dao_propiedades::get_lista_propiedades($sql_where);
				$cuadro->set_datos($datos);
			}
	}

	function evt__cuadro__seleccion($datos)
	{
		$this->dep('datos')->cargar($datos);
	}

}

?>
