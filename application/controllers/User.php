<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class User extends CI_Controller{
  
    public function __construct() {
        parent::__construct();
       
        if ($this->session->userdata['user_status'] != 1){
                 
                redirect('login/registration');
         
        } 
    
    }
  
    public function index()
    {
 
  
        if(($this->session->userdata('login')!=""))
         {
          $this->welcome();
         }
         else
         {
             $data['title']= 'Home';
             $this->view->views('registration_view.php', $data);
            
             $key = random_string('alnum', 20);
         
             $email = 'a.goginyan@mail.ru';
             $this->load->model('Email_model');
            
             $this->Email_model->sendActivationLink($email, $key);
         }
    } 
 
 

     public function welcome()
     {
       
             $data['title']= 'Welcome';
             $this->view->views('welcome_view.php', $data);
          
     }
     
 
      public function logout()
      {
             $newdata = array(
             'user_id'   =>'',
             'user_name' =>'',
             'user_email' => '',
             'user_status' => '',
             'logged_in' => FALSE,
             );
             $this->session->unset_userdata($newdata );
             $this->session->sess_destroy();
             redirect('login/registration');
            }
}

