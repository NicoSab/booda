<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('session');
	}

	public function index()
	{
		if (!$this->session->userdata('userId'))
			$this->load->view('welcome');
		else
			redirect('dating', 'refresh');
	}
}