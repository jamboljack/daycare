<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_m extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

    function select_contact($contact_id = 1) {
        $this->db->select('*');
        $this->db->from('pasar_contact');
        $this->db->where('contact_id', $contact_id);
        
        return $this->db->get();
    }

	function update_data() {
		$contact_id     	= 1;

		$data = array(
			'contact_application'		=> stripHTMLtags($this->input->post('application', 'true')),
			'contact_name'				=> stripHTMLtags($this->input->post('name', 'true')),
			'contact_address'			=> stripHTMLtags($this->input->post('address', 'true')),
			'contact_phone'				=> stripHTMLtags($this->input->post('phone', 'true')),
			'contact_fax'				=> stripHTMLtags($this->input->post('fax', 'true')),
			'contact_email'				=> stripHTMLtags($this->input->post('email', 'true')),
			'contact_web'				=> stripHTMLtags($this->input->post('web', 'true')),
			'contact_bank'				=> stripHTMLtags($this->input->post('bank', 'true')),
			'contact_norek'				=> stripHTMLtags($this->input->post('norek', 'true')),
			'contact_account'			=> stripHTMLtags($this->input->post('atasnama', 'true')),
			'contact_update' 			=> date('Y-m-d H:i:s')
		);

		$this->db->where('contact_id', $contact_id);
		$this->db->update('pasar_contact', $data);
	}
}
/* Location: ./application/models/admin/Contact_m.php */