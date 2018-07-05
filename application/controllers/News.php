<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
    
    protected $default_page = 'news';
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Model_news');
        $this->load->model('Model_slide');
        $this->load->model('Model_about');
        $this->load->model('Model_contact');
        
        if ($this->session->userdata('lang') == NULL) {
            $lang = "EN";
            $this->session->set_userdata('lang', $lang);
            
        }else{
            $lang = $this->session->userdata('lang');
        }
        
        $this->lang->load($lang, $lang);
        
    }
    
	
	public function index()
	{	
		
		$data = $this->Model_news->get_home();
		$data['page_url'] = base_url($this->default_page);
		$data['page'] = array(
		    "H_TH"=>"หน้าแรก",
		    "H_EN"=>"Home",
		    "TH"=>"เกี่ยวกับเรา",
		    "EN"=>"Company Profile",
		);
		$data["slide"] = $this->Model_slide->get_home();
				$data["home"] = $this->Model_about->get_about("about");
		$data["contact"] = $this->Model_contact->get_detail();	
		$this->load->view('news',$data);
                
                
		
	}
	
	public function detail($id = null)
	{
	    //print_r($id);
	    //print_r($data);
	    $data = $this->Model_news->get_detail($id);
	    $data['page_url'] = base_url($this->default_page);
	    $data['page'] = array(
	        "H_TH"=>"หน้าแรก",
	        "H_EN"=>"Home",
	        "TH"=>"เกี่ยวกับเรา",
	        "EN"=>"Company Profile",
	    );
	    		$data["home"] = $this->Model_about->get_about("about");
		$data["contact"] = $this->Model_contact->get_detail();	
	    $data["slide"] = $this->Model_slide->get_home();
	    //echo "<pre>"; print_r($data); echo "</pre>";die();
	    $this->load->view('news_detail',$data);
	}
	
	
	
	
	
}
