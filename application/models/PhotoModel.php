<?php

class PhotoModel extends CI_Model
{
	private $table = 'Photos';

	public function add_photo($name, $profilId){
		return $this->db->set(array('name' => $name,
									'idProfil' => $profilId))
						->insert($this->table);	
	}

	public function get_user_photos($profilId)
	{
		$query = $this->db->select()
					  ->from($this->table)
					  ->where("idProfil", $profilId)
					  ->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				if ($row->idProfil == $profilId) {
					$photos[] = $row;
				}
            }
            return $photos;
		}
		return false;
	}

	public function get_photo($photoId)
	{
		return $this->db->select()
						->from($this->table)
						->join("Profils", "Photos.idProfil = Profils.id")
						->join("Users", "Profils.idUser = Users.id")
						->where('Photos.id', $photoId)
						->get()
						->row();
	}

	public function delete_photo($photoId)
	{
		$this->db->where('id',$photoId)
           ->delete($this->table);
	}
}