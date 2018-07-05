<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_contact extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('classupload'));
        
    }

    public function send()
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
        $strMessage .= "เบอร์ติดต่อ : ".$_POST['tel']."<br>";
        $strMessage .= "อีเมล : ".$_POST['email']."<br>";
        $strMessage .= "รายละเอียด : ".$_POST['msg']."<br>";
        $strMessage .= "<br>";       
        $strSubject = 'lmc.co.th';
      
        
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
        $this->email->to('wannee@chinhosting.com');
        $this->email->subject($strSubject);
        $this->email->message($strMessage);
        $this->email->attach($link);
   
        //echo $link; die();
   
        if($this->email->send())
        {
             
            $data_page = array
            (
                'page' => $re,
                'label' => 'ฝากข้อความ',
                'labeltext' => 'ได้รับข้อความของคุณแล้ว ทางเราจะติต่ิกลับโดยเร็วที่สุด.'
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