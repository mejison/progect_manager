<?php

	class Pub extends CI_Controller
	{
		var $data = array();
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model("Pub_model", "pub");
			$this->load->model("Users_model", "users");
			$this->load->model("Pages_model", "pages");
			
			$this->data['_css'] = array('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
										'/assets/css/main.css');
										
			$this->data['_js'] = array('https://code.jquery.com/jquery-2.2.0.min.js',
									   'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
									   '/assets/js/main.js');
		}
		
		public function get_info_user($id)
		{
			$this->db->where(array('users_id' => $id));
			return $this->db->get('users')->result();	
		}
		
		public function index()
		{
			$this->data['_header'] = '';
			$this->data['_content'] = '';
			$this->data['_footer'] = '';
			
			if ($this->users->logged_in())
			{	
				$this->data['_menu']=$this->pages->get_menu();
				$this->data['_header'] = $this->load->view('header', $this->data, TRUE);
				$this->data['_footer'] = $this->load->view('footer', $this->data, TRUE);
				
				$model = strtolower($this->uri->segment(1));
				$view = strtolower($this->uri->segment(2));
				
				if (empty($view))
				{
					$this->load->helper('url');
					redirect('/orgs/insert/', 'location', 301);
				}
				
				$this->load->model(ucfirst($model).'_model', $model);
				$this->data['_content'] = $this->$model->render($view, array_slice($this->uri->segments, 2));
			}
			else 
			{
				if(($this->uri->segment(1)=='users') && ($this->uri->segment(2)=='recovery'))
				{	
					$this->data['_content'] = $this->load->view('recovery', $this->data, TRUE);
				}
				else
				{
					$this->data['_content'] = $this->load->view('signin', $this->data, TRUE);
				}
			}
			$this->load->view('main', $this->data);
		}
		

		
	}