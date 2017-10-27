<?php

class dao_datos_empresa
{
  static function get_listado_datosempresa($where='')
  {
    if($where){
      $where_armado="WHERE $where";
      }else {
        $where_armado="";
      }

        $sql ="SELECT
            		t_e.nombre_empresa,
            		t_e.cuit_empresa,
            		t_e.direccion,
            		t_e.tel_cel,
            		t_e.email,
            		t_e.tipo_iva,
            		t_e.logo
            		FROM
                empresa t_e;
              $where_armado";
    $datos = consultar_fuente($sql);
    return $datos;

  }
}
?>
