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

    public function lotes()
    {
        $data['lista'] = $this->Cobranza_model->lotes();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('cobranza/lotes',$data);
        $this->load->view('theme/footer');
    }

    public function abonar()
    {
        $data['lista'] = $this->Cobranza_model->abonar();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('cobranza/abonar',$data);
        $this->load->view('theme/footer');
    }

    public function abono()
    {
        $data['lista'] = $this->Cobranza_model->abono($this->uri->segment(3));
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('cobranza/abono',$data);
        $this->load->view('theme/footer');
    }

    public function registro_abono()
    {
            //hacemos las comprobaciones que deseemos en nuestro formulario
            $this->form_validation->set_rules('haber','Abono','trim|required|xss_clean');
            //validamos que se introduzcan los campos requeridos con la función de ci required
            $this->form_validation->set_message('required', 'Campo %s es obligatorio');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

            if (!$this->form_validation->run())
            {
                //si no pasamos la validación volvemos al formulario mostrando los errores
                $this->abonar();
            }
            //si pasamos la validación correctamente pasamos a hacer la inserción en la base de datos
            else
            {

                $fecha_abono = date('Y-m-d');
                $concepto = 'Abono';
                $debe =  $this->input->post('debe');
                $haber2 = $this->input->post('haber2');
                $haber = $this->input->post('haber');
                $saldo = $this->input->post('saldo');
                $sum_haber = $haber + $haber2;
                $diferencia = $saldo - $haber2;
                //ahora procesamos los datos hacía el modelo que debemos crear
                $nueva_insercion = $this->Cobranza_model->nuevo_abono(
                    $fecha_abono,
                    $concepto,
                    $debe,
                    $sum_haber,
                    $diferencia
                );
                redirect(base_url("cobranza/abonar"), "refresh");
            }
        }


    public function alta()
    {
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('cobranza/alta');
        $this->load->view('theme/footer');
    }

    public function alta_comprador()
    {
            //hacemos las comprobaciones que deseemos en nuestro formulario
            $this->form_validation->set_rules('Nombre','nombre','trim|required|xss_clean');
            $this->form_validation->set_rules('Apellido_paterno','Apellido Paterno','trim|required|xss_clean');
            $this->form_validation->set_rules('Apellido_Materno','Apellido Materno','trim|required|xss_clean');
            $this->form_validation->set_rules('CURP','CURP','trim|required|xss_clean');
            $this->form_validation->set_rules('Clave_INE','CLAVE INE','trim|required|xss_clean');
            $this->form_validation->set_rules('RFC','RFC','trim|required|xss_clean');
            $this->form_validation->set_rules('Domicilio','Domicilio','trim|required|xss_clean');
            $this->form_validation->set_rules('Telefono_casa','Telefono de Casa','trim|required|xss_clean');
            $this->form_validation->set_rules('Telefono_celular','Telefono Celular','trim|required|xss_clean');
            $this->form_validation->set_rules('correo_electronico','Correo Electronico','trim|required|xss_clean');
            //validamos que se introduzcan los campos requeridos con la función de ci required
            $this->form_validation->set_message('required', 'Campo %s es obligatorio');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

            if (!$this->form_validation->run())
            {
                //si no pasamos la validación volvemos al formulario mostrando los errores
                $this->alta();
            }
            //si pasamos la validación correctamente pasamos a hacer la inserción en la base de datos
            else
            {

                $nombre     =  $this->input->post('Nombre');
                $paterno    =  $this->input->post('Apellido_paterno');
                $materno    =  $this->input->post('Apellido_Materno');
                $curp       =  $this->input->post('CURP');
                $ine        =  $this->input->post('Clave_INE');
                $rfc        =  $this->input->post('RFC');
                $domicilio  =  $this->input->post('Domicilio');
                $casa       =  $this->input->post('Telefono_casa');
                $cel        =  $this->input->post('Telefono_celular');
                $email      =  $this->input->post('correo_electronico');
                //ahora procesamos los datos hacía el modelo que debemos crear
                $nueva_insercion = $this->Cobranza_model->nuevo_usuario(
                    $nombre,
                    $paterno,
                    $materno,
                    $curp,
                    $ine,
                    $rfc,
                    $domicilio,
                    $casa,
                    $cel,
                    $email
                );
                redirect(base_url("cobranza/alta"), "refresh");
            }
        }

    public function reporte()
    {
        $data['reporte'] = $this->Cobranza_model->reportes();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('cobranza/reporte',$data);
        $this->load->view('theme/footer');
    }



}
