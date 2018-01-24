<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courier_m extends CI_Model {
	var $table 			= 'pasar_courier';
    var $column_order 	= array(null, null, 'courier_name', 'courier_desc', 'courier_url');
    var $column_search 	= array('courier_name', 'courier_desc', 'courier_url');
    var $order 			= array('courier_name' => 'asc');

	function __construct() {
		parent::__construct();	
	}

	private function _get_datatables_query() {
        $this->db->from($this->table);

        $i = 0;
        foreach ($this->column_search as $item) {
            if($_POST['search']['value']) {
                if($i===0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
         
        if(isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables() {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

	function insert_data() {
		$data = array(
			'courier_name'          => strtoupper(stripHTMLtags($this->input->post('name', 'true'))),
            'courier_desc'          => $this->input->post('desc', 'true'),
            'courier_url'           => strtolower($this->input->post('url', 'true')),
			'courier_update' 	    => date('Y-m-d H:i:s')
		);

		$this->db->insert('pasar_courier', $data);
	}

    function select_by_id($courier_id) {
        $this->db->select('*');
        $this->db->from('pasar_courier');
        $this->db->where('courier_id', $courier_id);

        return $this->db->get();
    }

	function update_data() {
		$courier_id     	= $this->input->post('id', 'true');

        $data = array(
            'courier_name'          => strtoupper(stripHTMLtags($this->input->post('name', 'true'))),
            'courier_desc'          => $this->input->post('desc', 'true'),
            'courier_url'           => strtolower($this->input->post('url', 'true')),
            'courier_update'        => date('Y-m-d H:i:s')
        );

		$this->db->where('courier_id', $courier_id);
		$this->db->update('pasar_courier', $data);
	}

	// function delete_data($id) {
	// 	$this->db->where('courier_id', $id);
	// 	$this->db->delete('pasar_courier');
	// }
}
/* Location: ./application/models/admin/Courier_m.php */