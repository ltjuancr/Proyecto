<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Login_model');

		$data['user']= $this->Login_model->getinfo();
		$data['mensaje']= '';
		$this->load->view('vista_login', $data);	
	}


	public function authenticate()
	{

    $this->load->model('Login_model');
	$usuario =$this->input->post('nombre');
	$clave =$this->input->post('clave');

    $data['user'] = $this->Login_model->authenticate($usuario,$clave);
    
		if($data['user']){
         $this->load->view('administracion_view', $data);
		}else{

		 
		 $data['user']= $this->Login_model->getinfo();
		 $data['mensaje'] = 'Error';
         //$this->load->view('vista_login', $data);
         $this->load->view('vista_login',$data);
		}
	}

	public function error() 
	{
		echo "Error 404, try again later";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */