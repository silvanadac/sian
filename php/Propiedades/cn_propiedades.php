<?php
class cn_propiedades extends SIAN_sg_cn
{

	//-----------------------------------------------------------------------------------
	//---- dr_propiedades-------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function resetear()
	{
		$this->dep('dr_propiedades')->resetear();
	}

	function sincronizar()
	{
		$this->dep('dr_propiedades')->sincronizar();
	}

	//-----------------------------------------------------------------------------------
	//---- dt_propiedades -----------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function cargar($seleccion)
	{
		$this->dep('dr_propiedades')->cargar($seleccion);
	}

	function hay_cursor()
	{
		if ($this->dep('dr_propiedades')->tabla('dt_propiedades')->esta_cargada()) {
			return $this->dep('dr_propiedades')->tabla('dt_propiedades')->hay_cursor();
		}
	}

	function set_cursor($seleccion)
	{
		$id_fila = $this->dep('dr_propiedades')->tabla('dt_propiedades')->get_id_fila_condicion($seleccion)[0];
		$this->dep('dr_propiedades')->tabla('dt_propiedades')->set_cursor($id_fila);
	}

	function eliminar()
	{
		$this->dep('dr_propiedades')->tabla('dt_propiedades')->eliminar_todo();
	}
	function set_propiedades($datos)
	{
		$this->dep('dr_propiedades')->tabla('dt_propiedades')->set($datos);
		if (is_array($datos['imagen'])) {

			$temp_archivo = $datos['imagen']['tmp_name'];
			$fp = fopen($temp_archivo, 'rb');
			$this->dep('dr_propiedades')->tabla('dt_propiedades')->set_blob('imagen', $fp);
		}
	}
	function get_propiedades()
	{
		$fp_imagen = $this->dep('dr_propiedades')->tabla('dt_propiedades')->get_blob('imagen');
		$datos = $this->dep('dr_propiedades')->tabla('dt_propiedades')->get();

		if (isset($fp_imagen)) {
		// $temp_nombre = md5(uniqid(time()));
			$temp_nombre = 'imagen' . $datos['id_propiedad'];

			$temp_archivo = toba::proyecto()->get_www_temp($temp_nombre);

			$temp_imagen = fopen($temp_archivo['path'], 'w');
			stream_copy_to_stream($fp_imagen, $temp_imagen);
			fclose($temp_imagen);
			$tama�o = round(filesize($temp_archivo['path']) / 1024);

			$datos['imagen_vista'] = "<img src='{$temp_archivo['url']}' alt=''>";

			// $datos['imagen_vista'] = "<img src = '{$temp_archivo['url']}' alt=\"Imagen\" WIDTH=180 HEIGHT=150 >";
			$datos['imagen'] = 'Tama�o foto actual: '.$tama�o.' KB';
		} else {
			$datos['imagen'] = null;
		}
		return $datos;
	}
	//-----------------------------------------------------------------------------------
	//------ dt_propiedad_x_comodidad -------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function procesar_filas_comodidades($datos)
	{
		$this->dep('dr_propiedades')->tabla('dt_propiedad_x_comodidad')->procesar_filas($datos);
	}
	function get_comodidades()
	{
		$datos = $this->dep('dr_propiedades')->tabla('dt_propiedad_x_comodidad')->get_filas();
		return $datos;
	}
	//-----------------------------------------------------------------------------------
	//---- dt_propiedad_x_composicion ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function procesar_filas_composicion_ambiental($datos)
	{
		$this->dep('dr_propiedades')->tabla('dt_propiedad_x_composicion')->procesar_filas($datos);
	}
	function get_composicion_ambiental()
	{
		$datos = $this->dep('dr_propiedades')->tabla('dt_propiedad_x_composicion')->get_filas();
		return $datos;
	}
	//-----------------------------------------------------------------------------------
	//---- dt_domilicio_x_propiedad ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function procesar_filas_domicilio($datos)
	{
		$this->dep('dr_propiedades')->tabla('dt_domicilio_x_propiedad')->procesar_filas($datos);
	}
	function get_domicilio()
	{
		$datos = $this->dep('dr_propiedades')->tabla('dt_domicilio_x_propiedad')->get_filas();
		return $datos;
	}
	//-----------------------------------------------------------------------------------
	//---- dt_datos_catastrales ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function procesar_filas_datos_catastrales($datos)
	{
		$this->dep('dr_propiedades')->tabla('dt_datos_catastrales')->procesar_filas($datos);
	}

	function get_datos_catastrales()
	{
		$datos = $this->dep('dr_propiedades')->tabla('dt_datos_catastrales')->get_filas();
		return $datos;
	}
	//-----------------------------------------------------------------------------------
	//---- dt_propiedad_x_restriccion ----------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function procesar_filas_restricciones($datos)
	{
		$this->dep('dr_propiedades')->tabla('dt_propiedad_x_restriccion')->procesar_filas($datos);
	}
	function get_restricciones()
	{
		$datos = $this->dep('dr_propiedades')->tabla('dt_propiedad_x_restriccion')->get_filas();
		return $datos;
	}
//-----------------------------------------------------------------------------------
//---- dt_imagenes ----------------------------------------------------------
//-----------------------------------------------------------------------------------
	function procesar_filas_imagenes($datos)
	{
		$this->dep('dr_propiedades')->tabla('dt_imagenes')->procesar_filas($datos);
	}

	function get_imagenes()
	{
		$datos = $this->dep('dr_propiedades')->tabla('dt_imagenes')->get_filas();
		return $datos;
	}
		public function get_blob($datos, $id_fila)
		{
				$html_imagen = null;

				$imagen = $this->dep('dr_propiedades')->tabla('dt_imagenes')->get_blob('imagen', $id_fila);
					if (isset($imagen)) {
					$temp_nombre = md5(uniqid(time()));
					$temp_archivo = toba::proyecto()->get_www_temp($temp_nombre);
					$temp_imagen = fopen($temp_archivo['path'], 'w');
					stream_copy_to_stream($imagen, $temp_imagen);
					fclose($temp_imagen);
					fclose($imagen);
					$tamano = round(filesize($temp_archivo['path']) / 1024);
					$html_imagen =
					"<img width=\"24px\" src='{$temp_archivo['url']}' alt='' />";
					$datos['imagen'] = '<a href="'.$temp_archivo['url'].'" target="_newtab">'.$html_imagen.' Tama�o de archivo actual: '.$tamano.' kb</a>';
					$datos['imagen'.'?html'] = $html_imagen;
					$datos['imagen'.'?url'] = $temp_archivo['url'];
				} else {
					$datos['imagen'] = null;
				}

				return $datos;
		}

		function get_blobs($datos)
		{
				$datos_r = array();
				foreach ($datos as $key => $value) {
				$datos_r[$key] = $this->get_blob($datos[$key], $key);
				}
				return $datos_r;
		}

		function set_blobs($datos)
		{
				foreach ($datos as $key => $value) {
					$this->set_blob($datos[$key], $key);
				}
		}

		public function set_blob($datos, $id_fila)
		{
			if (isset($datos['imagen'])) {
				if (is_array($datos['imagen'])) {
					$temp_archivo = $datos['imagen']['tmp_name'];
					$imagen = fopen($temp_archivo, 'rb');
					$this->dep('dr_propiedades')->tabla('dt_imagenes')->set_blob('imagen',$imagen, $id_fila);
				}
			}
		}

}
?>
