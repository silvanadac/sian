<?php
class cn_personas extends SIAN_sg_cn
{
	//-----------------------------------------------------------------------------------
	//---- Variables -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	protected $temp_archivo;
	protected $temp_nombre;
	protected $temp_imagen;
	//-----------------------------------------------------------------------------------
	//---- dr_personas-------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function resetear()
	{
		$this->dep('dr_personas')->resetear();
	}

	function sincronizar()
	{
		$this->dep('dr_personas')->sincronizar();
	}

	//-----------------------------------------------------------------------------------
	//---- dt_personas ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function set_personas($datos)
	{
		$this->dep('dr_personas')->tabla('dt_personas')->set($datos);
	}

	function cargar($seleccion)
	{
		$this->dep('dr_personas')->cargar($seleccion);
	}

	function get_personas()
	{
		$datos = $this->dep('dr_personas')->tabla('dt_personas')->get();
		return $datos;
	}
	function hay_cursor()
	{
		if ($this->dep('dr_personas')->tabla('dt_personas')->esta_cargada()) {
			return $this->dep('dr_personas')->tabla('dt_personas')->hay_cursor();
		}
	}

	function set_cursor($seleccion)
	{
		$id_fila = $this->dep('dr_personas')->tabla('dt_personas')->get_id_fila_condicion($seleccion)[0];
		$this->dep('dr_personas')->tabla('dt_personas')->set_cursor($id_fila);
	}

	function eliminar()
	{
		$this->dep('dr_personas')->tabla('dt_personas')->eliminar_todo();
	}
	//-----------------------------------------------------------------------------------
	//---- dt_telefonos ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function procesar_filas_telefonos($datos)
	{
		$this->dep('dr_personas')->tabla('dt_telefonos')->procesar_filas($datos);
	}
	function get_telefono()
	{
		$datos = $this->dep('dr_personas')->tabla('dt_telefonos')->get_filas();
		return $datos;
	}
	//-----------------------------------------------------------------------------------
	//---- dt_correos ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function procesar_filas_correos($datos)
	{
		$this->dep('dr_personas')->tabla('dt_correos')->procesar_filas($datos);
	}
	function get_correos()
	{
		$datos = $this->dep('dr_personas')->tabla('dt_correos')->get_filas();
		return $datos;
	}
	//-----------------------------------------------------------------------------------
	//---- dt_domicilio_x_persona -----------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function procesar_filas_domicilio($datos)
	{
		$this->dep('dr_personas')->tabla('dt_domicilio_x_persona')->procesar_filas($datos);
	}
	function get_domicilio()
	{
		$datos = $this->dep('dr_personas')->tabla('dt_domicilio_x_persona')->get_filas();
		return $datos;
	}
	//-----------------------------------------------------------------------------------
	//---- dt_cuenta -----------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function procesar_filas_cuenta($datos)
	{
		$this->dep('dr_personas')->tabla('dt_cuenta')->procesar_filas($datos);
	}
	function get_cuenta()
	{
		$datos = $this->dep('dr_personas')->tabla('dt_cuenta')->get_filas();
		return $datos;
	}


	//-----------------------------------------------------------------------------------
	//---- dt_requisitos_x_persona -----------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function set_requisitos($datos)
	{
		$this->dep('dr_personas')->tabla('dt_requisitos_x_persona')->set($datos);
		if (is_array($datos['imagen'])) {

			// $temp_archivo = $datos['imagen']['tmp_name'];
			$fp = fopen($datos['imagen']['tmp_name'], 'rb');
			$this->dep('dr_personas')->tabla('dt_requisitos_x_persona')->set_blob('imagen', $fp);
		}
	}
	function get_requisitos()
	{
		$fp_imagen = $this->dep('dr_personas')->tabla('dt_requisitos_x_persona')->get_blob('imagen');
		$datos = $this->dep('dr_personas')->tabla('dt_requisitos_x_persona')->get();

		if (isset($fp_imagen)) {
			$temp_nombre = md5(uniqid(time()));
			// $temp_nombre = 'imagen' . $datos['id_persona'];

			$temp_archivo = toba::proyecto()->get_www_temp($temp_nombre);

			$temp_imagen = fopen($temp_archivo['path'], 'w');
			stream_copy_to_stream($fp_imagen, $temp_imagen);
			fclose($temp_imagen);
			$tamaño = round(filesize($temp_archivo['path']) / 1024);

			$datos['imagen_vista'] = "<img src='{$temp_archivo['url']}' alt=''>";

			// $datos['imagen_vista'] = "<img src = '{$temp_archivo['url']}' alt=\"Imagen\" WIDTH=180 HEIGHT=150 >";
			$datos['imagen'] = 'Tamaño foto actual: '.$tamaño.' KB';
		} else {
			$datos['imagen'] = null;
		}
		return $datos;
	}
}
?>
