<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	protected $default_page = "product";

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_product');
    }

    public function index()
	{
		$data = $this->Model_product->get_all();
		$data['nav'] = array
		(
			'page' 		=> array('1' => 'Home', '2' => 'product'), 
			'page_url'	=> array('1' => '', '2'=>'product')
		);
		$this->load->view('product',$data);
	}

	public function detail($id = null)
	{
		$data = $this->Model_product->get_product($id);
		$this->load->view('product-detail',$data);
	}
	

}