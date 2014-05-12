<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helpers(array('url', 'assets'));
		$this->load->model('profilemodel', 'P_model');
		$this->load->model('photomodel', 'Photo_model');

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
			$data["profil"] = $profil;
			$photos = $this->Photo_model->get_user_photos($profil["id"]);
			$data["pics"] = $photos;
			if (!$profil["idUser"] && $userId == $sessionId)
			{
				redirect('/profil/update', 'refresh');
			}
			else
			{
				$this->load->view('see_profil', $data);
			}
		}
		else
			redirect('/welcome/index', 'refresh');
	}

	public function update()
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

			if (!$profil["idUser"]) {
				$this->P_model->add_profil($description, $hobbies, $interest, $situation, $sexuality, $job, $userId);
			}
			else {
				$this->P_model->update_profil($description, $hobbies, $interest, $situation, $sexuality, $job, $userId);
			}

			redirect('/profil/see_profile/'.$userId);
		}
		else
		{
			$userId = $this->session->userdata('userId');
			$profil = $this->P_model->get_profil($userId);

			$this->load->view('update_profil', $profil);
		}
	}

	public function delete_photo($photoId)
	{
		$sessionId = $this->session->userdata('userId');
		$photo = $this->Photo_model->get_photo($photoId);
		$userId = $photo->id;
		if ($userId == $sessionId)
		{
			$path = photo_url($photo->name);
			$this->load->helper("file");
			delete_files($path);
			$this->Photo_model->delete_photo($photoId);
		}
		redirect('/profil/see_profile/'.$userId);
	}
	public function photo($photoId)
	{
		$photo = $this->Photo_model->get_photo($photoId);
		$this->load->view('photo', $photo);
	}
}
