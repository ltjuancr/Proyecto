<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EdicionPost extends CI_Controller {

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
		$this->load->model('EdicionPost_model');
		$data['post'] = $this->EdicionPost_model->getAllpost();	
		$this->load->view('EdicionPost_view', $data);		
	}
	
	public function editar($id){

        $this->load->model('EdicionPost_model');

		$data['post'] = $this->EdicionPost_model->getpost($id);
		$data['comentarios']=$this->EdicionPost_model->getcomment($id);
		$this->load->view('EditarPost_view', $data);	
	}

	public function edicion(){

        $this->load->model('EdicionPost_model');

        $id =$this->input->post('id');
		$post =$this->input->post('post');
		$fecha =$this->input->post('fecha');

	if($post != ''){
       
     $this->EdicionPost_model->actualizarPost($id,$post,$fecha);

		}


		$data['post'] = $this->EdicionPost_model->getpost($id);
		$data['comentarios']=$this->EdicionPost_model->getcomment();
		$this->load->view('EditarPost_view', $data);	
	}


		public function Nuevo()
	{
		$this->load->model('EdicionPost_model');
		$this->load->view('AgregarPost_view');		
	}

	public function Agregar()
	{
		$this->load->model('EdicionPost_model');
		 $post =$this->input->post('post');
		  $fecha =$this->input->post('fecha');

		  if($post != ''){
		  	 $this->EdicionPost_model->agregarPost($post,$fecha);
		  	 $data['post'] = $this->EdicionPost_model->getAllpost();
		  	 $post='';	
		     $this->load->view('EdicionPost_view', $data);
		  	}
		  	else
		  	{

		  			$this->load->view('AgregarPost_view', $data);
		  	}

		
	}



	public function error() 
	{
		echo "Error 404, try again later";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */