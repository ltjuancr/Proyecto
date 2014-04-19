<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EdicionComentarios extends CI_Controller {

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
	public function Edicion($id_post)
	{
		$this->load->model('EditarComentarios_model');
		$data['id_post']=$id_post;
		$data['comentarios'] = $this->EditarComentarios_model->getcomments($id_post);	
		$this->load->view('EdicionComentario', $data);		
	}

	public function Editando($id_post)
	{
		$this->load->model('EditarComentarios_model');
        $data['id_post']=$id_post;
		$estado =$this->input->post('submit');
		$id_comentario =$this->input->post('id');

        if($estado=='Activado'){
        	$estado='n';
        }else{
        	$estado='s';
        }
         $this->EditarComentarios_model->actualizarComentarios($id_post,$estado,$id_comentario);

		$data['comentarios'] = $this->EditarComentarios_model->getcomments($id_post);	

		$this->load->view('EdicionComentario', $data);		
	}
	


	public function error() 
	{
		echo "Error 404, try again later";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */