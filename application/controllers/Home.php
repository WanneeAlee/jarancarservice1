<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
       /* $this->load->model('Model_home');*/
    }

      public function index()
	{
		/*$data = $this->Model_home->get_all();*/
		$this->load->view('index');
	}
	

}
