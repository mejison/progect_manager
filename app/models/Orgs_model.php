<?php

	class Orgs_model extends CI_Model 
	{
		var $table_orgs = 'orgs';
		var $table_address = 'address';
		var $table_requisites = 'requisites';
		var $model = '';
		
		public function __construct()
		{
			parent::__construct();
			$this->model = str_replace('_model', '', strtolower(get_class()));
		}
		
		public function render($view, $params = array())
		{
			return $this->load->view($this->model.'/'.$view, $this->data, TRUE);
		}
				
		public function add($post)
		{
			$table_orgs = array();
			$table_fact_address = array();
			$table_jur_address = array();
			$table_requisites = array();
			
			foreach ($post as $key => $value)
			{
				if (preg_match('/^requisites/', $key))
				{
					$table_requisites[$key] = $value;
				}
				if (preg_match('/^orgs/', $key))
				{
					$table_orgs[$key] = $value;
				}
				if (preg_match('/^address_[a-zA-Z]+$/', $key))
				{
					$table_fact_address[$key] = $value;
				}				
				if (preg_match('/^address_jur/', $key))
				{
					if ( ! empty($value))
					{
						$table_jur_address[ str_replace('_jur', '', $key) ] = $value;		
					}
				}
			}
			
			
			//insert table address
			$this->db->insert($this->table_address, $table_fact_address);
			$this->db->select_max('address_id');
			$field_addr_fact_id = $this->db->get($this->table_address)->result_array('address_id');
			$field_addr_fact_id = $field_addr_fact_id[0]['address_id'];
			
			if ( ! empty($table_jur_address))
			{
				$this->db->insert($this->table_address, $table_jur_address);
				$field_addr_jur_id = $field_addr_fact_id + 1;
			}
			
			// insert orgs
			$table_orgs['address_fact_id'] = $field_addr_fact_id;
			$table_orgs['address_jur_id'] = ( ! empty($field_addr_jur_id)) ? $field_addr_jur_id : FALSE;
			$this->db->insert($this->table_orgs, $table_orgs);
			
			// insert requisites
			$this->db->select_max('orgs_id');
			$field_orgs_id = $this->db->get($this->table_orgs)->result_array('orgs_id');
			$field_orgs_id = $field_orgs_id[0]['orgs_id'];
			
			$table_requisites['orgs_id'] = $field_orgs_id;
			$this->db->insert($this->table_requisites, $table_requisites);
			return $this->pub->message('orgs_add_ok', OK);
		}
		
		public function show_orgs($post)
		{
			$this->db->where('orgs_delete', FALSE);
			$orgs_array = $this->db->get('orgs')->result_array();
			
			foreach ($orgs_array as $key => $value)
			{
					foreach ($value as $key_in => $value_in)
					{
						if (preg_match('/^address_/', $key_in))
						{
							if ($key_in == 'address_jur_id' && $value_in != 0)
							{
								$this->db->where(array('address_id' => $value_in));
								$this->db->select('address_address, address_city, address_index');
								$address_jur_id =  $this->db->get($this->table_address)->result_array();
								$orgs_array[$key]['address_jur_id'] = $address_jur_id[0];
							}
							$this->db->where(array('address_id' => $value_in));
							$this->db->select('address_address, address_city, address_index');
							$address_fact_id =  $this->db->get($this->table_address)->result_array();
							$orgs_array[$key]['address_fact_id'] = isset($address_fact_id[0]) ? $address_fact_id[0] : array();
						}
					}
			
			}
			return $orgs_array;
		}
		
		public function drop_iteam_orgs($post){
			$this->db->where('orgs_id', $post['orgs_id']);
			$this->db->updata($this->table_orgs, array('orgs_delete' => TRUE));
		}
	}
	
		