<?php

	class Users_model extends CI_Model 
	{
		public function logged_in()
		{
			return $this->session->userdata('logged_in');
		}
			
		public function render($view, $params = array()){
			
		}
		
		public function recovery($post)
		{
			$email = strtolower($post['recovery_email']);
			$this->db->where("users_email", $email);
			$this->db->where("users_delete", FALSE);
			$this->db->limit(1);
			$row = $this->db->get('users')->row_array();			
			if (!empty($row))
			{
				if (!$row['users_active'])
				{
					return $this->pub->message("users_not_active");
				}
				if (time()-$row['users_recovery']>600)				
				{
					$new_password=mb_strimwidth(md5($_SERVER['REQUEST_TIME']), 0, 6); 
					$this->db->where('users_id', $row['users_id']);
					$row = $this->db->update('users',array('users_recovery'=>time(), 'users_pass'=>$this->pass_gen($new_password) ));
					$data['_new_password'] =$new_password;
					$message=$this->load->view('latters/recovery_pass.php', $data, TRUE);
					$this->load->library('email');
					$this->email->from('no-replay@div-art.com', 'no-replay');
					$this->email->to($post['recovery_email']);
					$this->email->subject('Новий пароль для сайту '.$_SERVER['SERVER_NAME']); 
					$this->email->message($message);
					$this->email->set_crlf( "\r\n" );;
					if($this->email->send())
					{
						return $this->pub->message("email_sended");
					}
					else
					{
						return $this->pub->message("email_not_sended");
					}
				}
				else
				{
					return $this->pub->message("users_last_rec_min");
				}
			}
		}
		
		public function signin($post)
		{
			$pass = $post['signin_pass'];
			$email = strtolower($post['signin_email']);
			$pass = $this->pass_gen($pass);
			
			$this->db->where("users_email", $email);
			$this->db->where("users_pass", $pass);
			$this->db->where("users_delete", FALSE);
			$this->db->limit(1);
			$row = $this->db->get('users')->row_array();
			
			if ( ! empty($row))
			{
				if ( ! $row['users_active'])
				{
					return $this->pub->message("signin_not_active");
				}
				
				$this->add_log_users($row['users_id']);
				$this->session->set_userdata(array("logged_in" => $row['users_id'],
												   "type" => $row['users_types_id']));
				return $this->pub->message("signin_ok", OK);
			}
			else 
			{
				return $this->pub->message("signin_wrong");
			}
		}
		
		public function signout()
		{
			$this->session->unset_userdata("logged_in");
			return TRUE;
		}
		
		public function add_log_users($id)
		{
			$logs_path = "./logs/users/".$id.".txt";
			
			$data['browser'] = $_SERVER["HTTP_USER_AGENT"];
			$data['ip_addres'] = $_SERVER["REMOTE_ADDR"];
			$data['data_active'] = date("F j, Y, g:i a");
			
			if (file_exists($logs_path))
			{
				$team = explode("\n", file_get_contents($logs_path));
				if (count($team) > 20)
				{
					array_pop($team);
					$team = implode("\n", $team);
					file_put_contents($logs_path, $team);
				}
				file_put_contents($logs_path, json_encode($data)."\n", FILE_APPEND);
			}
			else
			{
				file_put_contents($logs_path, json_encode($data)."\n");
			}
			
		}
				
				
		public function pass_gen($pass)
		{			
			$salt = substr(md5($pass), 1, 15);
			return crypt($pass.$salt, $salt);
		}
		
	}
	