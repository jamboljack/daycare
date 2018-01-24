<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Footer extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('level') == 'Admin' && !$this->session->userdata('logged_in_pasarku')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/footer_m');
	}
	
	public function index() {
		if($this->session->userdata('level') == 'Admin') {
			$data['detail'] = $this->footer_m->select_footer()->row();
			$this->template->display('admin/master/footer_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function updatedata() {
		$this->footer_m->update_data();
	}
}

/* Location: ./application/controller/admin/Footer.php */