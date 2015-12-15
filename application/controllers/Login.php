<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Login extends CI_Controller
{
    
      public function log()
      {
             $email=$this->input->post('email');
             $password=md5($this->input->post('pass'));
             
             $this->load->model('User_model');
             
             $this->form_validation->set_rules($this->User_model->loginval());
     
             if($this->form_validation->run() == FALSE)
             {
                 $data['title']= 'Home';
                 $this->view->views('registration_view.php', $data);
 
             }
             else
             {

           
             $this->load->model('User_model');
             $result=$this->User_model->login($email,$password);
             if($result && $this->session->userdata['user_status'] == 1){
 
                 redirect('user/welcome');
              
              } elseif ($result && $this->session->userdata['user_status'] !== 1) {
               
                 redirect('login/thank');
                //echo "<script>alert('Please, activate your registration!')</script>";
                //echo "<script>window.open('http://localhost/codeigniter/login/registration', '_self')</script>";
                 
                
             } else {
             
                echo "<script>alert('Login/Email or Password is Incorrect, Please Try Again!')</script>";
                echo "<script>window.open('http://localhost/codeigniter/login/registration', '_self')</script>";
               
               
             }
             }
      }
      
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
              redirect('login/thank'); 
              
             }
      }
     public function verify($activationText=NULL)
     {
              $this->load->model('User_model');
              $noRecords = $this->User_model->activeLink($activationText);
                 if ($noRecords > 0) {
                  $data['title']= 'Activate';
                  $this->view->views('activ_view.php', $data);
                      
                  } else {
                        redirect('login/registration');
                  }
                 
     }
     
     public function thank()
     {
              $data['title']= 'visit email';
              $this->view->views('thank_view.php', $data);
   
     }
     public function upload()
     {
              $data['title']= 'visit email';
              $this->view->views('upload_view.php', $data);
   
     }
     
     public function reset_password()
     {

      
         if($this->input->post('email') && !empty($this->input->post('email')))
         {
            
             $this->form_validation->set_rules('email','Email Address', 'required|valid_email');
             
             if($this->form_validation->run() == FALSE)
             {
                 
                 $this->view->views('view_login.php', array('error'=>'Please supply valid email address.'));
 
             }
             else
             {
                  $email = $this->input->post('email');
                  $this->load->model('User_model');
                  $result =$this->User_model->email_exist($email);
                  
                  if($result){
                        //$this->send_reset_password_email($email,$result);
                        $accessToken=random_string('alnum', 20);
                        $this->User_model->token($accessToken,$email);
                        $this->load->model('User_model');
                        $data['accessToken'] = $this->User_model->email_exist($email);
                        $this->view->views('view_reset_password_sent.php', array('email'=> $email, 'accessToken' =>$data['accessToken']));
                   }
                   else
                   {
                       $this->view->views('view_reset_password.php', array('error'=> 'Email Address Not Registred.')); 
                   }
                   
             }
            
         }
         else
         {
             $this->view->views('view_reset_password.php');
         }
     }
     
     public function reset_password_form($accessToken=NULL)
     {
                  $this->load->model('User_model');
                  $verified =$this->User_model->verify_reset_password_code($accessToken);
                  
                  if($verified > 0){
                       $data['key']=$this->uri->segment(3);
                       $this->view->views('view_update_password.php',$data); 
                  }
                  else
                  {
                      $this->view->views('view_reset_password.php', array('error'=> 'There was a problem with your link.'));  
                  }
                  
      }
 
     
     public function update_password()
     {
          if($this->input->post('password')==false){
                    
                  die('Error updating your password');  
          }
          
          $this->form_validation->set_rules('password','Password', 'trim|required');
          $this->form_validation->set_rules('password_conf','Confirmed Password', 'trim|required|matches[password]');
           
            if($this->form_validation->run() == FALSE)
            {
            
            $this->view->views('view_update_password.php');
            
            }
            else
            {
                  $this->load->model('User_model');
                  $result=$this->User_model->update_password();
                  
                  if($result){
                        $this->view->views('view_update_password_success.php');
                  }
                  else
                  {
                      $this->view->views('view_update_password.php', array('error'=>'Problem updating your password.'));  
                  }
                  
            }
   
     }
     private function send_reset_password_email($email,$first_name)
     {
       $email_msg = "Dear User,
       <p-->
       Please click on below URL.<p></p>";
       $email_msg .= "http://loalhost/codeigniter/login/reset_password_form/".$email_code.$first_name;
       $subject = "Reset your Password";
                $this->load->library('email');
  				$config['charset'] = 'utf-8';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('goginyan.a@gmail.com', 'Support Team');
				$this->email->to($email);
				$this->email->subject($subject);
				$this->email->message($email_msg);
				$this->email->send();
          
     }
     
}