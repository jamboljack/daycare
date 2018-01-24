<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('level') == 'Admin' && !$this->session->userdata('logged_in_pasarku')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/content_m');
	}
	
	public function index() {
		if($this->session->userdata('level') == 'Admin' && $this->session->userdata('logged_in_pasarku')) {
			$this->template->display('admin/content/view');
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function data_list() {
        $List = $this->content_m->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row = array();
            $content_id = $r->content_id;
            
            $link 	= site_url('admin/content/editdata/'.$r->content_id);
            $row[] = '<a href="'.$link.'"><button class="btn btn-primary btn-xs" title="Edit Data"><i class="fa fa-edit"></i></button></a>
            			<a onclick="hapusData('.$content_id.')"><button class="btn btn-danger btn-xs" type="button" title="Delete Data"><i class="fa fa-times-circle"></i></button>';

            $row[] = $no;
            $row[] = $r->content_name;
            $row[] = word_limiter($r->content_desc,20);
            if ($r->content_level=='I') {
            	$level = 'INFO';
            } elseif ($r->content_level=='L') {
            	$level = 'LAYANAN PELANGGAN';
            } else {
            	$level = 'CUSTOMER CARE';
            }
            $row[] = $level;
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->content_m->count_all(),
                        "recordsFiltered" 	=> $this->content_m->count_filtered(),
                        "data" 				=> $data,
                );
        
        echo json_encode($output);
    }

    public function adddata() {
		$this->template->display('admin/content/add');
	}

	public function savedata() {
		$this->content_m->insert_data();
	}

	public function editdata($content_id) {
		$data['detail']	= $this->content_m->select_by_id($content_id)->row();
		$this->template->display('admin/content/edit', $data);
	}

	public function updatedata() {
		$this->content_m->update_data();
	}

	public function deletedata($id) {
        $this->content_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
}
/* Location: ./application/controller/admin/Content.php */