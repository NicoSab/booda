<?php

class Profil_Model_Test extends PHPUnit_Framework_TestCase { 	

    private $CI; 	
    public function setUp()
    { 	
		$this->CI = &get_instance();
		$this->CI->load->model('ProfileModel');
	}

	public function testAddProfil() 
	{
		$result = $this->CI->ProfileModel->add_profil('test', 'test', 'Femmes', 'En couple', 'Hétérosexuel', 'test', 11);

		$this->assertEquals(TRUE, $result);
	}

	public function testGetProfil()
	{
		$p = $this->CI->ProfileModel->get_profil(7);

		$this->assertEquals($p['id'], 3);
	}

	public function testUpdateProfil()
	{
		$this->CI->ProfileModel->update_profil('clem', 'clem', 'Femmes', 'En couple', 'Hétérosexuel', 'etudiant', 7);

		$p = $this->CI->ProfileModel->get_profil(7);

		$this->assertEquals('clem', $p['Description']);
		$this->assertEquals('clem', $p['Hobbies']);
		$this->assertEquals('Femmes', $p['Interest']);
		$this->assertEquals('En couple', $p['MaritalSituation']);
		$this->assertEquals('Hétérosexuel', $p['Sexuality']);
		$this->assertEquals('etudiant', $p['Job']);
	}
}