<?php 


class Entries extends CI_Model {

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





}


?>