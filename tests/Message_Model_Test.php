<?php

class Message_Model_Test extends PHPUnit_Framework_TestCase { 	

    private $CI; 	
    public function setUp()
    { 	
		$this->CI = &get_instance();
		$this->CI->load->model('MessageModel');
	}

	public function testgetMessagesForConversation()
	{
		$messages = $this->CI->MessageModel->get_messages_for_conversation(5);
		$result = "OK";

		foreach ($messages as $m)
		{
			if (strcmp($m['idConversation'], 5) != 0)
				$result = "NOK";
		}

		$this->assertEquals($result, "OK");
	}

	/*public function testGetLastMessageForConversation()
	{
		$message = $this->CI->MessageModel->get_last_message_for_conversation(5);
		$messages = $this->CI->MessageModel->get_messages_for_conversation(5);
		$lastDate = '';

		foreach ($messages as $m) {
			$d = explode("-", $m['createdDate']);
			print_r($d);
			$da = $d[0].$d[1].$d[2];

			if ($da > $lastDate)
				$lastDate = $d;
		}

		$this->assertEquals($lastDate, $message->createdDate);
	}*/
}