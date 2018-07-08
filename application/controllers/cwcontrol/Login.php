<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	

	public function __construct()
	{
			
		parent::__construct();
		$this->load->model('Model_login');
		
			
	}
	// public function index()
	// {
		
		
	// 	$this->load->view('cwcontrol/index');
		
		
		
	// }
	
	/*public function check_login()
	{
		
		// $query = $this->Model_login->check_login();
		if( $_POST['Username'] == "Administrator" && 'cwinth2017la08@!' == $_POST['Password'] || $_POST['Username'] == "admin" && 'cw774411' == $_POST['Password'] ) 
		{
			$user_username = $_POST['Username'];
			$this->session->set_userdata($user_username);
			echo "true";
		}			
		
	}*/
	
	function index()
		{	
			if ($this->input->post('type') == 'main') {

				$email = $this->input->post('email');
				$pass = md5($this->input->post('pass'));

				if (!empty($email) && !empty($pass)) {
					$admin = $this->db->where('admin_email',$email)->where('admin_password',$pass)->where('login_out','0')->get('admin')->row_array();
				// echo $this->db->last_query();
				// $count = count($admin);
					// echo pre($admin);
					// die();
					if ($admin) {

						$this->session->set_userdata('admin_id',$admin['admin_id']);
						$this->session->set_userdata('admin_name',$admin['admin_name']);
						$this->session->set_userdata('time','1');

						echo json_encode($admin);

					}else{
						echo "0";
					}

				}else{
					echo "0";
				}

			}else{
				$this->load->view('cwcontrol/index');
			}

		}

	public function logout()
	{
		// die();
		// unset($_SESSION['admin_id']);		
		// unset($_SESSION['admin_name']);
		$this->session->sess_destroy();		
		redirect('cwcontrol');
		
		
		
	}
	
	
	
	
}
