<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EdicionCuenta extends CI_Controller {

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
		$this->load->model('EditarCuenta');
		$data['user'] = $this->EditarCuenta->getinfo();	
		 $user= $data['user'];
		if($user->estado == '1'){
		$this->load->view('EdicionCuenta_view', $data);
		}else{
			$data['mensaje']= 'Administrador no Logeado';
        $this->load->view('vista_login', $data);
		}		
	}

		public function editar()
	{
		$this->load->model('EditarCuenta');
		$data['user'] = $this->EditarCuenta->getinfo();	
        $data['mensaje']= 'Administrador no Logeado';

 $user= $data['user'];
		if($user->estado == '1'){

		$nombre =$this->input->post('nombre');
		$apellidos =$this->input->post('apellidos');
		$clave =$this->input->post('clave');

     $this->load->library('encrypt');
     $msg = $clave;
     $clave = $this->encrypt->encode($msg);

		$descripcion =$this->input->post('descripcion');
		$nombre_blog =$this->input->post('nombre_blog');
		$red1 =$this->input->post('red1');
		$red2 =$this->input->post('red2');

	if(($nombre != '')&&($apellidos != '')&&($clave != '')&&($descripcion != '')&&($nombre_blog != '')){
       
     $this->EditarCuenta->actualizar_usuario('1',$nombre,$apellidos,$clave,$descripcion,$nombre_blog,$red1,$red2);

		}

		
		$this->load->view('EdicionCuenta_view', $data);	
		}else{
			$data['mensaje']= 'Administrador no Logeado';
                 $this->load->view('vista_login', $data);

		}	
	}
	public function error() 
	{
		echo "Error 404, try again later";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */