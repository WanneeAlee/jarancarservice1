<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_home extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function get_all()
    {
        $data = $this->db->where('home_ID',1)->get('tb_home')->row_array();
        //$data['news'] = $this->db->where('news_Status',1)->get('tb_news')->result_array();
        //$data['news-detail'] = $this->db->where('news_Status',1)->get('tb_news')->result_array();



       return $data;
    }
    public function update() 
    { 
        
        $id = $this->db->escape_str($this->input->post('id'));
        $data = array(
            'home_detail_TH' => $_POST["home_detail_TH"],
            //'about_Detail_EN' => $_POST["about_Detail_EN"]
            //'about_Detail2_TH' => $_POST["about_Detail2_TH"],
            //'about_Detail2_EN' => $_POST["about_Detail2_EN"],
            
        );
        
        $this->db->where('about_ID', $id);
        $this->db->set('about_Date', 'NOW()', FALSE);
        $this->db->update('tb_about', $data);
        
        if($this->db->trans_status() === TRUE)
        {
        
            return TRUE;

        }else
        {
            
            return FALSE;
    
        }       
    
    }


    
}