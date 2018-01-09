<?php
require_once('gestion_contratos/dao_gestion_contratos.php');
class form_ml_detalle extends SIAN_sg_ei_formulario_ml
{
	//-----------------------------------------------------------------------------------
	//---- JAVASCRIPT -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

  function set_tipo_de_contrato($id_tipo_de_contrato='')
  {
    $this->s__datos['vigenciameses'] = dao_gestion_contratos::get_cantidad_meses($id_tipo_de_contrato);
  }

	function extender_objeto_js()
	{
    $vigenciameses = $this->s__datos['vigenciameses'];

    $jsAuxiliares = "
      
      {$this->objeto_js}.valida_cuota_b = function()
      {
        validado = true;
        for (i = 0; i < this.filas().length; i++) {
          fila = this.filas()[i];
          if (!this.ef('cuota_b').ir_a_fila(fila).validar()) {
            validado = false;
          }
        }
        return validado;
      }

      {$this->objeto_js}.crear_fila_detalle = function()
      {
        if (this.valida_cuota_b()) {
          ultimaFila = this.filas()[this.filas().length - 1];
          valorUltimaFila = this.ef('cuota_b').ir_a_fila(ultimaFila).get_estado();
          if (valorUltimaFila != $vigenciameses && valorUltimaFila != '') {
            this.n_fila = this.crear_fila();
          }
        }
      }

      document.getElementById('js_form_2946_form_ml_detalle_agregar').remove();
      {$this->objeto_js}.comprobarCeroFilas = function()
      {
        if (this.filas().length == 0) {
          this.crear_fila_detalle();
          ultimaFila = this.filas()[this.filas().length - 1];
          this.ef('cuota_a').ir_a_fila(ultimaFila).set_estado(1);
        }
         else if (this.filas().length > 1) {
          continuar = true;
          while (continuar) {
            continuar = false;
            for (i=0; i < (this.filas().length - 1); i++) {
              idx1 = this.filas()[i];
              val1 = this.ef('cuota_a').ir_a_fila(idx1).get_estado();
              idx2 = this.filas()[i+1];
              val2 = this.ef('cuota_a').ir_a_fila(idx2).get_estado();
              if (val1 > val2) {
                this.seleccionar(idx1);
                this.bajar_seleccionada();
                continuar = true;
              }
            }
          }
        }
      }
      {$this->objeto_js}.comprobarCeroFilas();

      {$this->objeto_js}.eliminar_seleccionada_sub = {$this->objeto_js}.eliminar_seleccionada;



      {$this->objeto_js}.eliminar_seleccionada = function()
      {
        fila0 = this.filas()[0];
        if (this.filas().length < 2 || fila0 == this.filaSeleccionada) {
          return;
        }
        this.eliminar_seleccionada_sub();
        if (this.valida_cuota_b()) {
          ultimaFila = this.filas()[this.filas().length - 1];
          valorUltimaFila = this.ef('cuota_b').ir_a_fila(ultimaFila).get_estado();
          if (valorUltimaFila != $vigenciameses && valorUltimaFila != '') {
            this.crear_fila_detalle();
            this.evt__cuota_b__procesar(false, ultimaFila);
          }
        }
      }

      {$this->objeto_js}.es_ultima_fila = function(fila)
      {
        for (i = 0; i < this.filas().length; i++) {
            bEstaEn_i = (this.filas()[i] == fila);
            if (bEstaEn_i) {
              bFilaEsNueva = fila==this.n_fila;
              if (bFilaEsNueva) {
                return false;
              } else {
                ultimaPos = this.filas().length - 1;
                if (i == ultimaPos) {
                  return true;
                } else {
                  iEsAnteultima = i == (ultimaPos - 1);
                  laUltimaEsNueva = this.filas()[ultimaPos] == this.n_fila;
                  if (iEsAnteultima && laUltimaEsNueva) {
                    return true;
                  } else {
                    return false;
                  }
                }
              }
            }
        }
      }

      {$this->objeto_js}.proximaFila = function(fila)
      {
        resultado = -2;
        for (i = 0; i < this.filas().length; i++) {
          bEstaEn_i = (this.filas()[i] == fila);
          if (bEstaEn_i) {
            if (i < (this.filas().length - 1)) {
              resultado = this.filas()[i + 1];
              break;
            } else {
              resultado = -1;
              break;
            }
          }
        }
        return resultado
      }
      ";

		echo "
    $jsAuxiliares

		//---- Procesamiento de EFs --------------------------------

    {$this->objeto_js}.evt__seleccionar_fila = function(fila)
    {
      this.filaSeleccionada = fila;
      return true;
    }

		{$this->objeto_js}.evt__cuota_b__procesar = function(es_inicial, fila)
		{
      valoring=this.ef('cuota_b').ir_a_fila(fila).get_estado();
      valorca=this.ef('cuota_a').ir_a_fila(fila).get_estado();
      if(!es_inicial){
        cantc=$vigenciameses;
        if (valoring < cantc && valoring >= valorca) {
          if (this.n_fila) {
            if (this.n_fila == fila)  {
              this.crear_fila_detalle();
            }
          } else {
            this.crear_fila_detalle();
          }
          if (this.es_ultima_fila(fila)) {
            this.ef('cuota_a').ir_a_fila(this.n_fila).set_estado(valoring + 1);
          } else {
            proximaFila = this.proximaFila(fila);
            if (proximaFila > -1) {
              this.ef('cuota_a').ir_a_fila(proximaFila).set_estado(valoring + 1);
            }
          }
        }
      }

      this.calcularSubtotal(valoring, valorca, fila);
		}



		{$this->objeto_js}.evt__importe__procesar = function(es_inicial, fila)
		{
		}

		{$this->objeto_js}.evt__porcentaje__procesar = function(es_inicial, fila)
		{
		}

		//---- Validacion de EFs -----------------------------------

		{$this->objeto_js}.evt__cuota_b__validar = function(fila)
		{
      cantc = $vigenciameses;
      valoring = this.ef('cuota_b').ir_a_fila(fila).get_estado();
      valorca = this.ef('cuota_a').ir_a_fila(fila).get_estado();
      prxFila = this.proximaFila(fila);
      if (valoring > cantc) {
        this.ef('cuota_b').ir_a_fila(fila).set_error('no puede ser mayor a $vigenciameses');
        return false;
      } else if (valoring < valorca) {
        this.ef('cuota_b').ir_a_fila(fila).set_error('no puede ser menor a ' + valorca);
        return false;
      } else if (valoring == cantc) {
        if (prxFila > -1) {
          this.ef('cuota_b').ir_a_fila(fila).set_error('debe tener $vigenciameses como ultimo valor, y no debe aparecer mas de una vez en el formulario');
          return false;
        }
      }
      return true;
		}
		";
	}

}
?>
