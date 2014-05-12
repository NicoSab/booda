<?php

class MessageModel extends CI_Model
{
	private $table = 'Messages';

	public function add_message($userId, $convId, $message)
	{
		return $this->db->set(array('idUser' => $userId,
									'idConversation' => $convId,
									'message' => $message))
						->set('createdDate', 'NOW()', false)
						->insert($this->table);
	}

	public function get_messages_for_conversation($convId)
	{
		return $this->db->select()
						->from($this->table)
						->where('idConversation', $convId)
						->get()
						->result_array();
	}

	public function get_last_message_for_conversation($convId)
	{
		return $this->db->select()
						->from($this->table)
						->where('idConversation', $convId)
						->where('createdDate', $this->db->select('max(createdDate)')
														->from($this->table)
														->get())
						->get()
						->row();
	}
}