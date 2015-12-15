<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Albums_model extends CI_Model
 {
    
     public function add_album ($add_alb)
     {
      
        If($this->input->post('add_album')){
         
                  
         foreach($add_alb as $item=>$value){
               $img_name = $value["file_name"];       
          }

          				$data=array(
                         
						'album_name'=>$this->input->post('album'),
						'photo'=>$img_name,
                        'descr'=>$this->input->post('descr'),
						);

            $this->db->insert('albums',$data);
        }
        
      }

     public function getalbum ()
     {
 
           $query=$this->db->get("albums");

           if($query->num_rows()>0)
           {
                foreach($query->result() as $rows)
                {
                   
                    $album = array(
                         'album_name'=> $rows->album_name,
                         'album_id'=> $rows->album_id,
                         'photo'=> $rows->photo,
                         'descr'=> $rows->descr,
                       );
                }
               return $query->result();
           } 

     }
     
     public function getphoto ()
     {
          if($this->uri->segment(3)){
             
             $id =$this->uri->segment(3);
            
             $this->db->where("album_id",$id);
             $query=$this->db->get("images");
            
  
             if($query->num_rows()>0)
             {
                  foreach($query->result() as $rows)
                  {
                     
                      $img = array(
                           'image_id'=> $rows->image_id,
                           'album_id'=> $rows->album_id,
                           'url'=> $rows->url,
                         );
                  }
                 return $query->result();
             }
             
          }

     }

     
      public function setphoto ($upload_data)
      {
          foreach($upload_data as $item=>$value){
              $img_name = $value["file_name"];       
          }

          				$data=array(
						'album_id'=>$this->input->post('select'),
						'url'=>$img_name,
						);

            $this->db->insert('images',$data);

      }

      public function setimg ($img)
      {
      
         if($this->uri->segment(3)){
            $album_id =$this->uri->segment(3);         
            foreach($img as $i){
         
                          $data=array(
                          'album_id'=>$album_id,
                          //'url'=>$img_name,
                          'url' => $i,
                          );
  
              $this->db->insert('images',$data);
       
           }
         }
      }

      
      public function del_album($img_id)
      {
       
          $tables = array('albums', 'images');
          
          $this->db->where_in('album_id', $img_id);
          $this->db->or_where_in('album_id', $img_id);
          $this->db->delete($tables);
      }
     
       public function del_photo($img_id)
      {
           
          $this->db->where_in('image_id', $img_id);
          $this->db->delete('images');
      }

 }
    
