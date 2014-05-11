<?php

class Conv_Model_Test extends PHPUnit_Framework_TestCase { 	

    private $CI; 	
    public function setUp()
    { 	
		$this->CI = &get_instance();
		$this->CI->load->model('ConvModel');
	}

	public function testGetTenLastConversations() {
		$convs = $this->CI->ConvModel->get_ten_last_conversation(7);
		print_r($this->CI);
		$this->assertEquals(1, count($convs));
	}
}