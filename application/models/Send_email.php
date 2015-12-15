<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Send_email extends CI_Model {
    
    
     function sendEmail($from, $to, $email_msg, $subject){
      
                $this->load->library('email');
  				$config['charset'] = 'utf-8';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from($from);
				$this->email->to($to);
				$this->email->subject($subject);
				$this->email->message($email_msg);
				$this->email->send();
    
        
     }
}