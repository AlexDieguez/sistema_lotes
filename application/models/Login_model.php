<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Joel Álvarez
 * User: Codeelab
 * Date: 13/07/17
 * Time: 18:51
 */
class Login_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function login($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('alta_usuario');
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','El usuario o la contraseña son incorrectos. Por favor intenténtelo nuevamente.');
			redirect(base_url().'login');
		}
	}



}
