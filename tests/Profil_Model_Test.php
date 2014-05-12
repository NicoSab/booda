<?php

class Profil_Model_Test extends PHPUnit_Framework_TestCase { 	

    private $CI; 	
    public function setUp()
    { 	
		$this->CI = &get_instance();
		$this->CI->load->model('ProfileModel');
		$this->CI->load->model('UserModel');
	}

	public function testAddProfil() 
	{
		$this->CI->UserModel->add_user('Essai', 'essai', 'nicolas', 'sabella', 'Male', '1992-07-08', 'Nogent', 'essai@essai');
		$user = $this->CI->UserModel->get_user_by_email('essai@essai');

		$result = $this->CI->ProfileModel->add_profil('test', 'test', 'Femmes', 'En couple', 'Hétérosexuel', 'test', $user->id);

		$this->assertEquals(TRUE, $result);

		$profil = $this->CI->ProfileModel->get_profil($user->id);

		$this->CI->ProfileModel->delete_profil($profil['id']);
		$this->CI->UserModel->delete_user($user->id);
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