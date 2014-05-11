<?php

class PhotoModel extends CI_Model
{
	private $table = 'Photos';

	public function add_photo($name, $profilId){
		return $this->db->set(array('name' => $name,
									'idProfil' => $profilId))
						->insert($this->table);	
	}

	public function get_photos($profilId)
	{
		return $this->db->select()
						->from($this->table)
						->where('idProfil', $profilId)
						->get()
						->row_array();
	}
}