<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Joel Álvarez
 * User: Codeelab
 * Date: 13/07/17
 * Time: 18:51
 */

class Cobranza_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 //==================================
 // CARPETA DE FUNCIONES LOTES
 //==================================
    public function lotes()
    {
        $query = $this->db->query('SELECT a.id_comprador, a.Nombre, a.Apellido_paterno, a.Apellido_Materno, i.precio, i.Medidas FROM alta_compradores a, info_lotes i');
        if ($query->num_rows()>0) {
            return $query->result();
        }else{
            return false;
        }

    }

 //==================================
 // CARPETA DE FUNCIONES ABONAR
 //==================================


 //----------------------------------
 // LISTA LOS LOS ABONOS
 // COBRANZA/ABONOS
 //----------------------------------
    public function abonar()
    {
        $query = $this->db->query('SELECT a.id_comprador, a.Nombre, a.Apellido_paterno, a.Apellido_Materno, i.saldo FROM alta_compradores a, abono i');
        if ($query->num_rows()>0) {
            return $query->result();
        }else{
            return false;
        }

    }

 //----------------------------------
 // LISTA LOS ABONOSPOR ID EN LA VENTANA
 // COBRANZA/ABONO/ID
 //----------------------------------
    public function abono($id_comprador = false)
    {
        $this->db->select('a.id_comprador, a.Nombre, a.Apellido_paterno, a.Apellido_Materno, i.debe, i.haber, i.saldo');
        $this->db->from('alta_compradores a, abono i');
        $this->db->where('id_comprador',$id_comprador);
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            return $query->result();
        }else{
            return false;
    }
}


 //----------------------------------
 // AGREGA NUEVO ABONO AL REGISTRO
 //----------------------------------
  function nuevo_abono($fecha_abono,$concepto,$debe,$sum_haber,$diferencia)
  {
    $data = array(
        'fecha_abono'   => $fecha_abono,
        'concepto'      => $concepto,
        'debe'          => $debe,
        'haber'         => $sum_haber,
        'saldo'         => $diferencia,
        );
    $this->db->insert('abono',$data);
  }


 //----------------------------------
 // AGREGA NUEVO USUARIO COMPRADOR
 //----------------------------------
  function nuevo_usuario($nombre,$paterno,$materno,$curp,$ine,$rfc,$domicilio,$casa,$cel,$email)
  {
    $data = array(
        'Nombre'   => $nombre,
        'Apellido_paterno'      => $paterno,
        'Apellido_Materno'      => $materno,
        'CURP'                  => $curp,
        'Clave_INE'             => $ine,
        'RFC'                   => $rfc,
        'Domicilio'             => $domicilio,
        'Telefono_casa'         => $casa,
        'Telefono_celular'      => $cel,
        'correo_electronico'    => $email,
        );
    $this->db->insert('alta_compradores',$data);
  }


 //----------------------------------
 // LISTA LOS REPORTES POR ID EN LA VENTANA
 // COBRANZA/ABONO/ID
 //----------------------------------
    public function reportes()
    {
        $this->db->select('a.id_comprador, a.Nombre, a.Apellido_paterno, a.Apellido_Materno, i.debe, i.haber, i.saldo');
        $this->db->from('alta_compradores a, abono i');
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            return $query->result();
        }else{
            return false;
    }
}


}
