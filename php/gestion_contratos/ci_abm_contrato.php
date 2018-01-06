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
	//-----------------------------------------------------------------------------------
	//---- form_ml_detalle -------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__form_ml_detalle__modificacion($datos)
	{
		$this->s__datos['form_ml_detalle'] = $datos;
		$this->cn()->procesar_filas_detalle($datos);
	}

	function conf__form_ml_detalle(SIAN_sg_ei_formulario_ml $form_ml)
	{
				$datos = $this->cn()->get_detalle();
				$form_ml->set_datos($datos);
	}
	//-----------------------------------------------------------------------------------
	//---- form_ml_cuotas -------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function evt__form_ml_cuotas__modificacion($datos)
	{
		foreach ($datos as $key => $value) {
			$datos[$key]['apex_ei_analisis_fila'] = 'A';
		}

		// $datos = $this->get_cuotas();
		$this->cn()->procesar_filas_cuotas($datos);
		$this->s__datos['form_ml_cuotas'] = $datos;
	}

	function conf__form_ml_cuotas(SIAN_sg_ei_formulario_ml $form_ml)
	{
				$fvencimiento = new DateTime();
				$array_cuotas = [];
				$datos = $this->cn()->get_cuotas();
				$datos_form = $this->s__datos['form'];
				ei_arbol($datos_form);
				$cant_meses = dao_gestion_contratos::get_cantidad_meses($datos_form['id_tipo_de_contrato']);
				$finicio = strtotime(str_replace('-', '/',$datos_form['fecha_inicio']));
				$mes_inicio = getdate($finicio)['mon']-1;
				$anio_inicio = getdate($finicio)['year'];
				$anio_vencimiento = $anio_inicio;
				for ($i=0; $i < $cant_meses; $i++){
					$dia_vencimiento = 10;
					$mes_inicio = ($mes_inicio + 1 == 13 ? 1 : $mes_inicio + 1);
					if ($mes_inicio+1 == 13){
						$anio_vencimiento + 1;
						$fvencimiento = $anio_vencimiento. "-1-" .$dia_vencimiento;
					} else {
							$fvencimiento = $anio_vencimiento. "-" .($mes_inicio + 1). "-" .$dia_vencimiento;
						}
					$array_cuotas[] = ['n_de_cuota' => $i+1
														,'id_periodo'=> $mes_inicio
														,'monto_alquiler'=> 0
														,'imas_conexion_n'=> 0
														,'emsa_conexion_n'=> 0
														,'fecha_pago'=> $fvencimiento];
					}
					$form_ml->set_datos_defecto($array_cuotas);
		}
}
?>
