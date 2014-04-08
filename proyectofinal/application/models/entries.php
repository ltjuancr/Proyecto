<?php 


class Entries extends CI_Model {

    /**
     * Get subdomain name for a especified account
     * @param account_id
     * @return subdomain name found
     */ 
    function getAllpost()
    {       
        
        $query = $this->db->get('post');
        return $query->result_array();
           
    }

     function getinfo()
    {       
        
        $query = $this->db->get('user');
        return $query->row();
           
    }



}


?>