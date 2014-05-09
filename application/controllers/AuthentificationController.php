<?php

class AuthentificationController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Authentification_model', 'A_model');
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
			$mdp = $this->input->post('mdp');
			$firstname = $this->input->post('firstname');
			$name = $this->input->post('name');
			$sex = $this->input->post('sex');
			$BD = $this->input->post('BD');
			$city = $this->input->post('city');
			$mail = $this->input->post('mail');

			$this->A_model->add_user($pseudo, $mdp, $firstname, $name, $sex, $BD, $city, $mail);

		}
		else
		{
			if ($this->input->post('connexion'))
			{
				return $this->connexion(); 
			}
			else
				$this->load->view('inscription');
		}

	}

	public function connexion()
	{
		$data = array('error' => '');

		$pseudo = $this->input->post('pseudo');
		$mdp = $this->input->post('mdp');

		if ($pseudo && $mdp)
		{
			$user = $this->A_model->get_user($pseudo, $mdp);

			if ($user)
				$this->load->view('accueil');
			else
			{
				$data['error'] = 'Mauvais pseudo ou mot de passe !';
				$this->load->view('authentification', $data);	
			}
		}
		else
		{
			$this->load->view('authentification', $data);
		}
	}
}