<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('UserModel', 'A_model');
	}

	public function index()
	{
	}


	public function inscription()
	{
		$this->form_validation->set_rules('pseudo', '"Pseudo"', 'trim|required|max_length[52]|alpha_dash|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('mdp', '"Mot de passe"', 'trim|required|max_length[52]|alpha_dash|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('sex', '"Sexe"', 'trim|required|max_length[52]|alpha_dash|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('city', '"Ville"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('mail', '"E-mail"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');

		if($this->form_validation->run())
		{

			$pseudo = $this->input->post('pseudo');
			$mdp = md5($this->input->post('mdp'));
			$firstname = $this->input->post('firstname');
			$name = $this->input->post('name');
			$sex = $this->input->post('sex');
			$BD = $this->input->post('BD');
			$city = $this->input->post('city');
			$mail = $this->input->post('mail');

			try
			{
				$this->A_model->add_user($pseudo, $mdp, $firstname, $name, $sex, $BD, $city, $mail);
				$info = "Inscription reussie";
				redirect('welcome/index?info='.$info, 'refresh');
			}
			catch (Exception $e)
			{
				var_dump($e->getMessage());
			}
		}
		else
		{
			$this->load->view('inscription');
		}

	}

	public function connexion()
	{
		$data = array('error' => '');

		$pseudo = $this->input->post('pseudo');
		$mdp = $this->input->post('password');

		if ($pseudo && $mdp)
		{
			$user = $this->A_model->get_user($pseudo, md5($mdp));

			if ($user)
			{
				$this->session->set_userdata('pseudo', $pseudo);
				$this->session->set_userdata('userId', $user->id);
				redirect('welcome/index', 'refresh');
			}
			else
			{
				$data['error'] = 'Mauvais pseudo ou mot de passe !';
				$this->load->view('welcome', $data);	
			}
		}
		else
		{
			redirect('welcome/index', 'refresh');
		}
	}
	public function logout()
	{
 		$this->session->sess_destroy();
 		redirect('welcome/index', 'refresh');
	}
	public function forgotpassword()
	{
		$data = array('error' => '', 'info' => '');

		$email = $this->input->post('mail');

		if ($email)
		{
			$user = $this->A_model->get_user_by_email($email);
			if ($user)
			{
				$this->sendpassword($user);
				$data['info'] = 'Mot de passe envoyé';
				$this->load->view('forgotpassword', $data);
			}
			else
				$data['error'] = 'Mail introuvable';
		}
		else
		{
			$this->load->view('forgotpassword');
		}
		$this->load->view('forgotpassword', $data);
	}
	private function sendpassword($user)
	{
		date_default_timezone_set('GMT');

		$this->load->helper('string');
		$config['protocol'] = 'smtp';
		$config['smtp_host']='ssl://smtp.mailgun.org';
		$config['smtp_user']='postmaster@sandboxfa771818c4804a6681421e83383926a5.mailgun.org';
		$config['smtp_pass']='04x9dru8dhd8';
		$config['smtp_port']='465';
		$this->load->library('email', $config);
		$this->email->from('master@booda.fr', 'Booda Master');
		$this->email->to($user->Mail); 	
		$this->email->subject('Votre mot de passe');
		$this->email->message('Voici votre mot de passe '. $user->Pass);	
		$this->email->send();
	} 
}