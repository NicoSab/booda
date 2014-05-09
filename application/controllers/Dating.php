<?php

class Dating extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');

		if (!$this->session->userdata('userId'))
		{
			redirect('welcome/index', 'refresh');
		}
	}

	public function index()
	{
		$this->load->view('last_profiles');
	}
}