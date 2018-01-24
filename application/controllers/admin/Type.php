<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('level') == 'Admin' && !$this->session->userdata('logged_in_pasarku')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/type_m');
	}
	
	public function index() {
		if($this->session->userdata('level') == 'Admin' && $this->session->userdata('logged_in_pasarku')) {
			$this->template->display('admin/master/type_view');
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function data_list() {
        $List = $this->type_m->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row = array();
            $type_id = $r->type_id;
            
            $row[] = '	<button type="button" class="btn btn-primary btn-xs" title="Edit Data" href="javascript:void(0)" onclick="edit_data('."'".$type_id."'".')"><i class="fa fa-edit"></i></button>
            			<a onclick="hapusData('.$type_id.')"><button class="btn btn-danger btn-xs" type="button" title="Delete Data"><i class="fa fa-times-circle"></i></button>';

            $row[] = $no;
            $row[] = $r->type_name;
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->type_m->count_all(),
                        "recordsFiltered" 	=> $this->type_m->count_filtered(),
                        "data" 				=> $data,
                );
        
        echo json_encode($output);
    }

	public function savedata() {
		$this->type_m->insert_data();
		echo json_encode(array( "status" => TRUE));
	}

	public function get_data($id) {
        $data   = $this->type_m->select_by_id($id)->row();
        echo json_encode($data);
    }

	public function updatedata() {
		$this->type_m->update_data();
		echo json_encode(array( "status" => TRUE));
	}

	public function deletedata($id) {
        $this->type_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
}
/* Location: ./application/controller/admin/Type.php */