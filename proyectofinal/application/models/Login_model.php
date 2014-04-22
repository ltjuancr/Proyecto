<?php 


class Login_model extends CI_Model {

    /**
     * Get subdomain name for a especified account
     * @param account_id
     * @return subdomain name found
     */ 
    function authenticate($nombre,$clave)
    {       
        $consulta="SELECT * FROM `user` WHERE nombre = '$nombre' and clave = '$clave'";
        $query = $this->db->query("$consulta");
        return $query->row();
    }

    function getinfo()
    {              
        $query = $this->db->get('user');
        return $query->row();          
    }

    function logear($nombre,$clave)
    {    

           $data = array(
            'estado' => '1'
        );

        $this->db->where('nombre', $nombre);
        $this->db->update('user', $data);     
    }

}


?>