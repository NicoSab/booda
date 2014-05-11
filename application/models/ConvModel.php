<?php

class ConvModel extends CI_Model
{
	private $table = 'Conversations';

	public function create_conversation($userId_1, $userId_2)
	{
		return $this->db->set(array('idUser1' => $userId_1,
									'idUser2' => $userId_2))
						->set('lastUpdatedDate', 'NOW()', false)
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
	public function get_last_conversation($userId)
	{
		return $this->db->select()
						->from($this->table)
						->where('idUser1', $userId)
						->or_where('idUser2', $userId)
						->order_by("Conversations.id", "desc")
						->limit(1)
						->get()
						->row();
	}
	public function get_ten_last_conversation($userId)
	{
		return $this->db->select()
						->from($this->table)
						->where('idUser1', $userId)
						->or_where('idUser2', $userId)
						->order_by("Conversations.id", "desc")
						->limit(10)
						->get()
						->result_array();
	}
}