<?php
require_once('datos de la empresa/dao_datos_empresa.php');
require_once('adebug.php');
/**
	*
	*/

class ci_datos_empresa extends SIAN_sg_ci
{

  //---- Cuadro -----------------------------------------------------------------------

	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
    $datos = dao_datos_empresa::get_listado_datosempresa();
    $cuadro->set_datos($datos);
	}

  function evt__cuadro__seleccion($seleccion)
	{
		$this->cn()->cargar($seleccion);
		$this->cn()->set_cursor($seleccion);
		$this->set_pantalla('pant_edicion');
	}

	function evt__cuadro__eliminar($seleccion)
	{
		$this->cn()->cargar($seleccion);
		$this->cn()->eliminar();
	}

	//---- Form -------------------------------------------------------------------

	function evt__form__modificacion($datos)
	{
		$this->cn()->set_empresa($datos);
	}

	function conf__form(SIAN_sg_ei_formulario $form)
	{
		if (isset($this->s__datos['form'])) {
			$form->set_datos($this->s__datos['form']);
		} else {
			if ($this->cn()->hay_cursor()) {
				$datos = $this->cn()->get_empresa();
				$this->s__datos['form'] = $datos;
				$form->set_datos($datos);
			}
		}

	}
	//---- EVENTOS CI -------------------------------------------------------------------

	function evt__agregar()
	{
		$this->set_pantalla('pant_edicion');
	}

	function evt__cancelar()
	{
		$this->cn()->resetear();
    $this->set_pantalla('pant_inicial');
	}

	function evt__eliminar()
	{
		$this->cn()->eliminar();
		$this->cn()->resetear();
		$this->set_pantalla('pant_inicial');
	}

	function evt__procesar()
  {
		try {
      $this->cn()->sincronizar();
      $this->evt__cancelar();
		} catch (toba_error_db $e) {

      if (adebug::$debug) {
				throw $e;
			} else {
        $this->cn()->resetear();
        $sql_state = $e->get_sqlstate();
				if ($sql_state == 'db_23505') {
					throw new toba_error_usuario('Los datos que intenta cargar ya exite en la base de datos');
				}
			}
		}
	}

}
?>
