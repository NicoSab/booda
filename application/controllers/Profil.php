<?php

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helpers(array('url', 'assets'));
		$this->load->model('ProfileModel', 'P_model');

		if (!$this->session->userdata('userId'))
		{
			redirect('welcome/index', 'refresh');
		}
	}
	public function see_profile($userId = null)
	{
		if ($userId)
		{
			$sessionId = $this->session->userdata('userId');
			$profil = $this->P_model->get_profil($userId);

			if (empty($profil) && $userId == $sessionId)
			{
				redirect('/profil/update_profil', 'refresh');
			}
			else
			{
				$this->load->view('see_profil', $profil);
			}
		}
		else
			redirect('/welcome/index', 'refresh');
	}

	public function update_profil()
	{
		$this->form_validation->set_rules('interest', '"Interesse par"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('situation', '"Situation"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
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

			$profil = $this->P_model->get_profil($userId);

			if (empty($profil)) {
				$this->P_model->add_profil($description, $hobbies, $interest, $situation, $sexuality, $job, $userId);
			}
			else {
				$this->P_model->update_profil($description, $hobbies, $interest, $situation, $sexuality, $job, $userId);
			}

			redirect('/profil/see_profil');
		}
		else
		{
			$this->load->view('update_profil');
		}
	}

}