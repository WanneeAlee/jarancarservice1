<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
    }
    public function index()
    {
        $this->load->view('cwcontrol/index');
    }
    
    public function check_login() 
 { 
    
  $strUsername = trim($_POST["Username"]);
  $strPassword = trim($_POST["Password"]);
  $md_pass = MD5("cwinth2017la08@!");
  $md_pass2 = MD5("cw774411");
  
  
  if($strUsername == "Administrator" && MD5($strPassword) == $md_pass || $strUsername == "admin" && MD5($strPassword) == $md_pass2)
   {
    
  
    if($_POST["remember_me"] == "on") { 
    
     set_cookie('username_log',$strUsername,'30000000');
     set_cookie("password_log",$strPassword,'30000000');
    }else{
     set_cookie("username_log", "", time()-3600);
     set_cookie("password_log", "", time()-3600);
    }
    $_SESSION["user_username"] = $strUsername;
    
    echo "true";
    
   }else{
    
    echo "false";
   }
  
  
  
 }


    
}