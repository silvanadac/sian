<?php
require_once('personas/dao_personas.php');
require_once('adebug.php');
/**
	*
	*/
class ci_personas extends SIAN_sg_ci
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
	function evt__agregar()
	{
		$this->cn()->resetear();
		$this->set_pantalla('pant_edicion');
	}

	function evt__cancelar()
	{
		unset($this->s__datos);
		$this->dep('ci_abm_personas')->disparar_limpieza_memoria();
		$this->cn()->resetear();
		$this->set_pantalla('pant_inicial');
	}

	function evt__procesar()
	{
		$this->dep('ci_abm_personas')->setear_todos_los_formularios();
		try {
      $this->cn()->sincronizar();
      $this->cn()->resetear();
      $this->evt__cancelar();
		} catch (toba_error_db $e) {

      if (adebug::$debug) {
				throw $e;
			} else {
        $this->cn()->resetear();
        $sql_state = $e->get_sqlstate();
				if ($sql_state == 'db_23505') {
					throw new toba_error_usuario('La persona que intenta cargar ya exite en la base de datos');
				}
			}
    $this->cn()->resetear();
		}
	}
	//-----------------------------------------------------------------------------------
	//---- filtro -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__filtro(SIAN_sg_ei_filtro $filtro)
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

	//-----------------------------------------------------------------------------------
	//---- cuadro------------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__cuadro(SIAN_sg_ei_cuadro $cuadro)
	{
		if (isset($this->s__datos_filtro)) {
			$filtro = $this->dep('filtro');
			$filtro->set_datos($this->s__datos_filtro);
			$sql_where = $filtro->get_sql_where();
			$datos = dao_personas::get_listado_personas($sql_where);
			$cuadro->set_datos($datos);
		}
	}

	function evt__cuadro__seleccion($seleccion)
	{
		$this->cn()->cargar($seleccion);
		$this->cn()->set_cursor($seleccion);
		$this->set_pantalla('pant_edicion');
	}


	//-----------------------------------------------------------------------------------
	//---- configuraciones------------------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function conf__pant_edicion(toba_ei_pantalla $pantalla)
	{
		if (! $this->cn()->hay_cursor()){
			$this->pantalla()->eliminar_evento('eliminar');
		}
	}

}
?>
