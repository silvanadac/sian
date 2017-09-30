<?php
require_once('adebug.php');
/**
	*
	*/
class abm_propiedades extends SIAN_sg_ci
{
	//-----------------------------------------------------------------------------------
	//---- Variables -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	protected $sql_state;
	protected $s__datos;
	protected $s__datos_filtro;

	//-----------------------------------------------------------------------------------
	//---- Eventos -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__procesar()
	{
		try {
			$this->cn()->sincronizar();
			$this->cn()->resetear();
			$this->set_pantalla('pant_inicial');
		} catch (toba_error_db $e) {

		if (adebug::$debug) {
		throw $e;
		} else {
		$this->cn()->resetear();
		$sql_state = $e->get_sqlstate();
		if ($sql_state == 'db_23505') {
			throw new toba_error_usuario('Ya existe la propiedad');
		}
		}
	$this->cn()->resetear();
	}
	}

	function evt__volver()
	{
		unset($this->s__datos);
	$this->dep('abm_propiedades')->disparar_limpieza_memoria();
	$this->cn()->resetear();
	$this->dep('ci_propiedades')->set_pantalla('pant_inicial');
	}

	//-----------------------------------------------------------------------------------
	//---- form -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__form__modificacion($datos)
	{
	$this->s__datos['form'] = $datos;
	$this->cn()->set_propiedades($datos);
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
		$this->cn()->procesar_filas_comodidades($datos);
	}

	function conf__form_ml_com(SIAN_sg_ei_formulario_ml $form_ml)
	{
		if (isset($this->s__datos['form_ml_com'])) {
		$form_ml->set_datos($this->s__datos['form_ml_com']);
		} else {
			if ($this->cn()->hay_cursor()) {
				$datos = $this->cn()->get_comodidades();
				$this->s__datos['form_ml_com'] = $datos;
				$form_ml->set_datos($datos);
			}
		}
	}
	//-----------------------------------------------------------------------------------
	//---- form_ml_comp -------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__form_ml_comp__modificacion($datos)
	{
		$this->s__datos['form_ml_comp'] = $datos;
		$this->cn()->procesar_filas_composicion_ambiental($datos);
	}

	function conf__form_ml_comp(SIAN_sg_ei_formulario_ml $form_ml)
	{
		if (isset($this->s__datos['form_ml_comp'])) {
		$form_ml->set_datos($this->s__datos['form_ml_comp']);
		} else {
			if ($this->cn()->hay_cursor()) {
				$datos = $this->cn()->get_composicion_ambiental();
				$this->s__datos['form_ml_comp'] = $datos;
				$form_ml->set_datos($datos);
			}
		}
	}
	//-----------------------------------------------------------------------------------
	//---- form_datos_catastrales -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__form_datos_catastrales__modificacion($datos)
	{
		$this->s__datos['form_datos_catastrales'] = $datos;
		$this->cn()->set_datos_catastrales($datos);
	}

	function conf__form_datos_catastrales(SIAN_sg_ei_formulario $form)
	{
		if (isset($this->s__datos['form_datos_catastrales'])) {
			$form->set_datos($this->s__datos['form_datos_catastrales']);
			}
			else {
			    if ($this->cn()->hay_cursor_datos()) {
			        $datos = $this->cn()->get_datos_catastrales();
			        $this->s__datos['form_datos_catastrales'] = $datos;
			        $form->set_datos($datos);
			    }
			}
	}
	// //-----------------------------------------------------------------------------------
	// //---- form_ml_domicilio -------------------------------------------------------------
	// //-----------------------------------------------------------------------------------
	// function evt__form_ml_domicilio__modificacion($datos)
	// {
	//     $this->s__datos['form_ml_domicilio'] = $datos;
	//     $this->cn()->procesar_filas_domicilio($datos);
	// }
	//
	// function conf__form_ml_domicilio(SIAN_sg_ei_formulario_ml $form_ml)
	// {
	//     if (isset($this->s__datos['form_ml_domicilio'])) {
	//     $form_ml->set_datos($this->s__datos['form_ml_domicilio']);
	//     } else {
	//         if ($this->cn()->hay_cursor()) {
	//             $datos = $this->cn()->get_domicilio();
	//             $this->s__datos['form_ml_domicilio'] = $datos;
	//             $form_ml->set_datos($datos);
	//         }
	//     }
	// }
}
?>
