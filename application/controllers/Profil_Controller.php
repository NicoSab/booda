<?php

class Profil_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		//$this->load->model('Profil_model', 'P_model');
	}

	public function update_profil()
	{

	}

	public function see_profil()
	{
		$this->load->view('see_profil');
	}
}