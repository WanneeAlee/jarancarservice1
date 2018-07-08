<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
    
    protected $default_page = 'category';
    
    public function __construct()
    {
        parent::__construct();
        // if(!isset($_SESSION["user_username"]))
        // {
        //     redirect('cwcontrol');
            
        // }
         $this->load->model('Model_category');
    }
    
    
    public function index()
    {
        $default = $this->default_page;
              
        $rows_per_page = 10; // ให้ 1 หน้า
        $current_page = 1;
        $page_range = 5; // 1234....ตัวสุดท้าย
        $qry_string = ""; // ส่งค่ารอบสอง
        $page_url = base_url('cwcontrol/category');
        
        if ($this->input->get_post('page')) 
        {
            $current_page = $this->input->get_post('page');
        }
        if ($this->input->get_post('Keyword') != "") 
        {
            
            $word = $this->input->get_post('Keyword');
            $qry_string .= "Keyword=$word";
            $data["word"] = $word;
        } 
        else 
        {
            
            $word = "";
        }
        
        $start_row = paging_start_row($current_page, $rows_per_page);
        
        $this->db->start_cache();
        $this->db->like('category_name_TH', $word);
        $this->db->or_like('category_name_EN', $word);
        $this->db->order_by('category_sort', 'ASC');        
        $this->db->stop_cache();
        
        $query = $this->db->get('tb_category');
        
        $Num_Rows = $query->num_rows();
        $total_pages = paging_total_pages($Num_Rows, $rows_per_page);
        
        
        $page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);
        
        $this->db->limit($rows_per_page, $start_row);
        $query = $this->db->get('tb_category');
        $this->db->flush_cache();
        
        
        /* echo $this->db->last_query();
         die(); */
        if ($Num_Rows > 0) 
        {
            $data["row"] = $query->result_array();
        }
        
        if ($Num_Rows > $rows_per_page) 
        {
            $data["page_str"] = $page_str;
        }
        
        $data["pagination"] = array(
            'start_row' => $start_row,
            'Num_Rows' => $Num_Rows,
            'current_page' => $current_page,
            'total_pages' => $total_pages
            
        );
        
        $type = $this->input->get('type');
        $id = $this->input->get('id');
        
        if($type == "edit"){
            
            $query_edit = $this->db->query('SELECT * FROM `tb_category` WHERE `id` = '.$id);
            $row_edit = $query_edit->row_array();
            $data["row_edit"] = $row_edit;
        }
        $data['page'] = $default;
        /* echo $default;
        die(); */
        $data['page_url'] = $page_url;
        $this->load->view('cwcontrol/pages/'.$default.'/index',$data);
    }
    
    public function insert()
    {    
       $this->Model_category->insert();        
    }
        
    public function update()
    {        
        $this->Model_category->update();             
    }
    
    public function delete()
    {
        $query = $this->Model_category->delete();
    }
    
    public function delete_All()
    {
        $query = $this->Model_category->delete_All();
    }
    
    public function delete_gallery()
    {
        $query = $this->Model_category->delete_gallery();
    }
      
    public function home()
    {
       // die("dsd");
        $query = $this->Model_category->home();
    }
    
    public function status()
    {
        $query = $this->Model_category->status();
    }
    
    public function Sort()
    {      
        $query = $this->Model_category->Sort();
    }
    
    
    public function query()
    {
               
        $this->load->helper(array('classupload'));                
        if($_POST['method'] == 'insert')
        {
            $sql2 = "SELECT * FROM tb_slide ";
            $query = $this->db->query($sql2);
            $Num_Rows = $query->num_rows();
            $Sort = $Num_Rows+1;
            
            $data = array(
                'slide_Title' => $_POST["slide_Title"],
                'slide_Sort' => $Sort,
                
            );
            
            $this->db->insert('tb_slide', $data);
            $id = $this->db->insert_id();
            /*echo "<pre>";
             print_r($_FILES["news_Images"]["name"]);
             echo "</pre>";
             exit();*/
            if ($_FILES["slide_Images"]["name"] != "") 
            {
                
                $rename = "PHOTO_slide_" . date("d-m-Y_Hms");                                
                $handle = new upload($_FILES["slide_Images"]);
                                
                if ($handle->uploaded) 
                {
                    $handle->file_new_name_body = $rename;
                    $handle->image_resize = true;
                    //$handle->image_ratio_crop = "T";
                    $handle->image_x = '1920';
                    $handle->image_y = '638';
                    //$handle->image_ratio_y        = true;
                    $handle->jpeg_quality = '100';
                    //$handle->image_watermark = '../../class.upload/bg.png';
                    $handle->process('assets/upload');
                }
                
                if ($handle->processed) 
                {
                    $photo_name = $handle->file_dst_name;
                }
                
                $data = array(
                    'slide_Images' => $photo_name,
                );
                $this->db->where('slide_ID', $id);
                $this->db->update('tb_slide', $data);
                                
            }
            
            
            if ($_FILES["slide_Images2"]["name"] != "") {
                                
                $rename = "PHOTO_slideM_" . date("d-m-Y_Hms");
                                
                $handle = new upload($_FILES["slide_Images2"]);
                
                
                if ($handle->uploaded) {
                    $handle->file_new_name_body = $rename;
                    $handle->image_resize = true;
                    //$handle->image_ratio_crop = "T";
                    $handle->image_x = '474';
                    $handle->image_y = '647';
                    //$handle->image_ratio_y        = true;
                    $handle->jpeg_quality = '100';
                    //$handle->image_watermark = '../../class.upload/bg.png';
                    
                    $handle->process('assets/upload');
                }
                
                if ($handle->processed) {
                    $photo_name = $handle->file_dst_name;
                }
                
                $data = array(
                    'slide_Images2' => $photo_name,
                );
                $this->db->where('slide_ID', $id);
                $this->db->update('tb_slide', $data);
                
                
            }
            
            
            
            
            $this->db->trans_complete();
            $data_page['page'] = $this->default_page;
            if ($this->db->trans_status() === TRUE)
            {
                
                $this->load->view('cwcontrol/modal/success',$data_page);
                
                
            }else{
                
                $this->load->view('cwcontrol/modal/error',$data_page);
                
                
                
            }
            
            
        }
        
        
        
        
        if($_POST['method'] == 'update'){
            
            
            $data = array(
                'slide_Title' => $_POST["slide_Title"],
            );
            
            $this->db->where('slide_ID', $_POST["id"]);
            $this->db->set('slide_Date', 'NOW()', FALSE);
            $this->db->update('tb_slide', $data);
            
            
            if ($_FILES["slide_Images"]["name"] != "") {
                
                
                $rename = "PHOTO_slide_" . date("d-m-Y_Hms");
                
                
                $handle = new upload($_FILES["slide_Images"]);
                
                
                if ($handle->uploaded) {
                    $handle->file_new_name_body = $rename;
                    $handle->image_resize = true;
                    //$handle->image_ratio_crop = "T";
                    $handle->image_x = '1920';
                    $handle->image_y = '638';
                    //$handle->image_ratio_y        = true;
                    $handle->jpeg_quality = '100';
                    //$handle->image_watermark = '../../class.upload/bg.png';
                    
                    $handle->process('assets/upload');
                }
                
                if ($handle->processed) {
                    $photo_name = $handle->file_dst_name;
                }
                
                $data = array(
                    'slide_Images' => $photo_name,
                );
                $this->db->where('slide_ID', $_POST["id"]);
                $this->db->update('tb_slide', $data);
                
                
            }
            
            if ($_FILES["slide_Images2"]["name"] != "") {
                
                
                $rename = "PHOTO_slideM_" . date("d-m-Y_Hms");
                
                
                $handle = new upload($_FILES["slide_Images2"]);
                
                
                if ($handle->uploaded) {
                    $handle->file_new_name_body = $rename;
                    $handle->image_resize = true;
                    //$handle->image_ratio_crop = "T";
                    $handle->image_x = '474';
                    $handle->image_y = '647';
                    //$handle->image_ratio_y        = true;
                    $handle->jpeg_quality = '100';
                    //$handle->image_watermark = '../../class.upload/bg.png';
                    
                    $handle->process('assets/upload');
                }
                
                if ($handle->processed) {
                    $photo_name = $handle->file_dst_name;
                }
                
                $data = array(
                    'slide_Images2' => $photo_name,
                );
                $this->db->where('slide_ID', $_POST["id"]);
                $this->db->update('tb_slide', $data);
                
                
            }
            
            
            //exit();
            $this->db->trans_complete();
            $data_page['page'] = $this->default_page;
            if ($this->db->trans_status() === TRUE)
            {
                
                $this->load->view('cwcontrol/modal/success',$data_page);
                
                
            }else{
                
                $this->load->view('cwcontrol/modal/error',$data_page);                
                           
            }
                                   
        }
        
         
        if ($_POST['method'] == "delete") {
            
 
            $strSQL = "SELECT * FROM tb_slide WHERE slide_ID='".$_POST["id"]."' ";
            $query = $this->db->query($strSQL);
            $row = $query->row_array();
            
            $Images = $row["slide_Images"];
            $Images2 = $row["slide_Images2"];
            unlink("assets/upload/$Images");
            unlink("assets/upload/$Images2");
                        
            $tables = array('tb_slide');
            $this->db->where('slide_ID', $_POST["id"]);
            $this->db->delete($tables);
            
            $this->dbutil->optimize_table('tb_slide');
        }
        
        
        if ($_POST['method'] == "delete_All") {
            
            for($i=0;$i<count($_POST["id"]);$i++)
            {
                if($_POST["id"][$i] != "")
                {
                                       
                    $strSQL = "SELECT * FROM tb_slide WHERE slide_ID='".$_POST["id"][$i]."' ";
                    $query = $this->db->query($strSQL);
                    $row = $query->row_array();
                    
                    $Images = $row["slide_Images"];
                    $Images2 = $row["slide_Images2"];
                    unlink("assets/upload/$Images");
                    unlink("assets/upload/$Images2");
                    
                    
                    $tables = array('tb_slide');
                    $this->db->where('slide_ID', $_POST["id"][$i]);
                    $this->db->delete($tables);
                    
                    $this->dbutil->optimize_table('tb_slide');
 
                }
            }
            
            
            $this->dbutil->optimize_table('tb_slide');
        }
        
        
        if ($_POST['method'] == "status") {
            
            if($_POST['id']!=""){
                
                $sql = "SELECT * FROM tb_slide ";
                $sql .= "WHERE slide_ID = '".$_POST["id"]."' ";
                $query = $this->db->query($sql);
                $row = $query->row_array();
                if($row["slide_Status"] == 1){
                    $Status = 0;
                }else{
                    $Status = 1;
                }
                
                $data = array(
                    'slide_Status' => $Status,
                );
                $this->db->where('slide_ID', $_POST["id"]);
                $this->db->update('tb_slide', $data);
                
            }
        }
        
        
        if ($_POST['method'] == "Sort") {
            
            if($_POST['id']!=""){
                
                $data = array(
                    'slide_Sort' => $_POST["value"],
                );
                $this->db->where('slide_ID', $_POST["id"]);
                $this->db->update('tb_slide', $data);
                
            }
        }
        
 
        
    }//function
    
    
}
?>