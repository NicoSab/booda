<?php

class Chat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helpers(array('url', 'assets'));
		$this->load->model('ConvModel', 'C_model');
		$this->load->model('MessageModel', 'M_model');
	}

	public function conversation()
	{
		$this->output->set_header("refresh:30;url=".base_url()."index.php/chat/conversation"); 

		$userId = $this->session->userdata('userId');
		$convId = 1;

		$message = $this->input->post('message');
		if ($message)
			$this->M_model->add_message($userId, $convId, $message);

		$messages = $this->M_model->get_messages_for_conversation($convId);

		$data = array();
		$data['messages'] = $messages;

		$this->load->view('conversation', $data);
	}
}