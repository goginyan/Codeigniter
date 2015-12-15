<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload_model extends CI_Model {
    
    
     
      public function setprofile ($upload_data)
      {
          foreach($upload_data as $item=>$value){
              $img_name = $value["file_name"];       
          }

          $login = $this->session->userdata('login');
          
          $this->db->set('img', $img_name)
          ->where('login', $login)
          ->update('user');

      }
    
     public function getprofile ()
     {
            $login = $this->session->userdata('login');
            $this->db->where('login', $login);
            $query=$this->db->get("user");

           if($query->num_rows()>0)
           {
                foreach($query->result() as $rows)
                {
                   
                    $profile = array(
                         'img'=> $rows->img,
                     
                       );
                }
                return $profile['img'];
           }

     }
     


}