<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_contact');
    }

	public function index()
	{
		$data['nav'] = array
		(
			'page' 		=> array('1' => 'Home', '2' => 'Contact Us'), 
			'page_url'	=> array('1' => '', '2'=>'contact')
		);
		$this->load->view('contact',$data);
	}

	public function send()
	{
 		//echo "<pre>";
		//print_r($_POST); die();

		$this->Model_contact->send();
	}
 

	
	
	
}