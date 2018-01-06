<?php

class dao_gestion_contratos
{
  static function get_listado_contratos($where='')
  {
    if($where){
      $where_armado="WHERE $where";
      }else {
        $where_armado="";
      }

      $sql ="SELECT
            	tc.id_contrato,
            	ttc.id_tipo_de_contrato,
            	ttc.nombre_contrato,
            	tc.fecha_inicio,
            	tc.fecha_vencimiento,
              tpr.nombre_propiedad
            	FROM contratos tc
              inner join propiedades tpr on tpr.id_propiedad= tc.id_propiedad
            	inner join tipo_de_contrato ttc on ttc.id_tipo_de_contrato = tc.id_tipo_de_contrato
              $where_armado";
    $datos = consultar_fuente($sql);
    return $datos;

  }
//-----------------------------------------------------------------------------------
//----dt_roles ----------------------------------------------------------
//-----------------------------------------------------------------------------------
  static function get_descPopupPersonas($id_persona)
  {
    $id_persona = quote($id_persona);

    $sql = "SELECT coalesce(t_p.razon_social, t_p.apellidos||', '||t_p.nombre) entidad
              FROM personas t_p
              WHERE id_persona = $id_persona";

    $resultado = consultar_fuente($sql);

    if (count($resultado) > 0 ){
      return $resultado[0]['entidad'];
    } else {
      return 'Fall�, intente nuevamente';
    }
  }

  static function get_descPropiedades($id_propiedad)
  {
    $id_propiedad = quote($id_propiedad);

    $sql = "SELECT
              nombre_propiedad
              FROM
              propiedades
              WHERE id_propiedad = $id_propiedad";

    $resultado = consultar_fuente($sql);

    if (count($resultado) > 0 ){
      return $resultado[0]['nombre_propiedad'];
    } else {
      return 'Fall�, intente nuevamente';
    }
  }

  static function get_cantidad_meses($id_tipo_de_contrato)
  {
    $id_tipo_de_contrato = quote($id_tipo_de_contrato);

    $sql = "SELECT
              vigenciameses
              FROM
              tipo_de_contrato
              WHERE id_tipo_de_contrato = $id_tipo_de_contrato";

    return consultar_fuente($sql)[0]['vigenciameses'];
  }
}
?>
