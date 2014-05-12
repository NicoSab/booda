<?php

class ProfileModel extends CI_Model
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
									'idUser' => $userId))
						->insert($this->table);
	}

	public function get_profil($userId)
	{
		return $this->db->select()
						->from("Users")
						->join("Profils", "Users.id = Profils.idUser", 'left outer')
						->where('Users.id', $userId)
						->get()
						->row_array();
	}

	public function update_profil($description, $hobbies, $interest, $situation, $sexuality, $job, $userId)
	{
		return $this->db->set(array('Description' => $description,
									'Hobbies' => $hobbies,
									'Interest' => $interest,
									'MaritalSituation' => $situation,
									'Sexuality' => $sexuality,
									'Job' => $job))
						->where('idUser', $userId)
						->update($this->table);
	}

	public function delete_profil($profilId)
	{
		$this->db->where('id', $profilId)
           		->delete($this->table);
	}
}
