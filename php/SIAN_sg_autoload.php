<?php
/**
 * Esta clase fue y será generada automáticamente. NO EDITAR A MANO.
 * @ignore
 */
class SIAN_sg_autoload 
{
	static function existe_clase($nombre)
	{
		return isset(self::$clases[$nombre]);
	}

	static function cargar($nombre)
	{
		if (self::existe_clase($nombre)) { 
			 require_once(dirname(__FILE__) .'/'. self::$clases[$nombre]); 
		}
	}

	static protected $clases = array(
		'SIAN_sg_comando' => 'extension_toba/SIAN_sg_comando.php',
		'SIAN_sg_modelo' => 'extension_toba/SIAN_sg_modelo.php',
		'SIAN_sg_ci' => 'extension_toba/componentes/SIAN_sg_ci.php',
		'SIAN_sg_cn' => 'extension_toba/componentes/SIAN_sg_cn.php',
		'SIAN_sg_datos_relacion' => 'extension_toba/componentes/SIAN_sg_datos_relacion.php',
		'SIAN_sg_datos_tabla' => 'extension_toba/componentes/SIAN_sg_datos_tabla.php',
		'SIAN_sg_ei_arbol' => 'extension_toba/componentes/SIAN_sg_ei_arbol.php',
		'SIAN_sg_ei_archivos' => 'extension_toba/componentes/SIAN_sg_ei_archivos.php',
		'SIAN_sg_ei_calendario' => 'extension_toba/componentes/SIAN_sg_ei_calendario.php',
		'SIAN_sg_ei_codigo' => 'extension_toba/componentes/SIAN_sg_ei_codigo.php',
		'SIAN_sg_ei_cuadro' => 'extension_toba/componentes/SIAN_sg_ei_cuadro.php',
		'SIAN_sg_ei_esquema' => 'extension_toba/componentes/SIAN_sg_ei_esquema.php',
		'SIAN_sg_ei_filtro' => 'extension_toba/componentes/SIAN_sg_ei_filtro.php',
		'SIAN_sg_ei_firma' => 'extension_toba/componentes/SIAN_sg_ei_firma.php',
		'SIAN_sg_ei_formulario' => 'extension_toba/componentes/SIAN_sg_ei_formulario.php',
		'SIAN_sg_ei_formulario_ml' => 'extension_toba/componentes/SIAN_sg_ei_formulario_ml.php',
		'SIAN_sg_ei_grafico' => 'extension_toba/componentes/SIAN_sg_ei_grafico.php',
		'SIAN_sg_ei_mapa' => 'extension_toba/componentes/SIAN_sg_ei_mapa.php',
		'SIAN_sg_servicio_web' => 'extension_toba/componentes/SIAN_sg_servicio_web.php',
	);
}
?>