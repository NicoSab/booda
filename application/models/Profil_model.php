<?php

class Profil_model extends CI_Model
{
	private $table = 'Profils';
	
	public function add_profil($description, $hobbies, $interest, $situation, $sexuality, $job, $userId)
	{
		return $this->db->set(array('Description' => $description,
									'Hobbies' => $hobbies,
									'Interest' => $interest,
									'MaritalSituation' => $situation,
									'Sexuality' => $sexuality,
									'Job' => $job,
									'idUser' => $userId);)
						->insert($this->table);
	}

	public function get_profil($userId)
	{
		return $this->db->select()
						->from($this->table)
						->where('idUser', $userId)
						->get()
						->row();
	}

	public function update_profil($description, $hobbies, $interest, $situation, $sexuality, $job, $userId)
	{

	}
}
