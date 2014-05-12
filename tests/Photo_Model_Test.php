<?php

class Photo_Model_Test extends PHPUnit_Framework_TestCase { 	

    private $CI; 	
    public function setUp()
    { 	
		$this->CI = &get_instance();
		$this->CI->load->model('PhotoModel');
	}

	public function testGetUserPhotos()
	{
		$photos = $this->CI->PhotoModel->get_user_photos(7);
		$result = "OK";

		foreach ($photos as $p)
		{
			if ($p->userId != 7)
				$result = "NOK";
		}

		$this->assertEquals($result, "OK");
	}

	public function testGetPhoto() 
	{
		$photo = $this->CI->PhotoModel->get_photo(1);

		$this->assertEquals($photo->name, "92a08f65af73cec156d43a47c32b9096.jpg");
	}
}