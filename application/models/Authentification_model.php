<?php

class Authentification_model extends CI_Model
{
	private $table = 'Users';
	
	public function add_user($pseudo, $mdp, $firstname, $name, $sex, $BD, $city, $mail)
	{
		return $this->db->set(array('Pseudo' => $pseudo,
										'Pass' => $mdp,
										'Firstname' => $firstname,
										'Lastname' => $name,
										'Sexe' => $sex,
										'BirthDate' => date('Y-m-d', strtotime($BD)),
										'City' => $city,
										'Mail' => $mail))
						->insert($this->table);
	}

	public function get_user($pseudo, $mdp)
	{
	}
}
