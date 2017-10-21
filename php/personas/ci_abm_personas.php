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
			$anterior = $this->s__datos['form_ml_requisitos'];
			foreach ($anterior as $keya => $valuea) {
				foreach ($datos as $keyd => $valued) {
					if (isset($valuea['id_requisito'])){
						if (isset($valued['id_requisito'])){
							if ($valuea['id_requisito']=$valued['id_requisito']){
								if (isset($valuea['imagen']) && !isset($valued['imagen'])){
									$datos[$keyd]['imagen'] = $valuea['imagen'];
									$datos[$keyd]['imagen?html'] = $valuea['imagen?html'];
									$datos[$keyd]['imagen?url'] = $valuea['imagen?url'];
								}
							}
						}
					}
				}
			}
			$this->s__datos['form_ml_requisitos'] = $datos;
		}

		function conf__form_ml_requisitos(SIAN_sg_ei_formulario_ml $form_ml)
		{
			  if (isset($this->s__datos['form_ml_requisitos'])) {
					$datos = $this->s__datos['form_ml_requisitos'];
					$form_ml->set_datos($datos);
				} else if ($this->cn()->hay_cursor()) {
					$datos = $this->cn()->get_requisitos();
					$datos = $this->cn()->get_blobs($datos);
					$this->s__datos['form_ml_requisitos'] = $datos;
					$form_ml->set_datos($datos);
				}
		}

		function setear_todos_los_formularios()
			{
				if (isset($this->s__datos['form'])) {
					$this->cn()->set_personas($this->s__datos['form']);
				}
				if (isset ($this->s__datos['form_ml_telefono'])){
					$this->cn()->procesar_filas_telefonos($this->s__datos['form_ml_telefono']);
				}
				if (isset ($this->s__datos['form_ml_correo'])){
					$this->cn()->procesar_filas_correos($this->s__datos['form_ml_correo']);
				}
				if (isset ($this->s__datos['form_ml_domicilio'])){
					$this->cn()->procesar_filas_domicilio($this->s__datos['form_ml_domicilio']);
				}
				if (isset ($this->s__datos['form_ml_cuenta'])){
					$this->cn()->procesar_filas_cuenta($this->s__datos['form_ml_cuenta']);
				}
				if (isset ($this->s__datos['form_ml_requisitos'])){
					$this->cn()->procesar_filas_requisitos($this->s__datos['form_ml_requisitos']);
					$this->cn()->set_blobs($this->s__datos['form_ml_requisitos']);
				}
			}
}
?>
