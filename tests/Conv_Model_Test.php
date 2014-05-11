<?php

class Conv_Model_Test extends PHPUnit_Extensions_Database_TestCase { 	

    /*private $CI; 	
    public function setUp()
    { 	
		$this->CI = &get_instance();
		$this->CI->load->model('ConvModel');
		//$this->CI->load->database('booda');
	}

	public function testGetTenLastConversations() {
		$convs = $this->CI->ConvModel->get_ten_last_conversation(7);
		print_r($convs);
		$this->assertEquals(1, count($convs));
	}*/

    public function getConnection()
    {
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
		$convs = $this->CI->ConvModel->get_ten_last_conversation(7);
		print_r($convs);
		$this->assertEquals(1, count($convs));
    }
}