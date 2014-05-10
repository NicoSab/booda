<?php

class ConvModel extends CI_Model
{
	private $table = 'Conversations';

	public function create_conversation($userId_1, $userId_2, $lastDate)
	{
		return $this->db->set(array('idUser1' => $userId_1,
									'idUser2' => $userId_2))
						->insert($this->table);
	}

	public function get_conversation($userId_1, $userId_2)
	{
		return $this->db->select()
						->from($this->table)
						->where('idUser1', $userId_1)
						->where('idUser2', $userId_2)
						->get()
						->row_array();
	}
}