<?php

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
}