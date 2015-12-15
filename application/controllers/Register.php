<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Register extends CI_Controller
{
         public function registration()
         {
             $this->load->model('User_model');
             
             $this->form_validation->set_rules($this->User_model->register());
     
             if($this->form_validation->run() == FALSE)
             {
                 $data['title']= 'Home';
                 $this->view->views('registration_view.php', $data);
 
             }
             else
             {
              $key=random_string('alnum', 20);
              $this->load->model('User_model');
              $this->User_model->add_user($key);
              $data['title']= 'visit email';
              $this->view->views('thank_view.php', $data);

              
             }
         }
     public function verify($activationText=NULL)
     {
              $this->load->model('User_model');
              $noRecords = $this->User_model->activeLink($activationText);
                 if ($noRecords > 0) {
                        redirect('user/welcome');
                  } else {
                        redirect('register/registration');
                  }
     }
    
}
