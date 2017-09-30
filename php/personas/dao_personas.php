<?php

class dao_personas
{
  static function get_listado_personas($where='')
  {
    if($where){
      $where_armado="WHERE $where";
      }else {
        $where_armado="";
      }

      $sql ="SELECT
            t_tp.id_tipo_persona,
            t_tp.descripcion,
            t_p.id_persona,
            coalesce(t_p.razon_social, t_p.apellidos||', '||t_p.nombre) entidad,
            t_td.id_tipodoc,
            t_td.siglas||' '||t_p.nro_doc documento,
            t_p.apoderado,
            t_p.razon_social,
            t_p.cuit_cuil,
            t_ti.id_iva,
            t_ti.nombre_iva
          FROM
              personas t_p
              inner join tipo_de_persona t_tp on t_tp.id_tipo_persona = t_p.id_tipo_persona
              inner join tipo_de_doc t_td on t_td.id_tipodoc = t_p.id_tipodoc
              inner join tipo_de_iva t_ti on t_ti.id_iva = t_p.id_iva
              $where_armado";
    $datos = consultar_fuente($sql);
    return $datos;

  }

  //-----------------------------------------------------------------------------------
	//----dt_domicilio ----------------------------------------------------------
	//-----------------------------------------------------------------------------------
  static function get_descPopupPais($id_pais)
  {
    $id_pais = quote($id_pais);

    $sql = "SELECT nombre_pais
              FROM pais
              WHERE id_pais = $id_pais";

    $resultado = consultar_fuente($sql);

    if (count($resultado) > 0 ){
      return $resultado[0]['nombre_pais'];
    } else {
      return 'Falló, intente nuevamente';
    }
  }

  static function get_opcionesProvincias($id_pais)
  {
    $id_pais = quote($id_pais);

    $sql = "SELECT id_provincia,
                   nombre_provincia
              FROM provincias
              WHERE provincias.id_pais = $id_pais";

    $opciones = consultar_fuente($sql);
    return $opciones;
  }

  static function get_opcionesCiudades($id_provincia)
  {
    $id_provincia = quote($id_provincia);

    $sql = "SELECT id_ciudad,
                   nombre_ciudad
              FROM ciudades
              WHERE ciudades.id_provincia = $id_provincia";

    $opciones = consultar_fuente($sql);
    return $opciones;
  }

  static function get_opcionesBarrios($id_ciudad)
  {
    $id_ciudad = quote($id_ciudad);

    $sql = "SELECT id_barrio,
                   nombre_barrio
              FROM barrios
              WHERE barrios.id_ciudad = $id_ciudad";

    $opciones = consultar_fuente($sql);
    return $opciones;
  }
//-----------------------------------------------------------------------------------
//----dt_domicilio_x_persona ----------------------------------------------------------
//-----------------------------------------------------------------------------------

  static function get_descPopupdomicilio($id_domicilio)
  {
    $id_domicilio = quote($id_domicilio);

    $sql = "SELECT
                tb.nombre_barrio ||', '||td.calle || ' '||td.numero||', '||tc.nombre_ciudad||', '||tpr.nombre_provincia||',' ||tp.nombre_pais domicilio
                from domicilio td
                inner join barrios tb on td.barrio_id_barrio = tb.id_barrio
                inner join pais tp on td.id_pais = tp.id_pais
                inner join provincias tpr on td.id_provincia = tpr.id_provincia
                inner join ciudades tc on td.id_ciudad = tc.id_ciudad
                WHERE id_domicilio = $id_domicilio";

    $resultado = consultar_fuente($sql);

    if (count($resultado) > 0 ){
      return $resultado[0]['domicilio'];
    } else {
      return 'Falló, intente nuevamente';
    }
  }
  //-----------------------------------------------------------------------------------
  //----dt_requisitos_x_persona ----------------------------------------------------------
  //-----------------------------------------------------------------------------------

    static function get_descPopupRequisitos($id_requisito)
    {
      $id_requisito = quote($id_requisito);

      $sql = "SELECT nombre_requisito
              from requisitos
              WHERE id_requisito = $id_requisito";

      $resultado = consultar_fuente($sql);

      if (count($resultado) > 0 ){
        return $resultado[0]['nombre_requisito'];
      } else {
        return 'Falló, intente nuevamente';
      }
    }
    //-----------------------------------------------------------------------------------
    //----dt_cuenta ----------------------------------------------------------
    //-----------------------------------------------------------------------------------

      static function get_descPopupEmpresaCom($id_empresa_com)
      {
        $id_empresa_com = quote($id_empresa_com);

        $sql = "SELECT nombre_emp
                from empresa_com
                WHERE id_empresa_com = $id_empresa_com";

        $resultado = consultar_fuente($sql);

        if (count($resultado) > 0 ){
          return $resultado[0]['nombre_emp'];
        } else {
          return 'Falló, intente nuevamente';
        }
      }
}
 ?>
