<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helpers(array('url', 'assets'));
		$this->load->model('profilemodel', 'P_model');
		$this->load->model('photomodel', 'Photo_model');
		$this->load->helper(array('form', 'url'));

		if (!$this->session->userdata('userId'))
		{
			redirect('welcome/index', 'refresh');
		}
	}

	function index()
	{
		$userId = $this->session->userdata('userId');
		$profil = $this->P_model->get_profil($userId);
		$this->load->view('upload_photo', $profil, array('error' => ' ' ));
	}

	function do_upload()
	{
		$userId = $this->session->userdata('userId');
		$profil = $this->P_model->get_profil($userId);

		$upload_path = './user_data/photos/';
		$file_name = md5(uniqid(rand(), true));

		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name']  = $file_name;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_photo', $error);
		}
		else
		{
			$data = $this->upload->data();
			$ext = $data["file_ext"];
			$this->Photo_model->add_photo($file_name.$ext,  $profil['id']);
			redirect('/profil/see_profile/'.$userId);
		}
	}
}
?>
