<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meta extends CI_Controller
{

    protected $default_page = 'meta';

    public function __construct()
    {
        parent::__construct();
        if (! isset($_SESSION["user_username"])) {
            
            redirect('cwcontrol');
        }
        $this->load->model('Model_product');
    }

    public function index()
    {
       
        $data['page'] = $this->default_page;
        //SELECT * FROM `tb_meta`
        $row = $this->db->query('SELECT * FROM `tb_meta` WHERE meta_status = 1 ORDER BY `tb_meta`.`meta_sort` ASC');
        $data['row'] = $row->result_array();
        
        $this->load->view('cwcontrol/pages/' . $this->default_page . '/index', $data);
    }
    public function update()
    {
        
        print_r($_POST);
        //Array ( [id_page] => 1 [meta_titte] => ceee [meta_description] => ceer [meta_keywords] => crtt )
        $data = array(
            'meta_titte' => $_POST["meta_titte"],
            'meta_description' => $_POST["meta_description"],
             'meta_keywords' => $_POST["meta_keywords"],
        );
        $this->db->where('id', $_POST["id_page"]);
        $this->db->set('date_edit', 'NOW()', FALSE);
        $this->db->update('tb_meta', $data);
        
        if ($this->db->trans_status() === TRUE) {
            $this->session->set_flashdata('page', $_POST["page"]);
            $data_page = array(
                'page' => 'cwcontrol/' . $this->default_page . '/index',
                'label' => 'จัดการ meta',
                'labeltext' => 'บันทึกสำเร็จค่ะ'
            );
            
            $this->load->view('cwcontrol/modal/front_success', $data_page);
        } else {
            $this->load->view('cwcontrol/modal/error', $data);
        }
    }

    public function delete()
    {
        
        // echo $this->input->post('id');
        $query = $this->Model_product->delete();
    }

   


    public function Sort()
    {
        $query = $this->Model_product->Sort();
    }

      

    
    
}
?>