<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_m extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

    function select_detail($setting_id = 2) {
        $this->db->select('*');
        $this->db->from('pasar_setting');
        $this->db->where('setting_id', $setting_id);
        
        return $this->db->get();
    }

	function update_data() {
		$setting_id     	= 2;

		$data = array(
			'setting_desc'		=> $this->input->post('desc', 'true'),
			'setting_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('setting_id', $setting_id);
		$this->db->update('pasar_setting', $data);
	}
}
/* Location: ./application/models/admin/Info_m.php */