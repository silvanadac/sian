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

        $sql ="SELECT DISTINCT
            		t_e.nombre_empresa,
            		t_e.cuit_empresa,
            		t_e.direccion,
            		t_e.tipo_iva,
            		t_e.logo,
            		t_ce.descripcion,
			          t_te.numero ||', '||tdt.nombre_tel||', '||tet.nombre_linea telefono
            		FROM
          			empresa t_e
                LEFT JOIN telefonos_empresa t_te on t_te.cuit_empresa = t_e.cuit_empresa
          			LEFT JOIN correos_empresa t_ce on t_ce.cuit_empresa = t_e.cuit_empresa
          			LEFT JOIN tipo_telefono tdt on tdt.id_tipo_tel = t_te.id_tipo_tel
          			LEFT JOIN empresa_telefono tet on tet.id_emp_tel = t_te.id_emp_tel;
              $where_armado";
        $datos = consultar_fuente($sql);
        return $datos;

  }
}
?>
