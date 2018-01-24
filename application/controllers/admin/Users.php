<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('level') == 'Admin' && !$this->session->userdata('logged_in_pasarku')) redirect(base_url());
		$this->load->library('template');		
		$this->load->model('admin/users_m');
	}

	public function index() {
		if($this->session->userdata('level') == 'Admin' && $this->session->userdata('logged_in_pasarku')) {
			$this->template->display('admin/users/view');
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function data_list() {
        $List = $this->users_m->get_datatables(); 
        $data = array();
        $no = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row = array();

            $link 	= site_url('admin/users/editdata/'.$r->user_username);
            $row[] = '<a href="'.$link.'"><button class="btn btn-primary btn-xs" title="Edit Data"><i class="fa fa-edit"></i></button></a>';
            
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
            $row[] = $r->user_level;
            
            if ($r->user_status == 'Active') {
            	$row[] = '<span class="label label-success">Active</span>';
            } else {
            	$row[] = '<span class="label label-danger">Non Active</span>';
            }
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->users_m->count_all(),
                        "recordsFiltered" 	=> $this->users_m->count_filtered(),
                        "data" 				=> $data,
                );
        
        echo json_encode($output);
    }

	public function adddata() {
		$this->template->display('admin/users/add');
	}
	
	private function user_exists($username) {
		$this->db->where('user_username', $username);
		$query = $this->db->get('pasar_users');
		if($query->num_rows() > 0 ) { 
			return TRUE; 
		} else { 
			return FALSE; 
		}
	}

	function register_user_exists() {
		if (array_key_exists('username', $_POST)) {
			if ($this->user_exists($this->input->post('username', 'true')) == TRUE ) {
				echo json_encode(FALSE);
			} else {
				echo json_encode(TRUE);
			}
		}
	}

	private function email_exists($email) {
		$this->db->where('user_email', $email);
		$query = $this->db->get('pasar_users');
		if($query->num_rows() > 0 ) { 
			return TRUE; 
		} else { 
			return FALSE; 
		}
	}

	function register_email_exists() {
		if (array_key_exists('email', $_POST)) {
			if ($this->email_exists($this->input->post('email', 'true')) == TRUE ) {
				echo json_encode(FALSE);
			} else {
				echo json_encode(TRUE);
			}
		}
	}

	public function savedata() {
		$this->users_m->insert_data();
	}
	
	public function editdata($user_username) {
		$data['detail'] 		= $this->users_m->select_by_id($user_username)->row();
		$this->template->display('admin/users/edit', $data);
	}
	
	public function updatedata() {
		$this->users_m->update_data();
	}
}
/* Location: ./application/controller/admin/Users.php */