<?php
class cn_datos_empresa extends SIAN_sg_cn
{
	//-----------------------------------------------------------------------------------
	//---- Variables -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	protected $temp_archivo;
	protected $temp_nombre;
	protected $temp_imagen;
	//-----------------------------------------------------------------------------------
	//---- dr_empresa-------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function resetear()
	{
		$this->dep('dr_empresa')->resetear();
	}

	function sincronizar()
	{
		$this->dep('dr_empresa')->sincronizar();
	}

	//-----------------------------------------------------------------------------------
	//---- dt_empresa ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

		function set_empresa($datos)
	{
		// $this->dep('dr_empresa')->tabla('dt_empresa')->set($datos);
		$this->dep('dr_empresa')->tabla('dt_empresa')->set($datos);

		if (is_array($datos['logo'])) {

			$temp_archivo = $datos['logo']['tmp_name'];
			$fp = fopen($temp_archivo, 'rb');
			$this->dep('dr_empresa')->tabla('dt_empresa')->set_blob('logo', $fp);
		}
	}

	function cargar($seleccion)
	{
		$this->dep('dr_empresa')->tabla('dt_empresa')->cargar($seleccion);
	}

	function get_empresa()
	{
		// $datos = $this->dep('dr_empresa')->tabla('dt_empresa')->get();
		$fp_imagen = $this->dep('dr_empresa')->tabla('dt_empresa')->get_blob('logo');

		$datos = $this->dep('dr_empresa')->tabla('dt_empresa')->get();

		if (isset($fp_imagen)) {
			$temp_nombre = 'logo' . $datos['cuit_empresa'];

			$temp_archivo = toba::proyecto()->get_www_temp($temp_nombre);

			$temp_imagen = fopen($temp_archivo['path'], 'w');
			stream_copy_to_stream($fp_imagen, $temp_imagen);
			fclose($temp_imagen);
			$tamanio_imagen = round(filesize($temp_archivo['path']) / 1024);
			$datos['logo_vista'] = "<img src = '{$temp_archivo['url']}' alt=\"logo\" WIDTH=180 HEIGHT=150 >";
			$datos['logo'] = 'Tamaño foto actual: '.$tamanio_imagen.' KB';
		} else {
			$datos['logo'] = null;
		}
		return $datos;

	}
	function hay_cursor()
	{
		if ($this->dep('dr_empresa')->tabla('dt_empresa')->esta_cargada()) {
			return $this->dep('dr_empresa')->tabla('dt_empresa')->hay_cursor();
		}
	}

	function set_cursor($seleccion)
	{
		$id_fila = $this->dep('dr_empresa')->tabla('dt_empresa')->get_id_fila_condicion($seleccion)[0];
		$this->dep('dr_empresa')->tabla('dt_empresa')->set_cursor($id_fila);
	}

	function eliminar()
	{
		$this->dep('dr_empresa')->tabla('dt_empresa')->eliminar_todo();
	}

	// function set_logo($datos)
	// {
	// 	$this->dep('dr_empresa')->tabla('dt_empresa')->set($datos);
	//
	// 	if (is_array($datos['logo'])) {
	//
	// 		$temp_archivo = $datos['logo']['tmp_name'];
	// 		$fp = fopen($temp_archivo, 'rb');
	// 		$this->dep('dr_empresa')->tabla('dt_empresa')->set_blob('logo', $fp);
	// 	}
	// }

	// function get_empresa_logo()
	// {
	// 	$fp_imagen = $this->dep('dr_empresa')->tabla('dt_empresa')->get_blob('logo');
	//
	// 	$datos = $this->dep('dr_empresa')->tabla('dt_empresa')->get();
	//
	// 	if (isset($fp_imagen)) {
	// 		$temp_nombre = 'logo' . $datos['cuit_empresa'];
	//
	// 		$temp_archivo = toba::proyecto()->get_www_temp($temp_nombre);
	//
	// 		$temp_imagen = fopen($temp_archivo['path'], 'w');
	// 		stream_copy_to_stream($fp_imagen, $temp_imagen);
	// 		fclose($temp_imagen);
	// 		$tamanio_imagen = round(filesize($temp_archivo['path']) / 1024);
	// 		$datos['logo_vista'] = "<img src = '{$temp_archivo['url']}' alt=\"Imagen\" WIDTH=180 HEIGHT=150 >";
	// 		$datos['logo'] = 'Tamaño foto actual: '.$tamanio_imagen.' KB';
	// 	} else {
	// 		$datos['logo'] = null;
	// 	}
	//
	// 	return $datos;
	// }

}
?>
