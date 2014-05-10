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
		$this->load->model('UserModel', 'U_model');
	}

	public function new_conversation($userId2 = null)
	{
		if($userId2)
		{
			$userId1 = $this->session->userdata('userId');

			$this->C_model->create_conversation($userId1, $userId2);

			$conversation = $this->C_model->get_conversation($userId1, $userId2);

			redirect('/chat/conversation/'.$conversation['id'], 'refresh');
		}
	}

	public function conversation($convId)
	{
		$this->output->set_header("refresh:30;url=".base_url()."index.php/chat/conversation/".$convId); 

		$userId = $this->session->userdata('userId');
		$message = $this->input->post('message');

		if ($message)
			$this->M_model->add_message($userId, $convId, $message);

		$messages = $this->M_model->get_messages_for_conversation($convId);

		$data = array();
		$data['messages'] = $messages;

		$this->load->view('conversation', $data);
	}

	public function all_chat()
	{
		$conversations = $this->C_model->get_ten_last_conversation($this->session->userdata('userId'));
		$users = $this->U_model->get_all_user();
		$data = array();
		$data['conversations'] = $conversations;
		$data['users'] = $users;

		$this->load->view('chat', $data);
	}
}