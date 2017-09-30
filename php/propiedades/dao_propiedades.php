<?php

class dao_propiedades
{
  static function get_datos($where='')
  {
    // ei_arbol($where);
    if($where){
      $where_armado="WHERE $where";
      }else {
      $where_armado="";
    }
    $sql = "select
             t_pr.id_propiedad,
             t_pr.nombre_propiedad,
             t_pr.departamentos,
             t_tpr.id_tipo_propiedad,
             t_tpr.nombre_tipopropiedad,
             t_pr.parent_id_propiedad
             FROM
            	propiedades t_pr
            	inner join tipo_de_propiedad t_tpr on t_pr.id_tipo_propiedad=t_tpr.id_tipo_propiedad
              $where_armado";
    $datos = consultar_fuente($sql);
    return $datos;
  }
  //-----------------------------------------------------------------------------------
	//----form_ml_com ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
  static function get_descComodidades($id_comodidad)
  {
    $id_comodidad = quote($id_comodidad);

    $sql = "SELECT nombre_comodidad
              FROM comodidades
              WHERE id_comodidad = $id_comodidad";

    $resultado = consultar_fuente($sql);

    if (count($resultado) > 0 ){
      return $resultado[0]['nombre_comodidad'];
    } else {
      return 'Fallo, intente nuevamente';
    }
  }
  //-----------------------------------------------------------------------------------
  //----form_ml_comp ----------------------------------------------------------
  //-----------------------------------------------------------------------------------
  static function get_descCompAmbiental($id_comp_amb)
  {
    $id_comp_amb = quote($id_comp_amb);

    $sql = "SELECT nombre_comp_amb
              FROM composicion_ambiental
              WHERE id_comp_amb = $id_comp_amb";

    $resultado = consultar_fuente($sql);

    if (count($resultado) > 0 ){
      return $resultado[0]['nombre_comp_amb'];
    } else {
      return 'Fallo, intente nuevamente';
    }
  }

}
?>
