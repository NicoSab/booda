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
}
