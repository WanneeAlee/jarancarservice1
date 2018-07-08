<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ck_login {

	public function __construct(){


		$this->ci =& get_instance();
		// $this->ci->get_cookie('cookie');
	  // $this->ci->helper('cookie');
		echo '_SESSION : '.@$_SESSION['admin_id'];

	}

	public function check_login(){

		$controller = $this->ci->router->class;
		// echo $controller;

		$method = $this->ci->router->class;
		$segment = $this->ci->uri->segment(1);
		// echo $controller;
		// echo $segment;
		// die();
		if ($segment =='cwcontrol') {
			// $admin['admin_id']="0";
		if ($this->ci->session->userdata('admin_id') == "") {
		// หลายfun login ใช้ array() กับ in_array() ในการตรวจสอบ//
			$fun_login = array('login','login_main','login_facebook');
			// if (in_array($method,$fun_login)) {
			if ($method != "login") {
				echo "Check Login";
				redirect(base_url('cwcontrol/login'),"refresh");
				exit();
			}

		}else{
			// echo $this->ci->session->userdata('admin_id');
			if ($method == "login") {
				redirect(base_url('cwcontrol/home'),"refresh");
				exit();
			}
		}
		}
		


	}	

}
?>