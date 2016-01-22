<?php

	class Api extends CI_Controller
	{
		
		public function __construct()
		{	
			parent::__construct();
			$this->load->model("pub_model", 'pub');
		}
		
		public function render()
		{
			$response = array('messages' => array(),
							  'data' => FALSE,
							  'callback' => $_POST['_callback']);
			
			$class = strtolower($this->uri->segment(2));
			$method = strtolower($this->uri->segment(3));
			$this->load->model(ucfirst($class).'_model', $class); // завантаження моделі переданої по url
			
			if (method_exists($this->$class, $method)) // перевірка існування методу в класі
			{
				$response['data'] = $this->$class->$method($_POST);
			}
			$response['messages'] = $this->pub->get_messages(); 
			
			echo json_encode($response); // повернення результату клієнту
		
		}
	}
