
<?php 

class EditarComentarios_model extends CI_Model {

    /**
     * Get subdomain name for a especified account
     * @param account_id
     * @return subdomain name found
     */ 



      function getcomments($id_post)
    {       

       $consulta='SELECT * FROM `comentarios` WHERE id_post ='.$id_post;
        $query = $this->db->query("$consulta");
         return $query->result_array();         
    }

         function actualizarComentarios($id_post,$estado,$id_comentario)
    {    

           $data = array(
            'estado' => $estado
        );

        $this->db->where('id_comentario', $id_comentario);
        $this->db->update('comentarios', $data);     
    }




}


?>