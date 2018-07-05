<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_repairing extends CI_Model {

  protected $default_page = 'service';

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('classupload'));
    
  }
  public function get_all()
  {
    $data['service'] = $this->db->where('services_Status',1)->order_by('services_Sort','ASC')->get('tb_services')->result_array();
    $data['page_1'] = $this->default_page;

    return $data;
  }
  public function get_all_home()
  {
    $data['service'] = $this->db->where('services_home',1)->where('services_Status',1)->order_by('services_Sort','ASC')->get('tb_services')->result_array();
    $data['page_1'] = $this->default_page;

    return $data;
  }

  public function get_service($id)
  {


    $data['row'] = $this->db->where('services_ID',$id)->get('tb_services')->row_array();
    $data['gallery'] =$this->db->where('services_ID',$id)->get('tb_services_gallery')->result_array();

    $row = $this->db->where('services_ID',$id)->get('tb_services')->row_array();
    $data['nav'] = array
    (
      'page'      => array
      (
        '1' => 'Home', 
        '2' => 'Our service', 
        '3'=> $row['services_Name_TH']
        ), 
      'page_url'  => array
      (
        '1' => '', 
        '2'=> $this->default_page, 
        '3'=> '/detail/'.$row['services_ID']
        )
      );

    return $data;
  }

  public function get_detail()
  {
    $id = $this->input->get('service');
    $data['detail'] = $this->db->where('services_ID',$id)->get('tb_services')->row_array();
    return $data;
  }


  public function insert()
  {
    $num_row = $this->db->get('tb_services')->num_rows();
    $sort = $num_row + 1;

    if ($_FILES["services_Images"]["name"] != "")
    {

      $rename = "PHOTO_services_" . date("d-m-Y_His");  
      $handle = new upload($_FILES["services_Images"]);      

      if ($handle->uploaded)
      {

        $handle->file_new_name_body = $rename;
        $handle->image_resize = true;
          //$handle->image_ratio_crop = "T";
        $handle->image_x = '350';
        $handle->image_y = '261';
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
          'services_Name_TH' => $_POST['services_Name_TH'],
          'services_Detail_TH' => $_POST['services_Detail_TH'],
          'services_Images' => $photo_name,
          'services_Sort' => $sort,                      
          'services_Status' => 1
          );
        $this->db->set('services_Date','NOW()',false);
        $this->db->insert('tb_services',$data);
        $id = $this->db->insert_id();
      }
    }


     //=================================  gallery  =====================================//

    $files = array();
    foreach ($_FILES['services_gallery'] as $k => $l) {
      foreach ($l as $i => $v) {
        if (! array_key_exists($i, $files))
          $files[$i] = array();
        $files[$i][$k] = $v;
        $imagename = $_FILES['services_gallery']['name'];
      }
    }

    $filesnum = count($files) - 2;
    foreach ($files as $file) {

      $filenamex = "services_gallery" . date("d-m-Y_Hms");

      $handle = new upload($file);

      if ($handle->uploaded)
      {
        $handle->file_new_name_body = $filenamex;
        $handle->file_name_body_pre = 'full_';
        $handle->image_resize = true;
        // $handle->image_ratio_crop = "T";
        $handle->image_x = '1177';
        $handle->image_y = '879';
        // $handle->image_ratio_y = true;
        //$handle->jpeg_quality = '100';

        $handle->process('assets/upload');
      }
      if ($handle->uploaded)
      {
        $handle->file_new_name_body = $filenamex;
        $handle->image_resize = true;
                // $handle->image_ratio_crop = "T";
        $handle->image_x = '360';
        $handle->image_y = '269';
        // $handle->image_ratio_y = true;
       // $handle->jpeg_quality = '100';

        $handle->process('assets/upload');
        $image_name_thumb = $handle->file_dst_name;

        if ($handle->processed)
        {                    
          $data = array
          (
            'gallery_Images' => $image_name_thumb,
            'gallery_Sort' => $filesnum,
            'services_ID' => $id
            );
          $this->db->insert('tb_services_gallery', $data);
        }
      }
      $filesnum --;
    }

    if($this->db->trans_status() === TRUE )
    {
      $data_page = array
      (
       'page' => 'cwcontrol/service?type=edit&id=' . $id . '&&rele=re',
       'label' => 'เพิ่มข้อมูล',
       'labeltext' => 'เพิ่มข้อมูลสำเร็จ'
       );
      $this->load->view('cwcontrol/modal/front_success',$data_page);

    }
    else
    {
      $data_page = array
      (
       'page' => 'cwcontrol/service?type=add',
       'label' => 'เพิ่มข้อมูล',
       'labeltext' => 'ไม่สำเร็จ'
       );
      $this->load->view('cwcontrol/modal/front_error',$data);
    }

   }//End function


   public function update()
   {

    $id = $this->input->post('id');

    $data = array
    (
      'services_Name_TH' => $_POST['services_Name_TH'],
      'services_Detail_TH' => $_POST['services_Detail_TH']

      );
    $this->db->where('services_ID',$id);
    $this->db->update('tb_services',$data);


    if ($_FILES["services_Images"]["name"] != "")
    {

      $services_image = $this->db->where('services_ID',$id)->get('tb_services')->row_array();
      unlink('assets/upload/'.$services_Image['services_Images']);

      $rename = "PHOTO_services_" . date("d-m-Y_Hms");  
      $handle = new upload($_FILES["services_Images"]);      


      if($handle->uploaded)
      {

        $handle->file_new_name_body = $rename;
        $handle->image_resize = true;
        //$handle->image_ratio_crop = "T";
        $handle->image_x = '360';
        $handle->image_y = '269';
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
          'services_Images' => $photo_name
          );
        $this->db->where('services_ID',$id);
        $this->db->set('services_Update','NOW()',false);
        $this->db->update('tb_services',$data);
      }
    }


    //=================================  gallery  =====================================//

    $files = array();
    foreach ($_FILES['services_gallery'] as $k => $l) {
      foreach ($l as $i => $v) {
        if (! array_key_exists($i, $files))
          $files[$i] = array();
        $files[$i][$k] = $v;
        $imagename = $_FILES['services_gallery']['name'];
      }
    }

    $filesnum = count($files) - 2;
    foreach ($files as $file) {

      $filenamex = "services_gallery" . date("d-m-Y_Hms");

      $handle = new upload($file);


      if($handle->uploaded)
      {
        $handle->file_new_name_body = $filenamex;
        $handle->file_name_body_pre = 'full_';
        $handle->image_resize = true;
        $handle->image_x = '1177';
        $handle->image_y = '879';
        $handle->process('assets/upload');
      }

      if ($handle->uploaded)
      {
        $handle->file_new_name_body = $filenamex;
        $handle->image_resize = true;
                // $handle->image_ratio_crop = "T";
        $handle->image_x = '360';
        $handle->image_y = '269';
                // $handle->image_ratio_y = true;
        $handle->jpeg_quality = '100';

        $handle->process('assets/upload');
        $image_name_thumb = $handle->file_dst_name;

        if ($handle->processed)
        {                    
          $data = array
          (
            'gallery_Images' => $image_name_thumb,
            'gallery_Sort' => $filesnum,
            'services_ID' => $id
            );
          $this->db->insert('tb_services_gallery', $data);
        }
      }
      $filesnum --;
    }

    if($this->db->trans_status() === TRUE )
    {
      $data_page = array
      (
       'page' => 'cwcontrol/service?type=edit&id=' . $id ,
       'label' => 'เพิ่มข้อมูล',
       'labeltext' => 'เพิ่มข้อมูลสำเร็จ'
       );
      $this->load->view('cwcontrol/modal/front_success',$data_page);

    }
    else
    {
      $data_page = array
      (
       'page' => 'cwcontrol/service?type=add',
       'label' => 'เพิ่มข้อมูล',
       'labeltext' => 'ไม่สำเร็จ'
       );
      $this->load->view('cwcontrol/modal/front_error',$data);
    }

    }//End function


    public function delete_img()
    { 
      if($_POST["id"]!="")
      {

       $id = $this->db->escape_str($this->input->post('id'));       
       $row = $this->db->get_where('tb_services_gallery', array('gallery_ID' => $id))->row_array();

       unlink("assets/upload/full_$row[gallery_Images]");
       unlink("assets/upload/$row[gallery_Images]");

       $this->db->where('gallery_ID', $_POST["id"]);
       $this->db->delete('tb_services_gallery');

     }

    }//function

    


    public function delete()
    {

      if($_POST["id"]!="")
      {
        $id = $_POST['id'];

        //echo $id; die();

        $image = $this->db->where('services_ID',$id)->get('tb_services')->row_array();
        unlink('assets/upload/'.$image['services_Images']);

        $gall = $this->db->where('services_ID',$id)->get('tb_services_gallery')->result_array();
        foreach ($gall as $gall)
        {
          unlink('assets/upload/'.$gall['gallery_Images']);
        }


        $this->db->where('services_ID',$id)->delete('tb_services');
        $this->db->where('services_ID',$id)->delete('tb_services_gallery');
        
        if($this->db->trans_status() === TRUE )
        {
          $data_page = array
          (
           'page' => 'cwcontrol/service?type=edit&id=' . $id . '&&rele=re',
           'label' => 'ลบข้อมูล',
           'labeltext' => 'สำเร็จ'
           );
          $this->load->view('cwcontrol/modal/front_success',$data_page);

        }
        else
        {
          $data_page = array
          (
           'page' => 'cwcontrol/service?type=edit&id=' . $id . '&&rele=re',
           'label' => 'ลบข้อมูล',
           'labeltext' => 'ไม่สำเร็จ'
           );
          $this->load->view('cwcontrol/modal/front_error',$data);
        }
      }

   }//End function


   public function delete_All()
   {
    for($i=0;$i<count($_POST["id"]);$i++)
    {
      if($_POST["id"][$i] != "")
      {

        $id = $_POST["id"][$i];
        $image = $this->db->where('services_ID',$id)->get('tb_services')->row_array();
        unlink('assets/upload/'.$image['services_Images']);

        $gall = $this->db->where('services_ID',$id)->get('tb_services_gallery')->result_array();
        foreach ($gall as $gall)
        {
          unlink('assets/upload/'.$gall['gallery_Images']);
        }

        $this->db->where('services_ID',$id)->delete('tb_services');
        $this->db->where('services_ID',$id)->delete('tb_services_gallery');

      }
    }
    }//End function


    public function status()
    {
      if($this->input->post('id')!="")
      {

        $id = $this->db->escape_str($this->input->post('id'));     
        $query = $this->db->get_where('tb_services', array('services_ID' => $id));

        $row = $query->row_array();
        if($row["services_Status"] == 1)
        {
          $Status = 0;
        }
        else
        {
         $Status = 1;
       }


       $data = array
       (
        'services_Status' => $Status,
        );
       $this->db->where('services_ID', $id);
       $this->db->update('tb_services', $data);

     }

  } //End function

  public function home()
  {
    if($this->input->post('id')!="")
    {

      $id = $this->db->escape_str($this->input->post('id'));
      $chk = $this->db->get_where('tb_services', array('services_ID' => $id))->row_array();
      $numrow = $this->db->get_where('tb_services', array('services_home' => 1))->num_rows();

      if($chk['services_home'] == 1)
      {
        $Status = 0;      
      }
      else
      {
        if($numrow < 6){ $Status = 1;  }
      }
      $this->db->where('services_ID', $id)->update('tb_services', array("services_home" => $Status));        

    }

  } //End function


  public function Sort()
  {
    $id = $this->db->escape_str($this->input->post('id'));

    $row = $this->db->get_where('tb_services', array('services_ID' => $id))->row_array();

    $old_sort = $row["services_Sort"];
    $new_sort = $_POST["value"];


    if ($new_sort > $old_sort) {

      $this->db->set('services_Sort', 'services_Sort-1', FALSE);
      $this->db->where("services_Sort Between '$old_sort' and '$new_sort' AND services_ID !=$id ");
      $this->db->update('tb_services');

    }else{

      $this->db->set('services_Sort', 'services_Sort+1', FALSE);
      $this->db->where("services_Sort Between '$new_sort' and '$old_sort' AND services_ID !=$id ");
      $this->db->update('tb_services');

    }

    $data = array('services_Sort' => $_POST["value"]);
    $this->db->where('services_ID', $id);
    $this->db->update('tb_services', $data);

  }

  public function insert_car($value='')
  {

    $soft = $this->db->get()->result_array();
    $cont = count($soft);
    $news = $cont+1;

    $data = array(
      'name' => $_POST['name'], 
      'lastname' => $_POST['lastname'], 
      'phone' => $_POST['phone'], 
      'email' => $_POST['email'], 
      'car' => $_POST['car'], 
      'detail' => $_POST['detail'], 
      );
    $this->db->insert('tables',$data);
    $id = $this->db->insert_id();

    if (!empty($_FILES['emailfile'])) {

      $services_image = $this->db->where('services_ID',$id)->get('tb_services')->row_array();
      @unlink('assets/upload/'.$services_Image['services_Images']);

      $rename = "PHOTO_services_" . date("d-m-Y_His");  
      $handle = new upload($_FILES["services_Images"]);   

      if ($handle->uploaded)
      {

        $handle->file_new_name_body = $rename;
        $handle->image_resize = true;
          //$handle->image_ratio_crop = "T";
        $handle->image_x = '350';
        $handle->image_y = '261';
          $handle->image_ratio_y        = true;
          $handle->jpeg_quality = '100';
          //$handle->image_watermark = '../../class.upload/bg.png';
        $handle->process('assets/upload');

      }  

      if ($handle->processed)
      {
        $photo_name = $handle->file_dst_name;
        $data = array
        (
          'emailfile' => $photo_name,
          );
        $This->db->where('id',$id);
        $this->db->update('tb_repair',$data);
      }

      
    }

    $this->Model_repairing->sendemail();
  }

  public function sendemail($value='')
  {
    $this->load->library('email');

    $re = $this->input->post('re');

    if(isset($_POST['g-recaptcha-response']))
    {
      $captcha=$_POST['g-recaptcha-response'];
    }

    //$secret = '6Le3EDoUAAAAAKMyBBo6ozJhYrOgAYdEpRCqeWyN';
    $secret = '6LcSEDoUAAAAAD0Otpcw_Jfpte0ymizp4KssM_Mw';
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $response = file_get_contents($url."?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
    
    $data = json_decode($response);
    
    $chk_captcha = $data->success;
    $chk_captcha = "1";

    
    if($chk_captcha)
    {                



      $config['protocol'] = 'smtp';
      $config['charset'] = 'utf-8';
        $config['smtp_host'] = 'ns1.chinhosting.com';  //ns1.chinhosting.com
        $config['smtp_user'] = 'noreply@primamech.com';  //noreply@primamech.com
        $config['smtp_pass'] = 'cw774411';  //cw774411
        $config['smtp_port'] = 465;  //465
        $config['smtp_crypto'] = 'ssl';
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $comfig['wordwrap'] = TRUE;


        $this->email->initialize($config);
        
        
        $strMessage = "";
        $strMessage .= "ชื่อผู้ติดต่อ : ".$_POST['name']."<br>";
        $strMessage .= "เบอร์ติดต่อ : ".$_POST['subject']."<br>";
        $strMessage .= "อีเมล : ".$_POST['email']."<br>";
        $strMessage .= "รายละเอียด : ".$_POST['message']."<br>";
        $strMessage .= "<br>";       
        $strSubject = '39place';

        echo $strSubject;
        die();
        if($_FILES["attach"]["name"] != "")
        {
          $ext = explode('.', $_FILES["attach"]["name"]);

          $filenamex = "File_attach_" . date("d-m-Y_Hms");
          $handle = new upload($_FILES["attach"] );
          if ($handle->uploaded)
          {
            $handle->file_new_name_body = $filenamex;
            $handle->file_dst_name;
            $handle->process('assets/upload/file');

            $link = asset_url().'/upload/file/'.$filenamex.'.'.$ext[1];

          }//End function
        }

        $this->email->from($_POST["email"],$_POST["name"]);
        //$this->email->to($_POST["cus_mail_".$_SESSION['lang']]);
        $this->email->to($_POST["email"],'wannee@chinhosting.com');
        $this->email->subject($strSubject);
        $this->email->message($strMessage);
        // $this->email->attach($link);

        //echo $link; die();

        if($this->email->send())
        {

          $data_page = array
          (
            'page' => $re,
            'label' => 'ฝากข้อความ',
            'labeltext' => 'ได้รับข้อความของคุณแล้ว ทางเราจะติดต่อกลับโดยเร็วที่สุด.'
            );              
          $this->load->view('cwcontrol/modal/front_success',$data_page);

        }
        else
        {

          $data_page = array
          (
            'page' => $re,
            'label' => 'ฝากข้อความ',
            'labeltext' => 'กรุณาลองอีกครั้งภายหลัง.'
            );                       
          $this->load->view('cwcontrol/modal/front_error',$data_page);

        }     

      }
      else
      {

       return "code";

     }   
   }

 }
