<?php

class dao_autorizaciones
{
  static function get_listado_autorizaciones($where='')
  {
    if($where){
      $where_armado="WHERE $where";
      }else {
        $where_armado="";
      }

      $sql ="SELECT
              t_a.id_autorizacion,
              t_tp.nombre_tipo_aut,
              t_pr.nombre_propiedad,
              t_e.nombre_empresa,
              t_r.nombre_rol,
              coalesce(t_p.razon_social, t_p.apellidos||', '||t_p.nombre) entidad,
              t_a.fecha_ini,
              t_a.fecha_baja
              from autorizaciones t_a
              inner join tipo_autorizacion t_tp on t_tp.id_tipo_autorizacion = t_a.id_tipo_autorizacion
              inner join personas t_p on t_p.id_persona = t_a.id_persona
              inner join propiedades t_pr on t_pr.id_propiedad = t_a.id_propiedad
              inner join rol t_r on t_r.id_rol = t_a.id_rol
              inner join empresa t_e on t_e.cuit_empresa = t_a.cuit_empresa
              $where_armado";
    $datos = consultar_fuente($sql);
    return $datos;

  }
}

?>
