<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('level') == 'Admin' && !$this->session->userdata('logged_in_pasarku')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/banner_m');
	}
	
	public function index() {
		if($this->session->userdata('level') == 'Admin') {
			$data['detail'] = $this->banner_m->select_banner()->row();
			$this->template->display('admin/master/banner_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function updatedata() {
		$jam        = time();
	    
	    $config['file_name']        = 'Banner_'.$jam.'.jpg';
	    $config['upload_path']      = './img/';
	    $config['allowed_types']    = 'jpg|png|gif|jpeg';
	    $config['overwrite']        = TRUE;
	    $config['max_size']         = 0;
	    $this->load->library('upload');
	    $this->upload->initialize($config);
	    // Resize
	    $configThumb                    = array();
	    $configThumb['image_library']   = 'gd2';
	    $configThumb['source_image']    = '';
	    $configThumb['maintain_ratio']  = TRUE;
	    $configThumb['overwrite']       = TRUE;
	    $configThumb['width']           = 270;
	    $configThumb['height']          = 428;
	    $this->load->library('image_lib');

	    if (!$this->upload->do_upload('foto')) {
	 		$response['status'] = 'error';
	 	} else {
	    	$upload         = $this->upload->do_upload('foto');
	        $upload_data    = $this->upload->data();
	        $name_array[]   = $upload_data['file_name']; 
	        $configThumb['source_image'] = $upload_data['full_path'];
	        $this->image_lib->initialize($configThumb);
	        $this->image_lib->resize();

	        $this->banner_m->update_data();
	       	$response['status'] = 'success';
	    }

	    echo json_encode($response);
	}
}

/* Location: ./application/controller/admin/Banner.php */