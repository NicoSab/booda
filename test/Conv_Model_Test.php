<?php // tests/PostTest.php 

class Conv_Model_Test extends PHPUnit_Framework_TestCase { 	

    private $CI; 	
    public function setUp()
    { 	
		$this->CI = &get_instance();
	}

	public function testGetAllPosts() {
		$this->CI->load->model('ConvModel');
		$convs = $this->CI->ConvModel->getAll();
		$this->assertEquals(10, count($posts));
	}
}