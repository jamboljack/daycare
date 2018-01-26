<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('template_front');
		$this->load->model('home_m');
	}

	public function index() {
		$data['listSlider']	= $this->home_m->select_slider()->result();
		$this->template_front->display('home_view', $data);
	}
}
/* Location: ./application/controller/Home.php */