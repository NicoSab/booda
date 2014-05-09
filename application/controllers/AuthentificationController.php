<?php

class AuthentificationController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->model('Authentification_model', 'A_model');
	}

	public function index()
	{
	}


	public function inscription()
	{
		//	Chargement de la bibliothèque
		echo "inscription";

		$this->load->library('form_validation');

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
			if ($this->input->post('connexion'))
				$this->connexion();
			else
				$this->load->view('inscription');

	}

	public function connexion()
	{

		echo "connexion";

		$this->load->library('form_validation');

		$this->form_validation->set_rules('pseudo', '"Pseudo"', 'trim|required|max_length[52]|alpha_dash|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('mdp', '"Mot de passe"', 'trim|required|max_length[52]|alpha_dash|encode_php_tags|xss_clean');

		if($this->form_validation->run())
		{
			echo ("LOLOLLOL");
		}
		else
		{
			echo ("ici");
			$this->load->view('authentification');
		}
	}
}