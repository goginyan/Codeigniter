<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User_model extends CI_Model {



		public function login($email,$password)
		{
					$this->db->where("email",$email);
					
					$this->db->or_where("login",$email);
					$this->db->where("password",$password);
						   
					$query=$this->db->get("user");
					
					   if($query->num_rows()>0)
					   {
						   foreach($query->result() as $rows)
						   {
							   //add all data to session
							   $newdata = array(
								   'user_id'=> $rows->id,
								   'login'=> $rows->login,
								   'user_email'=>$rows->email,
								   'user_status'=>$rows->user_status,
								   'logged_in'=>TRUE,
								  );
						   }
							   $this->session->set_userdata($newdata);
							   return true;            
					   }
					   return false;
		}
		public function add_user($key)
		{
					$data=array(
						'first_name'=>$this->input->post('first_name'),
						'last_name'=>$this->input->post('last_name'),
						'login'=>$this->input->post('login'),
						'email'=>$this->input->post('email_address'),
						'password'=>md5($this->input->post('password')),
						'key'=>$key
						);
					$this->db->insert('user',$data);
			
		}
	
		public function activeLink($key)
		{
					$this->db->set('user_status', 1)
					->where('key', $key)
					->update('user');
					
				   $this->db->where("key",$key);
				   $query=$this->db->get("user");
					
					   if($query->num_rows()>0)
					   {
						   foreach($query->result() as $rows)
						   {
							  
							   $status = array(
								   'user_status'=>1,
								   'login'=> $rows->login,
								
								  );
						   }
							   $this->session->set_userdata($status);
							   return true;            
					   }
                 return $this->db->affected_rows();
		}

		public function register()
		{
				$config = array(
					array(
							'field' => 'first_name',
							'label' => 'First Name',
							'rules' => 'trim|required|min_length[4]|regex_match[/^[a-zA-Z 0-9]+$/]'
					),
					array(
							'field' => 'last_name',
							'label' => 'Last Name',
							'rules' => 'trim|required|min_length[4]|regex_match[/^[a-zA-Z 0-9]+$/]'
					),
					array(
							'field' => 'login',
							'label' => 'Login',
							'rules' => 'trim|required|min_length[4]|regex_match[/^[a-zA-Z 0-9]+$/]|is_unique[user.login]',
							'errors' => array(
									'required' => 'You must provide a %s.',
							),
			
						 ),
					array(
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'trim|required|min_length[4]|max_length[32]|is_unique[user.password]',
							'errors' => array(
									'required' => 'You must provide a %s.',
							),
					),
					array(
							'field' => 'con_password',
							'label' => 'Password Confirmation',
							'rules' => 'trim|required|matches[password]'
					),
					array(
							'field' => 'email_address',
							'label' => 'Your Email',
							'rules' => 'required|valid_email|is_unique[user.email]'
					)
		     );
		
		  return $config;
		}
		public function loginval()
		{
				$config = array(
								array(
										'field' => 'email',
										'label' => 'Login/Email:',
										'rules' => 'htmlspecialchars|trim|required',
											
									 ),
								array(
										'field' => 'pass',
										'label' => 'Password:',
										'rules' => 'trim|required',
									  ),
							   );
				return $config;
		}
		
		public function email_exist($email)
		{
		     $this->db->where("email",$email);
			 $query=$this->db->get("user");
			 			 
		        if($query->num_rows()>0)
				{
					foreach($query->result() as $rows)
					{
					   
						$data['first_name'] = $rows->first_name;
						$data['accessToken'] = $rows->accessToken;
						   
					}

					
				}
				
			 return $query->result();	
				

		}
		
        public function verify_reset_password_code($key)
		{
				   $this->db->where("accessToken",$key);
				   $query=$this->db->get("user");
					
                  return $this->db->affected_rows();
		}
		
		public function update_password()
		{
			$key=$this->input->post('key');
	        
			$password = md5($this->input->post('password'));
		    $this->db->set('password', $password)
		   ->where('accessToken', $key)
		   ->update('user');
		   
		   if($this->db->affected_rows()>0){
				return true;
		   }
		   else{
				return false;
		   }
		}
	
		public function token($key,$email)
		{
					$this->db->set('accessToken', $key)
					->where('email', $email)
					->update('user');
					
                return $this->db->affected_rows();
		}
		
}

