<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repairing extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_repairing');
    }

    
    public function index()
    {
               
        $this->load->view('repairing');
    }

     public function insert_car()
    {
               
        $this->Model_repairing->insert_car();
    }
    
    // public function detail()
    // {
    //     $id = $_GET['id'];
    //     $query = $this->db->query('SELECT * FROM `services_Detail_TH` WHERE `services_ID` = ' . $id);
    //     $data['row'] = $query->row_array();
    //     $data['page'] = "services";
    //     $this->load->view('cwcontrol/pages/' . $this->default_page . '/data-add-detail', $data);
    // }
    
    // public function save_detail()
    // {
    //     $id = $_POST['id'];
    //     $data = array(
    //         'Detail_TH' => $_POST["Detail_TH"]
           
            
    //     );
        
    //     $this->db->where('services_ID', $id);
    //     $this->db->update('services_Detail_TH', $data);
        
    //    // die();
    //     redirect('cwcontrol/Service/detail?services_ID='.$id);
    // }
    
    
    
    
    
    
    
}
