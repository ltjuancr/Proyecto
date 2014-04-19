<?php 


class Comments_model extends CI_Model {

    /**
     * Get subdomain name for a especified account
     * @param account_id
     * @return subdomain name found
     */ 
     function getinfo()
    {              
        $query = $this->db->get('user');
        return $query->row();          
    }
        function getpost($id_post)
    {       

       $consulta='SELECT * FROM `post` WHERE id_post ='.$id_post;
        $query = $this->db->query("$consulta");
        return $query->row();
           
    }
        function getcomment($id_post){
        $consulta="SELECT * FROM `comentarios` WHERE id_post = ".$id_post." and estado = 's'";

        $query = $this->db->query("$consulta");
        return $query->result_array();

    }


    function get($id_post, $autor, $comment)
    {    
          date_default_timezone_set("America/Costa_Rica");            
             $fecha = date("Y").'-'.date("m").'-'.date("d");

        $data = array(
        'id_post' => $id_post,
        'nombre' => $autor,
        'comentario' => $comment,
        'estado' => 'n',
        'fecha' => $fecha,
        );  

        //$consulta = "INSERT INTO comments(id_entrie,autor,body,estado) VALUES ($id_post,$autor,$comment,'Desactivado')";
         $this->db->insert('comentarios', $data);
        //return $this->db->insert("$consulta");
        
    }





}


?>