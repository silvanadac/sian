<?php
class dao_domicilios_popup
{
  static function get_listado_domicilios($where='')
  {
    if($where){
      $where_armado="WHERE $where";
      }else {
        $where_armado="";
      }

      $sql = "SELECT
            	td.id_domicilio,
            	td.calle,
            	td.numero,
            	td.edificio,
            	td.piso,
            	td.depto,
            	tp.id_pais,
            	tp.nombre_pais,
            	tpr.id_provincia,
            	tpr.nombre_provincia,
            	tc.id_ciudad,
            	tc.nombre_ciudad,
            	tb.id_barrio,
            	tb.nombre_barrio
            	from domicilio td
            	inner join pais tp on td.id_pais = tp.id_pais
            	inner join provincias tpr on td.id_provincia = tpr.id_provincia
            	inner join ciudades tc on td.id_ciudad = tc.id_ciudad
            	inner join barrios tb on td.barrio_id_barrio = tb.id_barrio
              $where_armado";
    $datos = consultar_fuente($sql);
    return $datos;

  }
}
?>
