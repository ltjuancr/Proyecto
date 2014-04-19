<?php 


class EditarCuenta extends CI_Model {

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


   function actualizar_usuario($id, $nombre,$apellidos,$clave,$descripcion,$nombre_blog,$red1,$red2) {
        $data = array(
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'clave' => $clave,
            'descripcion' => $descripcion,
            'nombre_blog' => $nombre_blog,
            'red1' => $red1,
            'red2' => $red2,
        );
        $this->db->where('id_usuario', $id);
        $this->db->update('user', $data);
    }


}


?>