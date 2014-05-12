<?php

class Conv_Model_Test extends PHPUnit_Framework_TestCase { 	

    private $CI; 	
    public function setUp()
    { 	
		$this->CI = &get_instance();
		$this->CI->load->model('ConvModel');
	}

	public function testGetTenLastConversations()
	{
		$convs = $this->CI->ConvModel->get_ten_last_conversation(7);
		$this->assertLessThanOrEqual(10, count($convs));
	}

	public function testGetConversation()
	{
		$conv = $this->CI->ConvModel->get_conversation(8, 7);
		$this->assertEquals(8, $conv['idUser1']);
		$this->assertEquals(7, $conv['idUser2']);
	}

	public function testGetlastConversation()
	{
		$conv = $this->CI->ConvModel->get_last_conversation(8);
		$result = "NOK";
		if (strcmp($conv->idUser1, 8) == 0 || strcmp($conv->idUser2, 8) == 0)
			$result = "OK";
		$this->assertEquals($result, "OK");
	}
}