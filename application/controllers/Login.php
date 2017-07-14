<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Joel Álvarez
 * User: Codeelab
 * Date: 13/07/17
 * Time: 18:51
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library(array('session','form_validation','email'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
    }

    public function index()
    {
        switch ($this->session->userdata('prioridad')) {
            case '':
                $data['token'] = $this->token();
                $this->load->view("theme/header");
                $this->load->view("theme/nav");
                $this->load->view('login',$data);
                $this->load->view("theme/footer");
                break;
            case '1':
                redirect(base_url().'admin/index');
                break;
            case '2':
                redirect(base_url().'cobranza/index');
                break;
            default:
                $data['token'] = $this->token();
                $this->load->view("theme/header");
                $this->load->view("theme/nav");
                $this->load->view('login',$data);
                $this->load->view("theme/footer");
                break;
        }
    }

    public function token()
    {
        $token = sha1(uniqid(rand(),true));
        $this->session->set_userdata('token',$token);
        return $token;
    }

    public function acceso()
    {
        $this->load->library('form_validation');

        if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
        {
            $this->form_validation->set_rules('username', 'Usuario', 'required|trim|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'Contraseña', 'required|trim|min_length[1]|max_length[150]|xss_clean');


                $this->form_validation->set_message('required', '%s (requerido)');
                $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s caracteres.');
                $this->form_validation->set_message('max_length', 'El %s no puede tener más de %s carácteres');

            if($this->form_validation->run() == FALSE)
            {
                $this->index();
            }else{

                $username = $this->input->post('username');
                $password = sha1($this->input->post('password'));

                $check_user = $this->Login_model->login($username,$password);

                if($check_user == TRUE)
                {
                    $data = array(
                    'is_logued_in'  =>      TRUE,
                    'id_usuario'    =>      $check_user->id_usuario,
                    'prioridad'     =>      $check_user->prioridad,
                    'nombre'        =>      $check_user->nombre,
                    'a_paterno'     =>      $check_user->a_paterno,
                    'a_materno'     =>      $check_user->a_materno,
                    'status'        =>      $check_user->status,
                    'username'      =>      $check_user->username,
                    'password'      =>      $check_user->password
                    );
                    $this->session->set_userdata($data);
                    $this->index();
                }else {
                     $this->session->set_flashdata('correcto', 'Usuario registrado correctamente!');
                    redirect('login');
        }
            }
        }else{
            redirect('login');

        }
    }

    public function salir()
    {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect("login");
    }





} //END CLASS LOGIN
