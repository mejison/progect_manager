<?php

	class Pages_model extends CI_Model 
	{
		var $table_pages = 'pages';
		var $model = '';
		
		public function __construct()
		{
			parent::__construct();
			$this->model = str_replace('_model', '', strtolower(get_class()));
		}
		
		public function render($view, $params = array())
		{
			$data['_list_pages']=array();
			if($view=="list_pages")
			{
				$this->db->select('*');
				$this->db->from('pages');
				$data['_list_pages'] = $this->db->get()->result();
			}
			return $this->load->view($this->model.'/'.$view, $data, TRUE);
		}

		public function save($post)
		{
			if(!empty($post['pages_id'])) {
				$pages['pages_id']=$post['pages_id'];
			}
			if(!empty($post['pages_name'])) {
				$pages['pages_name']=$post['pages_name'];
			}
			if(!empty($post['pages_model'])) {
				$pages['pages_model']=$post['pages_model'];
			}
			if(!empty($post['pages_method'])) {
				$pages['pages_method']=$post['pages_method'];
			}
			if(!empty($post['pages_menu'])) {
				$pages['pages_menu']=$post['pages_menu'];
			}
			if(!empty($post['pages_access_1'])) {
				$pages['pages__access_1']=$post['pages__access_1'];
			}
			if(!empty($post['pages_access_2'])) {
				$pages['pages__access_2']=$post['pages__access_2'];
			}
			if(!empty($post['pages_access_3'])) {
				$pages['pages__access_3']=$post['pages__access_3'];
			}
			
			$logs_path = "./logs/debug/save.txt";
			file_put_contents($logs_path, json_encode($pages)."\n");
			
			if(!empty($post['pages_id'])) {
				$this->db->where('pages_id', $pages['pages_id']);
				$row = $this->db->update('pages',$pages);
			}
			else
			{
				$row = $this->db->insert('pages',$post);
			}

			if(!empty($row))
			{
				return $this->pub->message("pages_saved");
			}else
			{
				return $this->pub->message("pages_not_saved");
			}
		}
		
		
		public function get_menu()
		{
			$users_id=$this->session->userdata('logged_in');
			$users_type=$this->session->userdata('type');
			$this->db->select('pages_id, pages_name, pages_model, pages_method, pages_menu');
			$this->db->from('pages as p, users as u');
			$this->db->where('p.pages_access_'.$this->session->userdata('type'), TRUE);
			$this->db->where('p.pages_menu', TRUE);
			$this->db->where('u.users_id', $users_id);
			$row = $this->db->get()->result();
			if(!empty($row))
			{
				return $row;
			}else
			{
				return NULL;
			}
		}
		
/*		public function list_pages()
		{
			return $this->pub->message("not_have_page");
			/*
			$pages='';
			if(!empty($pages))
			{
				return $this->pub->message("have_page");
			}else
			{
				return $this->pub->message("not_have_page");
			}
		}*/
		
		
	}
