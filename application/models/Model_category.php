<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_category extends CI_Model {

    protected $default_page = 'category';
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('classupload'));
    }

    
    public function get_post()
    {

        $data['slide'] = $this->db->where('category_status',1)->get('tb_category')->result_array();
        $data['news'] = $this->db->where('news_Status',1)->get('tb_news')->result_array();
        $data['news-detail'] = $this->db->where('news_Status',1)->get('tb_news')->result_array();

        return $data;
    }

    public function get_all()
    {

      $rows_per_page = 6;
       $current_page = 1;
       $page_range = 7;
       $qry_string = "";
       $page_url = base_url('category');
       
       if($this->input->get_post('page')) {
        $current_page = $this->input->get_post('page');
       }
       
       
       
       $start_row = paging_start_row($current_page, $rows_per_page);
       
       $this->db->start_cache();   
       $this->db->where('category_status', 1);
       $this->db->order_by('category_sort','ASC');
       $this->db->stop_cache();
       
       $query = $this->db->get('tb_category');
       
      
       $Num_Rows = $query->num_rows();
       $total_pages = paging_total_pages($Num_Rows, $rows_per_page);
       
       $themePaging["next"]='&raquo';
       $themePaging["prev"]='&laquo';
       $themePaging["theme"]='<li class="{{active}}"><a href="{{link}}">{{str_page}}</a></li>';
       
       $page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url, $themePaging);
       
       $this->db->limit($rows_per_page, $start_row);
       $query = $this->db->get('tb_category');
       $this->db->flush_cache();
       
       //echo $this->db->last_query();
       

       if($Num_Rows > 0 ) {
         $data["category"] = $query->result_array();
       }



       if($Num_Rows > $rows_per_page){
         $data["page_str"] = $page_str;

       }

      $data['page_1'] = $this->default_page;

      return $data;
    }

    public function get_category()
    {
      $id = $this->input->get('category');

      //$data['page_1'] = $this->default_page;

      $data['row'] = $this->db->where('id',$id)->get('tb_category')->row_array();
      $data['files'] = $this->db->where('product_ID',$id)->get('tb_file')->result_array();
      $data['gallery'] =$this->db->where('product_ID',$id)->get('tb_product_gallery')->result_array();

      return $data;
    }

     public function insert()
    {
      $num_row = $this->db->get('tb_category')->num_rows();
      $sort = $num_row + 1;

      if ($_FILES["category_images"]["name"] != "")
      {

      $rename = "PHOTO_category_" . date("d-m-Y_His");  
      $handle = new upload($_FILES["category_images"]);      

       if ($handle->uploaded)
       {

        $handle->file_new_name_body = $rename;
        $handle->image_resize = true;
        //$handle->image_ratio_crop = "T";
        $handle->image_x = '268';
        $handle->image_y = '281';
        //$handle->image_ratio_y        = true;
        //$handle->jpeg_quality = '100';
        //$handle->image_watermark = '../../class.upload/bg.png';
        $handle->process('assets/upload');

      }  

      if ($handle->processed)
      {
        $photo_name = $handle->file_dst_name;
        $data = array
        (
            'category_name_TH' => $_POST['category_name_TH'],
            // 'category_name_EN' => $_POST['category_name_EN'],
            'category_images' => $photo_name,
            'category_sort' => $sort,                      
            'category_status' => 1
        );
        $this->db->set('category_date','NOW()',false);
        $this->db->insert('tb_category',$data);
        $id = $this->db->insert_id();
      }
    }
    if($this->db->trans_status() === TRUE )
     {
      $data_page = array
      (
           'page' => 'cwcontrol/category?type=edit&id=' . $id . '&&rele=re',
           'label' => 'เพิ่มข้อมูล',
           'labeltext' => 'เพิ่มข้อมูลสำเร็จ'
      );
      $this->load->view('cwcontrol/modal/front_success',$data_page);
       
     }
     else
     {
        $data_page = array
      (
           'page' => 'cwcontrol/category?type=add',
           'label' => 'เพิ่มข้อมูล',
           'labeltext' => 'ไม่สำเร็จ'
      );
        $this->load->view('cwcontrol/modal/front_error',$data);
     }
   }//End function


   public function Update()
   {

    $id = $this->input->post('id');

    $data = array
    (
      'category_name_TH' => $_POST['category_name_TH'],
      // 'category_name_EN' => $_POST['category_name_EN']
    );
    $this->db->where('id',$id);
    $this->db->update('tb_category',$data);

    if ($_FILES["category_images"]["name"] != "")
      {

        $category_image = $this->db->where('id',$id)->get('tb_category')->row_array();
        unlink('assets/upload/'.$category_image['category_images']);

      $rename = "PHOTO_slide_" . date("d-m-Y_Hms");  
      $handle = new upload($_FILES["category_images"]);      

       if ($handle->uploaded)
       {

        $handle->file_new_name_body = $rename;
        $handle->image_resize = true;
        //$handle->image_ratio_crop = "T";
        $handle->image_x = '260';
        $handle->image_y = '281';
        //$handle->image_ratio_y        = true;
        //$handle->jpeg_quality = '100';
        //$handle->image_watermark = '../../class.upload/bg.png';
        $handle->process('assets/upload');

      }//End function



      if ($handle->processed)
      {
        $photo_name = $handle->file_dst_name;
        $data = array
        (
          'category_images' => $photo_name
        );
        $this->db->where('id',$id);
        $this->db->set('category_date','NOW()',false);
        $this->db->update('tb_category',$data);
      }
    }


    if($this->db->trans_status() === TRUE )
     {
      $data_page = array
      (
           'page' => 'cwcontrol/category?type=edit&id=' . $id . '&&rele=re',
           'label' => 'บันทึกข้อมูล',
           'labeltext' => 'สำเร็จ'
      );
      $this->load->view('cwcontrol/modal/front_success',$data_page);
       
     }
     else
     {
        $data_page = array
      (
           'page' => 'cwcontrol/category?type=edit&id=' . $id . '&&rele=re',
           'label' => 'บันทึกข้อมูล',
           'labeltext' => 'ไม่สำเร็จ'
      );
        $this->load->view('cwcontrol/modal/front_error',$data);
     }

   }//End function


   public function delete()
   {
      $id = $this->input->post('id');
      $image = $this->db->where('id',$id)->get('tb_category')->row_array();
      unlink('assets/upload/'.$image['category_images']);

      $this->db->where('id',$id)->delete('tb_category');
      
      if($this->db->trans_status() === TRUE )
     {
      $data_page = array
      (
           'page' => 'cwcontrol/category?type=edit&id=' . $id . '&&rele=re',
           'label' => 'ลบข้อมูล',
           'labeltext' => 'สำเร็จ'
      );
      $this->load->view('cwcontrol/modal/front_success',$data_page);
       
     }
     else
     {
        $data_page = array
      (
           'page' => 'cwcontrol/category?type=edit&id=' . $id . '&&rele=re',
           'label' => 'ลบข้อมูล',
           'labeltext' => 'ไม่สำเร็จ'
      );
        $this->load->view('cwcontrol/modal/front_error',$data);
     }


   }//End function


   public function delete_All()
   {
      for($i=0;$i<count($_POST["id"]);$i++)
      {
        if($_POST["id"][$i] != "")
        {

          $id = $_POST["id"][$i];
          $image = $this->db->where('id',$id)->get('tb_category')->row_array();
          unlink('assets/upload/'.$image['categoey_images']);

          $this->db->where('id',$id)->delete('tb_category');

        }
      }
    }//End function


    public function status()
  {
      if($this->input->post('id')!="")
      {

      $id = $this->db->escape_str($this->input->post('id'));     
      $query = $this->db->get_where('tb_category', array('id' => $id));

      $row = $query->row_array();
       if($row["category_status"] == 1)
       {
          $Status = 0;
       }
       else
       {
         $Status = 1;
       }
     
     
       $data = array
       (
        'category_status' => $Status,
       );
       $this->db->where('id', $id);
       $this->db->update('tb_category', $data);

    }

  } //End function


  public function sort()
  {
    $id = $this->db->escape_str($this->input->post('id'));
        
        $row = $this->db->get_where('tb_category', array('id' => $id))->row_array();
        
        $old_sort = $row["category_sort"];
        $new_sort = $_POST["value"];

        
        if ($new_sort > $old_sort) {
            
            $this->db->set('category_sort', 'category_sort-1', FALSE);
            $this->db->where("category_sort Between '$old_sort' and '$new_sort' AND id != '$id' ");
            $this->db->update('tb_category');
   
        }else{
            
            $this->db->set('category_sort', 'category_sort+1', FALSE);
            $this->db->where("category_sort Between '$new_sort' and '$old_sort' AND id != '$id' ");
            $this->db->update('tb_category');
   
        }
        
        $data = array(
            'category_sort' => $_POST["value"]
        );
        $this->db->where('id', $id);
        $this->db->update('tb_category', $data);

  }



    
}