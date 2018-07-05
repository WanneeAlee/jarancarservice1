<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	protected $default_page = 'service';
	
	public function __construct()
	{
		parent::__construct();		
		if(!isset($_SESSION["user_username"])){
			
			redirect('cwcontrol');  

		}
		$this->load->model('Model_services');	
			
	}

	
	public function index()
	{
        $default = $this->default_page;
        $type = $this->input->get('type');
        $id = $this->input->get('services_ID');
        $data['page'] = $this->default_page;
        
        if ($type == "") {
            $rows_per_page = 10; // ให้ 1 หน้า
            $current_page = 1;
            $page_range = 5; // 1234....ตัวสุดท้าย
            $qry_string = ""; // ส่งค่ารอบสอง
            $page_url = base_url('cwcontrol/' . $default);
            $data['page_url'] = $page_url;
            
            if ($this->input->get_post('page')) {
                $current_page = $this->input->get_post('page');
            }
            if ($this->input->get_post('Keyword') != "") {
                
                $word = $this->input->get_post('Keyword');
                $qry_string .= "Keyword=$word";
                $data["word"] = $word;
            } else {
                
                $word = "";
            }
            
            $start_row = paging_start_row($current_page, $rows_per_page);
            
            $this->db->like('services_Name_TH', $word);
            $this->db->order_by('services_Sort', 'ASC');
            $this->db->stop_cache();
            
            $query = $this->db->get('tb_services');
            
            $Num_Rows = $query->num_rows();
            $total_pages = paging_total_pages($Num_Rows, $rows_per_page);
            
            // $themePaging["next"] = '>>';
            // $themePaging["prev"] = '<<';
            // $themePaging["theme"]='<a href="{{link}}" title="{{str_page}}"><div class="page2 {{active}}">{{str_page}}</div></a>';
            // $themePaging["theme"] = '<li class="{{active}}"><a href="{{link}}">{{str_page}}</a></li>';
            
            $page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);
            $this->db->like('services_Name_TH', $word);
            $this->db->order_by('services_Sort', 'ASC');
            $this->db->limit($rows_per_page, $start_row);
            $query = $this->db->get('tb_services');
            $this->db->flush_cache();
            
            /*
             * echo $this->db->last_query();
             * die();
             */
            if ($Num_Rows > 0) {
                $data["row"] = $query->result_array();
            }
            
            if ($Num_Rows > $rows_per_page) {
                $data["page_str"] = $page_str;
            }
            
            $data["pagination"] = array(
                'start_row' => $start_row,
                'Num_Rows' => $Num_Rows,
                'current_page' => $current_page,
                'total_pages' => $total_pages
            
            );
        }
        
        if ($type == "edit") {

            $query_edit = $this->db->query('SELECT * FROM `tb_services` WHERE `services_ID` = ' . $id);
            $row_edit = $query_edit->row_array();
            $data["row_edit"] = $row_edit;
        }
        
        /*
         * echo "<pre>";
         * print_r($data);
         */
        
        // die();
        
        $this->load->view('cwcontrol/pages/' . $this->default_page . '/index', $data);
    }
	
	public function insert()
    {
        $this->Model_services->insert();
    }

    public function update()
    {		
        $this->Model_services->update();
    }

    public function delete()
    {        
        // echo $this->input->post('id');
        $this->Model_services->delete();		
    }

     public function delete_img()
    {
        $this->Model_service->delete_img();
    }

     public function delete_file()
    {
        $this->Model_services->delete_file();
    }

    public function delete_All()
    {
        $this->Model_services->delete_All();
    }

    public function delete_gallery()
    {
        $this->Model_services>delete_gallery();
    }

    public function home()
    {
        // die("dsd");
        $this->Model_services->home();
    }

    public function status()
    {
        $this->Model_services->status();
    }

    public function Sort()
    {
        $this->Model_services>Sort();
    }

    


    public function detail()
    {
        $id = $_GET['id'];
        $query = $this->db->query('SELECT * FROM `services_Detail_TH` WHERE `services_ID` = ' . $id);
        $data['row'] = $query->row_array();
        $data['page'] = "services";
        $this->load->view('cwcontrol/pages/' . $this->default_page . '/data-add-detail', $data);
    }
    
    public function save_detail()
    {
        $id = $_POST['id'];
        $data = array(
            'Detail_TH' => $_POST["Detail_TH"]
           
            
        );
        
        $this->db->where('id', $id);
        $this->db->update('services_Detail_TH', $data);
        
       // die();
        redirect('cwcontrol/Service/detail?id='.$id);
    }
	
	
	
	
	
	
	
}
