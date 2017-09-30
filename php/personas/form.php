<?php
class form extends SIAN_sg_ei_formulario
{
	//-----------------------------------------------------------------------------------
	//---- JAVASCRIPT -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function extender_objeto_js()
	{
		echo "
		//---- Procesamiento de EFs --------------------------------

		{$this->objeto_js}.evt__id_tipo_persona__procesar = function(es_inicial)
		{
			var nodo = this.ef('id_tipo_persona').input();

			var indice = nodo.selectedIndex;
			var valor='';

			if (indice) {
				valor = nodo.options[indice].text;
			}

			var resultado = valor.substring(0,3);

			if (resultado=='JUR')
			{
				this.ef('nombre').ocultar();
				this.ef('apellidos').ocultar();
				this.ef('apoderado').mostrar();
				this.ef('razon_social').mostrar();
				this.ef('id_tipodoc').mostrar();
				this.ef('nro_doc').mostrar();
				this.ef('cuit_cuil').mostrar();
				this.ef('id_iva').mostrar();
				this.ef('fecha_nacimiento').mostrar();
				this.ef('nacionalidad').ocultar();
				this.ef('id_estado_civil').ocultar();
				this.ef('hijos').ocultar();
				this.ef('cantidad_hijos').ocultar();
				this.ef('mascotas').ocultar();
				this.ef('vehiculos').ocultar();
			} else {
				this.ef('nombre').mostrar();
				this.ef('apellidos').mostrar();
				this.ef('apoderado').ocultar();
				this.ef('razon_social').ocultar();
				this.ef('id_tipodoc').mostrar();
				this.ef('nro_doc').mostrar();
				this.ef('cuit_cuil').mostrar();
				this.ef('id_iva').mostrar();
				this.ef('fecha_nacimiento').mostrar();
				this.ef('nacionalidad').mostrar();
				this.ef('id_estado_civil').mostrar();
				this.ef('hijos').mostrar();
				this.ef('cantidad_hijos').mostrar();
				this.ef('mascotas').mostrar();
				this.ef('vehiculos').mostrar();
			}
		}

			//---- Procesamiento de EFs --------------------------------
			{$this->objeto_js}.evt__fecha_nacimiento__procesar = function(es_inicial)
			{
							var edad = this.ef('fecha_nacimiento').calcular_edad();

					if (this.ef('fecha_nacimiento').get_estado()!='') {
					var ef_fecha_nacimiento = this.ef('fecha_nacimiento');
					var fecha_nacimiento = ef_fecha_nacimiento.fecha();

					var fecha_actual = new Date();
					if (fecha_nacimiento!='') {
						if (fecha_actual < fecha_nacimiento) {
							alert('La Fecha de Nacimiento NO Puede ser Mayor a la Fecha Actual');
							this.ef('fecha_nacimiento').set_estado('');
							ef_fecha_nacimiento.set_error('La Fecha de Nacimiento debe ser mayor a 1900 y menor o igual a la Fecha Actual');

						} else {
							var anio_nacimiento = fecha_nacimiento.getFullYear();
							if (anio_nacimiento < 1900) {
								alert('La Fecha de Nacimiento debe ser mayor a 1900 y menor o igual a la Fecha Actual');
								this.ef('fecha_nacimiento').set_estado('');
								ef_fecha_nacimiento.set_error('La Fecha de Nacimiento debe ser mayor a 1900 y menor o igual a la Fecha Actual');

							} else {

								var edad = this.ef('fecha_nacimiento').calcular_edad();
								if (edad < 18) {
								alert('La Persona debe ser Mayor de edad. EDAD :' +edad);
								this.ef('fecha_nacimiento').set_estado('');
								ef_fecha_nacimiento.set_error('La Persona debe ser Mayor de edad');
								}

							}
												}
						}
				}
			}

		//---- Procesamiento de EFs --------------------------------

		{$this->objeto_js}.evt__nombre__procesar = function(es_inicial)
		{
			var ef=this.ef('nombre');

			if(ef.tiene_estado){
				ef.set_estado(ef.get_estado().charAt(0).toUpperCase()+ef.get_estado().slice(1));
			}
		}
		//---- Procesamiento de EFs --------------------------------

		{$this->objeto_js}.evt__apellidos__procesar = function(es_inicial)
		{
			var ef=this.ef('apellidos');

			if(ef.tiene_estado){
				ef.set_estado(ef.get_estado().charAt(0).toUpperCase()+ef.get_estado().slice(1));
			}
		}

		{$this->objeto_js}.evt__apoderado__procesar = function(es_inicial)
		{
			var ef=this.ef('apoderado');

			if(ef.tiene_estado){
				ef.set_estado(ef.get_estado().charAt(0).toUpperCase()+ef.get_estado().slice(1));
			}
		}

		{$this->objeto_js}.evt__razon_social__procesar = function(es_inicial)
		{
			var ef=this.ef('razon_social');

			if(ef.tiene_estado){
				ef.set_estado(ef.get_estado().charAt(0).toUpperCase()+ef.get_estado().slice(1));
			}
		}
		";
	}



}
?>
