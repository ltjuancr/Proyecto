
<?php 


class EdicionPost_model extends CI_Model {

    /**
     * Get subdomain name for a especified account
     * @param account_id
     * @return subdomain name found
     */ 
   function getAllpost()
    {         
        $consulta="SELECT * FROM `post` ORDER BY id_post DESC";

        $query = $this->db->query("$consulta");
        return $query->result_array();    
    }


      function getpost($id_post)
    {       

       $consulta='SELECT * FROM `post` WHERE id_post ='.$id_post;
        $query = $this->db->query("$consulta");
        return $query->row();
           
    }

        function getcomment(){
         $query = $this->db->get('comentarios');
        return $query->result_array();

    }

        function actualizarPost($id,$post,$fecha)
    {    

           $data = array(
            'post' => $post
        );

        $this->db->where('id_post', $id);
        $this->db->update('post', $data);     
    }

    function agregarPost($post,$fecha)
    {    

           $data = array(
            'post' => $post,
            'fecha' => $fecha
        );

          $this->db->insert('post', $data);     
    }

         function getinfo()
    {       
        
        $query = $this->db->get('user');
        return $query->row();          
    }





}


?>