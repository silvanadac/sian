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
// 	function conf__form_datos_catastrales(SIAN_sg_ei_formulario $form)
// 	{
// 		 $this->s__datos['form_datos_catastrales'] = $datos;
// 	}
//
// 	function evt_form_datos_catastrales_modificacion($datos)
// 	{
// 		if ($this->cn()->hay_cursor()) { //Estamos editando un registro existente?
//  				$this->cn()->set_datos_catastrales($datos);
// 				} else {
// 					$this->cn()->set_datos_catastrales($datos);
//  					}
//  		$this->s__datos['form_datos_catastrales'] = $datos;
//  	}
	//-----------------------------------------------------------------------------------
	//---- form_ml_restricciones -------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__form_ml_restrcciones__modificacion($datos)
	{
		$this->s__datos['form_ml_restrcciones'] = $datos;
	}

	function conf__form_ml_restrcciones(SIAN_sg_ei_formulario_ml $form_ml)
	{
		if (isset($this->s__datos['form_ml_restrcciones'])) {
		$form_ml->set_datos($this->s__datos['form_ml_restrcciones']);
		} else {
			if ($this->cn()->hay_cursor()) {
				$datos = $this->cn()->get_restricciones();
				$this->s__datos['form_ml_restrcciones'] = $datos;
				$form_ml->set_datos($datos);
			}
		}
	}

	//-----------------------------------------------------------------------------------
	//---- form_ml_novedades -------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__form_ml_novedades__modificacion($datos)
	{
		$this->s__datos['form_ml_novedades'] = $datos;
	}

	function conf__form_ml_novedades(SIAN_sg_ei_formulario_ml $form_ml)
	{
		if (isset($this->s__datos['form_ml_novedades'])) {
		$form_ml->set_datos($this->s__datos['form_ml_novedades']);
		} else {
			if ($this->cn()->hay_cursor()) {
				$datos = $this->cn()->get_novedades();
				$this->s__datos['form_ml_novedades'] = $datos;
				$form_ml->set_datos($datos);
			}
		}
	}
	//-----------------------------------------------------------------------------------
	//---- form_ml_imagenes -------------------------------------------------------------
	//-----------------------------------------------------------------------------------
		function evt__form_ml_imagenes__modificacion($datos)
			{
				$anterior = $this->s__datos['form_ml_imagenes'];
				foreach ($anterior as $keya => $valuea) {
					foreach ($datos as $keyd => $valued) {
						if (isset($valuea['id_imagen'])){
							if (isset($valued['id_imagen'])){
								if ($valuea['id_imagen']=$valued['id_imagen']){
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
				$this->s__datos['form_ml_imagenes'] = $datos;
			}

			function conf__form_ml_requisitos(SIAN_sg_ei_formulario_ml $form_ml)
			{
				  if (isset($this->s__datos['form_ml_imagenes'])) {
						$datos = $this->s__datos['form_ml_imagenes'];
						$form_ml->set_datos($datos);
					} else if ($this->cn()->hay_cursor()) {
						$datos = $this->cn()->get_requisitos();
						$datos = $this->cn()->get_blobs($datos);
						$this->s__datos['form_ml_imagenes'] = $datos;
						$form_ml->set_datos($datos);
					}
			}


	function setear_todos_los_formularios()
		{
			if (isset($this->s__datos['form'])) {
				$this->cn()->set_propiedades($this->s__datos['form']);
			}
			if (isset ($this->s__datos['form_ml_com'])){
				$this->cn()->procesar_filas_comodidades($this->s__datos['form_ml_com']);
			}
			if (isset ($this->s__datos['form_ml_comp'])){
				$this->cn()->procesar_filas_composicion_ambiental($this->s__datos['form_ml_comp']);
			}
			// if (isset ($this->s__datos['form_datos_catastrales'])){
			// 	$this->cn()->procesar_filas_domicilio($this->s__datos['form_datos_catastrales']);
			// }
			if (isset ($this->s__datos['form_ml_restricciones'])){
				$this->cn()->procesar_filas_restricciones($this->s__datos['form_ml_restrcciones']);
			}
			if (isset ($this->s__datos['form_ml_novedades'])){
				$this->cn()->procesar_filas_novedades($this->s__datos['form_ml_novedades']);
			}
			if (isset ($this->s__datos['form_ml_imagenes'])){
				$this->cn()->procesar_filas_imagenes($this->s__datos['form_ml_imagenes']);
			}
		}
	}
?>
