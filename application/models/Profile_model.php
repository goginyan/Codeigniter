<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Profile_model extends CI_Model
 {
    public function get_user_profile()
    {
         $query=$this->db->get("user");

           if($query->num_rows()>0)
           {
                foreach($query->result() as $rows)
                {
                   
                    $album = array(
                         'id'=> $rows->id,
                         'first_name'=> $rows->first_name,
                         'last_name'=> $rows->last_name,
                         'login'=> $rows->login,
                         'img'=> $rows->img,
                       );
                }
               return $query->result();
           } 

    }
    
    public function Send_message()
    {
           $data=array(
                'from_user_id'=>$this->input->post('from'),
                'to_user_id'=>$this->input->post('to'),
                'subject'=>$this->input->post('subject'),
                'message'=>$this->input->post('message')
               );
           $this->db->insert('msg',$data);
    }
    public function Get_send_msg ()
     {
           $from=$this->session->userdata('user_id');
           $this->db->select('*');
           $this->db->from('msg');
           $this->db->join('user', 'msg.to_user_id = user.id');
           $this->db->where("from_user_id",$from);
           $query=$this->db->get();

           if($query->num_rows()>0)
           {
                foreach($query->result() as $rows)
                {
                   
                    $msg = array(
                         'from_user_id'=> $rows->from_user_id,
                         'to_user_id'=> $rows->to_user_id,
                         'subject'=> $rows->subject,
                         'message'=> $rows->message,
                       );
                }
               return $query->result();
           }
           else {
            redirect('upload');
           }
     }
    public function Get_inbox ()
     {
           $from=$this->session->userdata('user_id');
           $this->db->select('*');
           $this->db->from('msg');
           $this->db->join('user', 'msg.from_user_id = user.id');
           $this->db->where("to_user_id",$from);
           $query=$this->db->get();

           if($query->num_rows()>0)
           {
                foreach($query->result() as $rows)
                {
                   
                    $msg = array(
                         'from_user_id'=> $rows->from_user_id,
                         'to_user_id'=> $rows->to_user_id,
                         'subject'=> $rows->subject,
                         'message'=> $rows->message,
                         'login'=> $rows->login,
                       );
                }
               return $query->result();
           } 

     }
 
 }