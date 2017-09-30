<?php
class form_personas extends SIAN_sg_ei_formulario
{
  function extender_objeto_js()
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


?>
