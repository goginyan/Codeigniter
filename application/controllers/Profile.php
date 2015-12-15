<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct() {
        parent::__construct();
       
        if ($this->session->userdata['user_status'] != 1){
                 
                redirect('login/registration');
         
        } 
    
    }



     public function get_profile ()
     {
        $this->load->model('Profile_model');
                                       
        $data['prof'] = $this->Profile_model->get_user_profile();
                
        $this->view->views('users_view', $data);               

     }
     
     public function send_email ()
     {
        $from =  $this->input->post('from');
        $to =  $this->input->post('to');
        $subject=  $this->input->post('subject');
        $message =  $this->input->post('message');
        
        $this->load->model('Send_email');
      
        $this->Send_email->sendEmail($from, $to ,$subject, $message);
        $data['msg']= "Your message has been sent";
        $this->view->views('msg_view', $data);
     }
     public function send_msg ()
     {
        
        $this->load->model('Profile_model');
      
        $this->Profile_model->Send_message();
        $data['msg']= "Your message has been sent";
        $this->view->views('msg_view', $data);
     }

    public function get_smsg()
    {
        $this->load->model('Profile_model');
            
        $data['message']=$this->Profile_model-> Get_send_msg();
                 
        $this->view->views('view_msg', $data);               
             
          
     }
    public function get_inbox_msg()
    {
        $this->load->model('Profile_model');
            
        $data['message']=$this->Profile_model-> Get_inbox();
                 
        $this->view->views('view_inbox', $data);               
             
          
     }
    public function blog()
    {
              
      $this->view->views('blog');               
             
          
     }
     
}