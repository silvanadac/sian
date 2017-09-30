<?php
require_once('adebug.php');
/**
	*
	*/
class ci_abm_personas extends SIAN_sg_ci
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
		$this->cn()->set_personas($datos);
	}

	function conf__form(SIAN_sg_ei_formulario $form)
	{
		if (isset($this->s__datos['form'])) {
			$form->set_datos($this->s__datos['form']);
		} else {
			if ($this->cn()->hay_cursor()) {
				$datos = $this->cn()->get_personas();
				$this->s__datos['form'] = $datos;
				$form->set_datos($datos);
			}
		}

	}
	//-----------------------------------------------------------------------------------
	//---- form_ml_telefono -------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__form_ml_telefono__modificacion($datos)
	{
		$this->s__datos['form_ml_telefono'] = $datos;
		$this->cn()->procesar_filas_telefonos($datos);
	}

	function conf__form_ml_telefono(SIAN_sg_ei_formulario_ml $form_ml)
	{
				$datos = $this->cn()->get_telefono();
				$form_ml->set_datos($datos);
	}
	//-----------------------------------------------------------------------------------
	//---- form_ml_correo -------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__form_ml_correo__modificacion($datos)
	{
		$this->s__datos['form_ml_correo'] = $datos;
		$this->cn()->procesar_filas_correos($datos);
	}

	function conf__form_ml_correo(SIAN_sg_ei_formulario_ml $form_ml)
	{
		$datos = $this->cn()->get_correos();
		$form_ml->set_datos($datos);
	}
	//-----------------------------------------------------------------------------------
	//---- form_ml_domicilio -------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__form_ml_domicilio__modificacion($datos)
	{
		$this->s__datos['form_ml_domicilio'] = $datos;
		$this->cn()->procesar_filas_domicilio($datos);
	}

	function conf__form_ml_domicilio(SIAN_sg_ei_formulario_ml $form_ml)
	{
		$datos = $this->cn()->get_domicilio();
		$form_ml->set_datos($datos);
	}
	//-----------------------------------------------------------------------------------
	//---- form_cuenta -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__form_ml_cuenta__modificacion($datos)
	{
		$this->s__datos['form_ml_cuenta'] = $datos;
		$this->cn()->procesar_filas_cuenta($datos);
	}

	function conf__form_ml_cuenta(SIAN_sg_ei_formulario_ml $form_ml)
	{
		$datos = $this->cn()->get_cuenta();
		$form_ml->set_datos($datos);
	}
	//-----------------------------------------------------------------------------------
	//---- form_ml_requisitos -------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__form_ml_requisitos__modificacion($datos)
	{
		$this->s__datos['form_ml_requisitos'] = $datos;
		$this->cn()->set_requisitos($datos);
	}

	function conf__form_ml_requisitos(SIAN_sg_ei_formulario_ml $form_ml)
	{
		$datos = $this->cn()->get_requisitos();
		$form_ml->set_datos($datos);
	}

}
?>
