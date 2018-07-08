<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	
	protected $default_page = 'about';
	
	public function __construct()
	{
		parent::__construct();		
		// if(!isset($_SESSION["user_username"])){
			
		// 	redirect('cwcontrol');  

		// }
		$this->load->model('Model_member');	
			
	}

	
	public function index()
	{	
		$data = $this->Model_member->get_about("about");
		$data['page'] = $this->default_page;
		$data['title'] ="เกี่ยวกับเรา";
		$this->load->view('cwcontrol/pages/about/index',$data);
		
	}
	
	
	
	
}
