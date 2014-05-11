<?php

class UserModel extends CI_Model
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
		return $this->db->select()
						->from($this->table)
						->where('Pseudo', $pseudo)
						->where('Pass', $mdp)
						->get()
						->row();
	}
	public function get_all_user()
	{
		return $this->db->get($this->table)
						->result_array();
	}
	public function get_user_by_email($email)
	{
		return $this->db->select()
						->from($this->table)
						->where('Mail', $email)
						->get()
						->row();
	}
	public function record_count() {
        return $this->db->count_all($this->table);
    }
 
    public function fetch_users($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function search($limit, $start, $hobbies, $job, $interest, $situation, $sexuality, $sex, $agemin, $agemax)
   {
   	    $this->db->limit($limit, $start);
   		$query = $this->db->select()
						->from($this->table)
						->join("Profils", "Users.id = Profils.idUser");
		
		if ($job)
		{
			$query = $query->where('Profils.Job', $job);
		}
		if ($interest)
		{
			$query = $query->where('Profils.Interest', $interest);

		}
		if ($situation)
		{
			$query = $query->where('Profils.MaritalSituation', $situation);
		}
		if ($sexuality)
		{
			$query = $query->where('Profils.Sexuality', $sexuality);
		}
		if ($sex)
		{
			$query = $query->where('Users.Sexe', $sex);
		}
		$query = $query->get();
 
        if ($query->num_rows() > 0) {
        	$data = null;
            foreach ($query->result() as $row) {
            	$failHobby = false;
            	$failAge = false;

            	if ($hobbies)
            	{
            		$hobbiesSearched = explode(",", $hobbies);
            		$hobbiesRow = explode(",", $row->Hobbies);
            		foreach ($hobbiesSearched as $h)
            		{
            			if (!in_array($h, $hobbiesRow))
            			{
            				$failHobby = true;
            				break;
            			}
            		}
            	}
            	$oDateNow = new DateTime();
				$oDateBirth = new DateTime($row->BirthDate);
				$oDateIntervall = $oDateNow->diff($oDateBirth)->y;
            	if (($agemin && $agemin > $oDateIntervall) || (($agemax && $agemax < $oDateIntervall)))
            		$failAge = true;

            	if (!$failHobby && !$failAge)
	                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
    public function count_search($hobbies, $job, $interest, $situation, $sexuality, $sex, $agemin, $agemax)
   {
   		$query = $this->db->select()
						->from($this->table)
						->join("Profils", "Users.id = Profils.idUser");

		if ($hobbies)
		{
			$query = $query;
		}
		if ($job)
		{
			$query = $query->where('Profils.Job', $job);
		}
		if ($interest)
		{
			$query = $query->where('Profils.Interest', $interest);
		}
		if ($situation)
		{
			$query = $query->where('Profils.MaritalSituation', $situation);
		}
		if ($sexuality)
		{
			$query = $query->where('Profils.Sexuality', $sexuality);
		}
		return $query->count_all_results();
   }
}
