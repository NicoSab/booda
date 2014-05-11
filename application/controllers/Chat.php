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
		if (!$this->session->userdata('userId'))
		{
			redirect('welcome/index', 'refresh');
		}
	}
	public function index()
	{
		$conv = $this->C_model->get_last_conversation($this->session->userdata('userId'));
		if ($conv)
		{
			$this->conversation($conv->id);
		}
		else
		{
			$conversations = $this->C_model->get_ten_last_conversation($this->session->userdata('userId'));
			$users = $this->U_model->get_all_user();

			$data = array();
			$data['conversations'] = $conversations;
			$data['users'] = $users;

			$this->load->view('chat', $data);
		}
	}
	public function new_conversation($userId2 = null)
	{
		if($userId2)
		{
			$userId1 = $this->session->userdata('userId');

			$this->C_model->create_conversation($userId1, $userId2);

			$conversation = $this->C_model->get_conversation($userId1, $userId2);

			redirect('/chat', 'refresh');
		}
	}

	public function conversation($convId)
	{
		$userId = $this->session->userdata('userId');
		$message = $this->input->post('message');

		if ($message)
			$this->M_model->add_message($userId, $convId, $message);

		$messages = $this->M_model->get_messages_for_conversation($convId);
		$users = $this->U_model->get_all_user();
		$conversations = $this->C_model->get_ten_last_conversation($this->session->userdata('userId'));

		$data = array();
		$data['conversations'] = $conversations;
		$data['messages'] = $messages;
		$data['users'] = $users;

		$this->load->view('chat', $data);
	}
}