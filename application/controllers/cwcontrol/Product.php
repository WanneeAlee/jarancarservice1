<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    protected $default_page = 'product';

    public function __construct()
    {
        parent::__construct();
        if (! isset($_SESSION["user_username"])) 
        {
            
            redirect('cwcontrol');
        }
        $this->load->model('Model_product');
    }

    public function index()
    {
        $default = $this->default_page;
        $type = $this->input->get('type');
        $id = $this->input->get('id');
        $data['page'] = $this->default_page;
        
        if ($type == "") 
        {
            $rows_per_page = 10; // ให้ 1 หน้า
            $current_page = 1;
            $page_range = 5; // 1234....ตัวสุดท้าย
            $qry_string = ""; // ส่งค่ารอบสอง
            $page_url = base_url('cwcontrol/' . $default);
            $data['page_url'] = $page_url;
            
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
            $this->db->like('product_name_TH', $word);
            $this->db->or_like('product_name_EN', $word);
            $this->db->order_by('category_id_head', 'ASC');
            $this->db->order_by('product_sort', 'ASC');
            $this->db->stop_cache();
            
            $query = $this->db->get('tb_product');
            
            $Num_Rows = $query->num_rows();
            $total_pages = paging_total_pages($Num_Rows, $rows_per_page);
        
            
            $page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);
            $this->db->order_by('category_id_head', 'ASC');
            $this->db->order_by('product_sort', 'ASC');
            $this->db->limit($rows_per_page, $start_row);
            $query = $this->db->get('tb_product');
            $this->db->flush_cache();
            
            /*
             * echo $this->db->last_query();
             * die();
             */
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

        }
        
        if ($type == "edit") 
        {
            
            
            $query_edit = $this->db->query('SELECT * FROM `tb_product` WHERE `id` = ' . $id);
            $row_edit = $query_edit->row_array();
            $data["row_edit"] = $row_edit;
        }
        
        
        
        $this->load->view('cwcontrol/pages/' .$this->default_page. '/index', $data);
    }

    public function insert()
    {
       
        $this->Model_product->insert();
       
    }

    public function update()
    {
        
        $this->Model_product->update();
    }

    public function delete_img()
    {
        $this->Model_product->delete_img();
    }

     public function delete_file()
    {
        $this->Model_product->delete_file();
    }

    public function delete()
    {
        
        // echo $this->input->post('id');
        $this->Model_product->delete();
        
    }

    public function delete_All()
    {
        $this->Model_product->delete_All();
    }

    public function delete_gallery()
    {
        $this->Model_product->delete_gallery();
    }

    public function home()
    {
        // die("dsd");
        $this->Model_product->home();
    }

    public function status()
    {
        $this->Model_product->status();
    }

    public function product_best()
    {
        $this->Model_product->product_best();
    }

    public function Sort()
    {
        $this->Model_product->Sort();
    }

    
    public function query()
    {
        $this->load->helper(array(
            'classupload'
        ));
        
        if ($_POST['method'] == 'insert') 
        {
            
            $sql2 = "SELECT * FROM tb_slide ";
            $query = $this->db->query($sql2);
            $Num_Rows = $query->num_rows();
            $Sort = $Num_Rows + 1;
            
            $data = array(
                'slide_Title' => $_POST["slide_Title"],
                'slide_Sort' => $Sort
            
            );
            
            $this->db->insert('tb_slide', $data);
            $id = $this->db->insert_id();
            /*
             * echo "<pre>";
             * print_r($_FILES["news_Images"]["name"]);
             * echo "</pre>";
             * exit();
             */
            if ($_FILES["slide_Images"]["name"] != "") 
            {
                
                $rename = "PHOTO_slide_" . date("d-m-Y_Hms");
                
                $handle = new upload($_FILES["slide_Images"]);
                
                if ($handle->uploaded) 
                {
                    $handle->file_new_name_body = $rename;
                    $handle->image_resize = true;
                    // $handle->image_ratio_crop = "T";
                    $handle->image_x = '1920';
                    $handle->image_y = '638';
                    // $handle->image_ratio_y = true;
                    $handle->jpeg_quality = '100';
                    // $handle->image_watermark = '../../class.upload/bg.png';
                    
                    $handle->process('assets/upload');
                }
                
                if ($handle->processed) 
                {
                    $photo_name = $handle->file_dst_name;
                }
                
                $data = array(
                    'slide_Images' => $photo_name
                );
                $this->db->where('slide_ID', $id);
                $this->db->update('tb_slide', $data);
            }
            
            if ($_FILES["slide_Images2"]["name"] != "") 
            {
                
                $rename = "PHOTO_slideM_" . date("d-m-Y_Hms");
                
                $handle = new upload($_FILES["slide_Images2"]);
                
                if ($handle->uploaded) 
                {
                    $handle->file_new_name_body = $rename;
                    $handle->image_resize = true;
                    // $handle->image_ratio_crop = "T";
                    $handle->image_x = '474';
                    $handle->image_y = '647';
                    // $handle->image_ratio_y = true;
                    $handle->jpeg_quality = '100';
                    // $handle->image_watermark = '../../class.upload/bg.png';
                    
                    $handle->process('assets/upload');
                }
                
                if ($handle->processed) 
                {
                    $photo_name = $handle->file_dst_name;
                }
                
                $data = array(
                    'slide_Images2' => $photo_name
                );
                $this->db->where('slide_ID', $id);
                $this->db->update('tb_slide', $data);
            }
            
            $this->db->trans_complete();
            $data_page['page'] = $this->default_page;
            if ($this->db->trans_status() === TRUE) 
            {
                
                $this->load->view('cwcontrol/modal/success', $data_page);
            } 
            else 
            {
                
                $this->load->view('cwcontrol/modal/error', $data_page);
            }
        }
    
        
        if($_POST['method'] == 'update') 
        {
            
            $data = array(
                'slide_Title' => $_POST["slide_Title"]
            );
            
            $this->db->where('slide_ID', $_POST["id"]);
            $this->db->set('slide_Date', 'NOW()', FALSE);
            $this->db->update('tb_slide', $data);
            
            if ($_FILES["slide_Images"]["name"] != "") 
            {
                
                $rename = "PHOTO_slide_" . date("d-m-Y_Hms");
                
                $handle = new upload($_FILES["slide_Images"]);
                
                if ($handle->uploaded) 
                {
                    $handle->file_new_name_body = $rename;
                    $handle->image_resize = true;
                    // $handle->image_ratio_crop = "T";
                    $handle->image_x = '1920';
                    $handle->image_y = '638';
                    // $handle->image_ratio_y = true;
                    $handle->jpeg_quality = '100';
                    // $handle->image_watermark = '../../class.upload/bg.png';
                    
                    $handle->process('assets/upload');
                }
                
                if ($handle->processed) 
                {
                    $photo_name = $handle->file_dst_name;
                }
                
                $data = array(
                    'slide_Images' => $photo_name
                );
                $this->db->where('slide_ID', $_POST["id"]);
                $this->db->update('tb_slide', $data);
            }
            
            if ($_FILES["slide_Images2"]["name"] != "") 
            {
                
                $rename = "PHOTO_slideM_" . date("d-m-Y_Hms");
                
                $handle = new upload($_FILES["slide_Images2"]);
                
                if ($handle->uploaded) 
                {
                    $handle->file_new_name_body = $rename;
                    $handle->image_resize = true;
                    // $handle->image_ratio_crop = "T";
                    $handle->image_x = '474';
                    $handle->image_y = '647';
                    // $handle->image_ratio_y = true;
                    $handle->jpeg_quality = '100';
                    // $handle->image_watermark = '../../class.upload/bg.png';
                    
                    $handle->process('assets/upload');
                }
                
                if ($handle->processed) 
                {
                    $photo_name = $handle->file_dst_name;
                }
                
                $data = array(
                    'slide_Images2' => $photo_name
                );
                $this->db->where('slide_ID', $_POST["id"]);
                $this->db->update('tb_slide', $data);
            }
            
            // exit();
            $this->db->trans_complete();
            $data_page['page'] = $this->default_page;
            if ($this->db->trans_status() === TRUE) 
            {
                
                $this->load->view('cwcontrol/modal/success', $data_page);
            } 
            else 
            {
                
                $this->load->view('cwcontrol/modal/error', $data_page);
            }
        }
        
        if ($_POST['method'] == "delete") 
        {
            
            $strSQL = "SELECT * FROM tb_slide WHERE slide_ID='" . $_POST["id"] . "' ";
            $query = $this->db->query($strSQL);
            $row = $query->row_array();
            
            $Images = $row["slide_Images"];
            $Images2 = $row["slide_Images2"];
            unlink("assets/upload/$Images");
            unlink("assets/upload/$Images2");
            
            $tables = array(
                'tb_slide'
            );
            $this->db->where('slide_ID', $_POST["id"]);
            $this->db->delete($tables);
            
            $this->dbutil->optimize_table('tb_slide');
        }
        
        if ($_POST['method'] == "delete_All") 
        {
            
            for ($i = 0; $i < count($_POST["id"]); $i ++) 
            {
                if ($_POST["id"][$i] != "") 
                {
                    
                    $strSQL = "SELECT * FROM tb_slide WHERE slide_ID='" . $_POST["id"][$i] . "' ";
                    $query = $this->db->query($strSQL);
                    $row = $query->row_array();
                    
                    $Images = $row["slide_Images"];
                    $Images2 = $row["slide_Images2"];
                    unlink("assets/upload/$Images");
                    unlink("assets/upload/$Images2");
                    
                    $tables = array(
                        'tb_slide'
                    );
                    $this->db->where('slide_ID', $_POST["id"][$i]);
                    $this->db->delete($tables);
                    
                    $this->dbutil->optimize_table('tb_slide');
                }
            }
            
            $this->dbutil->optimize_table('tb_slide');
        }
        
        if ($_POST['method'] == "status") 
        {
            
            if ($_POST['id'] != "") 
            {
                
                $sql = "SELECT * FROM tb_slide ";
                $sql .= "WHERE slide_ID = '" . $_POST["id"] . "' ";
                $query = $this->db->query($sql);
                $row = $query->row_array();
                if ($row["slide_Status"] == 1) 
                {
                    $Status = 0;
                } 
                else 
                {
                    $Status = 1;
                }
                
                $data = array(
                    'slide_Status' => $Status
                );
                $this->db->where('slide_ID', $_POST["id"]);
                $this->db->update('tb_slide', $data);
            }
        }
        
        if ($_POST['method'] == "Sort") 
        {
            
            if ($_POST['id'] != "") 
            {
                
                $data = array(
                    'slide_Sort' => $_POST["value"]
                );
                $this->db->where('slide_ID', $_POST["id"]);
                $this->db->update('tb_slide', $data);
            }
        }
    }

    // function
    
    // /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function view_rela()
    {
        $default = $this->default_page;
        $type = $this->input->get('type');
        $id = $this->input->get('id');
        $data['id'] = $id;
        $data['page'] = $this->default_page;
        
        $id_rela = $this->db->query('SELECT tb_product_releted.product_releted FROM `tb_product` INNER JOIN `tb_product_releted` ON `tb_product`.`id` = `tb_product_releted`.`product_releted`WHERE `tb_product_releted`.`product_id` = ' . $id);
        $id_rela_row = $id_rela->result_array();
        $count = count($id_rela_row); // this line works
        
        if ($type == "") 
        {
            $rows_per_page = 10; // ให้ 1 หน้า
            $current_page = 1;
            $page_range = 5; // 1234....ตัวสุดท้าย
            $qry_string = ""; // ส่งค่ารอบสอง
            $page_url = base_url('cwcontrol/' . $default . '/view_rela?id=' . $id . '&');
            
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
            
            $this->db->like('id', $word);
            if ($count != '0') 
            {
                foreach ($id_rela_row as $id_rela2) 
                {
                    $array[] = $id_rela2['product_releted'];
                    array_push($array, $id);
                }
                /*
                 * print_r($array);
                 * die();
                 */
                $aa = implode(',', $array);
                $this->db->where_not_in('id', $array);
            } 
            else 
            {
                
                $array[] = $id;
                
                /*
                 * print_r($array);
                 * die();
                 */
                $aa = implode(',', $array);
                $this->db->where_not_in('id', $array);
            }
            $this->db->order_by('category_id_head', 'ASC');
            $this->db->order_by('product_sort', 'ASC');
            $this->db->stop_cache();
            
            $query = $this->db->get('tb_product');
            
            $Num_Rows = $query->num_rows();
            $total_pages = paging_total_pages($Num_Rows, $rows_per_page);
            
            // $themePaging["next"] = '>>';
            // $themePaging["prev"] = '<<';
            // $themePaging["theme"]='<a href="{{link}}" title="{{str_page}}"><div class="page2 {{active}}">{{str_page}}</div></a>';
            // $themePaging["theme"] = '<li class="{{active}}"><a href="{{link}}">{{str_page}}</a></li>';
            
            $page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);
            // echo $count;
            if ($count != '0') 
            {
                foreach ($id_rela_row as $id_rela2) 
                {
                    $array[] = $id_rela2['product_releted'];
                    array_push($array, $id);
                }
                /*
                 * print_r($array);
                 * die();
                 */
                $aa = implode(',', $array);
                $this->db->where_not_in('id', $array);
            } 
            else 
            {
                
                $array[] = $id;
                
                /*
                 * print_r($array);
                 * die();
                 */
                $aa = implode(',', $array);
                $this->db->where_not_in('id', $array);
            }
            
            $this->db->limit($rows_per_page, $start_row);
            $query = $this->db->get('tb_product');
            $this->db->flush_cache();
            
            // echo $this->db->last_query();
            // die();
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
        }
        
        $data['page_url'] = $page_url;
        $this->load->view('cwcontrol/pages/' . $this->default_page . '/data-add-rela', $data);
    }

    public function save_rela()
    {
        $id_pro = $this->input->post('id_pro');
        for ($i = 0; $i < count($_POST["id_rela"]); $i ++) 
        {
            if ($this->input->post('id_rela')[$i] != "") 
            {
                
                $id_rela = $this->db->escape_str($this->input->post('id_rela')[$i]);
                
                /*
                 * echo $id_rela;
                 * echo $id_pro;
                 */
                $data = array(
                    'product_id' => $id_pro,
                    'product_releted' => $id_rela
                );
                
                $this->db->insert('tb_product_releted', $data);
            }
        }
        
        if ($this->db->trans_status() === TRUE) 
        {
            
            $this->session->set_flashdata('message', 'ทำการเพิ่มสินค้าที่เกี่ยวข้องสำเร็จค่ะ');
            echo $this->session->flashdata('message');
        } 
        else 
        {
            
            $this->session->set_flashdata('message', 'ทำการเพิ่มสินค้าที่เกี่ยวข้องไม่สำเร็จค่ะ กรุณาเพิ่มใหม่อีกครั้ง');
            echo $this->session->flashdata('message');
        }
    }
    
    

    public function delete_rela()
    {
        $id = $this->input->post('id');
        echo $id;
        $this->db->where('id_rela', $id);
        $this->db->delete('tb_product_releted');
        
        $this->session->set_flashdata('rela', 're');
    }

    public function detail()
    {
        $id = $_GET['id'];
        $query = $this->db->query('SELECT * FROM `product_detail` WHERE `id` = ' . $id);
        $data['row'] = $query->row_array();
        $data['page'] = "product";
        $this->load->view('cwcontrol/pages/' . $this->default_page . '/data-add-detail', $data);
    }
    
    public function save_detail()
    {
        $id = $_POST['id'];
        $data = array(
            'detail_TH' => $_POST["detail_TH"],
            'detail_EN' => $_POST["detail_EN"]
           
            
        );
        
        $this->db->where('id', $id);
        $this->db->update('product_detail', $data);
        
       // die();
        redirect('cwcontrol/Product/detail?id='.$id);
    }
}

?>
