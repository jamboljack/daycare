<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_pasarku')) redirect(base_url());
		$this->load->library('template');		
		$this->load->model('admin/member_m');
	}

	public function index() {
		if($this->session->userdata('logged_in_pasarku')) {
			$this->template->display('admin/member/view');
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function data_list() {
        $List = $this->member_m->get_datatables(); 
        $data = array();
        $no = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row = array();

            $link 	= site_url('admin/member/editdata/'.$r->user_username);
            $row[] = '<a href="'.$link.'"><button class="btn btn-primary btn-xs" title="Detail Data"><i class="fa fa-edit"></i></button></a>';
            
            $row[] = $no;
            $row[] = $r->user_username;
            $row[] = $r->user_name;
            if ($r->user_gender == 'L') {
            	$row[] = 'Laki-Laki';
            } else {
            	$row[] = 'Perempuan';
            }
            $row[] = $r->user_mobile;
            $row[] = $r->user_email;
            if ($r->user_banned == 'Yes') {
            	$row[] = '<span class="label label-danger">Yes</span>';
            } else {
            	$row[] = '<span class="label label-success">No</span>';
            }
            if ($r->user_status == 'Active') {
            	$row[] = '<span class="label label-success">Active</span>';
            } else {
            	$row[] = '<span class="label label-danger">Non Active</span>';
            }
            if (!empty($r->user_avatar)) {
                $row[] = '<img src="'.base_url('img/icon/'.$r->user_avatar).'" width="70%">';
            } else {
                $row[] = '<img src="'.base_url('img/no-image.jpg').'" width="70%">';
            }
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->member_m->count_all(),
                        "recordsFiltered" 	=> $this->member_m->count_filtered(),
                        "data" 				=> $data,
                );
        
        echo json_encode($output);
    }
	
	public function editdata($user_username) {
		$data['detail'] 		= $this->member_m->select_by_id($user_username)->row();
		$this->template->display('admin/member/edit', $data);
	}
	
	public function updatedata() {
		$this->member_m->update_data();
	}
}
/* Location: ./application/controller/admin/Member.php */