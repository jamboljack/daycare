<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_m extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

    function select_banner($banner_id = 1) {
        $this->db->select('*');
        $this->db->from('pasar_banner');
        $this->db->where('banner_id', $banner_id);
        
        return $this->db->get();
    }

	function update_data() {
		$banner_id     	= 1;

		$data = array(
            'banner_image'      => $this->upload->file_name,
            'banner_update'     => date('Y-m-d H:i:s')
        );

		$this->db->where('banner_id', $banner_id);
		$this->db->update('pasar_banner', $data);
	}
}
/* Location: ./application/models/admin/Banner_m.php */