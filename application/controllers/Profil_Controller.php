<?php

class Profil_Controller extends CI_Controller
{
	private $first = true;

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helpers(array('url', 'assets'));
		$this->load->model('Profil_model', 'P_model');
	}

	public function update_profil()
	{
		$this->form_validation->set_rules('interest', '"Interesse par"', 'trim|required|max_length[52]|alpha_dash|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('situation', '"Situation"', 'trim|required|max_length[52]|alpha_dash|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('sexuality', '"Sexualite"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');

		if ($this->form_validation->run())
		{
			$hobbies = $this->input->post('hobbies');
			$interest = $this->input->post('interest');
			$situation = $this->input->post('situation');
			$sexuality = $this->input->post('sexuality');
			$job = $this->input->post('job');
			$description = $this->input->post('description');
			$userId = $this->session->userdata('userId');

			if ($first)
			{
				$this->P_model->add_profil($description, $hobbies, $interest, $situation, $sexuality, $job, $userId);
				$first = false;
			}
			else
				$this->P_model->update_profil($description, $hobbies, $interest, $situation, $sexuality, $job, $userId)

		}
		else
		{
			$this->load->view('update_profil');
		}
	}

	public function see_profil()
	{
		if ($first)
			redirect('/profil_controller/update_profil', 'refresh');
		else
			$this->load->view('see_profil');
	}
}