<?php

	class Pub_model extends CI_Model
	{
		var $messages = array();
		public function __construct()
		{
			parent::__construct();
		}
		
		public function message($code, $type = ERROR)
		{
			$this->messages[] = array('code' => $code,
									  'type' => $type,
									  'text' => '',
									  'time' => date("H:i:s d-m-Y"),
									  'timestamp' => time());
			return $type != ERROR;
		}
		
		public function get_messages()
		{
			include('./app/views/errors/app/messages.php');
			foreach ($this->messages as $key => $message)
			{
				if (isset($_message[LANG][$message['code']]))
				{
					$this->messages[$key]['text'] = $_message[LANG][$message['code']];
				}
			}
			
			return $this->messages;
		}
	}