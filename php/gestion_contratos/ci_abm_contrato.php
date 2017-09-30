<?php
require_once('adebug.php');
/**
	*
	*/
class ci_abm_contrato extends SIAN_sg_ci
{
	//-----------------------------------------------------------------------------------
	//---- Variables -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	protected $sql_state;
	protected $s__datos;

	//-----------------------------------------------------------------------------------
	//---- form -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__form__modificacion($datos)
	{
		$this->s__datos['form'] = $datos;
		$this->cn()->set_contratos($datos);
	}

	function conf__form(SIAN_sg_ei_formulario $form)
	{
		if (isset($this->s__datos['form'])) {
			$form->set_datos($this->s__datos['form']);
		} else {
			if ($this->cn()->hay_cursor()) {
				$datos = $this->cn()->get_contratos();
				$this->s__datos['form'] = $datos;
				$form->set_datos($datos);
			}
		}

	}
	//-----------------------------------------------------------------------------------
	//---- form_ml_roles -------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__form_ml_roles__modificacion($datos)
	{
		$this->s__datos['form_ml_roles'] = $datos;
		$this->cn()->procesar_filas_roles($datos);
	}

	function conf__form_ml_roles(SIAN_sg_ei_formulario_ml $form_ml)
	{
				$datos = $this->cn()->get_roles();
				$form_ml->set_datos($datos);
	}

}
?>
