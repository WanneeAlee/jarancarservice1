<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	

	public function __construct()
	{
			
		parent::__construct();
		$this->load->model('Model_login');
		
			
	}
	public function index()
	{
		
		
		$this->load->view('cwcontrol/index');
		
		
		
	}
	
	public function check_login()
	{
		
		$query = $this->Model_login->check_login();			
		
	}
	
	public function logout()
	{
		
		
		unset( $_SESSION['user_username']);		
		redirect('cwcontrol');
		
		
		
	}
	
	
	
	
}
