<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Joel Álvarez
 * User: Codeelab
 * Date: 13/07/17
 * Time: 18:51
 */

class Inicio extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Inicio_model');
        $this->load->helper(array('url','form','security'));
        $this->load->library(array('form_validation','session'));
        $this->load->database('default');
    }

    /**
    * @desc - genera un token para cada usuario registrado
    * @return token
    */
    private function token()
    {
        return sha1(uniqid(rand(),true));
    }

	public function index()
	{
        $data['token'] = $this->token();
		$this->load->view('theme/header');
		$this->load->view('theme/nav');
		$this->load->view('home',$data);
		$this->load->view('theme/footer');
	}

    public function login()
    {
        $data['token'] = $this->token();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('login',$data);
        $this->load->view('theme/footer');
    }

}
