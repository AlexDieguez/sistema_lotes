<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Joel Álvarez
 * User: Codeelab
 * Date: 13/07/17
 * Time: 18:51
 */

class Cobranza extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cobranza_model');
        $this->load->helper(array('url','form','security'));
        $this->load->library(array('form_validation','session'));
        $this->load->database('default');
    }

    public function index()
    {
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('cobranza/index');
        $this->load->view('theme/footer');
    }


}
