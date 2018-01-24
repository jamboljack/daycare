<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_category extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('level') == 'Admin' && !$this->session->userdata('logged_in_pasarku')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/news_category_m');
	}
	
	public function index() {
		if($this->session->userdata('level') == 'Admin' && $this->session->userdata('logged_in_pasarku')) {
			$this->template->display('admin/master/news_category_view');
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function data_list() {
        $List = $this->news_category_m->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row = array();
            $category_id = $r->category_id;
            
            $row[] = '	<button type="button" class="btn btn-primary btn-xs" title="Edit Data" href="javascript:void(0)" onclick="edit_data('."'".$category_id."'".')"><i class="fa fa-edit"></i></button>
            			<a onclick="hapusData('.$category_id.')"><button class="btn btn-danger btn-xs" type="button" title="Delete Data"><i class="fa fa-times-circle"></i></button>';

            $row[] = $no;
            $row[] = $r->category_name;
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->news_category_m->count_all(),
                        "recordsFiltered" 	=> $this->news_category_m->count_filtered(),
                        "data" 				=> $data,
                );
        
        echo json_encode($output);
    }

	public function savedata() {
		$this->news_category_m->insert_data();
	}

	public function get_data($id) {
        $data   = $this->news_category_m->select_by_id($id)->row();
        echo json_encode($data);
    }

	public function updatedata() {
		$this->news_category_m->update_data();
	}

	public function deletedata($id) {
        $this->news_category_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
}
/* Location: ./application/controller/admin/News_category.php */