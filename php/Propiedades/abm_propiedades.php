<?php
require_once('adebug.php');
/**
	*
	*/
class abm_propiedades extends SIAN_sg_ci
{
//-----------------------------------------------------------------------------------
//---- form -------------------------------------------------------------------
//-----------------------------------------------------------------------------------
	function evt__form__modificacion($datos)
	{
		$this->s__datos['form'] = $datos;
	}

	function conf__form(SIAN_sg_ei_formulario $form)
	{
		$datos = $this->cn()->get_propiedades();
		$form->set_datos($datos);
	}

//-----------------------------------------------------------------------------------
//---- form_ml_com-------------------------------------------------------------
//-----------------------------------------------------------------------------------
	function evt__form_ml_com__modificacion($datos)
	{
		$this->s__datos['form_ml_com'] = $datos;
	}
	function conf__form_ml_com(SIAN_sg_ei_formulario_ml $form_ml)
	{
		$datos = $this->cn()->get_comodidades();
		$form_ml->set_datos($datos);
	}
//-----------------------------------------------------------------------------------
//---- form_ml_comp -------------------------------------------------------------
//-----------------------------------------------------------------------------------
	function evt__form_ml_comp__modificacion($datos)
	{
		$this->s__datos['form_ml_comp'] = $datos;
	}

	function conf__form_ml_comp(SIAN_sg_ei_formulario_ml $form_ml)
	{
		$datos = $this->cn()->get_composicion_ambiental();
		$form_ml->set_datos($datos);
	}

	function setear_todos_los_formularios()
	{
		if (isset($this->s__datos['form'])) {
        $this->cn()->set_propiedades($this->s__datos['form']);
	    }
		if (isset ($this->s__datos['form_ml_comp'])){
	      $this->cn()->procesar_filas_composicion_ambiental($this->s__datos['form_ml_comp']);
	    }
    if (isset ($this->s__datos['form_ml_com'])){
	      $this->cn()->procesar_filas_comodidades($this->s__datos['form_ml_com']);
      }
  	}
}
?>
