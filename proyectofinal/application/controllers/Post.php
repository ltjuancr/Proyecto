<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

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
	public function index($id_post)
	{
		$this->load->model('comments_model');
		$data['id']=$id_post;
        $data['mensaje']='.';
		$data['user'] = $this->comments_model->getinfo();
		$data['post'] = $this->comments_model->getpost($id_post);
		$data['comentarios']=$this->comments_model->getcomment($id_post);
		$this->load->view('vista_post', $data);	
	}



//-------------------------------------------------------------------------------------------
   public function insert($id_post)
	{
		$this->load->model('comments_model');
        $data['id']=$id_post;
		$data['user'] = $this->comments_model->getinfo();
		$data['post'] = $this->comments_model->getpost($id_post);
		$data['comentarios']=$this->comments_model->getcomment($id_post);

		$autor =$this->input->post('nombre');
		$comment =$this->input->post('comentario');
        $blog = $data['user'];
            $blog = $blog->nombre_blog;


		if(($autor != '')&&($comment != '')){
       
     $this->comments_model->get($id_post,$autor,$comment);

     //correo
     include("C:/xampp/htdocs/proyectofinal/application/email/class.phpmailer.php"); 
     include("C:/xampp/htdocs/proyectofinal/application/email/class.smtp.php"); 
     $mail = new PHPMailer(); 
     $mail->IsSMTP(); 
     $mail->SMTPAuth = true; 
     $mail->SMTPSecure = "ssl"; 
     $mail->Host = 'smtp.gmail.com'; 
     $mail->Port = 465; 
     $mail->Username = 'juanquirosgonzalez@gmail.com'; 
     $mail->Password = 'juan1243';



     $mail->From = 'juanquirosgonzalez@gmail.com'; 
     $mail->FromName = "Server"; 
     $mail->Subject = "Mensaje del Blog ".$blog; 
     $mail->AltBody = "Este es un mensaje"; 
     $mail->MsgHTML("En el Post ".$id_post.' tiene un nuevo mensaje de '.$autor); 
     $mail->AddAttachment(""); 
     $mail->AddAttachment(""); 
     $mail->AddAddress('juan_gonzalez93@hotmail.com', "juan quiros gonzalez"); 
     $mail->IsHTML(true); 

  if(!$mail->Send()) { 
 echo "Error: " . $mail->ErrorInfo; 
 } else { 
 echo ""; 
 }
}else{
	 echo "Comentario inválido necesita llenar todos los campos ";
}
		$this->load->view('vista_post', $data);	
	}

	
	public function error() 
	{
		echo "Error 404, try again later";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */