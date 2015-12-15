<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_model extends CI_Model {
    
    
     function sendActivationLink($email,$key){
       $email_msg = "Dear User,
       <p-->
       Please click on below URL.<p></p>";
       $email_msg .= "http://loalhost/codeigniter/login/verify/" . $key;
       $subject = "Activation Link";
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
	 
	 function sendemail($email,$key){
       $email_msg = "Dear User,
       <p-->
       Please click on below URL.<p></p>";
       $email_msg .= "http://loalhost/codeigniter/login/verify/" . $key;
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