<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dating extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->model('UserModel', 'U_model');
		$this->load->library("pagination");

		if (!$this->session->userdata('userId'))
		{
			redirect('welcome/index', 'refresh');
		}
	}

	public function index()
	{
		$config["base_url"] = site_url()."/Dating/index";
        $config["total_rows"] = $this->U_model->record_count();
        $config["per_page"] = 9;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->U_model->fetch_users($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		$this->load->view('last_profiles', $data);
	}
	public function search()
	{
		$this->load->view('search');
	}
	public function resetSearch()
	{
		$userId = $this->session->userdata('userId');
		$this->session->sess_destroy();
		$this->session->sess_create(); 
		$this->session->set_userdata('userId', $userId);
		redirect('dating/search', 'refresh');
	}
	public function results()
	{
		if ($this->input->post('newsearch'))
		{
			$userId = $this->session->userdata('userId');
			$this->session->sess_destroy();
			$this->session->sess_create(); 
			$this->session->set_userdata('userId', $userId);
			$this->session->set_userdata('hobbies', $this->input->post('hobbies'));
			$this->session->set_userdata('interest', $this->input->post('interest'));
			$this->session->set_userdata('situation', $this->input->post('situation'));
			$this->session->set_userdata('sexuality', $this->input->post('sexuality'));
			$this->session->set_userdata('sex', $this->input->post('sex'));
			$this->session->set_userdata('job', $this->input->post('job'));
			$this->session->set_userdata('agemin', $this->input->post('agemin'));
			$this->session->set_userdata('agemax', $this->input->post('agemax'));
			$this->session->set_userdata('searchExists', "1");
		}
		$hobbies = $this->session->userdata('hobbies');
		$interest = $this->session->userdata('interest');
		$situation = $this->session->userdata('situation');
		$sexuality = $this->session->userdata('sexuality');
		$job = $this->session->userdata('job');
		$sex = $this->session->userdata('sex');
		$agemin = $this->session->userdata('agemin');
		$agemax = $this->session->userdata('agemax');

		$config["base_url"] = site_url()."/dating/results";
        $config["per_page"] = 9;
        $config["uri_segment"] = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->U_model->search($config["per_page"], $page, $hobbies, $job, $interest, $situation, $sexuality, $sex, $agemin, $agemax);
      	$config["total_rows"] = $this->U_model->count_search($hobbies, $job, $interest, $situation, $sexuality, $sex, $agemin, $agemax);

        $this->pagination->initialize($config);
 
        $data["links"] = $this->pagination->create_links();

		$this->load->view('search_results', $data);
	}
}