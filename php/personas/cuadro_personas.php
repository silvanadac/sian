<?php
class cuadro_personas extends SIAN_sg_ei_cuadro
{
  function get_datos()
  {
    $sql = "SELECT
              t_tp.id_tipo_persona,
              t_tp.descripcion,
              t_p.id_persona,
              t_p.nombre,
              t_p.apellidos,
              t_p.apoderado,
              t_p.razon_social,
              t_td.id_tipodoc,
              t_td.siglas,
              t_p.nro_doc,
              t_p.cuit_cuil,
              t_ti.id_iva,
              t_ti.nombre_iva,
              t_p.fecha_nacimiento,
              t_p.nacionalidad,
              t_ec.id_estado_civil,
              t_ec.nombre_estadocivil,
              t_p.hijos,
              t_p.cantidad_hijos,
              t_p.mascotas,
              t_p.vehiculos
          FROM
              tipo_de_persona as t_tp,
              tipo_de_doc as t_td,
              tipo_de_iva as t_ti,
              estado_civil as t_ec,
              persona as t_p
          WHERE
  	    t_tp.id_tipo_persona=t_p.id_tipo_persona AND t_td.id_tipodoc=t_p.id_tipodoc
        AND t_tI.id_iva=t_p.id_iva AND t_ec.id_estado_civil=t_p.id_estado_civil;";
    $datos = consultar_fuente($sql);
    return $datos;
  }
}
?>
