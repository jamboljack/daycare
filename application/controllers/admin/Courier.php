<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courier extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('level') == 'Admin' && !$this->session->userdata('logged_in_pasarku')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/courier_m');
	}
	
	public function index() {
		if($this->session->userdata('level') == 'Admin' && $this->session->userdata('logged_in_pasarku')) {
			$this->template->display('admin/master/courier_view');
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function data_list() {
        $List = $this->courier_m->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row = array();
            $courier_id = $r->courier_id;
            
            // <a onclick="hapusData('.$courier_id.')"><button class="btn btn-danger btn-xs" type="button" title="Delete Data"><i class="fa fa-times-circle"></i></button>
            $link   = site_url('admin/courier/editdata/'.$courier_id);
            $row[] = '<a href="'.$link.'"><button class="btn btn-primary btn-xs" title="Edit Data"><i class="fa fa-edit"></i></button></a>';

            $row[] = $no;
            $row[] = $r->courier_name;
            $row[] = $r->courier_desc;
            $row[] = $r->courier_url;
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->courier_m->count_all(),
                        "recordsFiltered" 	=> $this->courier_m->count_filtered(),
                        "data" 				=> $data,
                );
        
        echo json_encode($output);
    }

    public function adddata() {
        $this->template->display('admin/master/addcourier_view');
    }

	public function savedata() {
		$this->courier_m->insert_data();
	}

	public function editdata($courier_id) {
        $data['detail'] = $this->courier_m->select_by_id($courier_id)->row();
        $this->template->display('admin/master/editcourier_view', $data);
    }

	public function updatedata() {
		$this->courier_m->update_data();
	}

	// public function deletedata($id) {
 //        $this->courier_m->delete_data($id);
 //        echo json_encode(array("status" => TRUE));
 //    }
}
/* Location: ./application/controller/admin/Courier.php */