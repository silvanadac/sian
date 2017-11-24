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
	function evt__form_ml_comodidades__modificacion($datos)
	{
		$this->s__datos['form_ml_comodidades'] = $datos;
	}
	function conf__form_ml_comodidades(SIAN_sg_ei_formulario_ml $form_ml)
	{
		$datos = $this->cn()->get_comodidades();
		$form_ml->set_datos($datos);
	}
//-----------------------------------------------------------------------------------
//---- form_ml_comp -------------------------------------------------------------
//-----------------------------------------------------------------------------------
	function evt__form_ml_composicion__modificacion($datos)
	{
		$this->s__datos['form_ml_composicion'] = $datos;
	}

	function conf__form_ml_composicion(SIAN_sg_ei_formulario_ml $form_ml)
	{
		$datos = $this->cn()->get_composicion_ambiental();
		$form_ml->set_datos($datos);
	}

//-----------------------------------------------------------------------------------
//---- form_ml_domicilio_x_propiedad -------------------------------------------------------------
//-----------------------------------------------------------------------------------
	function evt__form_ml_domicilio_x_propiedad__modificacion($datos)
	{
		$this->s__datos['form_ml_domicilio_x_propiedad'] = $datos;
	}

	function conf__form_ml_domicilio_x_propiedad(SIAN_sg_ei_formulario_ml $form_ml)
	{
			$datos = $this->cn()->get_domicilio();
			if($datos){
				$form_ml->set_datos($datos);
			} else{
				$form_ml->set_registro_nuevo();
			}

	}
//-----------------------------------------------------------------------------------
//---- form_ml_datos_catastrales -------------------------------------------------------------------
//-----------------------------------------------------------------------------------
	function evt__form_ml_datos_catastrales_modificacion($datos)
	{
		$this->s__datos['form_ml_datos_catastrales'] = $datos;
	}

	function conf__form_ml_datos_catastrales(SIAN_sg_ei_formulario_ml $form_ml)
	{
		$datos = $this->cn()->get_datos_catastrales();
		$form_ml->set_datos($datos);
	}

//-----------------------------------------------------------------------------------
//---- form_ml_restricciones -------------------------------------------------------------
//-----------------------------------------------------------------------------------
	function evt__form_ml_restricciones__modificacion($datos)
	{
		$this->s__datos['form_ml_restricciones'] = $datos;
	}

	function conf__form_ml_restricciones(SIAN_sg_ei_formulario_ml $form_ml)
	{
		$datos = $this->cn()->get_restricciones();
		$form_ml->set_datos($datos);
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

		function conf__form_ml_imagenes(SIAN_sg_ei_formulario_ml $form_ml)
		{
				if (isset($this->s__datos['form_ml_imagenes'])) {
					$datos = $this->s__datos['form_ml_imagenes'];
					$form_ml->set_datos($datos);
				} else if ($this->cn()->hay_cursor()) {
					$datos = $this->cn()->get_imagenes();
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
		if (isset ($this->s__datos['form_ml_composicion'])){
	      $this->cn()->procesar_filas_composicion_ambiental($this->s__datos['form_ml_composicion']);
	    }
    if (isset ($this->s__datos['form_ml_comodidades'])){
	      $this->cn()->procesar_filas_comodidades($this->s__datos['form_ml_comodidades']);
      }
		if (isset ($this->s__datos['form_ml_domicilio_x_propiedad'])){
		    $this->cn()->procesar_filas_domicilio($this->s__datos['form_ml_domicilio_x_propiedad']);
	    }
		if (isset($this->s__datos['form_ml_datos_catastrales'])) {
	      $this->cn()->procesar_filas_datos_catastrales($this->s__datos['form_ml_datos_catastrales']);
	    }
		if (isset ($this->s__datos['form_ml_restricciones'])){
		    $this->cn()->procesar_filas_restricciones($this->s__datos['form_ml_restricciones']);
	    }
		if (isset ($this->s__datos['form_ml_imagenes'])){
			$this->cn()->procesar_filas_imagenes($this->s__datos['form_ml_imagenes']);
			$this->cn()->set_blobs($this->s__datos['form_ml_imagenes']);
		}
	}
}
?>
